<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class GalleryController extends DM_BaseController
{
    protected $panel = 'Gallery';
    protected $base_route = 'admin.gallery';
    protected $view_path = 'admin.gallery';
    protected $model;
    protected $table;
    protected $folder = 'galleries';
    protected $image_prefix_path = '/upload_file/galleries/';
    protected $image_name = 'file';

    public function __construct(Gallery $model)
    {
        $this->model = $model;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .  $this->folder . DIRECTORY_SEPARATOR;
    }
    public function storeCategory(Request $request)
    {
        $rules = [
            'title' => 'required|max:225',
            'status' => 'required',
        ];
        $request->validate($rules);
        $model    = new GalleryCategory;
        $model->fill($request->all());
        $success    =  $model->save();
        if ($success) {
            return response()->json(['success' => true, 'message' => 'Gallery Category Successfully Added']);
        } else {
            return response()->json(['success' => false, 'message' => 'Gallery Category can not be Added']);
        }
    }
    public function destroyCategory(Request $request)
    {
        $data = GalleryCategory::findOrFail($request->id);
        if (!$data) {
            $request->session()->flash('success_message', 'Gallery Category does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($data->id);
        return response()->json(['success' => true, 'message' => 'Gallery Category Successfully Deleted']);
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Gallery::select('id', 'category_id', 'title', 'image', 'status')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('category_id', function ($row) {
                    if ($row->category_id != null) {
                        return $row->GalleryCategoryTitle->title;
                    } else {
                        return 'N/A';
                    }
                })
                //colum for status
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Published</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">Un-published</span>';
                    }
                })
                //colum for image
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return ' <a href="' . route($this->base_route . '.show', $row->id) . '" class="">
                                <img src="' . asset($row->image) . '" alt="image" class="img-responsive" style="width: 50px; height: 40px;">
                                </a>';
                    } else {
                        return 'N/A';
                    }
                })

                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.delete', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'));
    }
    public function create()
    {
        $data['rows'] = GalleryCategory::select('id', 'title', 'status')->get();
        $data['category'] = GalleryCategory::where('status', 1)->select('id', 'title')->get();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->storeData($request, $request->category_id, $request->title, $request->image, $request->status, $request->rows)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = GalleryCategory::select('id', 'title', 'status')->get();
        $data['category'] = GalleryCategory::where('status', 1)->select('id', 'title')->get();
        $data['row'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:225',
            'url' => 'sometimes|max:225',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
        ]);

        if ($this->model->updateData($request, $id, $request->category_id, $request->title, $request->image, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function show($id)
    {
        $data['row'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.show'), compact('data'));
    }


    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
    }



    public function deletedPost()
    {
        $data['rows'] = $this->model->where('deleted_at', '!=', null)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }


    public function restore($id)
    {
        $data = $this->model::where('id', '=', $id)->get();
        foreach ($data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->image;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }

    public function destroyFile($id)
    {
        dd('test');
        $this->tracker;
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }
}

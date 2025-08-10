<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class DestinationController extends DM_BaseController
{
    protected $panel = 'Destination';
    protected $base_route = 'admin.destination';
    protected $view_path = 'admin.destination';
    protected $model;
    protected $table;
    protected $prefix_path_image = '/upload_file/destination/';
    protected $prefix_path_file = '/upload_file/destination/file/';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'destination/';
    protected $file   = 'file';

    public function __construct(Destination $model)
    {
        $this->model = $model;
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Destination::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
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
                        return '<img src="' . asset($row->image) . '" alt="image" class="img-responsive" style="width: 80px; height: 40px;">';
                    } else {
                        return 'N/A';
                    }
                })

                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.destroy', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $model                        = $this->model;
        if ($request->hasFile('image')) {
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        $model->title                 = $request->title;
        $model->description           = $request->description;
        $model->status                = $request->status;
        $model->slug                  = Str::slug($request->title);
        $success                      = $model->save();
        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $model                               = $this->model::where('id', '=', $id)->first();
        if ($request->hasFile('image')) {
            // Unlink the old file if it exists
            if ($model->image != null) {
                if (file_exists(getcwd() . $model->image)) {
                    File::delete(getcwd() . $model->image);
                }
            }
            // Upload the new file
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        $model->title                        = $request->title;
        $model->description                  = $request->description;
        $model->status                       = $request->status;
        $model->slug                         = Str::slug($request->title);
        $success                             = $model->update();
        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function status(Request $request)
    {
        try {
            $category = $this->model::findOrFail($request->id);
            $category->status = $request->status;
            $category->save();

            return response()->json(['success' => 'Status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update status.']);
        }
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $file_path = getcwd() . $data->image;
        if (is_file($file_path)) {
            unlink($file_path);
        }

        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
    }
}

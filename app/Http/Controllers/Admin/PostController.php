<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PostController extends DM_BaseController
{
    protected $panel = 'Other Post';
    protected $base_route = 'admin.otherpost';
    protected $view_path = 'admin.otherpost';
    protected $model;
    protected $table;

    protected $file_model;


    public function __construct(Post $model, File $file)
    {
        $this->model = $model;
        $this->file_model = $file;
    }

    public function index(Request $request)
    {
        $data['total'] = $this->model::count();
        if ($request->ajax()) {
            $data = $this->model::orderBy('id', 'DESC')->get();
            //total post count
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('category_id', function ($row) {
                    if ($row->category_id != null) {
                        return $row->postCategoryTitle->title;
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('image', function ($row) {
                    if ($row->thumbnail != null) {
                        return '<img src="' . asset($row->thumbnail) . '" alt="image" class="img-responsive" style="width: 80px; height: 40px;">';
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Published</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">Un-published</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a href="' . route($this->base_route . '.edit', $row->post_unique_id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.delete', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete" style="cursor: pointer;"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'image', 'category_id'])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        $data['user_id']             = Auth::user()->id;
        $data['category']            = $this->model->getCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function store(Request $request)
    {
        $this->panel = 'Posts';
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->storeData($request)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function editPost(Request $request, $post_unique_id)
    {
        $data['category']  = $this->model->getCategory();
        $data['row']       = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        $data['file']      = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $post_unique_id)
    {
        $rules = $this->model->getRules($post_unique_id);
        $request->validate($rules);
        if ($this->model->updateData($request, $post_unique_id)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        if (Auth::user()->role == 'admin') {
            return redirect()->route($this->base_route . '.index');
        } else {
            return redirect()->route($this->base_route . '.index');
        }
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
        $this->panel = 'Posts';
        $data['layout'] = 'layouts.admin';
        $data['user_type'] = 'admin';
        $data['rows'] = $this->model->where('deleted_at', '!=', null)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }
    public function deletedMemberPost()
    {
        $this->panel = 'Posts';
        $data['layout'] = 'layouts.membership';
        $this->base_route = 'member.blog';
        $this->view_path = 'admin.blog';
        $data['layout'] = 'layouts.membership';
        $data['user_type'] = 'member';
        $data['rows'] = $this->model->where('deleted_at', '!=', null)->where('user_id', auth()->user()->id)->get();
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
        $row       = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->thumbnail;
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
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }

    public function updateOrder(Request $request)
    {
        // dd($request->order);
        $posts = $this->model::where('type', '=', 'page')->where('deleted_at', '=', NULL)->get();
        //  dd($posts);
        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }

    function show($post_unique_id)
    {
        $data['layout'] = 'layouts.admin';
        $blog = $this->model->where('post_unique_id', $post_unique_id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.show'), compact('blog', 'data'));
    }
}

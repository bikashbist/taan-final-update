<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreviousCommittee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PreviousCommitteeController extends DM_BaseController
{
    protected $panel = 'Previous Committee';
    protected $base_route = 'admin.previous-committee';
    protected $view_path = 'admin.previous-committee';
    protected $model;
    protected $table;

    protected $file_model;


    public function __construct(PreviousCommittee $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $data['total'] = $this->model::count();
        if ($request->ajax()) {
            $data = $this->model::get();
            //total post count
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    if ($row->created_at     != null) {
                        return date('d-M-Y', strtotime($row->created_at));
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
                            <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.destroy', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete" style="cursor: pointer;"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'created_at',])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }
    public function store(Request $request)
    {
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->storeData($request)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit(Request $request, $id)
    {
        $data['row']       = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->updateData($request, $id)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
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

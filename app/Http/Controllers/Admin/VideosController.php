<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends DM_BaseController
{
    protected $panel = 'Video';
    protected $base_route = 'admin.video';
    protected $view_path = 'admin.video';
    protected $model;
    protected $table;

    public function __construct(Video $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['rows'] = $this->model->getData();
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
        if ($this->model->storeData($request, $request->video_title, $request->video_url, $request->status, $request->video_thumbnail)) {
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
        $rules = $this->model->EditRules();
        $request->validate($rules);
        if ($this->model->updateData($request, $id, $request->video_title, $request->video_url, $request->status, $request->video_thumbnail)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function permanentDelete($id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->video_thumbnail;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }
}

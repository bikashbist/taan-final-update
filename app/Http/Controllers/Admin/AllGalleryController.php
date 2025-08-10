<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AllGallery;
use Illuminate\Http\Request;

class AllGalleryController extends DM_BaseController
{
    protected $panel = ' All Gallery';
    protected $base_route = 'admin.gallery';
    protected $view_path = 'admin.allgallery';
    protected $model;
    protected $table;
    protected $folder = 'allgalleries';
    protected $image_prefix_path = '/upload_file/allgalleries/';
    protected $image_name = 'file';
    protected $folder_path;

    public function __construct(AllGallery $model)
    {
        $this->model = $model;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .  $this->folder . DIRECTORY_SEPARATOR;
    }
    public function index(Request $request)
    {
        return view(parent::loadView($this->view_path . '.index'));
    }
    public function create($album_id)
    {
        return view(parent::loadView($this->view_path . '.create'), compact('album_id'));
    }
    public function store(Request $request, $album_id)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,gif|max:50000',
        ]);

        $file = $request->file('file');
        if ($file = $request->hasFile('file')) {
            $image_path = parent::uploadImage($request, $this->folder_path, $this->image_prefix_path, $this->image_name, '');
        } else {
            $image_path = null;
        }
        $row            = $this->model;
        $row->album_id  = $album_id;
        $row->image     = $image_path;
        $row->title     = 'Photo title goes here';
        $row->type      = 'image';
        $row->extension = $request->file->getClientOriginalExtension();
        $row->size      = $request->file->getSize();
        $row->save();
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|max:225',
            'url' => 'sometimes|max:225',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
        ]);
        if ($this->model->updateData($request, $id, $request->title, $request->image, $request->status)) {
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
        $this->tracker;
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }
}

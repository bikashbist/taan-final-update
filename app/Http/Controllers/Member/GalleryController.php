<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DM_BaseController;
use App\Models\BlogImage;
use App\Models\Blog;
class GalleryController extends DM_BaseController
{
    protected $panel = 'Gallery';
    protected $base_route = 'member.gallery';
    protected $view_path = 'user.gallery';
    protected $model;
    protected $table;
    protected $folder = 'galleries';
    protected $image_prefix_path = '/upload_file/galleries/';
    protected $image_name = 'file';
    protected $images;
    protected $blog;

    public function __construct(Gallery $model, BlogImage $images, Blog $blog)
    {
        $this->model = $model;
        $this->folder_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR .  $this->folder . DIRECTORY_SEPARATOR;
        $this->images = $images;
        $this->blog = $blog;
    }
    public function index()
    {
        $data['rows'] = $this->images->where('user_id', auth()->user()->id)->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {

        if($this->blog->galleryImageUpload($request)){
            session()->flash('alert-success', $this->panel.'Successfully Uploaded!');
        }else{
            session()->flash('alert-danger', $this->panel.' can not be Uploaded!');
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

    public function status(Request $request)
    {
        $row                                    = $this->fiscalYear;
        $user                                   = $row->findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status added SuccessFully']);
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

    public function deleteImages(Request $request){
         // Find the media files and delete them
        $ids = $request->ids;
        if (empty($ids)) {
            return redirect()->back()->with('error', 'No media selected for deletion');
        }
         $medias = $this->images->whereIn('id', $ids)->get();

         foreach ($medias as $media) {
             if ($media->image_path && file_exists(getcwd().$media->image_path)) {
                 unlink(getcwd().$media->image_path);
             }

             $media->delete();
         }
         session()->flash('alert-success', $this->panel . '  Successfully Deleted !');
         return redirect()->route($this->base_route. '.index');
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

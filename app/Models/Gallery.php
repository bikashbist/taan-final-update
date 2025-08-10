<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Gallery extends DM_BaseModel
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at', 'created_at'];

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'galleries';

    protected $folder_path_image;
    protected $folder = 'galleries';
    protected $prefix_path_image = '/upload_file/galleries/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function GalleryCategoryTitle()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    public function getData()
    {
        $data = Gallery::orderBy('id', 'DESC')->get();
        return $data;
    }
    public function photos() {
        return $this->hasMany(AllGallery::class, 'album_id', 'id');
    }
    public function getRules()
    {
        $rules = array(
            'title' => 'required|string|max:225|min:5',
            'image' => 'image',
        );
        return $rules;
    }

    public function storeData(Request $request,$category_id, $title, $image, $status)
    {
        // dd($title, $image, $status);
        // for thumbnail
        if ($request->hasFile('image')) {
            $image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        } else {
            $image = null;
        }
        $posts[] = [
            'category_id' => $category_id,
            'title' => $title,
            'image' => $image,
            'status' => 1,
            'created_at' => new DateTime(),
        ];
        if (Gallery::insert($posts)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData(Request $request, $id, $category_id, $title, $image, $status)
    {
        $section = Gallery::findOrFail($id);
        //  dd($product);
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $section->image;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $section->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        $section->category_id =  $category_id;
        $section->title =  $title;
        // $product->thumbs =  $post_thumbnail;
        $section->status =  $status;
        $section->updated_at =  new DateTime();
        $section->save();
    }
}

<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class Post extends DM_BaseModel
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'posts';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'otherpost';
    protected $prefix_path_image = '/upload_file/otherpost/';
    protected $prefix_path_file = '/upload_file/otherpost/file/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR;
    }

    public function getRules($post_unique_id = null)
    {
        return [
            'category_id' => 'required',
            'title' => $post_unique_id ? 'required|unique:posts,title,' . $post_unique_id . ',post_unique_id' : 'required|unique:posts,title,NULL,post_unique_id',
            'status' => 'required',
        ];
    }


    public function postCategoryTitle()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
    public function getCategory()
    {
        $data = DB::table('post_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }
    //Store Post Data
    public function storeData(Request $request)
    {
        // dd($request->all());
        $post_unique_id = uniqid(Auth::user()->id . '_');
        if ($request->hasFile('thumbnail')) {
            $post_thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbnail', '', '');
        } else {
            $post_thumbnail = '';
        }
        $array_file_title = array_filter($request->file_title);
        // for  multiple files
        if ($request->hasFile('files')) {
            $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        } else {
            $post_files = null;
        }
        if (isset($post_files) && isset($array_file_title)) {
            $min = min(count($array_file_title), count($post_files));
            $array_file = array_map(null, array_slice($array_file_title, 0, $min), array_slice($post_files, 0, $min));
        } else {
            $array_file = null;
        }
        $post[] = [
            'post_unique_id'          => $post_unique_id,
            'category_id'             => $request->category_id,
            'slug'                    =>  Str::slug($request->title),
            'title'                   => $request->title,
            'description'             => $request->description,
            'thumbnail'               => $post_thumbnail,
            'status'                  => $request->status,
            'video_url'               => $request->video_url,
            'video_id'                => getYoutubeIdFromUrl($request->video_url),
            'created_at'              => new DateTime(),
        ];
        if (isset($array_file)) {
            foreach ($array_file as $file_row)
                File::create([
                    'post_unique_id' => $post_unique_id,
                    'title' => $file_row[0],
                    'file' => $file_row[1],
                ]);
        }
        if (Post::insert($post)) {
            return true;
        } else {
            return false;
        }
    }
    //Update Post Data
    public function updateData(Request $request, $post_unique_id)
    {
        $post                 = Post::where('post_unique_id', '=', $post_unique_id)->first();
        $post_unique_id       = $post->post_unique_id;
        if ($request->hasFile('thumbnail')) {
            parent::deleteThumbnail($post);
            $post_thumbnail   = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbnail', '', '');
        } else {
            $post_thumbnail   = $post->thumbnail;
        }
        $array_file_title     = array_filter($request->file_title);
        // for  multiple files
        if ($request->hasFile('files')) {
            $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        } else {
            $post_files = null;
        }
        if (isset($post_files) && isset($array_file_title)) {
            $min = min(count($array_file_title), count($post_files));
            $array_file = array_map(null, array_slice($array_file_title, 0, $min), array_slice($post_files, 0, $min));
        } else {
            $array_file = null;
        }
        $post->category_id = $request->category_id;
        $post->slug        = Str::slug($request->title);
        $post->title       = $request->title;
        $post->description = $request->description;
        $post->thumbnail   = $post_thumbnail;
        $post->status      = $request->status;
        $post->video_url   = $request->video_url;
        $post->video_id    = getYoutubeIdFromUrl($request->video_url);
        $post->updated_at  = new DateTime();
        if ($post->save()) {
            if (isset($array_file)) {
                foreach ($array_file as $file_row)
                    File::create([
                        'post_unique_id' => $post_unique_id,
                        'title' => $file_row[0],
                        'file' => $file_row[1],
                    ]);
            }
            return true;
        } else {
            return false;
        }
    }
}

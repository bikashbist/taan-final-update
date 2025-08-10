<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Video extends DM_BaseModel
{
    use HasFactory;

    protected $dates = ['deleted_at', 'created_at'];

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'videos';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'videos';
    protected $prefix_path_image = '/upload_file/videos/';
    protected $prefix_path_file = '/upload_file/videos/file/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    // getData
    public function getData()
    {
        $data = Video::select('id', 'video_title', 'video_id', 'status')->orderBy('id', 'DESC')->get();
        return $data;
    }
    //Add Validation
    public function getRules()
    {
        $rules = array(
            'video_title'                  => 'required|string|max:225|min:5',
            'video_url'                    => 'required',
            'status'                       => 'required|boolean',
            'video_thumbnail'              => 'required|image',
        );
        return $rules;
    }
    //Edit Validation
    public function EditRules()
    {
        $rules = array(
            'video_title'                 => 'required|string|max:225|min:5',
            'video_url'                   => 'required',
            'video_thumbnail'             => 'image',
            'status'                      => 'required|boolean'
        );
        return $rules;
    }

    // videoIDget
    function getYoutubeIdFromUrl($video_url)
    {
        preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $video_url, $matches);
        if ($matches) {
            return $matches[2];
        }
    }
    // StoreData
    public function storeData(Request $request, $video_title, $video_url, $status, $video_thumbnail)
    {
        // dd($video_title, $video_url, $status);
        if ($video_thumbnail) {
            $video_thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'video_thumbnail');
        }
        $posts[] = [
            'video_title'                 => $video_title,
            'video_url'                   => $video_url,
            'video_id'                    => $this->getYoutubeIdFromUrl($video_url),
            'status'                      => $status,
            'user_id'                     => auth()->user()->id,
            'video_thumbnail'             => $video_thumbnail,
            'created_at'                  => new DateTime(),
        ];
        if (Video::insert($posts)) {
            return true;
        } else {
            return false;
        }
    }
    // UpdateData
    public function updateData(Request $request, $id, $video_title, $video_url, $status, $video_thumbnail)
    {
        $data = Video::findOrFail($id);
        if ($video_thumbnail) {
            $file_path = getcwd() . $data->video_thumbnail;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $data->video_thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'video_thumbnail');
        }
        $data->video_title               =  $video_title;
        $data->video_url                 =  $video_url;
        $data->video_id                  =  $this->getYoutubeIdFromUrl($video_url);
        $data->status                    =  $status;
        $data->updated_at                =  new DateTime();
        $data->save();
    }
}

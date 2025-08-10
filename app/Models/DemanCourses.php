<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DemanCourses extends DM_BaseModel
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'deman_courses';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'demand-course';
    protected $prefix_path_image = '/upload_file/demand-course/';
    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    //get All Data
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->get();
    }

    //Store Validation
    public function getRules()
    {
        $rules = array(
            'title'                    => 'required|max:225',
            'image'                    => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
            'start_date'               => 'required',
            'duration'                 => 'required'
        );
        return $rules;
    }
    //Store Data
    public function storeData(Request $request, $title, $duration, $start_date, $description,  $image, $status)
    {
        // dd($title, $duration, $start_date, $description, $image, $status);
        $data    =                           new DemanCourses();
        $data->title                      = $title;
        $data->duration                   = $duration;
        $data->start_date                 = $start_date;
        $data->description                = $description;
        $data->status                     = $status;
        if ($request->hasFile('image')) {
            $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $data->save();
        return true;
    }
    //Update Data
    public function updateData(Request $request, $id, $title, $duration, $start_date, $description, $image, $status)
    {
        $data = DemanCourses::findOrFail($id);
        $data->title                      = $title;
        $data->duration                   = $duration;
        $data->start_date                 = $start_date;
        $data->description                = $description;
        $data->status                     = $status;
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $data->image;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $data->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $data->save();
        return true;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchieveMent extends DM_BaseModel
{
    use HasFactory;
    protected $fillable = ['images', 'description','status'];
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'achieve_ments';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'achieve_ments';
    protected $prefix_path_image = '/upload_file/achieve_ments/';
    public function __construct(){
        $this->folder_path_image = getcwd(). DIRECTORY_SEPARATOR. 'upload_file'. DIRECTORY_SEPARATOR. $this->folder. DIRECTORY_SEPARATOR;
    }
    public function getData(){
        return $this->orderBy('id', 'ASC')->get();
    }
    public function getRules($id=null){
        $rules = array(

            'title' =>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        );
        return $rules;
    }
    public function storeData($request, $images, $title, $status){
        // dd(parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', ''));
        $achieveMent = new AchieveMent;
        $achieveMent->title = $title;
        $achieveMent->status = $status;
        $achieveMent->images = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        $achieveMent->save();
    }

    public function updateData($request, $id, $images, $title, $status){
        $achieveMent = AchieveMent::findOrFail($id);
        if($request->hasFile('image')){
            $file_path = getcwd(). $achieveMent->images;
            if(is_file($file_path)){
                unlink($file_path);
            }
            $achieveMent->images = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $achieveMent->title = $title;
        $achieveMent->status = $status;
        $achieveMent->save();
        return true;
    }
    public function deleteData($id){
        $achieveMent = AchieveMent::findOrFail($id);
        $file_path = getcwd(). $achieveMent->images;
        if(is_file($file_path)){
            unlink($file_path);
        }
        $achieveMent->delete();
        return true;
    }


}

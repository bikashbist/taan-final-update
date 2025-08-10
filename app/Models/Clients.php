<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Clients extends DM_BaseModel
{
    use HasFactory, SoftDeletes;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'clients';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'client';
    protected $prefix_path_image = '/upload_file/client/';
    public function __construct() {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function getRules()
    {
        $rules = array(
            'clients_types'      => 'required',
            'name'               => 'required|string|max:225',
            'url'                => 'sometimes|max:225',
            'image'              => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
        );
        return $rules;
    }

    public function storeData(Request $request, $clients_types, $name, $url, $image, $description, $status) {
        // dd($clients_types ,$name, $url, $image, $status);
        $clients =                             new Clients;
        $clients->clients_types                = $clients_types;
        $clients->name                         = $name;
        $clients->url                          = $url;
        $clients->description                  = $description;
        $clients->status                       = $status;
        if($request->hasFile('image')){
            $clients->image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image','','');  
        }
        $clients->save();
        return true;
    }

    public function updateData(Request $request, $id, $clients_types, $name, $url, $image, $description, $status) {
        // dd($clients_types ,$name, $url, $image, $status);
        $clients = Clients::findOrFail($id);
        $clients->clients_types                = $clients_types;
        $clients->name                         = $name;
        $clients->url                          = $url;
        $clients->description                  = $description;
        $clients->status                       = $status;
        if($request->hasFile('image')){
            $file_path = getcwd(). $clients->image;
             if(is_file($file_path)){
                 unlink($file_path);
             }
            $clients->image = parent::uploadImage($request, $this->folder_path_image ,$this->prefix_path_image,'image','','');  
        }
        $clients->save();        
        return true;
    }

}

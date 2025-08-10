<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Staff extends DM_BaseModel
{
    use HasFactory, SoftDeletes;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'staff';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'staff';
    protected $prefix_path_image = '/upload_file/staff/';
    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function StaffBranchTitle()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function getBranch()
    {
        return Branch::where('status', 1)->get();
    }

    public function getRules($id = null)
    {
        return [
            'name'           => 'required|max:225',
            'designation'    => 'sometimes|max:225',
            // 'image'          => $id ? 'sometimes|mimes:jpeg,jpg,png,gif|max:50000' : 'required|mimes:jpeg,jpg,png,gif|max:50000',
            'image'          => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
            'status'         => 'required|boolean'
        ];
    }
    public function storeData(Request $request, $name, $designation, $description, $branch_id, $phone, $email, $facebook, $twitter, $insta, $social_profile_wikipedia, $from_to_date, $image, $status)
    {
        try {
            $model =                                            new Staff;
            $model->name                                        = $name;
            $model->designation                                 = $designation;
            $model->description                                 = $description;
            $model->branch_id                                   = $branch_id;
            $model->phone                                       = $phone;
            $model->email                                       = $email;
            $model->social_profile_fb                           = $facebook;
            $model->social_profile_twitter                      = $twitter;
            $model->social_profile_insta                        = $insta;
            $model->social_profile_wikipedia                    = $social_profile_wikipedia;
            $model->from_to_date                                = $from_to_date;
            $model->status                                      = $status;
            if ($request->hasFile('image')) {
                $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $model->save();
            return true;
        } catch (\Exception $e) {
            return false;
            dd($e);
        }
    }

    public function updateData(Request $request, $id, $name, $designation, $description, $branch_id, $phone, $email, $facebook, $twitter, $insta, $social_profile_wikipedia,$from_to_date, $image, $status)
    {
        try {
            $model                                              = Staff::findOrFail($id);
            $model->name                                        = $name;
            $model->designation                                 = $designation;
            $model->description                                 = $description;
            $model->branch_id                                   = $branch_id;
            $model->phone                                       = $phone;
            $model->email                                       = $email;
            $model->social_profile_fb                           = $facebook;
            $model->social_profile_twitter                      = $twitter;
            $model->social_profile_insta                        = $insta;
            $model->social_profile_wikipedia                    = $social_profile_wikipedia;
            $model->from_to_date                                = $from_to_date;
            $model->status                                      = $status;
            if ($request->hasFile('image')) {
                $file_path = getcwd() . $model->image;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $model->image                                   = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
            }
            $model->save();
            return true;
        } catch (\Exception $e) {
            return false;
            dd($e);
        }
    }
}

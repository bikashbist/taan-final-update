<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PreviousCommittee extends Model
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'previous_committees';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'achieve_ments';
    protected $prefix_path_image = '/upload_file/achieve_ments/';
    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    public function getData()
    {
        return $this->orderBy('id', 'ASC')->get();
    }
    public function getRules($id = null)
    {
        $rules = array(

            'title' => 'required',
        );
        return $rules;
    }
    public function storeData(Request $request)
    {
        $model              = new PreviousCommittee();
        $model->title       = $request->title;
        $model->description = $request->description;
        $model->status      = $request->status;
        $model->save();
    }

    public function updateData(Request $request, $id)
    {
        $model              = PreviousCommittee::findOrFail($id);
        $model->title       = $request->title;
        $model->description = $request->description;
        $model->status = $request->status;
        $model->save();
        return true;
    }
    public function deleteData($id)
    {
        $achieveMent = PreviousCommittee::findOrFail($id);
        $achieveMent->delete();
        return true;
    }
}

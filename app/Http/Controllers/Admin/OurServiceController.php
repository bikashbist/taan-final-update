<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurService;
use App\DM_Libraries\Spyc;

class OurServiceController extends DM_BaseController
{
    protected $panel = 'Service';
    protected $base_route = 'admin.our_service';
    protected $view_path = 'admin.our_service';
    protected $model;
    protected $table;
    protected $folder_path = 'our_service';
    protected $prefix_path_image = '/upload_file/our_service/';
    protected $folder;
    public function __construct(OurService $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $spyc = new Spyc();
        $icons = $spyc::YAMLLoad(app_path() . "/DM_Treasure/icons.yml");
        $data['fa-icons'] = $icons["fa"];
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }
    public function store(Request $request)
    {
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->storeData($request, $request->title, $request->description, $request->icon, $request->status, $request->rows)) {
            session()->flash('alert-success', $this->panel . ' Successfully Added!');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $spyc = new Spyc();
        $icons = $spyc::YAMLLoad(app_path() . "/DM_Treasure/icons.yml");
        $data['fa-icons'] = $icons["fa"];
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        $rules = $this->model->getRules();
        if ($this->model->updateData($request, $id, $request->title, $request->description, $request->icon, $request->status, $request->rows)) {
            session()->flash('alert-success', $this->panel . ' Successfully Updated!');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function delete(Request $request, $id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->icon;
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
        $file_path = getcwd() . $row->icon;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }

    public function status(Request $request)
    {
        $row                                    = $this->model;
        $row->where('id', $request->id)->update(['status' => $request->status]);
        return response()->json(['success' => 'Status added SuccessFully']);
    }
}

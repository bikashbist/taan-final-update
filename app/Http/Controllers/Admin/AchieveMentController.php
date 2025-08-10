<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AchieveMent;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AchieveMentController extends DM_BaseController
{
    protected $panel = 'AchieveMent';
    protected $base_route = 'admin.achievement';
    protected $view_path = 'admin.achieve_ment';
    protected $model;
    protected $table;
    public function __construct(\App\Models\AchieveMent $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AchieveMent::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                //colum for status
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Published</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">Un-published</span>';
                    }
                })
                //colum for image
                ->editColumn('image', function ($row) {
                    if ($row->images != null) {
                        return '<img src="' . asset($row->images) . '" alt="image" class="img-responsive" style="width: 80px; height: 40px;">';
                    } else {
                        return 'N/A';
                    }
                })

                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.destroy', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'image'])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }
    public function store(Request $request)
    {
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->storeData($request, $request->image, $request->title, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['rows'] = $this->model->findOrFail($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        $rules = $this->model->getRules($id);
        $request->validate($rules);
        if ($this->model->updateData($request, $id, $request->image, $request->title, $request->status)) {
            session()->flash('alert-success', $this->panel . ' Successfully Updated!');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function delete($id)
    {
        $this->model->deleteData($id);
        return response()->json(array('success' => true));
    }
}

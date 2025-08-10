<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Services\StaffServices;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends DM_BaseController
{
    protected $panel = 'Staff';
    protected $base_route = 'admin.staff';
    protected $view_path = 'admin.staff';
    protected $table;
    protected $model;


    public function __construct(Staff $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        $data['total'] = $this->model::count();
        if ($request->ajax()) {
            $data = $this->model::orderBy('id', 'DESC')->get();
            //total post count
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('branch_id', function ($row) {
                    if ($row->branch_id != null) {
                        return $row->StaffBranchTitle->title;
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return '<img src="' . asset($row->image) . '" alt="image" class="img-responsive" style="width: 80px; height: 40px;">';
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Published</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">Un-published</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                            <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.delete', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete" style="cursor: pointer;"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'image', 'branch_id'])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['branch'] = $this->model->getBranch();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->storeData($request, $request->name, $request->designation, $request->description, $request->branch_id, $request->phone, $request->email, $request->facebook, $request->twitter, $request->insta, $request->social_profile_wikipedia, $request->from_to_date, $request->image, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        $data['branch'] = $this->model->getBranch();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rules = $this->model->getRules($id);
        $request->validate($rules);
        if ($this->model->updateData($request, $id, $request->name, $request->designation, $request->description, $request->branch_id, $request->phone, $request->email, $request->facebook, $request->twitter, $request->insta, $request->social_profile_wikipedia,  $request->from_to_date, $request->image, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }


    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
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
        $file_path = getcwd() . $row->image;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }
}

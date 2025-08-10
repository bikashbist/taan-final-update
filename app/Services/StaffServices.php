<?php

namespace App\Services;

use App\Models\Staff;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StaffServices
{
    protected $panel = 'Staff';
    protected $base_route = 'admin.staff';
    protected $view_path = 'admin.staff';
    protected $model;
    protected $table;

    public function __construct(Staff $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Staff::get();
            dd($data);
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
        } else {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends DM_BaseController
{
    protected $panel = 'Payment';
    protected $base_route = 'admin.payment';
    protected $view_path = 'admin.payment';
    protected $model;
    protected $table;

    public function __construct(Payment $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        if (request()->ajax()) {
            $query = $this->model::query()->orderBy('id', 'ASC');
            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('member_u_id', function ($row) {
                    return $row->getOrganizationName->organization_name;
                })
                //colum for status
                ->editColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-success badge-pill m-r-5 m-b-5">Published</span>';
                    } else {
                        return '<span class="badge badge-warning badge-pill m-r-5 m-b-5">Un-published</span>';
                    }
                })
                //colum for Voucher
                ->editColumn('voucher', function ($row) {
                    if ($row->voucher != null) {
                        return '<a href="' . asset($row->voucher) . '" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>';
                    } else {
                        return 'Not Found';
                    }
                })
                //check all colums
                ->addColumn('check', function ($row) {
                    return '<input type="checkbox" name="check" value="' . $row->id . '">';
                })

                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.destroy', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status', 'voucher', 'member_u_id', 'check'])
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
        $request->validate([
            'title' => 'required|max:225',
            'url' => 'sometimes|max:225',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:50000',
            'status' => 'required|boolean'
        ]);

        if ($this->model->storeData($request, $request->title, $request->url, $request->image, $request->order, $request->status, $request->rows)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:225',
            'url' => 'sometimes|max:225',
            'image' => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
        ]);
        if ($this->model->updateData($request, $id, $request->title, $request->url, $request->image, $request->order, $request->status, $request->rows)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        $file_path = getcwd() . $data->voucher;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }

        $success = $data->destroy($id);
        if ($success) {
            return response()->json(['success' => "Products Deleted successfully."]);
        } else {
            return response()->json(['error' => "Products can not be Deleted."]);
        }
    }
    //Delete Multiple Check Box
    public function deleteChecked(Request $request)
    {
        $request->validate([
            'ids' => 'required',
        ]);
        $ids = explode(",", $request->ids);
        $data = $this->model->whereIn('id', $ids)->get();
        if ($data->isEmpty()) {
            return response()->json(['error' => 'No records found for the given IDs.'], 404);
        }
        foreach ($data as $row) {
            $file_path = getcwd() . $row->voucher;
            if (is_file($file_path)) {
                unlink($file_path);
            }
        }
        $success = $this->model->whereIn('id', $ids)->delete();
        if ($success) {
            return response()->json(['success' => "Products Deleted successfully."]);
        } else {
            return response()->json(['error' => "Products can not be Deleted."]);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use Yajra\DataTables\Facades\DataTables;

class TransportController extends DM_BaseController
{
    protected $panel = 'Transport';

    protected $base_route = 'admin.transport';
    protected $view_path = 'admin.transport';
    protected $model;
    protected $table;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transport::select('*');
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

                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>'
                        . ' <button id="delete" data-url="' . route($this->base_route . '.destroy', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>';
                })
                ->rawColumns(['action', 'status'])
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
        $this->validate($request, [
            'title' => 'required|unique:transports,title',
        ]);
        Transport::insert([
            'title' => $request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success', 'Transport  Successfully Created !');
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['rows'] = Transport::find($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:transports,title,' . $id,
        ]);
        Transport::find($id)->update([
            'title' => $request->title,
            'status' => $request->status,
        ]);
        session()->flash('alert-success', 'Transport  Successfully Updated !');
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy($id)
    {
        Transport::find($id)->delete();
        session()->flash('alert-success', 'Transport  Successfully Deleted !');
        return response()->json('success');
    }

    public function status(Request $request)
    {
        try {
            $category = Transport::findOrFail($request->user_id);
            $category->status = $request->status;
            $category->save();

            return response()->json(['success' => 'Status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update status.']);
        }
    }
}

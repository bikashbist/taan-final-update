<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MemberType;

class MemberTypeController extends DM_BaseController
{
    protected $panel = 'Member Type';

    protected $base_route = 'admin.member_type';
    protected $view_path = 'admin.member_type';
    protected $model;
    protected $table;

    public function index()
    {
        $data['rows'] = MemberType::get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:member_types,title',
        ]);
        MemberType::insert([
            'title' => $request->title,
            'slug'   => \Str::slug($request->title),
            'status' => $request->status,
            'has_subcategory' => $request->has_subcategory,
        ]);
        session()->flash('alert-success', 'MemberType  Successfully Created !');
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data['rows'] = MemberType::find($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:member_types,title,' . $id,
        ]);
        MemberType::find($id)->update([
            'title' => $request->title,
            'slug'  => \Str::slug($request->title),
            'status' => $request->status,
            'has_subcategory' => $request->has_subcategory,
        ]);
        session()->flash('alert-success', 'Season  Successfully Updated !');
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy($id)
    {
        MemberType::find($id)->delete();
        session()->flash('alert-success', 'Season  Successfully Deleted !');
        return response()->json('success');
    }

    public function status(Request $request)
    {
        try {
            $category = MemberType::findOrFail($request->user_id);
            $category->status = $request->status;
            $category->save();

            return response()->json(['success' => 'Status updated successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update status.']);
        }
    }
}

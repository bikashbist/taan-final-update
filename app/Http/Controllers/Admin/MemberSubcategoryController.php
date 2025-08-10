<?php

namespace App\Http\Controllers\Admin;

use App\Models\MemberSubcategory;
use App\Models\MemberType;
use Illuminate\Http\Request;

class MemberSubcategoryController extends DM_BaseController
{
    protected $panel = 'Member Subcategory';
    protected $view_path = 'admin.member_subcategory';
    protected $base_route = 'admin.member-subcategories';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = MemberSubcategory::with('memberType')->orderBy('member_type_id')->orderBy('name')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['member_types'] = MemberType::where('status', true)->where('has_subcategory', true)->get();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_type_id' => 'required|exists:member_types,id',
            'name' => 'required|string|max:255',
            'status' => 'boolean'
        ]);

        // Check if member type has subcategory enabled
        $memberType = MemberType::find($request->member_type_id);
        if (!$memberType->has_subcategory) {
            return redirect()->back()->with('alert-danger', 'Selected member type does not support subcategories!');
        }

        // Check for duplicate subcategory name within the same member type
        $exists = MemberSubcategory::where('member_type_id', $request->member_type_id)
            ->where('name', $request->name)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('alert-danger', 'Subcategory name already exists for this member type!');
        }

        MemberSubcategory::create([
            'member_type_id' => $request->member_type_id,
            'name' => $request->name,
            'status' => $request->has('status') ? true : false
        ]);

        return redirect()->route('admin.member_subcategory.index')->with('alert-success', 'Member Subcategory created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['row'] = MemberSubcategory::with('memberType', 'members')->findOrFail($id);
        return view(parent::loadView($this->view_path . '.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = MemberSubcategory::findOrFail($id);
        $data['member_types'] = MemberType::where('status', true)->where('has_subcategory', true)->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategory = MemberSubcategory::findOrFail($id);

        $request->validate([
            'member_type_id' => 'required|exists:member_types,id',
            'name' => 'required|string|max:255',
            'status' => 'boolean'
        ]);

        // Check if member type has subcategory enabled
        $memberType = MemberType::find($request->member_type_id);
        if (!$memberType->has_subcategory) {
            return redirect()->back()->with('alert-danger', 'Selected member type does not support subcategories!');
        }

        // Check for duplicate subcategory name within the same member type (excluding current record)
        $exists = MemberSubcategory::where('member_type_id', $request->member_type_id)
            ->where('name', $request->name)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()->with('alert-danger', 'Subcategory name already exists for this member type!');
        }

        $subcategory->update([
            'member_type_id' => $request->member_type_id,
            'name' => $request->name,
            'status' => $request->has('status') ? true : false
        ]);

        return redirect()->route('admin.member_subcategory.index')->with('alert-success', 'Member Subcategory updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = MemberSubcategory::findOrFail($id);

        // Check if subcategory is being used by any members
        if ($subcategory->members()->count() > 0) {
            return redirect()->back()->with('alert-danger', 'Cannot delete subcategory as it is being used by members!');
        }

        $subcategory->delete();

        return redirect()->route('admin.member_subcategory.index')->with('alert-success', 'Member Subcategory deleted successfully!');
    }
}

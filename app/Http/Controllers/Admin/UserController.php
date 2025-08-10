<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use App\Models\Member;
use App\Models\MemberType;
use DB;
use Hash;
use App\Mail\NoticeMember;
use Mail;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;


class UserController extends DM_BaseController
{
    protected $panel = 'User';
    protected $base_route = 'admin.users';
    protected $view_path = 'admin.users';
    protected $model;
    protected $table;
    protected $prefix_path_image = '/upload_file/member/';
    protected $prefix_path_file = '/upload_file/member/file/';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'member';
    protected $file   = 'file';

    function __construct(User $model)
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
        $this->model = $model;
    }

    public function index(Request $request)
    {
        $this->panel = "Admin User";
        $this->base_route = 'admin.users';
        $this->view_path = 'admin.users';
        if ($request->ajax()) {
            $data = User::orderBy('id', 'DESC')->where('role', '!=', 'admin')->select('id', 'name', 'email', 'mobile', 'is_member', 'created_at')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                // get Original Name
                ->editColumn('organization_name', function ($row) {
                    if ($row->getOrganizationName()) {
                        return $row->getOrganizationName->organization_name;
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('created_at', function ($row) {
                    if ($row->created_at     != null) {
                        return date('d-M-Y', strtotime($row->created_at));
                    } else {
                        return 'N/A';
                    }
                })
                ->editColumn('status', function ($row) {
                    if ($row->is_member == 1) {
                        return '<input type="checkbox" style="scale: 1.5;" data-id="' . $row->id . '"  data-value="' . $row->is_member . '" class="status" onClick="statusChange(this)" name="status" checked><span class="input-span"></span>';
                    } else {
                        return '<input type="checkbox" style="scale: 1.5;" data-id="' . $row->id . '"  data-value="' . $row->is_member . '" class="status" onClick="statusChange(this)" name="status"><span class="input-span"></span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                    <a href="' . route($this->base_route . '.edit', $row->id) . '" class="btn btn-primary btn-xs"><i class="fa fa-pencil font-14"></i></a>
                    <button id="delete" data-url="' . route($this->base_route . '.destroy', $row->id) . '" type="button" data-id="' . $row->id . '" class="btn btn-danger btn-xs delete" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></button>
                    ' . '<a href="' . route($this->base_route . '.show', $row->id) . '" class="btn btn-info btn-xs"><i class="fa fa-eye font-14"></i></a>
                    <a href="' . route($this->base_route . '.reset', $row->id) . '" class="btn btn-warning btn-xs"><i class="fa fa-key font-14"></i></a>
                    ';;
                })
                ->rawColumns(['action', 'status', 'created_at'])
                ->make(true);
        }
        return view(parent::loadView($this->view_path . '.index'));
    }


    public function create()
    {
        $this->panel = "Admin Create";
        return view(parent::loadView($this->view_path . '.create'),);
    }



    public function store(Request $request)
    {
        if ($this->model->storeData($request)) {
            session()->flash('alert-success', $this->panel . ' Successfully Added!');
            return redirect()->route('admin.users.index')
                ->with('success', 'User created successfully');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Added');
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $this->panel = "Membership";
        $user = User::find($id);
        return view(parent::loadView($this->view_path . '.view'), compact('user'));
    }

    public function edit($id)
    {
        $this->panel = "Membership";
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $member_types = MemberType::where('status', '1')->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('user', 'roles', 'userRole', 'member_types'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $member = Member::where('user_id', $user->id)->firstOrFail();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'tax_clearance' => 'image',
            'register_file' => 'image',
            'pan' => 'image',
            // 'member_type' => 'required',
            'company_name' => ['required', function ($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('company->company_name', $value)->exists()) {
                    $fail('The Company name has already been taken.');
                }
            }],
            'pan_no' => ['required', function ($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('legal_documents->pan->pan_no', $value)->exists()) {
                    $fail('The PAN number has already been taken.');
                }
            }],
            'register_no' => ['required', function ($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('legal_documents->company->register_no', $value)->exists()) {
                    $fail('The Registration No number has already been taken.');
                }
            }],

        ]);

        if ($this->model->updateData($request, $id)) {
            session()->flash('alert-success', $this->panel . ' Successfully Updated!');
            return redirect()->route('admin.users.index')
                ->with('success', 'User Updated successfully');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Updated');
            return redirect()->back();
        }
    }



    public function createAdmin()
    {
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Membership";
        $roles = Role::pluck('name', 'name')->all();
        $member_types = MemberType::where('status', '1')->get();
        return view(parent::loadView($this->view_path . '.create'), compact('roles', 'member_types'));
    }



    public function storeAdmin(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'mobile' => 'required',
        ]);
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        if ($this->model->storeAdminData($request)) {
            session()->flash('alert-success', $this->panel . ' Successfully Added!');
            return redirect()->route('admin.admin_users.index')
                ->with('success', 'User created successfully');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Added');
            return redirect()->back();
        }
    }

    public function showAdmin($id)
    {
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Admin User";
        $user = User::find($id);
        return view(parent::loadView($this->view_path . '.view'), compact('user'));
    }

    public function editAdmin($id)
    {
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Admin User";
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        return view(parent::loadView($this->view_path . '.edit'), compact('user', 'roles', 'userRole'));
    }


    public function updateAdmin(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|min:6|confirmed',
            'confirm_password' => 'sometimes|nullable|same:password',
            'mobile' => 'required',
        ]);
        $this->base_route = 'admin.admin_users';
        $this->view_path = 'admin.admin_users';
        $this->panel = "Admin User";
        if ($this->model->updateAdminData($request, $id)) {
            session()->flash('alert-success', $this->panel . ' Successfully Updated!');
            return redirect()->route('admin.admin_users.index')
                ->with('success', 'User Updated successfully');
        } else {
            session()->flash('alert-danger', $this->panel . ' can not be Updated');
            return redirect()->back();
        }
    }


    public function deleteOld($id)
    {
        User::find($id)->delete();
        session()->flash('alert-success', 'User  Successfully Deleted !');
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully');
    }

    public function delete($id)
    {
        $member = Member::where('user_id', $id)->first();
        if ($member) {
            // Decode legal documents JSON
            $legal_documents = json_decode($member->legal_documents, true);
            $company = json_decode($member->company, true);
            // Delete each file associated with the member
            if (!empty($legal_documents['pan']['image'])) {
                File::delete(getcwd() . $legal_documents['pan']['image']);
            }
            if (!empty($legal_documents['company']['register_file'])) {
                File::delete(getcwd() . $legal_documents['company']['register_file']);
            }
            if (!empty($legal_documents['tax_clearance'])) {
                File::delete(getcwd() . $legal_documents['tax_clearance']);
            }
            if (!empty($company['company_logo'])) {
                File::delete(getcwd() . $company['company_logo']);
            }
            $member->delete();
            // Optionally delete the user record
            $user = User::find($id);
            if ($user->avatar != null) {
                File::delete(getcwd() . $user->avatar);
            }
            if ($user) {
                $user->delete();
            }


            session()->flash('alert-success', 'User  Successfully Deleted !');
            return redirect()->route('admin.users.index')
                ->with('success', 'User deleted successfully');
        } else {
            $user = User::find($id);
            if ($user) {
                if ($user->avatar != null) {
                    File::delete(getcwd() . $user->avatar);
                }
                $user->delete();
                session()->flash('alert-success', 'User  Successfully Deleted !');
                return redirect()->route('admin.users.index')
                    ->with('error', 'User not found');
            } else {

                session()->flash('alert-danger', 'User not found');
                return redirect()->route('admin.users.index')
                    ->with('error', 'User not found');
            }
        }
    }

    function verified(Request $request, $id)
    {
        dd($request->all());
        $user = User::findOrFail($id);
        if ($user) {
            $user->is_verified = $request->is_verified;
            $user->save();
            return response()->json(array('success' => true));
        } else {
            return response()->json(array('success' => false));
        }
    }

    public function status(Request $request)
    {
        $user = User::findOrFail($request->id);
        if ($user) {
            $user->is_member = $request->is_member;
            $user->save();
            return response()->json(array('success' => true));
        } else {
            return response()->json(array('success' => false));
        }
    }


    public function panNopasses($attribute, $value)
    {
        return !Member::whereJsonContains('legal_documents->pan->pan_no', $value)->exists();
    }

    public function panNomessage()
    {
        return 'The PAN number has already been taken.';
    }

    public function reset(Request $request, $id)
    {
        $data['row'] = User::findOrFail($id);
        return view(parent::loadView($this->view_path . '.reset'), compact('data'));
    }
    public function resetMember($id)
    {
        $data = Member::findOrFail($id);
        $this->panel = "Member";
        return view(parent::loadView($this->view_path . '.reset'), compact('data'));
    }

    public function updateReset(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|min:6',
        ]);

        $user = User::find($id);
        $user->password =  Hash::make($request->password);
        $user->save();
        session()->flash('alert-success', 'Password Successfully Updated!');
        if ($user->is_member == 1) {
            return redirect()->route('admin.users.index')
                ->with('success', 'Password Updated successfully');
        } else {
            return redirect()->route('admin.admin_users.index')
                ->with('success', 'Password Updated successfully');
        }
    }
    public function destroy($id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->avatar;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $memberId              = Member::where('user_id', $id)->first();
        // dd($file_path);
        if (isset($memberId->company_profile)) {
            $company_profile = getcwd() . $memberId->company_profile;
            if (is_file($company_profile)) {
                unlink($company_profile);
            }
        }
        if (isset($memberId->company_cover_image)) {
            $company_cover_image = getcwd() . $memberId->company_cover_image;
            if (is_file($company_cover_image)) {
                unlink($company_cover_image);
            }
        }
        if (isset($memberId->company_logo)) {
            $company_logo = getcwd() . $memberId->company_logo;
            if (is_file($company_logo)) {
                unlink($company_logo);
            }
        }
        if (isset($memberId->company_pan)) {
            $company_pan = getcwd() . $memberId->company_pan;
            if (is_file($company_pan)) {
                unlink($company_pan);
            }
        }
        if (isset($memberId->company_register)) {
            $company_register = getcwd() . $memberId->company_register;
            if (is_file($company_register)) {
                unlink($company_register);
            }
        }
        if (isset($memberId->company_tax_clearance)) {
            $company_tax_clearance = getcwd() . $memberId->company_tax_clearance;
            if (is_file($company_tax_clearance)) {
                unlink($company_tax_clearance);
            }
        }
        if (isset($memberId->payment_slip)) {
            $payment_slip = getcwd() . $memberId->payment_slip;
            if (is_file($payment_slip)) {
                unlink($payment_slip);
            }
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }
}

<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DM_BaseController;

class SettingsController extends DM_BaseController
{
    protected $panel = 'Setting';
    protected $base_route = 'member.setting';
    protected $view_path = 'user.setting';
    protected $setting;
    protected $table;
    protected $member;
    protected $user;

    protected $folder = 'member';
    protected $file   = 'file';
    protected $prefix_path_image = '/upload_file/member/';
    protected $prefix_path_file = '/upload_file/memer/file/';


    public function __construct(Setting $setting, Member $member, User $user)
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
        $this->setting = $setting;
        $this->member = $member;
        $this->user = $user;
    }
    public function index()
    {
        $data['member'] = $this->member->where('user_id', auth()->user()->id)->first();
        $data['setting'] = DB::table('settings')->first();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function update(Request $request , $id)
    {
        $user = User::findOrFail($id);

        $member = Member::where('user_id', $user->id)->first();
        $this->validate($request, [
            'company_name' => ['required', function($attribute, $value, $fail) use ($member) {
                if (Member::where('id', '!=', $member->id)->whereJsonContains('company->company_name', $value)->exists()) {
                    $fail('The Company name has already been taken.');
                }
            }],
        ]);
        $company = json_decode($member->company, true) ?? [];
        $company['company_name'] = $request->company_name;
        $company['company_founded_year'] = $request->company_founded_year;
        $company['company_website'] = $request->company_website;
        if ($request->hasFile('company_logo')) {
            // Unlink the old file if it exists
            if (!empty($legal_documents['company_logo']) && file_exists(getcwd().$legal_documents['company_logo'])) {
                File::delete(getcwd().$legal_documents['company_logo']);
            }
            // Upload the new file
            $company['company_logo'] = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'company_logo');

        }
        if ($request->hasFile('thumbnail')) {
            // Unlink the old file if it exists
            if (!empty($member->thumbnail) && file_exists(getcwd().$member->thumbnail)) {
                File::delete(getcwd().$member->thumbnail);
            }
            // Upload the new file
            $member->thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbnail');

        }
        $member->company = json_encode($company);
        $member->about_us = $request->about_us;
        $member->save();
        session()->flash('alert-success', ' Setting Information Updated ');
        return redirect()->back();
    }

    public function getSocialProfiles(){
        $this->panel = 'Social Profile';
        $data['member'] = $this->member->where('user_id', auth()->user()->id)->select('social')->first();
        return view(parent::loadView($this->view_path.'.social.index'), compact('data'));
    }

    public function updateSocialProfiles(Request $request, $id){
        // $request->validate([
        //     'facebook' => 'url',
        //     'twitter' => 'url',
        //     'insta' => 'url',
        //     'youtube' => 'url',
        //     'linkedin' => 'url',
        // ]);
        $member = Member::where('user_id', $id)->firstOrFail();
        $social = json_decode($member->social, true) ?? [];
        $social['facebook'] = $request->facebook;
        $social['twiter'] = $request->twiter;
        $social['instagram'] = $request->instagram;
        $social['youtube'] = $request->youtube;
        $social['linked_in'] = $request->linked_in;
        $member->social = json_encode($social);
        $member->save();
        session()->flash('alert-success', $this->panel.' Successfully Updated Member');
        return back();
    }

    public function getFooterSetting() {
        $this->panel = 'Footer Setting';
        $data['member'] = $this->member->where('user_id', auth()->user()->id)->select('footer')->first();
        return view(parent::loadView($this->view_path.'.footer.index'), compact('data'));
    }

    public function updateFooterSetting(Request $request, $id){
        $data['member'] = $this->member->where('user_id', $id)->first();
        $footer = [];
        $footer['footer_first_title']           = $request->footer_first_title;
        $footer['footer_first_description']     = $request->footer_first_description;
        $footer['footer_second_title']          = $request->footer_second_title;
        $footer['footer_second_description']    = $request->footer_second_description;
        $footer['footer_third_title']          = $request->footer_third_title;
        $footer['footer_third_description']    = $request->footer_third_description;
        $footer['footer_fourth_title']          = $request->footer_fourth_title;
        $footer['footer_fourth_description']    = $request->footer_fourth_description;
        $data['member']->footer = json_encode($footer);
        $data['member']->save();
        session()->flash('alert-success', $this->panel.' Successfully Updated Footer');
        return view(parent::loadView($this->view_path.'.footer.index'), compact('data'));
    }

    public function showUserProfile()
    {
        $this->panel = "User Profile";
        $this->base_route = 'member.profile';
        $this->view_path = 'user.profile';
        $data['profile'] = $this->model::findOrFail(Auth::user()->id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));

    }

    public function updateUserProfiles(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile' => 'required|numeric|unique:users,mobile,' . $id,
        ]);

        $user = User::findOrFail($id);
        $member = Member::where('user_id', $user->id)->firstOrFail();

        try {
            DB::beginTransaction();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            if ($request->hasFile('avatar')) {
                // Unlink the old file if it exists
                if (!empty($user->avatar) && file_exists(getcwd().$user->avatar)) {
                    File::delete(getcwd().$user->avatar);
                }
                // Upload the new file
                $user->avatar = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'avatar');

            }
            $user->save();

            $member->member_post = $request->member_post;
            $member->save();

            DB::commit();
            session()->flash('alert-success', 'User Profile and About Us Successfully Updated');
            return back();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('alert-danger', 'Failed to update User Profile and About Us');
            dd($e->getMessage);
            return back();
        }

    }

    public function passwordChange(Request $request){
        $request->validate([
            'current_password' =>                            ['required', 'max:255'],
            'password' =>                                    ['required', 'string', 'min:5'],
            'password_confirmation' =>                       ['required','same:password']
        ]);
        if(Hash::check($request->current_password, Auth::user()->password) ){
            $row = $this->user::findOrFail(Auth::user()->id);
            $row->password = Hash::make($request->password);
            $row->save();
            session()->flash('alert-success', 'Password changed successfully.');
            Auth::logout();
            return redirect()->route('site.sign_in');
        }
        else{
            session()->flash('alert-warning', 'Password did not match.');
            return redirect()->back();
        }
    }
}

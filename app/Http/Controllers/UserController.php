<?php

namespace App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| USER CONTROLLER
|--------------------------------------------------------------------------
| Purpose: Handle user registration and member management
| Features:
| - Member registration with file uploads
| - Member type and subcategory support
| - Bikram Sambat date conversion
| - Fiscal year end date calculation
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DM_BaseController;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\Menu;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends DM_BaseController
{
    /*
    |--------------------------------------------------------------------------
    | 1. CLASS PROPERTIES
    |--------------------------------------------------------------------------
    */

    // 1.1 Model Dependencies
    protected $user = null;
    protected $userInfo = null;

    // 1.2 File Upload Prefix Paths (URL paths for web access)
    protected $prefix_path_company_pan = '/upload_file/member/company_pan/';
    protected $prefix_path_company_register = '/upload_file/member/company_register/';
    protected $prefix_path_company_tax_clearance = '/upload_file/member/company_tax_clearance/';
    protected $prefix_path_tourism_certificate = '/upload_file/member/tourism_certificate/';
    protected $prefix_path_nrb_certificate = '/upload_file/member/nrb_certificate/';
    protected $prefix_path_cottage_industry_certificate = '/upload_file/member/cottage_industry_certificate/';
    protected $prefix_path_renewal_certificate = '/upload_file/member/renewal_certificate/';
    protected $prefix_path_payment_slip = '/upload_file/member/payment_slip/';

    // 1.3 File Upload Folder Paths (Server file system paths)
    protected $folder_path_company_pan;
    protected $folder_path_company_register;
    protected $folder_path_company_tax_clearance;
    protected $folder_path_payment_slip;
    protected $folder_path_nrb_certificate;
    protected $folder_path_cottage_industry_certificate;
    protected $folder_path_renewal_certificate;
    protected $folder_path_tourism_certificate;

    /*
    |--------------------------------------------------------------------------
    | 2. CONSTRUCTOR
    |--------------------------------------------------------------------------
    */

    /**
     * Initialize controller with dependencies and file paths
     */
    public function __construct(User $user)
    {
        // 2.1 Set model dependencies
        $this->user = $user;

        // 2.2 Initialize file upload folder paths
        $baseUploadPath = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR;

        $this->folder_path_company_pan = $baseUploadPath . 'company_pan' . DIRECTORY_SEPARATOR;
        $this->folder_path_company_register = $baseUploadPath . 'company_register' . DIRECTORY_SEPARATOR;
        $this->folder_path_company_tax_clearance = $baseUploadPath . 'company_tax_clearance' . DIRECTORY_SEPARATOR;
        $this->folder_path_payment_slip = $baseUploadPath . 'payment_slip' . DIRECTORY_SEPARATOR;
        $this->folder_path_nrb_certificate = $baseUploadPath . 'nrb_certificate' . DIRECTORY_SEPARATOR;
        $this->folder_path_cottage_industry_certificate = $baseUploadPath . 'cottage_industry_certificate' . DIRECTORY_SEPARATOR;
        $this->folder_path_renewal_certificate = $baseUploadPath . 'renewal_certificate' . DIRECTORY_SEPARATOR;
        $this->folder_path_tourism_certificate = $baseUploadPath . 'tourism_certificate' . DIRECTORY_SEPARATOR;
    }

    /*
    |--------------------------------------------------------------------------
    | 3. PUBLIC METHODS
    |--------------------------------------------------------------------------
    */

    /**
     * 3.1 Show member registration form
     * Route: GET /register
     */
    public function showRegistrationForm()
    {
        $data['menu'] = Menu::tree();
        $data['member-type'] = MemberType::where('status', '1')
            ->select('id', 'title', 'has_subcategory')
            ->get();

        return view('front_end.auth.register', compact('data'));
    }

    /**
     * 3.2 Process member registration
     * Route: POST /register
     * Features: User creation, member creation, file uploads, subcategory support
     */
    public function registerUser(Request $request)
    {
        // 3.2.1 Dynamic Validation Based on Member Type
        $memberType = \App\Models\MemberType::find($request->member_type_id);

        $validationRules = [
            'organization_name' => 'required',
            'name'   => 'required',
            'email'  => 'required|email',
            'mobile' => 'required',
            'member_type_id' => 'required|exists:member_types,id',
            // Optional file validations (commented for flexibility)
            // 'company_pan' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            // 'company_register' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            // 'company_tax_clearance' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
        ];

        // Add subcategory validation if member type has subcategories
        if ($memberType && $memberType->has_subcategory) {
            $validationRules['member_subcategory_id'] = 'required|exists:member_subcategories,id';
        }

        $request->validate($validationRules);
        try {
            // 3.2.2 Database Transaction Start
            DB::beginTransaction();

            // 3.2.3 Create User Account
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->mobile = $request->input('mobile');
            $user->password = bcrypt($request->input('mobile')); // Use mobile as default password
            $user->role = 'user';
            $userSaved = $user->save();

            if ($userSaved) {
                // 3.2.4 Create Member Record
                $member = new Member();
                $member->user_id = $user->id;
                $member->organization_name = $request->input('organization_name');
                $member->member_type_id = $request->input('member_type_id');
                $member->member_subcategory_id = $request->input('member_subcategory_id');
                $member->member_id = date('Ymd') . rand(1000, 9999); // Generate unique member ID
                // 3.2.5 Handle File Uploads (Optional Documents)
                if ($request->hasFile('company_pan')) {
                    $member->company_pan = parent::uploadSingleFile(
                        $request,
                        $this->folder_path_company_pan,
                        $this->prefix_path_company_pan,
                        'company_pan'
                    );
                }

                if ($request->hasFile('company_register')) {
                    $member->company_register = parent::uploadSingleFile(
                        $request,
                        $this->folder_path_company_register,
                        $this->prefix_path_company_register,
                        'company_register'
                    );
                }

                if ($request->hasFile('company_tax_clearance')) {
                    $member->company_tax_clearance = parent::uploadSingleFile(
                        $request,
                        $this->folder_path_company_tax_clearance,
                        $this->prefix_path_company_tax_clearance,
                        'company_tax_clearance'
                    );
                }

                if ($request->hasFile('tourism_certificate')) {
                    $member->tourism_certificate = parent::uploadSingleFile(
                        $request,
                        $this->folder_path_tourism_certificate,
                        $this->prefix_path_tourism_certificate,
                        'tourism_certificate'
                    );
                }

                if ($request->hasFile('nrb_certificate')) {
                    $member->nrb_certificate = parent::uploadSingleFile(
                        $request,
                        $this->folder_path_nrb_certificate,
                        $this->prefix_path_nrb_certificate,
                        'nrb_certificate'
                    );
                }

                if ($request->hasFile('cottage_industry_certificate')) {
                    $member->cottage_industry_certificate = parent::uploadSingleFile(
                        $request,
                        $this->folder_path_cottage_industry_certificate,
                        $this->prefix_path_cottage_industry_certificate,
                        'cottage_industry_certificate'
                    );
                }

                if ($request->hasFile('renewal_certificate')) {
                    $member->renewal_certificate = parent::uploadSingleFile(
                        $request,
                        $this->folder_path_renewal_certificate,
                        $this->prefix_path_renewal_certificate,
                        'renewal_certificate'
                    );
                }

                $member->save();
                DB::commit();
                return redirect()->back()->with('success', 'Member Registration Successful. Please Wait for Approval !!.');
            } else {
                // Error Log
                DB::rollBack();
                return redirect()->route('register')->with('error', 'Member Registration Failed !!.');
            }
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()]);
        }
    }
}

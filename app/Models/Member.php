<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Member extends DM_BaseModel
{
    use HasFactory;

    // Folder paths for file uploads (not database columns)
    protected $folder_path_avatar;
    protected $folder_path_company_profile;
    protected $folder_path_company_cover_image;
    protected $folder_path_company_logo;
    protected $folder_path_company_pan;
    protected $folder_path_company_register;
    protected $folder_path_company_tax_clearance;
    protected $folder_path_payment_slip;
    protected $folder_path_tourism_certificate;
    protected $folder_path_nrb_certificate;
    protected $folder_path_cottage_industry_certificate;
    protected $folder_path_renewal_certificate;

    // Define fillable columns (only database columns)
    protected $fillable = [
        'user_id',
        'organization_name',
        'member_type_id',
        'member_subcategory_id',
        'member_id',
        'register_no',
        'pan_vat_no',
        'address',
        'country',
        'website',
        'telephone',
        'mobile',
        'fax',
        'po_box',
        'key_person',
        'establish_date',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'instagram',
        'about_company',
        'company_profile',
        'company_cover_image',
        'company_logo',
        'company_pan',
        'company_register',
        'company_tax_clearance',
        'payment_slip',
        'tourism_certificate',
        'nrb_certificate',
        'cottage_industry_certificate',
        'renewal_certificate',
        'status'
    ];

    protected $prefix_path_avatar       = '/upload_file/user/';
    protected $prefix_path_company_profile  = '/upload_file/member/company_profile/';
    protected $prefix_path_company_cover_image  = '/upload_file/member/company_cover_image/';
    protected $prefix_path_company_logo = '/upload_file/member/company_logo/';
    protected $prefix_path_company_pan = '/upload_file/member/company_pan/';
    protected $prefix_path_company_register = '/upload_file/member/company_register/';
    protected $prefix_path_company_tax_clearance = '/upload_file/member/company_tax_clearance/';
    protected $prefix_path_payment_slip = '/upload_file/member/payment_slip/';
    protected $prefix_path_tourism_certificate = '/upload_file/member/tourism_certificate/';
    protected $prefix_path_nrb_certificate = '/upload_file/member/nrb_certificate/';
    protected $prefix_path_cottage_industry_certificate = '/upload_file/member/cottage_industry_certificate/';
    protected $prefix_path_renewal_certificate = '/upload_file/member/renewal_certificate/';

    public function __construct()
    {
        parent::__construct();

        $this->folder_path_avatar = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'user' . DIRECTORY_SEPARATOR;
        $this->folder_path_company_profile = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'company_profile' . DIRECTORY_SEPARATOR;
        $this->folder_path_company_cover_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'company_cover_image' . DIRECTORY_SEPARATOR;
        $this->folder_path_company_logo = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'company_logo' . DIRECTORY_SEPARATOR;
        $this->folder_path_company_pan = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'company_pan' . DIRECTORY_SEPARATOR;
        $this->folder_path_company_register = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'company_register' . DIRECTORY_SEPARATOR;
        $this->folder_path_company_tax_clearance = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'company_tax_clearance' . DIRECTORY_SEPARATOR;
        $this->folder_path_payment_slip = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'payment_slip' . DIRECTORY_SEPARATOR;
        $this->folder_path_tourism_certificate = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'tourism_certificate' . DIRECTORY_SEPARATOR;
        $this->folder_path_nrb_certificate = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'nrb_certificate' . DIRECTORY_SEPARATOR;
        $this->folder_path_cottage_industry_certificate = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'cottage_industry_certificate' . DIRECTORY_SEPARATOR;
        $this->folder_path_renewal_certificate = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'member' . DIRECTORY_SEPARATOR . 'renewal_certificate' . DIRECTORY_SEPARATOR;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->member_id = self::generateUniqueMemberId();
        });
    }

    private static function generateUniqueMemberId()
    {
        do {
            // Generate a random 8-digit number
            $id = str_pad(mt_rand(0, 99999999), 10, '0', STR_PAD_LEFT);
        } while (self::where('member_id', $id)->exists());

        return $id;
    }
    public function getUseDetail()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function memberType()
    {
        return $this->belongsTo(MemberType::class, 'member_type_id');
    }

    public function memberSubcategory()
    {
        return $this->belongsTo(MemberSubcategory::class, 'member_subcategory_id');
    }

    public function getUserName()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getRules()
    {
        $rules = array(
            'full_name'                           => 'required|string|max:225|min:2',
            'email'                               => 'required',
            // 'organization_name'                   => 'required|string|max:225|min:2',
            // 'member_type_id'                      => 'required|integer',
            // 'member_id'                           => 'required|max:225|min:1',
            // 'register_no'                         => 'required|string|max:225|min:2',
            // 'address'                             => 'required|string|max:225|min:2',
            // 'mobile'                              => 'required|string|max:225|min:2',
            // 'establish_date'                      => 'required|string|max:225|min:2',
            // 'facebook'                            => 'required|url',
            // 'twitter'                             => 'required|url',
            // 'linkedin'                            => 'required|url',
            // 'youtube'                             => 'required|url',
            // 'instagram'                           => 'required|url',
            // 'avatar'                              => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // '$request->cover_image,'              => 'sometimes|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'company_logo'                        => 'sometimes|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            // 'company_pan'                         => 'sometimes|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            // 'company_register'                    => 'sometimes|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
            // 'company_tax_clearance'               => 'sometimes|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        );
        return $rules;
    }

    public function storeData(
        Request $request,
        $full_name,
        $organization_name,
        $member_id,
        $member_type_id,
        $member_subcategory_id,
        $email,
        $register_no,
        $pan_vat_no,
        $address,
        $country,
        $website,
        $telephone,
        $mobile,
        $fax,
        $po_box,
        $key_person,
        $establish_date,
        $facebook,
        $twitter,
        $linkedin,
        $youtube,
        $instagram,
        $avatar,
        $company_cover_image,
        $company_logo,
        $company_pan,
        $company_register,
        $company_tax_clearance,
        $payment_slip,
        $about_company,
        $tourism_certificate,
        $nrb_certificate,
        $cottage_industry_certificate,
        $renewal_certificate
    ) {
        // Store User
        try {
            DB::beginTransaction();
            $user                                            = new User;
            $user->name                                      = $full_name;
            $user->email                                     = $email;
            $user->mobile                                    = $mobile;
            $user->password                                  = bcrypt($mobile);
            $user->role                                      = 'user';
            $user->status                                    = 'active';
            if ($request->hasFile('avatar')) {
                $user->avatar = parent::uploadSingleFile($request, $this->folder_path_avatar, $this->prefix_path_avatar, 'avatar');
            }
            $check                                           =  $user->save();
            // Store Member
            if (isset($check)) {
                $member                                      = new Member;
                $member->organization_name                   = $organization_name;
                $member->member_id                           = $member_id;
                $member->member_type_id                      = $member_type_id;
                $member->member_subcategory_id               = $member_subcategory_id;
                $member->user_id                             = $user->id;
                $member->register_no                         = $register_no;
                $member->pan_vat_no                          = $pan_vat_no;
                $member->address                             = $address;
                $member->country                             = $country;
                $member->website                             = $website;
                $member->telephone                           = $telephone;
                $member->mobile                              = $mobile;
                $member->fax                                 = $fax;
                $member->po_box                              = $po_box;
                $member->key_person                          = $key_person;
                $member->establish_date                      = $establish_date;
                $member->facebook                            = $facebook;
                $member->twitter                             = $twitter;
                $member->linkedin                            = $linkedin;
                $member->youtube                             = $youtube;
                $member->instagram                           = $instagram;
                $member->company_profile                     = $user->avatar;
                $member->about_company                       = $request->about_company;
                if ($request->hasFile('company_cover_image')) {
                    $member->company_cover_image = parent::uploadSingleFile($request, $this->folder_path_company_cover_image, $this->prefix_path_company_cover_image, 'company_cover_image');
                }
                if ($request->hasFile('company_logo')) {
                    $member->company_logo = parent::uploadSingleFile($request, $this->folder_path_company_logo, $this->prefix_path_company_logo, 'company_logo');
                }
                if ($request->hasFile('company_pan')) {
                    $member->company_pan = parent::uploadSingleFile($request, $this->folder_path_company_pan, $this->prefix_path_company_pan, 'company_pan');
                }
                if ($request->hasFile('company_register')) {
                    $member->company_register = parent::uploadSingleFile($request, $this->folder_path_company_register, $this->prefix_path_company_register, 'company_register');
                }
                if ($request->hasFile('company_tax_clearance')) {
                    $member->company_tax_clearance = parent::uploadSingleFile($request, $this->folder_path_company_tax_clearance, $this->prefix_path_company_tax_clearance, 'company_tax_clearance');
                }
                if ($request->hasFile('payment_slip')) {
                    $member->payment_slip = parent::uploadSingleFile($request, $this->folder_path_payment_slip, $this->prefix_path_payment_slip, 'payment_slip');
                }
                if ($request->hasFile('tourism_certificate')) {
                    $member->tourism_certificate = parent::uploadSingleFile($request, $this->folder_path_tourism_certificate, $this->prefix_path_tourism_certificate, 'tourism_certificate');
                }
                if ($request->hasFile('nrb_certificate')) {
                    $member->nrb_certificate = parent::uploadSingleFile($request, $this->folder_path_nrb_certificate, $this->prefix_path_nrb_certificate, 'nrb_certificate');
                }
                if ($request->hasFile('cottage_industry_certificate')) {
                    $member->cottage_industry_certificate = parent::uploadSingleFile($request, $this->folder_path_cottage_industry_certificate, $this->prefix_path_cottage_industry_certificate, 'cottage_industry_certificate');
                }
                if ($request->hasFile('renewal_certificate')) {
                    $member->renewal_certificate = parent::uploadSingleFile($request, $this->folder_path_renewal_certificate, $this->prefix_path_renewal_certificate, 'renewal_certificate');
                }

                $check_member = $member->save();
                DB::commit();
                return $check_member;
            } else {
                DB::rollBack();
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function updateData(
        Request $request,
        $id,
        $full_name,
        $organization_name,
        $member_id,
        $member_type_id,
        $member_subcategory_id,
        $email,
        $register_no,
        $pan_vat_no,
        $address,
        $country,
        $website,
        $telephone,
        $mobile,
        $fax,
        $po_box,
        $key_person,
        $establish_date,
        $facebook,
        $twitter,
        $linkedin,
        $youtube,
        $instagram,
        $avatar,
        $company_cover_image,
        $company_logo,
        $company_pan,
        $company_register,
        $company_tax_clearance,
        $payment_slip,
        $about_company,
        $tourism_certificate,
        $nrb_certificate,
        $cottage_industry_certificate,
        $renewal_certificate
    ) {
        // User Update
        $member                                      = Member::findOrFail($id);
        //User Update
        $user                                        = User::findOrFail($member->user_id);
        $user->name                                  = $full_name;
        $user->email                                 = $email;
        $user->mobile                                = $mobile;
        if ($request->hasFile('avatar')) {
            $file_path = getcwd() . $user->avatar;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $user->avatar = parent::uploadSingleFile($request, $this->folder_path_avatar, $this->prefix_path_avatar, 'avatar');
        }
        $check                                           =  $user->save();
        // Store Member
        if (isset($check)) {
            // Member Update
            $member->organization_name                   = $organization_name;
            $member->member_id                           = $member_id;
            $member->member_type_id                      = $member_type_id;
            $member->member_subcategory_id               = $member_subcategory_id;
            $member->register_no                         = $register_no;
            $member->pan_vat_no                          = $pan_vat_no;
            $member->address                             = $address;
            $member->country                             = $country;
            $member->website                             = $website;
            $member->telephone                           = $telephone;
            $member->mobile                              = $mobile;
            $member->fax                                 = $fax;
            $member->po_box                              = $po_box;
            $member->key_person                          = $key_person;
            $member->establish_date                      = $establish_date;
            $member->facebook                            = $facebook;
            $member->twitter                             = $twitter;
            $member->linkedin                            = $linkedin;
            $member->youtube                             = $youtube;
            $member->instagram                           = $instagram;
            $member->company_profile                     = $user->avatar;
            $member->about_company                       = $request->about_company;
            if ($request->hasFile('company_cover_image')) {
                $file_path = getcwd() . $member->company_cover_image;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->company_cover_image = parent::uploadSingleFile($request, $this->folder_path_company_cover_image, $this->prefix_path_company_cover_image, 'company_cover_image');
            }
            if ($request->hasFile('company_logo')) {
                $file_path = getcwd() . $member->company_logo;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->company_logo = parent::uploadSingleFile($request, $this->folder_path_company_logo, $this->prefix_path_company_logo, 'company_logo');
            }
            if ($request->hasFile('company_pan')) {
                $file_path = getcwd() . $member->company_pan;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->company_pan = parent::uploadSingleFile($request, $this->folder_path_company_pan, $this->prefix_path_company_pan, 'company_pan');
            }
            if ($request->hasFile('company_register')) {
                $file_path = getcwd() . $member->company_register;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->company_register = parent::uploadSingleFile($request, $this->folder_path_company_register, $this->prefix_path_company_register, 'company_register');
            }
            if ($request->hasFile('company_tax_clearance')) {
                $file_path = getcwd() . $member->company_tax_clearance;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->company_tax_clearance = parent::uploadSingleFile($request, $this->folder_path_company_tax_clearance, $this->prefix_path_company_tax_clearance, 'company_tax_clearance');
            }
            if ($request->hasFile('payment_slip')) {
                $file_path = getcwd() . $member->payment_slip;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->payment_slip = parent::uploadSingleFile($request, $this->folder_path_payment_slip, $this->prefix_path_payment_slip, 'payment_slip');
            }
            // Tourism Certificate
            if ($request->hasFile('tourism_certificate')) {
                $file_path = getcwd() . $member->tourism_certificate;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->tourism_certificate = parent::uploadSingleFile(
                    $request,
                    $this->folder_path_tourism_certificate,
                    $this->prefix_path_tourism_certificate,
                    'tourism_certificate'
                );
            }

            // NRB Certificate
            if ($request->hasFile('nrb_certificate')) {
                $file_path = getcwd() . $member->nrb_certificate;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->nrb_certificate = parent::uploadSingleFile(
                    $request,
                    $this->folder_path_nrb_certificate,
                    $this->prefix_path_nrb_certificate,
                    'nrb_certificate'
                );
            }

            // Cottage Industry Certificate
            if ($request->hasFile('cottage_industry_certificate')) {
                $file_path = getcwd() . $member->cottage_industry_certificate;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->cottage_industry_certificate = parent::uploadSingleFile(
                    $request,
                    $this->folder_path_cottage_industry_certificate,
                    $this->prefix_path_cottage_industry_certificate,
                    'cottage_industry_certificate'
                );
            }

            // Renewal Certificate
            if ($request->hasFile('renewal_certificate')) {
                $file_path = getcwd() . $member->renewal_certificate;
                if (is_file($file_path)) {
                    unlink($file_path);
                }
                $member->renewal_certificate = parent::uploadSingleFile(
                    $request,
                    $this->folder_path_renewal_certificate,
                    $this->prefix_path_renewal_certificate,
                    'renewal_certificate'
                );
            }

            return  $member->save();
        } else {
            return false;
        }
    }
}

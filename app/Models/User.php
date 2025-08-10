<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPassword;
use DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Mail\NoticeMember;
use Mail;
use Hash;
use Intervention\Image\Facades\Image as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Auth\Notifications\ResetPassword as NotificationsResetPassword;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $prefix_path_image = '/upload_file/member/';
    protected $prefix_path_image_pan = '/upload_file/member/pan/';
    protected $prefix_path_image_tax_clearance = '/upload_file/member/tax_clearance/';
    protected $prefix_path_image_register_file = '/upload_file/member/register_file/';
    protected $prefix_path_register_file = '/upload_file/member/register_file/';
    protected $prefix_path_file = '/upload_file/member/file/';
    protected $folder_path_image;
    protected $folder_path_image_pan;
    protected $folder_path_image_tax_clearance;
    protected $folder_path_image_register_file;
    protected $folder_path_file;
    protected $folder_path_file_pan;
    protected $folder_path_file_tax_clearance;
    protected $folder_path_file_register_file;
    protected $folder = 'member';
    protected $folder_pan = 'member/pan';
    protected $folder_tax_clearance = 'member/tax_clearance';
    protected $folder_register_file = 'member/register_file';
    protected $file   = 'file';
    protected $file_pan   = 'file/pan';
    protected $file_tax_clearance   = 'file/tax_clearance';
    protected $file_register_file   = 'file/register_file';


    function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;

        $this->folder_path_image_pan = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder_pan . DIRECTORY_SEPARATOR;
        $this->folder_path_file_pan = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder_pan . DIRECTORY_SEPARATOR . $this->file_pan . DIRECTORY_SEPARATOR;

        $this->folder_path_image_tax_clearance = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder_tax_clearance . DIRECTORY_SEPARATOR;
        $this->folder_path_file_tax_clearance = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder_tax_clearance . DIRECTORY_SEPARATOR . $this->file_tax_clearance . DIRECTORY_SEPARATOR;

        $this->folder_path_image_register_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder_register_file . DIRECTORY_SEPARATOR;
        $this->folder_path_file_register_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder_register_file . DIRECTORY_SEPARATOR . $this->file_register_file . DIRECTORY_SEPARATOR;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'is_verified',
        'avatar',
        'status',
    ];

    public function getOrganizationName()
    {
        return $this->hasOne('App\Models\Member', 'user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new NotificationsResetPassword($token));
    }

    public function member()
    {
        return $this->hasOne('App\Models\Member', 'user_id');
    }

    public function OrganizationTitle()
    {
        return $this->hasOne('App\Models\Member', 'user_id');
    }

    public function storeData($request)
    {
       // dd($request->all());
        try {
            $settings = Setting::first();
            DB::beginTransaction();
            $member                             = new Member();
            $member->name                       = $request->member;
            $member->register_no                = $request->register_no;
            $member->pan_vat_no                 = $request->pan_vat_no;
            $member->address                    = $request->address;
            $member->country                    = $request->country;
            $member->website                    = $request->website;
            $member->telephone                  = $request->telephone;
            $member->mobile                     = $request->mobile;
            $member->fax                        = $request->fax;
            $member->po_box                     = $request->po_box;
            $member->key_person                 = $request->key_person;
            $member->establish_date             = $request->establish_date;
            $member->facebook                   = $request->facebook;
            $member->instagram                  = $request->instagram;
            $member->twitter                    = $request->twitter;
            $member->youtube                    = $request->youtube;
            $member->linkedin                   = $request->linkedin;
            $member->member_type_id             = $request->member_type_id;

            $member->company_logo               = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'company_logo');
            $member->company_pan                = $this->uploadImage($request, $this->folder_path_image_pan, $this->prefix_path_image_pan, 'company_pan');
            $member->company_register           = $this->uploadImage($request, $this->folder_path_image_register_file, $this->prefix_path_image_register_file, 'company_register');
            $member->company_tax_clearance      = $this->uploadImage($request, $this->folder_path_image_tax_clearance, $this->prefix_path_image_tax_clearance, 'company_tax_clearance');


            //Insert User Data
            $user = new User();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->password       = Hash::make($request->password);



            DB::commit();
            // $user->assignRole($request->input('roles'));
            session()->flash('alert-success', 'User  Successfully Added !');

            return true;
        } catch (\Throwable $th) {
            Log::channel('email_notifications')->error('Failed to send notice email', ['error' => $th->getMessage()]);
            DB::rollback();

            session()->flash('alert-danger', 'User  can not be Added');
            return false;
        }
    }

    public function updateData($request, $id)
    {
        try {

            DB::beginTransaction();
            $user = User::findOrFail($id);
            $member = Member::where('user_id', $user->id)->firstOrFail();

            // Debugging output to ensure `legal_documents` is decoded correctly
            $pan = null;
            $company_logo = null;
            $register_file = null;
            $tax_clearance = null;

            $legal_documents = json_decode($member->legal_documents, true) ?? [];
            $company = json_decode($member->company, true) ?? [];
            $social = json_decode($member->social, true) ?? [];
            // Update PAN and company registration numbers
            if ($request->has('pan_no')) {
                $legal_documents['pan']['pan_no'] = $request->pan_no;
            }
            if ($request->has($request->register_no)) {
                $legal_documents['company']['register_no'] = $request->register_no;
            }
            $company['company_name'] = $request->company_name;
            $company['company_founded_year'] = $request->company_founded_year;
            $company['company_website'] = $request->company_website;

            $social['facebook'] = $request->facebook;
            $social['twiter'] = $request->twiter;
            $social['instagram'] = $request->instagram;
            $social['youtube'] = $request->youtube;
            $social['linked_id'] = $request->linked;

            if ($request->hasFile('company_logo')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['company_logo']) && file_exists(getcwd() . $legal_documents['company_logo'])) {
                    File::delete(getcwd() . $legal_documents['company_logo']);
                }
                // Upload the new file
                $company_logo = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'company_logo');
                $company['company_logo'] = $company_logo;
            }

            // Handle PAN file
            if ($request->hasFile('pan')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['pan']['image']) && file_exists(getcwd() . $legal_documents['pan']['image'])) {
                    File::delete(getcwd() . $legal_documents['pan']['image']);
                }
                // Upload the new file
                $pan = $this->uploadImage($request, $this->folder_path_image_pan, $this->prefix_path_image_pan, 'pan');
                $legal_documents['pan']['image'] = $pan;
            }

            // Handle register file
            if ($request->hasFile('register_file')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['company']['register_file']) && file_exists(getcwd() . $legal_documents['company']['register_file'])) {
                    File::delete(getcwd() . $legal_documents['company']['register_file']);
                }
                // Upload the new file
                $register_file = $this->uploadImage($request, $this->folder_path_image_register_file, $this->prefix_path_image_register_file, 'register_file');
                $legal_documents['company']['register_file'] = $register_file;
            }

            // Handle tax clearance file
            if ($request->hasFile('tax_clearance')) {
                // Unlink the old file if it exists
                if (!empty($legal_documents['tax_clearance']) && file_exists(getcwd() . $legal_documents['tax_clearance'])) {
                    File::delete(getcwd() . $legal_documents['tax_clearance']);
                }
                // Upload the new file
                $tax_clearance = $this->uploadImage($request, $this->folder_path_image_tax_clearance, $this->prefix_path_image_tax_clearance, 'tax_clearance');
                $legal_documents['tax_clearance'] = $tax_clearance;
            }

            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->mobile       = $request->mobile;
            $user->is_verified  = 0;
            $user->is_member    = 1;
            if ($request->hasFile('avatar')) {
                if ($user->avatar != null) {
                    if (file_exists($user->avatar)) {
                        unlink(getcwd() . $user->avatar);
                    }
                }
                $user->avatar = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'avatar');
            }
            $user->save();


            // Save updated legal documents and company name
            $member->legal_documents = json_encode($legal_documents);
            $member->company = json_encode($company);
            $member->social = json_encode($social);
            $member->member_type_id = $request->member_type_id;
            $member->member_post = $request->member_post;

            $member->pan = $pan;
            $member->pan_no = $request->pan_no;
            $member->register_file = $register_file;
            $member->tax_clearance = $tax_clearance;
            $member->register_no = $request->register_no;
            $member->company_logo = $company_logo;
            $member->company_name = $request->company_name;
            $member->company_founded_year = $request->company_founded_year;
            $member->company_website = $request->company_website;
            $member->save();

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollback();
            Log::channel('email_notifications')->error('Failed to send notice email', ['error' => $th->getMessage()]);
            return false;
        }
    }


    public function storeAdminData($request)
    {
        // insert iuser data
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;
        $user->is_member = 0;
        $user->is_verified = 0;
        if ($request->hasFile('avatar')) {
            $user->avatar = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'avatar');
        }
        $user->save();
        return true;
    }

    public function updateAdminData($request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->mobile = $request->mobile;
        if ($request->hasFile('avatar')) {
            if ($user->avatar != null) {
                if (file_exists($user->avatar)) {
                    unlink($user->avatar);
                }
            }
            $user->avatar = $this->uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'avatar');
        }
        $user->save();
        return true;
    }

    protected function uploadImage($request, $folder_path_image, $prefix_path_image, $title, $image_width = '', $image_height = '')
    {
        if ($request->hasFile($title)) {

            $this->createFolder($folder_path_image);
            $file = $request->file($title);
            $file_name = time() . '_' . rand() . '_' . $file->getClientOriginalName();
            // dd($file_name);
            //    $file_extension = $file->getClientOriginalExtension();
            if (isset($image_height) && isset($image_width)) {
                $file_resize = Image::make($file->getRealPath());
                $file_resize->resize($image_width, $image_height);
                $file_resize->save($folder_path_image . $file_name);
            } else {
                $file->move($folder_path_image, $file_name);
            }
            $file_path = $prefix_path_image . $file_name;
            return $file_path;
        }
        return false;
    }

    protected function createFolder($path)
    {
        if (!file_exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
    }

    // function to generate member unique identifier
    protected function generateUniqueId()
    {
        do {
            // Get the current timestamp
            $timestamp = Carbon::now()->timestamp;

            // Generate a random number
            $randomNumber = mt_rand(100, 999);

            // Combine the timestamp and random number to form a unique ID
            $uniqueId = substr($timestamp . $randomNumber, -10);
        } while (Member::where('member_id', $uniqueId)->exists());

        return $uniqueId;
    }
}

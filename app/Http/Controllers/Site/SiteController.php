<?php

namespace App\Http\Controllers\Site;

/*
|--------------------------------------------------------------------------
| SITE CONTROLLER
|--------------------------------------------------------------------------
| Purpose: Handle all frontend/public website functionality
| Features:
| - Homepage and static pages
| - Member management and display
| - Blog and content management
| - Search and filtering
| - Contact and messaging
| - File downloads and galleries
|--------------------------------------------------------------------------
*/

// Core Models
use App\Models\Blog;
use App\Models\Menu;
use App\Models\Post;
use App\Models\User;
use App\Models\Faq;

// Content Models
use App\Models\Banner;
use App\Models\Gallery;
use App\Models\Video;
use App\Models\Section;
use App\Models\Setting;

// Member Models
use App\Models\Member;

use App\Models\Payment;

// Organization Models
use App\Models\Staff;
use App\Models\Branch;
use App\Models\Clients;

// Other Models
use App\Models\Contact;
use App\Models\Counter;
use App\Models\Product;
use App\Models\Program;
use App\Models\Cultural;
use App\Models\Location;
use App\Models\BlogImage;
use App\Models\Defficult;
use App\Models\AllGallery;
use App\Models\Experience;
use App\Models\MemberType;
use App\Models\OurService;
use App\Models\AchieveMent;
use App\Models\Destination;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Laratech\Bsdate\Bsdate;
use App\Models\BlogCategory;
use App\Models\DemanCourses;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use App\Models\SubscribeMail;
use App\Mail\ResetPasswordMail;
use App\Models\GalleryCategory;
use App\Models\Eloquent\DM_Post;
use SebastianBergmann\Diff\Diff;
use App\Models\MemberSubcategory;
use App\Models\PreviousCommittee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Constraint\Count;
use App\Http\Controllers\Admin\DM_BaseController;

class SiteController extends DM_BaseController
{
    protected $panel;
    protected $base_route = 'site';
    protected $view_path = 'front_end';
    protected $model;
    protected $table;
    protected $contact_email;
    protected $common;
    protected $member;
    protected $memberType;
    protected $post;
    protected $blogImage;
    protected $dm_post;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'voucher';
    protected $prefix_path_image = '/upload_file/voucher/';
    protected $email;
    protected $payment;
    public function __construct(Request $request, DM_Post $dm_post, Setting $setting, Member $member, MemberType $memberType, Blog $post, BlogImage $blogImage, Payment $payment)
    {
        $this->dm_post = $dm_post;
        $this->email = $setting::pluck('site_email')->first();
        $this->member = $member;
        $this->memberType = $memberType;
        $this->post = $post;
        $this->blogImage = $blogImage;
        $this->payment = $payment;
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    //Home Page
    public function index()
    {
        $data['menu']             = Menu::tree();
        $data['banner']           = Banner::where('status', '=', 1)->where('deleted_at', '=', null)->latest()->first();  //Banner
        $data['achivement']       = AchieveMent::where('status', '=', 1)->get(); //Achievement
        $data['destination']      = Destination::where('status', '=', 1)->get(); //Destination
        $data['services']         = OurService::where('status', '=', 1)->get(); //Our Service
        $data['faq']              = Faq::where('status', '=', 1)->get(); //FAQ
        $data['video']            = Video::where('status', '=', 1)->take(8)->get(); //Video
        $data['upcoming-trail']   = $this->dm_post::getUpcommingTrail(8);  //Post
        $data['latest-trail']     = $this->dm_post::getLatestTrail(8); //
        $data['feature_page']     = $this->dm_post::featuredPageList();
        $data['partner']          = Clients::where('status', '=', 1)->get(); //Partner

        $data['category']       = $this->dm_post::getCategoryList();
        foreach ($data['category'] as $row) {
            $data['cat_post_' . $row->title] = $this->dm_post::categoryPost($row->id, '8');
            // $data['cat_post_new'. $row->name] = $this->dm_post::categoryPostNew($row->id, $this->lang_id);
            $data['cat_' . $row->title] = $row->id;
        }
        return view(parent::loadView(parent::loadView($this->view_path . '.index')), compact('data'));
    }

    public function trails()
    {
        $data['menu'] = Menu::tree();
        // $data['trails'] = $this->dm_post::getTrails();
        $data['categories'] = $this->dm_post::getCategories();
        $data['seasion'] = $this->dm_post::getSeasion();
        $data['months'] = $this->dm_post::getMonths();
        $data['difficulty'] = $this->dm_post::getDifficulty();
        $data['culture'] = $this->dm_post::getCulture();
        $data['experience'] = $this->dm_post::getExperience();
        return view(parent::loadView($this->view_path . '.trail.trail'), compact('data'));
    }
    // Search By Trail by Season
    public function searchBySeason(Request $request, $id)
    {
        $data['menu'] = Menu::tree();
        $data['search'] = Blog::where('season_id', $id)->get();
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }
    // Search By Trail by Month
    public function searchByMonth(Request $request, $id)
    {
        $data['menu'] = Menu::tree();
        $data['search'] = Blog::where('month_id', $id)->get();
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }
    // Search By Trail by Difficulty
    public function searchByDifficulty(Request $request, $id)
    {
        $data['menu'] = Menu::tree();
        $data['search'] = Blog::where('difficult_id', $id)->get();
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }
    // Search By Trail by Culture
    public function searchByCultural(Request $request, $id)
    {
        $data['menu'] = Menu::tree();
        $data['search'] = Blog::where('culture_id', $id)->get();
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }
    // Search By Trail by Experience
    public function searchByExperience(Request $request, $id)
    {
        $data['menu'] = Menu::tree();
        $data['search'] = Blog::where('experience_id', $id)->get();
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }

    public function searchTrails(Request $request)
    {
        $query = $request->input('query');
        $filter = $request->input('filter');
        $type = $request->input('type');
        $id = $request->input('id');
        $trails = Blog::where('status', 1)->where('type', 'post')->where('deleted_at', null);
        if ($query) {
            $trails = $trails->where('title', 'LIKE', '%' . $query . '%')->get();
        }
        if ($filter) {
            switch ($filter) {
                case 'All Trails':
                    // Add your filter condition for upcoming trails
                    $trails = $trails->get();
                    break;
                case 'New Trails':
                    // Add your filter condition for new trails
                    $trails = $trails->where('created_at', '>', now()->subMonth())->get();
                    break;
                case 'Existing Trails':
                    // Add your filter condition for existing trails
                    $trails = $trails->where('status', 'existing')->get();
                    break;
                default:
                    // Default case for 'All Trail' or no filter
                    $trails = null;
                    break;
            }
        }
        if ($type) {
            switch ($type) {
                case 'season':
                    // Add your filter condition for upcoming trails
                    $trails = $trails->where('season_id', $id)->get();
                    break;
                case 'months':
                    // Add your filter condition for new trails
                    $trails = $trails->where('month_id', $id)->get();
                    break;
                case 'difficulty':
                    // Add your filter condition for existing trails
                    $trails = $trails->where('difficult_id', $id)->get();
                    break;
                case 'culture':
                    // Add your filter condition for existing trails
                    $trails = $trails->where('culture_id', $id)->get();
                    break;
                case 'experience':
                    // Add your filter condition for existing trails
                    $trails = $trails->where('experience_id', $id)->get();
                    break;
                default:
                    // Default case for 'All Trail' or no filter
                    $trails = null;
                    break;
            }
        }


        return response()->json($trails);
    }
    //About Us
    // public function aboutUs()
    // {
    //     $data['menu'] = Menu::tree();
    //     $data['featured_pages'] = $this->dm_post::featuredPageList();
    //     $data['about'] = Section::where('status', '=', 1)->where('position', 'about')->orderBy('order', 'desc')->get();
    //     return view(parent::loadView($this->view_path . '.about'), compact('data'));
    // }

    //ourvalues
    public function ourvalues()
    {
        $data['menu'] = Menu::tree();
        $data['our-value'] = Section::where('status', '=', 1)->where('position', 'our-value')->orderBy('order', 'desc')->get();
        return view(parent::loadView($this->view_path . '.our-values'), compact('data'));
    }

    //principles
    public function principles()
    {
        $data['menu'] = Menu::tree();
        $data['principles'] = Section::where('status', '=', 1)->where('position', 'our-principles')->orderBy('order', 'desc')->get();
        return view(parent::loadView($this->view_path . '.principles'), compact('data'));
    }

    //Staff
    public function staff()
    {
        $data['menu'] = Menu::tree();
        $data['india_team'] = Staff::where('status', '=', 1)->where('country_member', 'india-team-member')->orderBy('id', 'desc')->get();
        $data['nepal_team'] = Staff::where('status', '=', 1)->where('country_member', 'nepal-team-member')->orderBy('id', 'desc')->get();
        return view(parent::loadView($this->view_path . '.staff'), compact('data'));
    }

    //Show Post
    public function showPost($post_unique_id)
    {
        $data['menu']                = Menu::tree();
        $data['row']                 = $this->dm_post::getSinglePost($post_unique_id);
        if (isset($data['row']['child_category_id'])) {
            $childCategoryIds           = json_decode($data['row']['child_category_id'], true);
            $data['category']            = $this->dm_post::getMultipleCategoryList($childCategoryIds);
            foreach ($data['category'] as $row) {
                $data['cat_post_' . $row->title] = $this->dm_post::categoryPost($row->id, '6');
                // $data['cat_post_new'. $row->name] = $this->dm_post::categoryPostNew($row->id, $this->lang_id);
                $data['cat_' . $row->title] = $row->id;
            }
        }
        // $data['file']             = $this->dm_post::getFile($post_unique_id);
        $data['gallery']             = BlogImage::where('post_unique_id', $post_unique_id)->get();

        $data['latest-trail']     = $this->dm_post::getLatestTrail(8); //
        $data['category-posts'] = isset($data['row']->postCategory) ? $data['row']->postCategory->posts->take(6) : null;
        $data['upcoming-trail']   = $this->dm_post::getUpcommingTrail(6);  //Post
        return view(parent::loadView($this->view_path . '.single'), compact('data'));
    }

    //Show Staff Detail
    public function showStaff($id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getStaffDetail($id);
        //dd($data['row']);
        return view(parent::loadView($this->view_path . '.staff_detail'), compact('data'));
    }
    //Show Page
    public function showPage($post_unique_id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getSinglePage($post_unique_id);
        return view(parent::loadView($this->view_path . '.page'), compact('data'));
    }

    //to show post category with post archive
    public function showCategoryPost($category_id)
    {
        $data['menu'] = Menu::tree();
        $data['rows'] = $this->dm_post::categoryBasedPost($category_id);
        $data['cat_count'] = count($data['rows']);
        return view(parent::loadView($this->view_path . '.category'), compact('data'));
    }

    //Contact Us
    public function contact()
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.contact'), compact('data'));
    }

    //album
    public function gallery()
    {
        $data['menu'] = Menu::tree();
        $data['gallery'] = Gallery::where('status', '=', 1)->orderBy('id', 'desc')->get();
        return view(parent::loadView($this->view_path . '.gallery'), compact('data'));
    }
    public function members()
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.member'), compact('data'));
    }
    public function Trail()
    {
        $data['menu'] = Menu::tree();
        $data['category']       = $this->dm_post::getCategoryList();
        $data['feature_page']     = $this->dm_post::featuredPageList();
        foreach ($data['category'] as $row) {
            $data['cat_post_' . $row->title] = $this->dm_post::categoryPost($row->id, '4');
            // $data['cat_post_new'. $row->name] = $this->dm_post::categoryPostNew($row->id, $this->lang_id);
            $data['cat_' . $row->title] = $row->id;
        }
        $data['season']     = Season::where('status', 1)->get();
        $data['month']      = Month::where('status', 1)->get();
        $data['difficulty'] = Defficult::where('status', 1)->get();
        $data['culture']    = Cultural::where('status', 1)->get();
        $data['experience'] = Experience::where('status', 1)->get();
        $data['trail-category'] = BlogCategory::where('status', 1)->orderBy('order', 'desc')->get();
        return view(parent::loadView($this->view_path . '.trail'), compact('data'));
    }
    public function searchByName(Request $request)
    {
        $keyword                     = $request->input('search');
        $data['menu']                = Menu::tree();
        $data['search']              = Member::where('organization_name', 'LIKE', '%' . $keyword . '%')->get();
        $data['total']               = count($data['search']);
        return view(parent::loadView($this->view_path . '.member'), compact('data'));
    }
    public function searchTrai(Request $request)
    {
        $keyword                     = $request->input('search');
        $data['menu']                = Menu::tree();
        $data['search']              = Blog::where('type', '=', 'post')->where('status', 1)->where('title', 'LIKE', '%' . $keyword . '%')->get();
        $data['total']               = count($data['search']);
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }
    public function searchTraiByCategory(Request $request, $id)
    {
        $data['menu']                = Menu::tree();
        $data['search']              = Blog::where('type', '=', 'post')->where('status', 1)->where('category_id', $id)->get();
        $data['total']               = count($data['search']);
        return view(parent::loadView($this->view_path . '.search'), compact('data'));
    }

    // ----- Sanitizing Laravel Request Inputs -----
    function rip_tags($string)
    {
        // ----- remove HTML TAGs -----
        $string = preg_replace('/<[^>]*>/', ' ', $string);
        // ----- remove control characters -----
        $string = str_replace("\r", '', $string);    // --- replace with empty space
        $string = str_replace("\n", ' ', $string);   // --- replace with space
        $string = str_replace("\t", ' ', $string);   // --- replace with space
        // ----- remove multiple spaces -----
        $string = trim(preg_replace('/ {2,}/', ' ', $string));
        return $string;
    }
    /** Store Message From Contact Us */

    public function storeMessage(Request $request)
    {
        //dd($request->all());
        $row = new Contact();
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|max:255',
            'subject' => 'sometimes|max:255',
            'address' => 'sometimes|max:255',
            'message' => 'sometimes',
        ]);
        $row->name         = $this->rip_tags($request->name);
        $row->email        = $this->rip_tags($request->email);
        $row->number       = $this->rip_tags($request->number);
        $row->subject      = $this->rip_tags($request->subject);
        $row->address      = $this->rip_tags($request->address);
        $row->message      = $this->rip_tags($request->message);
        $success           =  $row->save();
        if ($success) {
            session()->flash('alert-success', $this->panel . ' Message Successfully send.');
        } else {
            session()->flash('alert-danger', $this->panel . ' Something error !.');
        }
        return redirect()->back();
        die;
    }

    /** Donate Message  */

    public function Donate(Request $request)
    {

        // $row = new Contact();
        $request->validate([
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'address' => 'sometimes|max:255',
            'purpose' => 'sometimes',
            'county'  => 'sometimes',
        ]);

        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'purpose' => $request->purpose,
            'county' => $request->county,
        ];

        // Sending Mail to Owner
        Mail::send('site.emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to($this->email);
            $message->subject('Mail From CSD Website');
        });
        // Sending Response To Sender
        Mail::send('site.emails.response', $data, function ($message) use ($data) {
            $message->from($this->email);
            $message->to($data['email']);
            $message->subject('Thankyou !! from CSD');
        });
    }

    public function member(Request $requets)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.member.member'), compact('data'));
    }
    function memberByType($id)
    {
        $data['menu'] = Menu::tree();
        $memberType = $this->memberType->where('id', $id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.member'), compact('memberType', 'data'));
    }

    /**
     * 4.2 Display members by subcategory
     * Route: GET /member-subcategory/{id}
     * Purpose: Show all members belonging to a specific subcategory (e.g., Taan Gandaki)
     * Features: Subcategory details, member list, responsive layout
     */
    public function memberSubcategory($id)
    {
        // 4.2.1 Get navigation menu
        $data['menu'] = Menu::tree();

        // 4.2.2 Get subcategory with member type relationship
        $memberSubcategory = MemberSubcategory::with('memberType')
            ->where('id', $id)
            ->firstOrFail();

        // 4.2.3 Get all members in this subcategory
        $data['members'] = Member::where('member_subcategory_id', $id)
            ->with(['memberType']) // Load member type relationship
            ->orderBy('organization_name') // Sort alphabetically
            ->get();

        // 4.2.4 Pass subcategory data to view
        $data['subcategory'] = $memberSubcategory;

        // 4.2.5 Return member subcategory view
        return view(parent::loadView($this->view_path . '.member-subcategory'), compact('data'));
    }

    public function filterByLetter(Request $request, $letter)
    {
        $data['menu'] = Menu::tree();
        $data['search'] = Member::where('organization_name', 'LIKE', $letter . '%')->get();
        $data['cat_count']           = count($data['search']);
        return view(parent::loadView($this->view_path . '.member'), compact('data'));
    }

    public function singleMember($member_id)
    {
        $data['menu']        = Menu::tree();
        $data['member']      = Member::where('member_id', $member_id)->firstOrFail();
        $data['user']        = User::where('id', $data['member']->user_id)->first();
        //UserWIse Post GET
        $data['posts']       = Blog::where('user_id', $data['user']->id)->where('type', 'post')->get();
        return view(parent::loadView($this->view_path . '.single-member'), compact('data'));
    }



    public function memberProfile($member_id)
    {
        $data['menu'] = Menu::tree();
        $member = $this->member->where('member_id', $member_id)->whereHas('user')->with('user')->firstOrFail();
        $posts = null;
        $gallery = null;
        if (isset($member->user)) {
            $posts = $this->post->where('user_id', $member->user->id)->where('type', 'post')->select('thumbs', 'title', 'trail_address', 'category_id', 'post_unique_id', 'id', 'created_at')->get();
            $gallery = $this->blogImage->where('user_id', $member->user_id)->latest()->take(6)->get();
        }


        return view(parent::loadView($this->view_path . '.member.member-profile'), compact('member', 'posts', 'gallery', 'data'));
    }

    public function memberType($memberType)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.member.general'), compact('data'));
    }

    // public function trail()
    // {
    //     $data['menu'] = Menu::tree();
    //     return view(parent::loadView($this->view_path . '.trail.trail'), compact('data'));
    // }

    function trailDetails($post_unique_id)
    {
        $data['menu'] = Menu::tree();
        $post = $this->post->where('post_unique_id', $post_unique_id)->firstOrFail();
        return view(parent::loadView($this->view_path . '.trail.details'), compact('post', 'data'));
    }

    function aboutUs($post_unique_id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getSinglePage($post_unique_id);
        return view(parent::loadView($this->view_path . '.about.about'), compact('data'));
    }

    function faq()
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.faq.faq'), compact('data'));
    }

    function sign_in()
    {
        if (auth()->check()) {
            if (auth()->user()->is_member == 1) {
                return redirect()->route('member.index');
            } else {
                return redirect()->route('admin.index');
            }
        }
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.login.login'), compact('data'));
    }

    public function forgotPassword()
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.login.forgot-password'), compact('data'));
    }

    public function checkEmail(Request $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if ($user) {
            $token = Str::random(60);
            $user->remember_token = $token;
            $user->save();

            // session()->flash('alert-success', '  We have sent you a password reset link. Please check your inbox.');
            $data['user'] = $user;
            $data['menu'] = Menu::tree();
            $mailDetails = [
                'user' => $user,
                'token' => $token,
                'subject' => 'Reset Password',
            ];
            Mail::to($email)->send(new ResetPasswordMail($mailDetails));
            return redirect()->back()->with('success-message', 'We have sent you a password reset link. Please check your inbox.');
        } else {
            // session('mail-error', '  This email does not exist.');
            return redirect()->back()->with('message', 'This email does not exist.');
        }
    }

    public function resetPassword($token)
    {
        $data['menu'] = Menu::tree();
        $user = User::where('remember_token', $token)->firstOrFail();
        $data['user'] = $user;
        return view(parent::loadView($this->view_path . '.login.reset-password'), compact('data', 'token'));
    }
    public function updatePassword(Request $request, $token)
    {
        $user = User::where('remember_token', $token)->firstOrFail();
        $request->validate([
            'password' => [
                'same:confirm_password',
                'required',
                'min:8',
                // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'
            ],
            'confirm_password' => 'required',
        ]);
        $user->password = Hash::make($request->password);
        $user->remember_token = null;
        $user->save();
        session()->flash('alert-success', '  Your password has been updated successfully.');
        return redirect()->route('site.sign_in');
    }


    function register()
    {
        if (auth()->check()) {
            if (auth()->user()->is_member == 1) {
                return redirect()->route('member.index');
            } else {
                return redirect()->route('admin.index');
            }
        }
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.apply-for-membership.membership'), compact('data'));
    }

    function subscribe(Request $request)
    {
        SubscribeMail::create([
            'email' => $request->email,
        ]);
        session()->flash('alert-success', '  Thank you for subscribe !');

        return redirect()->back();
    }

    // member list


    // member edit
    public function memberEdit($id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = User::find($id);
        return view(parent::loadView($this->view_path . '.member.member-edit'), compact('data'));
    }


    public function destination($slug)
    {
        $data['menu']        = Menu::tree();
        $destination         = $this->dm_post::getDestinationPosts($slug);
        $data['posts']       = $destination->posts;
        $data['destination'] = $destination;
        return view(parent::loadView($this->view_path . '.destination.destination'), compact('data'));
    }

    public function searchByDestation(Request $request)
    {
        $query = $request->input('query');
        $destination = $request->input('destination');
        $posts = $this->dm_post::searchByDestiantion($query, $destination);
        return response()->json($posts);
    }

    public function organizationChart($post_unique_id)
    {
        $data['menu'] = Menu::tree();
        $data['row'] = $this->dm_post::getSinglePage($post_unique_id);
        return view(parent::loadView($this->view_path . '.about.organization-chart'), compact('data'));
    }

    public function faqs()
    {
        $data['menu']             = Menu::tree();
        $data['faq']              = Faq::where('status', '=', 1)->get(); //FAQ
        return view(parent::loadView($this->view_path . '.faq'), compact('data'));
    }

    // introduction page
    public function introduction(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.introduction'), compact('data'));
    }
    // Profile page
    public function ProfilePage(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.profile'), compact('data'));
    }
    // Former President page
    public function FormerPresident(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.former-president'), compact('data'));
    }
    public function ExecutiveCommittee(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.executive-committee'), compact('data'));
    }
    public function Departments(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.departments'), compact('data'));
    }
    public function PreviousExecutiveCommittees(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.previous-executive-committees'), compact('data'));
    }
    public function ToBecomeMember(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.to-become-a-member'), compact('data'));
    }
    public function StaffExperts(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.staff-and-experts'), compact('data'));
    }
    public function OrganizationsChart(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.organizations-chart'), compact('data'));
    }
    public function TimsOverview(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.tims-overview'), compact('data'));
    }
    public function faqAnswer(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.faq'), compact('data'));
    }
    public function Downloads(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.download'), compact('data'));
    }
    public function TrekkingPermitFees(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.trekking-permit-fees'), compact('data'));
    }
    public function TrekkingPeaksFees(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.trekking-peaks-fees'), compact('data'));
    }
    public function RescueProcedure2075(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.rescue-procedure-2075'), compact('data'));
    }
    public function NewsEvents(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.news-&-events'), compact('data'));
    }
    public function Newsletter(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.newsletter'), compact('data'));
    }
    public function Notification(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.notification'), compact('data'));
    }
    public function TaanPublications(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.taan-publications'), compact('data'));
    }
    public function PressRelease(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.press-release'), compact('data'));
    }
    public function blogMedia(Request $request)
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.blog-media'), compact('data'));
    }
    public function album(Request $request)
    {
        $data['menu']  = Menu::tree();
        $data['category'] = GalleryCategory::where('status', '=', 1)->orderBy('id', 'desc')->get();
        foreach ($data['category'] as $row) {
            $row->albums = Gallery::where('category_id', $row->id)->where('status', '=', 1)->orderBy('id', 'desc')->get();
        }
        return view(parent::loadView($this->view_path . '.album'), compact('data'));
    }
    public function showPhotos($id)
    {
        $data['menu'] = Menu::tree();
        $data['album'] = Gallery::where('id', $id)->first();
        $data['gallery'] = AllGallery::where('album_id', $id)->get();
        return view(parent::loadView($this->view_path . '.gallery'), compact('data'));
    }
    public function videoGallery(Request $request)
    {
        $data['menu'] = Menu::tree();
        $data['video']            = Video::where('status', '=', 1)->paginate(12); //Video
        return view(parent::loadView($this->view_path . '.video-gallery'), compact('data'));
    }
    public function otherCategory(Request $request, $id)
    {
        $data['menu']      = Menu::tree();
        $data['category']  = PostCategory::where('id', $id)->first();
        $data['rows'] = Post::where('category_id', $id)->where('status', 1)->get();
        return view(parent::loadView($this->view_path . '.othercategory'), compact('data'));
    }
    //Show Post
    public function showOtherPost($post_unique_id)
    {
        $data['menu']                = Menu::tree();
        $data['row']                 = $this->dm_post::getSingleOtherPost($post_unique_id);
        $data['file']                = $this->dm_post::getFile($post_unique_id);
        $data['related_post']        = $this->dm_post::getRelatedPost($data['row']->category_id, $data['row']->id);
        return view(parent::loadView($this->view_path . '.single-other'), compact('data'));
    }

    //Office Branch
    public function officeBranch($id)
    {
        $data['menu']    = Menu::tree();
        $data['branch']  = Branch::where('id', $id)->first();
        $data['staff']   = Staff::where('status', 1)->where('branch_id', $id)->get();
        return view(parent::loadView($this->view_path . '.staff'), compact('data'));
    }

    // STaff Profile
    public function staffProfile($id)
    {
        $data['menu']   = Menu::tree();
        $data['single'] = Staff::where('id', $id)->first();
        return view(parent::loadView($this->view_path . '.staff-detail'), compact('data'));
    }
    // Previous COmmittee
    public function previousCommittee()
    {
        $data['menu'] = Menu::tree();
        $data['committee'] = PreviousCommittee::where('status', 1)->orderBy('id', 'DESC')->get();
        return view(parent::loadView($this->view_path . '.previous-committee'), compact('data'));
    }
    public function downloadFile($id)
    {
        $file = $this->dm_post::downloadFile($id);
        return $file;
    }
    // submissioin
    public function submission()
    {
        $data['menu'] = Menu::tree();
        return view(parent::loadView($this->view_path . '.submission'), compact('data'));
    }
    // Submission Verify
    public function submissionVerify(Request $request)
    {
        $data['menu'] = Menu::tree();
        $data['single'] = Member::where('member_id', $request->member_id)->select('id', 'member_id', 'organization_name', 'user_id')->first();
        if (!$data['single']) {
            session()->flash('alert-danger', '  Member ID is not valid.');
            return redirect()->back();
        } else {
            session()->flash('alert-success', '  Member ID is valid.');
            return view(parent::loadView($this->view_path . '.submission-detail'), compact('data'));
        }
    }
    // Store Payment
    public function storePayment(Request $request)
    {
        $created_at_member = Member::where('id', $request->member_u_id)->first()->created_at;
        $data['menu'] = Menu::tree();
        $rules = $this->payment->getRules();
        $request->validate($rules);
        $model                = $this->payment;
        $data                 = $request->except('voucher');
        $success              = $model->fill($data)->save();
        if ($success) {

            $bsdate = new Bsdate();
            $nepaliDate = $bsdate->engToNep($created_at_member->year, $created_at_member->month, $created_at_member->day);

            // Convert Nepali Unicode numbers to English numbers for database storage
            $bsYear = (int)$this->nepaliToEnglishNumber($nepaliDate['year']);
            $bsMonth = (int)$this->nepaliToEnglishNumber($nepaliDate['month']);
            $bsDay = str_pad($this->nepaliToEnglishNumber($nepaliDate['date']), 2, '0', STR_PAD_LEFT);

            $bsStartDate = "{$bsYear}-" . str_pad($bsMonth, 2, '0', STR_PAD_LEFT) . "-{$bsDay}";

            // Calculate fiscal year end date (Ashad 32 of the fiscal year)
            // Nepali fiscal year: Shrawan 1 to Ashad 32 (next year)
            if ($bsMonth >= 4) {
                // From Shrawan (4) onwards = current fiscal year ends next year
                $fiscalYearEnd = $bsYear + 1;
            } else {
                // Before Shrawan (1-3) = current fiscal year ends this year
                $fiscalYearEnd = $bsYear;
            }

            $bsEndDate = "{$fiscalYearEnd}-03-32";
            $model->start_date = $bsStartDate;
            $model->end_date = $bsEndDate;
            if ($request->hasFile('voucher')) {
                $model->voucher = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'voucher', '', '');
                $model->save();
            }
            session()->flash('alert-success', '  Payment Successfully Done.');
            return view(parent::loadView($this->view_path . '.submission-detail'), compact('data'));
            return redirect()->back();
        } else {
            session()->flash('alert-danger', '  Something error !.');
        }
    }
    private function nepaliToEnglishNumber($nepaliNumber)
    {
        $nepaliDigits = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        $englishDigits = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($nepaliDigits, $englishDigits, $nepaliNumber);
    }
}

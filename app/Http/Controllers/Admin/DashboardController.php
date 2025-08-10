<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountGeneralInformation;
use App\Models\AccountOpening;
use App\Models\ApplicationGeneralInformation;
use App\Models\Blog;
use App\Models\Clients;
use App\Models\Destination;
use App\Models\Gallery;
use App\Models\Internship;
use App\Models\Member;
use App\Models\MemberType;
use App\Models\Post;
use App\Models\Product;
use App\Models\Program;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SubscribeMail;
use Illuminate\Support\Facades\DB;

class DashboardController extends DM_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route = '';
    protected $view_path = 'admin.';
    protected $user;
    protected $member;
    protected $setting;
    protected $memberType;
    protected $blog;
    protected $post;
    protected $staff;
    protected $destination;


    public function __construct(User $user, Member $member, Setting $setting, MemberType $memberType, Blog $blog, Post $post, Staff $staff, Destination $destination)
    {
        $this->member  = $member;
        $this->setting = $setting;
        $this->memberType = $memberType;
        $this->blog = $blog;
        $this->post = $post;
        $this->staff = $staff;
        $this->user = $user;
        $this->destination = $destination;
    }
    public function index()
    {
        $data['setting']      = $this->setting->select('site_name')->first();
        $data['trail']        = $this->post::where('status', '=', '1')->count();
        $data['post']         = $this->post::where('status', '=', '1')->count();
        $data['staff']        = $this->staff::where('status', '=', '1')->count();
        $data['admin']         = $this->user::where('role', '=', 'admin')->count();
        $data['member']       = $this->member::where('deleted_at', '=', null)->count();
        $data['destination']  = $this->destination::where('status', '=', 1)->count();

        // Staff Detail WIth Branch Name in pie chart
        $data['branch'] = DB::table('staff')
            ->join('branches', 'staff.branch_id', '=', 'branches.id')
            ->select('branches.title', DB::raw('count(*) as total'))
            ->groupBy('branches.title')
            ->where('staff.status', '=', 1)
            ->get();
        // convert object to array
        $data['branch'] = json_decode(json_encode($data['branch']), true);

        // Member Detail WIth Member Type in pie chart
        $data['member_type'] = DB::table('members')
            ->join('member_types', 'members.member_type_id', '=', 'member_types.id')
            ->select('member_types.title', DB::raw('count(*) as total'))
            ->groupBy('member_types.title')
            ->where('members.deleted_at', '=', null)
            ->get();
        // convert object to array
        $data['member_type'] = json_decode(json_encode($data['member_type']), true);

        // Member Detail
        $data['month_date'] = [];
        $data['month_count'] = [];
        for ($i = -11; $i <= 0; $i++) {
            $currentMonth = date('Y-m', strtotime("$i months")); // Fixed "month" to "months"
            $startDate = date('Y-m-01', strtotime("$i months"));
            $endDate = date('Y-m-t', strtotime("$i months"));

            $data['month_date'][] = $currentMonth;

            // Query the count of members created within the month
            $data['month_count'][] = DB::table('members')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->count();
        }
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    function subscribed_mail()
    {
        $this->panel = 'Subscribed Emails';
        $emails = SubscribeMail::get();
        return view(parent::loadView($this->view_path . '.subscribed_mail'), compact('emails'));
    }
}

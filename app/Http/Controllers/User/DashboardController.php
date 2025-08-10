<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\AccountGeneralInformation;
use App\Models\AccountOpening;
use App\Models\ApplicationGeneralInformation;
use App\Models\Blog;
use App\Models\Clients;
use App\Models\Gallery;
use App\Models\Internship;
use App\Models\Offer;
use App\Models\Product;
use App\Models\Program;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\User;

class DashboardController extends User_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route ='';
    protected $view_path = 'user.';

    public function __construct( Program $program, Offer $offer, Clients $client, Testimonial $testimonial, Setting $setting, Blog $blog, User $user){
        $this->program = $program;
        $this->offer = $offer;
        $this->client = $client;
        $this->testimonial  = $testimonial;
        $this->setting  = $setting;
        $this->blog      = $blog;
        $this->user    = $user;

    }
    public function index()
    {
        $data['program']      = $this->program::count();
        $data['offer']       = $this->offer::count();
        $data['client']       = $this->client::count();
        $data['testimonial']  = $this->testimonial::count();
        $data['setting']      = $this->setting->select('site_name')->first();
        $data['count_post'] =  $this->blog::where('type', '=', 'post')->where('deleted_at', '=', null)->where('user_id', auth()->user()->id)->count();
        dd($data['count_post']);
        $data['count_page'] = $this->blog::where('type', '=', 'page')->where('deleted_at', '=', null)->count();
        $data['count_user'] = $this->user::count();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }


}

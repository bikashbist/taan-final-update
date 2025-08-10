<?php

namespace App\Http\Controllers\Member;

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
use App\Models\BlogImage;
use App\Models\Video;
use App\Http\Controllers\User\User_BaseController;
class DashboardController extends User_BaseController
{
    protected $panel = 'Dashboard';
    protected $base_route ='';
    protected $view_path = 'user.';
    protected $blogImage;
    private $video;
    public function __construct( Program $program,  Clients $client, Testimonial $testimonial, Setting $setting, Blog $blog, User $user, BlogImage $blogImage, Video $video){
        $this->program = $program;
        $this->client = $client;
        $this->testimonial  = $testimonial;
        $this->setting  = $setting;
        $this->blog      = $blog;
        $this->user    = $user;
        $this->blogImage = $blogImage;
        $this->video = $video;

    }
    public function index()
    {
        $data['program']      = $this->program::count();
        $data['client']       = $this->client::count();
        $data['testimonial']  = $this->testimonial::count();
        $data['setting']      = $this->setting->select('site_name')->first();
        $data['count_post'] =  $this->blog::where('type', '=', 'post')->where('user_id', auth()->user()->id)->where('deleted_at', '=', null)->count();
        $data['count_image'] = $this->blogImage::where('user_id', '=', auth()->user()->id)->count();
        $data['count_video'] = $this->video::where('user_id', auth()->user()->id)->count();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
}

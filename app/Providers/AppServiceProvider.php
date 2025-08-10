<?php

namespace App\Providers;

use App\Models\Blog;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Session;
use Illuminate\Http\Request;
use App\Models\Eloquent\DM_Post;
use View;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // AUto Cache Clear function
        if (Schema::hasTable('settings')) {
            $settings = DB::table('settings')->first();
            \Artisan::call('cache:clear');
            \Artisan::call('config:clear');
            \Artisan::call('route:clear');
            \Artisan::call('view:clear');
            \Artisan::call('optimize:clear');
        }
        $all_view['setting'] = DB::table('settings')->first();
        $all_view['contact_count'] = DB::table('contacts')->count();
        $all_view['member_type'] = DB::table('member_types')->where('status', 1)->get();
        $all_view['common'] = DB::table('commons')->first();
        // get Total Member
        $all_view['total_member'] = DB::table('members')->count();
        $all_view['gallery'] = DB::table('galleries')->where('status', 1)->get();
        $all_view['latest_trail'] = Blog::where('deleted_at', '=', NULL)->where('category_id', '=', 14)->where('status', '=', 1)->where('type', '=', 'post')->orderBy('id', 'desc')->take(5)->get();
        $all_view['popups'] = DB::table('popups')->where('status', 1)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();
        View::share(compact('all_view'));
    }
}

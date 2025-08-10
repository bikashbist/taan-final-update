<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * / Password Reset Routes...
 */
Route::get('password/resetform',                        [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.resetform');
Route::post('password/email',                           [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/request/{token}',                  [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.request.token');
Route::post('password/update',                          [Auth\ResetPasswordController::class, 'reset'])->name('password.update');
/**
 * Authentication route
 */
Auth::routes();
//  Route::get('login',                                    function() { return view('admin.error.404');})->name('login');
Route::get('admin/login',                              function () {
    return redirect()->route("login");
});
Route::get('member/login',                             function () {
    return view('front_end.login.login');
})->name('member_login');
Route::get('member/apply-form',                        function () {
    return view('front_end.apply-for-membership.membership');
})->name('membership_apply_form');
Route::post('member/apply-form',                       [App\Http\Controllers\Admin\UserController::class, 'store'])->name('membership_apply_store');

Route::get('scms/login',                               [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('scms.login');
Route::get('members/login',                            [App\Http\Controllers\Auth\LoginController::class, 'memberForm'])->name('members.login');
/**
 * All Ajax Routes
 */
Route::post('/getDistrict',                                  [App\Http\Controllers\DropdownController::class, 'getDistrict'])->name('getDistrict'); // for get district list
Route::post('/getPalika',                                    [App\Http\Controllers\DropdownController::class, 'getPalika'])->name('getPalika'); // for get palika list
Route::post('/getAccount',                                   [App\Http\Controllers\DropdownController::class, 'getAccount'])->name('getAccount'); // for get account list
Route::get('/get-subcategories',                             [App\Http\Controllers\DropdownController::class, 'getSubcategories'])->name('get-subcategories'); // for get member subcategories
Route::get('register/',                                      [App\Http\Controllers\UserController::class, 'showRegistrationForm'])->name('register');
Route::post('register/',                                     [App\Http\Controllers\UserController::class, 'registerUser'])->name('signup-process');
/**
 * Admin Dashboard Route
 */

Route::group(['as' => 'site.', 'namespace' => 'Site'], function () {
    /**
     * Route for home page
     */
    Route::get('/',                                             [App\Http\Controllers\Site\SiteController::class, 'index'])->name('index');
    // Route::get('members/{slug}',                                [App\Http\Controllers\Site\SiteController::class, 'members'])->name('members');
    Route::get('trails/',                                       [App\Http\Controllers\Site\SiteController::class, 'trail'])->name('trail.index');
    Route::get('trails/details/{post_unique_id}',               [App\Http\Controllers\Site\SiteController::class, 'trailDetails'])->name('trail.details');
    Route::get('about-us/',                                     [App\Http\Controllers\Site\SiteController::class, 'aboutUs'])->name('about-us');
    Route::get('faq/',                                          [App\Http\Controllers\Site\SiteController::class, 'faq'])->name('faq');
    Route::get('sign_in/',                                      [App\Http\Controllers\Site\SiteController::class, 'sign_in'])->name('sign_in');
    Route::get('forgot-password/',                              [App\Http\Controllers\Site\SiteController::class, 'forgotPassword'])->name('forgot_password');
    Route::post('forgot-password/',                              [App\Http\Controllers\Site\SiteController::class, 'checkEmail'])->name('check_email');
    Route::get('reset-password/{token}',                              [App\Http\Controllers\Site\SiteController::class, 'resetPassword'])->name('reset_password');
    Route::post('reset-password/{token}',                              [App\Http\Controllers\Site\SiteController::class, 'updatePassword'])->name('reset_password.store');
    // Route::get('members/{member_type}',                         [App\Http\Controllers\Site\SiteController::class, 'memberType'])->name('members.type');
    // Route::get('members/profile/{member_id}',                   [App\Http\Controllers\Site\SiteController::class, 'memberProfile'])->name('members.profile');
    Route::get('/gallery',                                      [App\Http\Controllers\Site\SiteController::class, 'gallery'])->name('gallery');
    Route::get('/product-list',                                 [App\Http\Controllers\Site\SiteController::class, 'product'])->name('product');
    Route::get('/blog',                                         [App\Http\Controllers\Site\SiteController::class, 'blog'])->name('blog');
    Route::get('/contact',                                      [App\Http\Controllers\Site\SiteController::class, 'contact'])->name('contact');
    Route::get('/about-us/{id}',                                [App\Http\Controllers\Site\SiteController::class, 'aboutUs'])->name('about');
    Route::get('/staff',                                        [App\Http\Controllers\Site\SiteController::class, 'staff'])->name('staff');
    Route::get('/ourvalues',                                    [App\Http\Controllers\Site\SiteController::class, 'ourvalues'])->name('ourvalues');
    Route::get('/principles',                                   [App\Http\Controllers\Site\SiteController::class, 'principles'])->name('principles');
    Route::get('/study-abroad',                                 [App\Http\Controllers\Site\SiteController::class, 'abroad'])->name('abroad');

    Route::get('/category/{id}',                                [App\Http\Controllers\Site\SiteController::class, 'showCategoryPost'])->name('category.show');

    /**
     * Route To show Post
     */
    Route::get('/post/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showPost'])->name('post.show');
    /**
     * Route To show Member detail
     */
    Route::get('/staff/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showStaff'])->name('staff.show');
    /**
     * Route To show Page
     */
    Route::get('/page/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showPage'])->name('page.show');

    /**
     * Route for contact Page
     */
    Route::post('/message',                                         [App\Http\Controllers\Site\SiteController::class, 'storeMessage'])->name('message');
    /**Search */
    Route::get('/searchByName',                                     [App\Http\Controllers\Site\SiteController::class, 'searchByName'])->name('searchByName');
    Route::get('/searchTrail',                                      [App\Http\Controllers\Site\SiteController::class, 'searchTrai'])->name('searchTrai');
    Route::get('/searchTrailCategory/{id}',                         [App\Http\Controllers\Site\SiteController::class, 'searchTraiByCategory'])->name('searchTraiByCategory');
    Route::get('/searchBySeason/{id}',                              [App\Http\Controllers\Site\SiteController::class, 'searchBySeason'])->name('searchBySeason');
    Route::get('/searchByMonth/{id}',                               [App\Http\Controllers\Site\SiteController::class, 'searchByMonth'])->name('searchByMonth');
    Route::get('/searchByDifficulty/{id}',                          [App\Http\Controllers\Site\SiteController::class, 'searchByDifficulty'])->name('searchByDifficulty');
    Route::get('/searchByCultural/{id}',                            [App\Http\Controllers\Site\SiteController::class, 'searchByCultural'])->name('searchByCultural');
    Route::get('/searchByExperience/{id}',                          [App\Http\Controllers\Site\SiteController::class, 'searchByExperience'])->name('searchByExperience');
    /**
     * Route for Donate Page
     */
    Route::get('/member',                                        [App\Http\Controllers\Site\SiteController::class, 'members'])->name('members');
    Route::get('/trail',                                         [App\Http\Controllers\Site\SiteController::class, 'Trail'])->name('trail');
    Route::get('/branch/{id}',                                   [App\Http\Controllers\Site\SiteController::class, 'memberByType'])->name('memberByType');
    Route::get('filterByLetter/{letter}',                        [App\Http\Controllers\Site\SiteController::class, 'filterByLetter'])->name('filterByLetter');
    Route::get('members/{member_id}',                            [App\Http\Controllers\Site\SiteController::class, 'singleMember'])->name('single.member');
    Route::get('/search/member',                                 [App\Http\Controllers\Site\SiteController::class, 'filterByKeyword'])->name('filterByKeyword');
    Route::get('/member/profile/{member_id}',                    [App\Http\Controllers\Site\SiteController::class, 'memberProfile'])->name('member.profile');
    Route::get('/member-subcategory/{id}',                       [App\Http\Controllers\Site\SiteController::class, 'memberSubcategory'])->name('member.subcategory');
    Route::get('/subscribe',                                     [App\Http\Controllers\Site\SiteController::class, 'subscribe'])->name('subscribe');
    /**
     * Route To show Top Destination
     */
    Route::get('/top-destination/{slug}',                     [App\Http\Controllers\Site\SiteController::class, 'destination'])->name('destination');
    Route::get('/search',                                     [App\Http\Controllers\Site\SiteController::class, 'searchByDestation'])->name('post.search');
    Route::get('/search/all',                                 [App\Http\Controllers\Site\SiteController::class, 'searchTrails'])->name('post.search_all');
    Route::get('/organization-chart/{id}',                    [App\Http\Controllers\Site\SiteController::class, 'organizationChart'])->name('organization-chart');
    Route::get('/faqs',                                       [App\Http\Controllers\Site\SiteController::class, 'faqs'])->name('faqs');
    Route::get('/trails',                                     [App\Http\Controllers\Site\SiteController::class, 'trails'])->name('trails');

    // STATIC PAGES
    Route::get('/introduction',                                 [App\Http\Controllers\Site\SiteController::class, 'introDuction'])->name('introduction');
    Route::get('/profile',                                      [App\Http\Controllers\Site\SiteController::class, 'ProfilePage'])->name('profile');
    Route::get('/former-president',                             [App\Http\Controllers\Site\SiteController::class, 'FormerPresident'])->name('former-president');
    Route::get('/executive-committee',                          [App\Http\Controllers\Site\SiteController::class, 'ExecutiveCommittee'])->name('executive-committee');
    Route::get('/departments',                                  [App\Http\Controllers\Site\SiteController::class, 'Departments'])->name('departments');
    Route::get('/previous-executive-committees',                [App\Http\Controllers\Site\SiteController::class, 'PreviousExecutiveCommittees'])->name('previous-executive-committees');
    Route::get('/to-become-a-member',                           [App\Http\Controllers\Site\SiteController::class, 'ToBecomeMember'])->name('to-become-a-member');
    Route::get('/staff-and-experts',                            [App\Http\Controllers\Site\SiteController::class, 'StaffExperts'])->name('staff-and-experts');
    Route::get('/organizations-chart',                          [App\Http\Controllers\Site\SiteController::class, 'OrganizationsChart'])->name('organizations-chart ');

    Route::get('/tims-overview',                                    [App\Http\Controllers\Site\SiteController::class, 'TimsOverview'])->name('tims-overview');
    Route::get('/faq',                                              [App\Http\Controllers\Site\SiteController::class, 'faqAnswer'])->name('faq');
    Route::get('/downloads',                                        [App\Http\Controllers\Site\SiteController::class, 'Downloads'])->name('downloads');
    Route::get('/trekking-permit-fees',                             [App\Http\Controllers\Site\SiteController::class, 'TrekkingPermitFees'])->name('trekking-permit-fees');
    Route::get('/trekking-peaks-fees',                              [App\Http\Controllers\Site\SiteController::class, 'TrekkingPeaksFees'])->name('trekking-peaks-fees');
    Route::get('/rescue-procedure-2075',                             [App\Http\Controllers\Site\SiteController::class, 'RescueProcedure2075'])->name('rescue-procedure-2075');
    Route::get('/news-&-events',                                     [App\Http\Controllers\Site\SiteController::class, 'NewsEvents'])->name('news-&-events');
    Route::get('/newsletter',                                       [App\Http\Controllers\Site\SiteController::class, 'Newsletter'])->name('newsletter');
    Route::get('/notification',                             [App\Http\Controllers\Site\SiteController::class, 'Notification'])->name('notification');
    Route::get('/taan-publications',                             [App\Http\Controllers\Site\SiteController::class, 'TaanPublications'])->name('taan-publications');
    Route::get('/press-release',                             [App\Http\Controllers\Site\SiteController::class, 'PressRelease'])->name('press-release');
    Route::get('/blog-media',                             [App\Http\Controllers\Site\SiteController::class, 'blogMedia'])->name('blog-media');
    Route::get('/album',                                       [App\Http\Controllers\Site\SiteController::class, 'album'])->name('album');
    Route::get('/album/show/{id}',                             [App\Http\Controllers\Site\SiteController::class, 'showPhotos'])->name('album.show');
    ROute::get('/othercategory/{id}',                             [App\Http\Controllers\Site\SiteController::class, 'otherCategory'])->name('othercategory');
    Route::get('/other/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showOtherPost'])->name('other.show');
    Route::get('/video-gallery',                             [App\Http\Controllers\Site\SiteController::class, 'videoGallery'])->name('video-gallery');
    Route::get('/officebranch/{id}',                             [App\Http\Controllers\Site\SiteController::class, 'officeBranch'])->name('officebranch');
    Route::get('/staff/{id}',                                [App\Http\Controllers\Site\SiteController::class, 'staffProfile'])->name('staff.profile');
    Route::get('/previous-committee',                        [App\Http\Controllers\Site\SiteController::class, 'previousCommittee'])->name('previous-committee');

    /**
     * Route to download Files
     */
    Route::get('/download/{id}',                             [App\Http\Controllers\Site\SiteController::class, 'downloadFile'])->name('file.download');
    // Submission
    Route::get('/submission',                                [App\Http\Controllers\Site\SiteController::class, 'submission'])->name('submission');
    //Submission Verify
    Route::get('/upload-voucher',                         [App\Http\Controllers\Site\SiteController::class, 'submissionVerify'])->name('submissionVerify');
    // Store Payment
    Route::post('/upload-voucher',                            [App\Http\Controllers\Site\SiteController::class, 'storePayment'])->name('storePayment');
});


Route::group(['prefix' => '/admin',                       'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard',                              [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    Route::get('/subscribed-mail',                        [App\Http\Controllers\Admin\DashboardController::class, 'subscribed_mail'])->name('subscribed_mail');
    /**
     * Users Routes
     */
    Route::group(['prefix' => 'member',                        'as' => 'member.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\MemberController::class, 'index'])->name('index');
        Route::get('create',                               [App\Http\Controllers\Admin\MemberController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\MemberController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\MemberController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\MemberController::class, 'update'])->name('update');
        Route::get('/show/{id}',                           [App\Http\Controllers\Admin\MemberController::class, 'show'])->name('show');
        // Certificate
        Route::get('/certificate/{id}',                    [App\Http\Controllers\Admin\MemberController::class, 'Certificate'])->name('certificate');
        // Document
        Route::get('/document/{id}',                       [App\Http\Controllers\Admin\MemberController::class, 'Document'])->name('document');
        // Send Email
        Route::post('/send-email',                        [App\Http\Controllers\Admin\MemberController::class, 'sendEmail'])->name('send-email');
        // Send Renewal Reminder Email
        Route::post('/send-reminder',                     [App\Http\Controllers\Admin\MemberController::class, 'sendReminderEmail'])->name('send-reminder');
        // Payment List
        Route::get('/payment-list/{id}',                    [App\Http\Controllers\Admin\MemberController::class, 'PaymentList'])->name('payment-list');

        Route::post('/verified_user/{id}',                 [App\Http\Controllers\Admin\MemberController::class, 'verified'])->name('verified');
        Route::get('/reset/{id}',                          [App\Http\Controllers\Admin\MemberController::class, 'resetMember'])->name('reset');

        Route::delete('/{id}',                             [App\Http\Controllers\Admin\MemberController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                          [App\Http\Controllers\Admin\MemberController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                         [App\Http\Controllers\Admin\MemberController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',             [App\Http\Controllers\Admin\MemberController::class, 'permanentDelete'])->name('delete');
    });

    // PAYMENT LIST
    Route::group(['prefix' => 'payment',                        'as' => 'payment.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('index');
        Route::get('create',                               [App\Http\Controllers\Admin\PaymentController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\PaymentController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\PaymentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\PaymentController::class, 'update'])->name('update');
        Route::delete('/{id}',                             [App\Http\Controllers\Admin\PaymentController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                          [App\Http\Controllers\Admin\PaymentController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                         [App\Http\Controllers\Admin\PaymentController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',             [App\Http\Controllers\Admin\PaymentController::class, 'permanentDelete'])->name('delete');
        // Delete Checked
        Route::post('delete_checked',                      [App\Http\Controllers\Admin\PaymentController::class, 'deleteChecked'])->name('deleteChecked');
    });


    Route::group(['prefix' => 'users',                        'as' => 'users.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');

        Route::get('create',                               [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\UserController::class, 'storeAdmin'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\UserController::class, 'editAdmin'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\UserController::class, 'updateAdmin'])->name('update');
        Route::delete('/{id}',                             [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
        Route::get('/show/{id}',                           [App\Http\Controllers\Admin\UserController::class, 'show'])->name('show');
        Route::post('/verified_user/{id}',                 [App\Http\Controllers\Admin\UserController::class, 'verified'])->name('verified');
        Route::get('/reset/{id}',                          [App\Http\Controllers\Admin\UserController::class, 'reset'])->name('reset');
        Route::post('/reset/{id}',                         [App\Http\Controllers\Admin\UserController::class, 'updateReset'])->name('resetPwd');
        //status
        Route::post('/status',                             [App\Http\Controllers\Admin\UserController::class, 'status'])->name('status');
    });

    /**
     * Roles Routes
     */
    Route::group(['prefix' => 'roles',                   'as' => 'roles.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('index');
        Route::get('create',                             [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                       [App\Http\Controllers\Admin\RoleController::class, 'delete'])->name('delete');
    });

    /**
     * Messages Routes
     */
    Route::group(['prefix' => 'message',                 'as' => 'message.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('index');
        Route::get('create',                             [App\Http\Controllers\Admin\MessageController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\MessageController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                       [App\Http\Controllers\Admin\MessageController::class, 'delete'])->name('delete');
    });
    /**
     * Settings Routes
     */
    Route::group(['prefix' => 'setting',                   'as' => 'setting.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('update');

        Route::group(['prefix' => 'social',               'as' => 'social.'], function () {
            Route::get('',                                 [App\Http\Controllers\Admin\SettingsController::class, 'getSocialProfiles'])->name('index');
            Route::post('{social}',                        [App\Http\Controllers\Admin\SettingsController::class, 'updateSocialProfiles'])->name('store');
        });

        Route::group(['prefix' => 'footer',               'as' => 'footer.'], function () {
            Route::get('',                                [App\Http\Controllers\Admin\CommonController::class, 'getFooterSetting'])->name('index');
            Route::post('/update/{id}',                   [App\Http\Controllers\Admin\CommonController::class, 'updateFooterSetting'])->name('update');
        });
    });
    /**
     * User Profile Routes
     */
    Route::group(['prefix' => 'user_profile',           'as' => 'user_profile.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\UsersProfileController::class, 'index'])->name('index');
        Route::get('/create',                            [App\Http\Controllers\Admin\UsersProfileController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\UsersProfileController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\UsersProfileController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\UsersProfileController::class, 'update'])->name('update');
        Route::delete('/{id}',                           [App\Http\Controllers\Admin\UsersProfileController::class, 'destroy'])->name('destroy');
        Route::get('/show}',                             [App\Http\Controllers\Admin\UsersProfileController::class, 'show'])->name('show');
        Route::post('/}',                                [App\Http\Controllers\Admin\UsersProfileController::class, 'passwordChange'])->name('passwordChange');
    });
    /**
     * Banner Routes ////
     */
    Route::group(['prefix' => 'banner',                   'as' => 'banner.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('index');
        Route::get('/create',                              [App\Http\Controllers\Admin\BannerController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\BannerController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('update');
        Route::delete('/{id}',                             [App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                          [App\Http\Controllers\Admin\BannerController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                         [App\Http\Controllers\Admin\BannerController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',             [App\Http\Controllers\Admin\BannerController::class, 'permanentDelete'])->name('delete');
    });

    /**
     * PopUp Routes ////
     */
    Route::group(['prefix' => 'popup',                    'as' => 'popup.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\PopupController::class, 'index'])->name('index');
        Route::get('/create',                              [App\Http\Controllers\Admin\PopupController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\PopupController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\PopupController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\PopupController::class, 'update'])->name('update');
        Route::delete('/{id}',                             [App\Http\Controllers\Admin\PopupController::class, 'destroy'])->name('destroy');
    });

    /**
     * Clients Routes ////
     */
    Route::group(['prefix' => 'clients',                      'as' => 'clients.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\ClientsController::class, 'index'])->name('index');
        Route::get('/create',                                  [App\Http\Controllers\Admin\ClientsController::class, 'create'])->name('create');
        Route::post('',                                        [App\Http\Controllers\Admin\ClientsController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                               [App\Http\Controllers\Admin\ClientsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                            [App\Http\Controllers\Admin\ClientsController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\ClientsController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                              [App\Http\Controllers\Admin\ClientsController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                             [App\Http\Controllers\Admin\ClientsController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                 [App\Http\Controllers\Admin\ClientsController::class, 'permanentDelete'])->name('delete');
    });

    /**
     * Blog Category Routes ////
     */
    Route::group(['prefix' => 'blogcategory',                     'as' => 'blogcategory.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\BlogCategoryController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\BlogCategoryController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\BlogCategoryController::class, 'store'])->name('store');
        Route::get('{id}/edit/',                                 [App\Http\Controllers\Admin\BlogCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\BlogCategoryController::class, 'update'])->name('update');
        Route::delete('/{category}',                             [App\Http\Controllers\Admin\BlogCategoryController::class, 'destroy'])->name('destroy');
        /** Category Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\BlogCategoryController::class, 'storeOrder'])->name('order');
        Route::post('status',                                     [App\Http\Controllers\Admin\BlogCategoryController::class, 'updateStatus'])->name('status');
    });

    /**
     * Post Category Routes ////
     */
    Route::group(['prefix' => 'postcategory',                     'as' => 'postcategory.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\PostCategoryController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\PostCategoryController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\PostCategoryController::class, 'store'])->name('store');
        Route::get('{id}/edit/',                                 [App\Http\Controllers\Admin\PostCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\PostCategoryController::class, 'update'])->name('update');
        Route::delete('/{category}',                             [App\Http\Controllers\Admin\PostCategoryController::class, 'destroy'])->name('destroy');
        /** Category Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\PostCategoryController::class, 'storeOrder'])->name('order');
        Route::post('status',                                     [App\Http\Controllers\Admin\PostCategoryController::class, 'updateStatus'])->name('status');
    });

    Route::group(['prefix' => 'destination',                     'as' => 'destination.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\DestinationController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\DestinationController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                 [App\Http\Controllers\Admin\DestinationController::class, 'edit'])->name('edit');
        Route::post('',                                          [App\Http\Controllers\Admin\DestinationController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\DestinationController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\DestinationController::class, 'destroy'])->name('destroy');
        Route::post('/status',                                   [App\Http\Controllers\Admin\DestinationController::class, 'status'])->name('status');
        /** Category Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\DestinationController::class, 'storeOrder'])->name('order');
    });
    /**
     * Branch Routes ////
     */
    Route::group(['prefix' => 'branch',                         'as' => 'branch.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\BranchController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\BranchController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\BranchController::class, 'store'])->name('store');
        Route::get('{id}/edit/',                                 [App\Http\Controllers\Admin\BranchController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\BranchController::class, 'update'])->name('update');
        Route::delete('/{category}',                             [App\Http\Controllers\Admin\BranchController::class, 'destroy'])->name('destroy');
        /** Category Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\BranchController::class, 'storeOrder'])->name('order');
        Route::post('status',                                     [App\Http\Controllers\Admin\BranchController::class, 'updateStatus'])->name('status');
    });
    /**
     * Staff Routes ////
     */
    Route::group(['prefix' => 'staff',                            'as' => 'staff.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\StaffController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\StaffController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\StaffController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\StaffController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\StaffController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\StaffController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\StaffController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\StaffController::class, 'destroyFile'])->name('destroyFile');
    });

    // season routes
    Route::group(['prefix' => 'season',                     'as' => 'season.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\SeasonController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\SeasonController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                 [App\Http\Controllers\Admin\SeasonController::class, 'edit'])->name('edit');
        Route::post('',                                          [App\Http\Controllers\Admin\SeasonController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\SeasonController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\SeasonController::class, 'destroy'])->name('destroy');
        Route::post('/status',                                   [App\Http\Controllers\Admin\SeasonController::class, 'status'])->name('status');

        /** Category Nestable Order */
    });
    /**
     * Blog POST Routes ////
     */
    Route::group(['prefix' => 'difficult',                     'as' => 'difficult.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\DifficultController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\DifficultController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\DifficultController::class, 'edit'])->name('edit');
        Route::post('',                                          [App\Http\Controllers\Admin\DifficultController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\DifficultController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\DifficultController::class, 'destroy'])->name('destroy');
        Route::post('/status',                                   [App\Http\Controllers\Admin\DifficultController::class, 'status'])->name('status');

        /** Category Nestable Order */
    });


    Route::group(['prefix' => 'cultural',                     'as' => 'cultural.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\CulturalController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\CulturalController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\CulturalController::class, 'edit'])->name('edit');
        Route::post('',                                          [App\Http\Controllers\Admin\CulturalController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\CulturalController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\CulturalController::class, 'destroy'])->name('destroy');
        Route::post('/status',                                   [App\Http\Controllers\Admin\CulturalController::class, 'status'])->name('status');

        /** Category Nestable Order */
    });

    Route::group(['prefix' => 'experience',                     'as' => 'experience.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\ExperienceController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\ExperienceController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\ExperienceController::class, 'edit'])->name('edit');
        Route::post('',                                          [App\Http\Controllers\Admin\ExperienceController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\ExperienceController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\ExperienceController::class, 'destroy'])->name('destroy');
        Route::post('/status',                                   [App\Http\Controllers\Admin\ExperienceController::class, 'status'])->name('status');

        /** Category Nestable Order */
    });

    Route::group(['prefix' => 'previous-committee',                     'as' => 'previous-committee.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\PreviousCommitteeController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\PreviousCommitteeController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                 [App\Http\Controllers\Admin\PreviousCommitteeController::class, 'edit'])->name('edit');
        Route::post('',                                          [App\Http\Controllers\Admin\PreviousCommitteeController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\PreviousCommitteeController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\PreviousCommitteeController::class, 'destroy'])->name('destroy');
        /** Category Nestable Order */
    });

    Route::group(['prefix' => 'member_type',                     'as' => 'member_type.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\MemberTypeController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\MemberTypeController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\MemberTypeController::class, 'edit'])->name('edit');
        Route::post('',                                          [App\Http\Controllers\Admin\MemberTypeController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\MemberTypeController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\MemberTypeController::class, 'destroy'])->name('destroy');
        Route::post('/status',                                   [App\Http\Controllers\Admin\MemberTypeController::class, 'status'])->name('status');

        /** Category Nestable Order */
    });

    Route::group(['prefix' => 'member_subcategory',              'as' => 'member_subcategory.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\MemberSubcategoryController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\MemberSubcategoryController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                 [App\Http\Controllers\Admin\MemberSubcategoryController::class, 'edit'])->name('edit');
        Route::get('/show/{id}',                                 [App\Http\Controllers\Admin\MemberSubcategoryController::class, 'show'])->name('show');
        Route::post('',                                          [App\Http\Controllers\Admin\MemberSubcategoryController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\MemberSubcategoryController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\MemberSubcategoryController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => 'transport',                     'as' => 'transport.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\TransportController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\TransportController::class, 'create'])->name('create');
        Route::get('/edit/{id}',                                    [App\Http\Controllers\Admin\TransportController::class, 'edit'])->name('edit');
        Route::post('',                                          [App\Http\Controllers\Admin\TransportController::class, 'store'])->name('store');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\TransportController::class, 'update'])->name('update');
        Route::delete('/{id}',                                   [App\Http\Controllers\Admin\TransportController::class, 'destroy'])->name('destroy');
        Route::post('/status',                                   [App\Http\Controllers\Admin\TransportController::class, 'status'])->name('status');

        /** Category Nestable Order */
    });

    /**
     * Blog POST Routes ////
     */
    Route::group(['prefix' => 'otherpost',                           'as' => 'otherpost.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\PostController::class, 'store'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\PostController::class, 'editPost'])->name('edit');
        Route::get('/view/{post_unique_id}',                    [App\Http\Controllers\Admin\PostController::class, 'show'])->name('show');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\PostController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('destroy');

        Route::get('delete_item',                               [App\Http\Controllers\Admin\PostController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\PostController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\PostController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\PostController::class, 'destroyFile'])->name('destroyFile');
        Route::delete('delete-blog-image/{id}',                 [App\Http\Controllers\Admin\PostController::class, 'deleteBlogImg'])->name('delete_blog_img');
    });
    /**
     * Blog POST Routes ////
     */
    Route::group(['prefix' => 'post',                           'as' => 'blog.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BlogController::class, 'indexPost'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'editPost'])->name('edit');
        Route::get('/view/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'show'])->name('show');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');

        Route::get('delete_item',                               [App\Http\Controllers\Admin\BlogController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\BlogController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'destroyFile'])->name('destroyFile');
        Route::delete('delete-blog-image/{id}',                 [App\Http\Controllers\Admin\BlogController::class, 'deleteBlogImg'])->name('delete_blog_img');
    });

    /**
     * Blog Pages Routes ////
     */
    Route::group(['prefix' => 'page',                           'as' => 'page.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BlogController::class, 'indexPage'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BlogController::class, 'createPage'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BlogController::class, 'storePage'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'editPage'])->name('edit');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\BlogController::class, 'updatePage'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');

        Route::get('delete_item',                               [App\Http\Controllers\Admin\BlogController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\BlogController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'destroyFile'])->name('destroyFile');

        Route::post('/sortabledatatable',                       [App\Http\Controllers\Admin\BlogController::class, 'updateOrder'])->name('ShortData');
    });

    /**
     * Language Routes ////
     */
    Route::group(['prefix' => 'language',                       'as' => 'language.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\LanguageController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\LanguageController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\LanguageController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\LanguageController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                             [App\Http\Controllers\Admin\LanguageController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\LanguageController::class, 'destroy'])->name('destroy');
        /**Soft Delete Url */
        Route::get('delete_item',                               [App\Http\Controllers\Admin\LanguageController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\LanguageController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\LanguageController::class, 'permanentDelete'])->name('delete');
    });



    /**
     * Program Packages  Routes ////
     */
    Route::group(['prefix' => 'menu',                             'as' => 'menu.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\MenusController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\MenusController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\MenusController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\MenusController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\MenusController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\MenusController::class, 'permanentDelete'])->name('destroy');
        /** Menu Nestable Order */
        Route::post('order',                                      [App\Http\Controllers\Admin\MenusController::class, 'storeOrder'])->name('order');
    });


    /**
     * Testimonials Routes ////
     */
    Route::group(['prefix' => 'testimonial',                       'as' => 'testimonial.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\TestimonialController::class, 'permanentDelete'])->name('destroy');
        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\TestimonialController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\TestimonialController::class, 'destroyFile'])->name('destroyFile');
    });
    /**
     * FAQ Routes ////
     */
    Route::group(['prefix' => 'faq',                            'as' => 'faq.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\FaqController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\FaqController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\FaqController::class, 'store'])->name('store');
        Route::get('{id}/edit/',                                [App\Http\Controllers\Admin\FaqController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\FaqController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\FaqController::class, 'destroy'])->name('destroy');
        /** FAQ Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\FaqController::class, 'storeOrder'])->name('order');
    });


    /**
     * Gallery Routes ////
     */
    Route::group(['prefix' => 'gallery',                           'as' => 'gallery.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\GalleryController::class, 'permanentDelete'])->name('destroy');
        Route::get('/show/{id}',                                   [App\Http\Controllers\Admin\GalleryController::class, 'show'])->name('show');
        // Route Gallery Category
        Route::post('/store-category',                             [App\Http\Controllers\Admin\GalleryController::class, 'storeCategory'])->name('storeCategory');
        Route::post('/category',                                 [App\Http\Controllers\Admin\GalleryController::class, 'destroyCategory'])->name('destroyCategory');


        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\GalleryController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\GalleryController::class, 'destroyFile'])->name('destroyFile');

        Route::get('/photo/add/{album}',                           [App\Http\Controllers\Admin\AllGalleryController::class, 'create'])->name('addPhoto');
        Route::post('/photo/store/{album}',                        [App\Http\Controllers\Admin\AllGalleryController::class, 'store'])->name('storePhoto');
        Route::delete('/photo/{album}',                            [App\Http\Controllers\Admin\AllGalleryController::class, 'destroy'])->name('destroyPhoto');
    });
    /**
     * Videos Routes ////
     */
    Route::group(['prefix' => 'video',                             'as' => 'video.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\VideosController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\VideosController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\VideosController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\VideosController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\VideosController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\VideosController::class, 'permanentDelete'])->name('destroy');
    });

    /**
     * User Messages
     *
     */
    Route::group(['prefix' => 'message',                           'as' => 'message.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\ContactsController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\ContactsController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\ContactsController::class, 'store'])->name('store');
        Route::get('/show/{id}',                                   [App\Http\Controllers\Admin\ContactsController::class, 'show'])->name('show');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\ContactsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\ContactsController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\ContactsController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\ContactsController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\ContactsController::class, 'destroyFile'])->name('destroyFile');
    });

    /**
     * Our Service Routes ////
     */

    Route::group(['prefix' => 'our-service',                           'as' => 'our_service.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\OurServiceController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\OurServiceController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\OurServiceController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\OurServiceController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\OurServiceController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\OurServiceController::class, 'delete'])->name('destroy');
        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\OurServiceController::class, 'delete'])->name('delete');
        Route::delete('deleted-item',                               [App\Http\Controllers\Admin\OurServiceController::class, 'deletedPost'])->name('deleted_item');
    });

    /**
     * Achievement ////
     */

    Route::group(['prefix' => 'achievement',                           'as' => 'achievement.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\AchieveMentController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\AchieveMentController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\AchieveMentController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\AchieveMentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\AchieveMentController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\AchieveMentController::class, 'delete'])->name('destroy');
        Route::delete('deleted-item',                               [App\Http\Controllers\Admin\AchieveMentController::class, 'deletedPost'])->name('deleted_item');
    });
});


/**
 * Front End route
 */



Route::group(['prefix' => '/user',                             'as' => 'user.', 'middleware' => ['auth', 'user']], function () {
    Route::get('/dashboard',                                    [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
});

Route::group(['prefix' => '/membership',                       'as' => 'member.', 'middleware' => ['auth', 'Membership']], function () {
    Route::get('/dashboard',                                    [App\Http\Controllers\Member\DashboardController::class, 'index'])->name('index');

    Route::group(['prefix' => 'post',                           'as' => 'blog.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BlogController::class, 'indexMemberPost'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BlogController::class, 'createMemberPost'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'editMemberPost'])->name('edit');
        Route::get('/view/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'show'])->name('show');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');

        Route::get('delete_item',                               [App\Http\Controllers\Admin\BlogController::class, 'deletedMemberPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\BlogController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'destroyFile'])->name('destroyFile');
        Route::delete('delete-blog-image/{id}',                 [App\Http\Controllers\Admin\BlogController::class, 'deleteBlogImg'])->name('delete_blog_img');

        //
        Route::get('/',                                         [App\Http\Controllers\Admin\BlogController::class, 'indexMemberPost'])->name('indexMemberPost');
    });


    Route::group(['prefix' => 'setting',                       'as' => 'setting.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Member\SettingsController::class, 'index'])->name('index');
        Route::post('/update/{id}',                             [App\Http\Controllers\Member\SettingsController::class, 'update'])->name('update');

        Route::group(['prefix' => 'social',                    'as' => 'social.'], function () {
            Route::get('',                                      [App\Http\Controllers\Member\SettingsController::class, 'getSocialProfiles'])->name('index');
            Route::post('{social}',                             [App\Http\Controllers\Member\SettingsController::class, 'updateSocialProfiles'])->name('store');
        });

        Route::group(['prefix' => 'footer',                     'as' => 'footer.'], function () {
            Route::get('',                                      [App\Http\Controllers\Member\SettingsController::class, 'getFooterSetting'])->name('index');
            Route::post('/update/{id}',                         [App\Http\Controllers\Member\SettingsController::class, 'updateFooterSetting'])->name('update');
        });
    });

    Route::group(['prefix' => 'user_profile',                    'as' => 'user_profile.'], function () {
        Route::get('/',                                           [App\Http\Controllers\Member\SettingsController::class, 'showUserProfile'])->name('index');
        Route::post('/update/{id}',                               [App\Http\Controllers\Member\SettingsController::class, 'updateUserProfiles'])->name('update');
        Route::get('/show',                                       [App\Http\Controllers\Member\UsersProfileController::class, 'show'])->name('show');
        Route::post('/}',                                         [App\Http\Controllers\Member\SettingsController::class, 'passwordChange'])->name('passwordChange');
    });

    Route::group(['prefix' => 'gallery',                           'as' => 'gallery.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Member\GalleryController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Member\GalleryController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Member\GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Member\GalleryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Member\GalleryController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Member\GalleryController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Member\GalleryController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Member\GalleryController::class, 'destroyFile'])->name('destroyFile');

        Route::post('/delete',                                      [App\Http\Controllers\Member\GalleryController::class, 'deleteImages'])->name('selected_delete');
    });

    Route::group(['prefix' => 'video',                             'as' => 'video.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Member\VideosController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Member\VideosController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Member\VideosController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Member\VideosController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Member\VideosController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Member\VideosController::class, 'permanentDelete'])->name('destroy');
    });
});

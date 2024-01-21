<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleManagementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AboutUsController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes(['verify' => true]);
Route::get('/', function () {
    // return view('frontendpanel.home.index');
    return redirect()->route('frontend_dashboard');
});

Route::get('/home', function () {
    return redirect()->route('admin_dashboard');
});

Route::post('/user-login', [LoginController::class, 'LOGIN'])->name('LOGIN');
Route::post('/user-register', [AccountController::class, 'account_create'])->name('account_registration');

#~~~~~~~~~~~~ all admin panel routes ~~~~~~~~~~~~~~

Route::group(['prefix' => 'admin','middleware' => ['auth', 'role:admin']], function() {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');



    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'profile_edit'])->name('profile_edit');
    Route::post('/profile/update', [ProfileController::class, 'profile_update'])->name('profile_update');

    Route::get('/role-management', [RoleManagementController::class, 'index'])->name('role_management');
    Route::post('/role-management/add', [RoleManagementController::class, 'role_add'])->name('role_add');
    Route::get('/role-management/delete/{id}', [RoleManagementController::class, 'role_delete'])->name('role_delete');
    Route::post('/role-management/update', [RoleManagementController::class, 'role_update'])->name('role_update');
    Route::get('/get-role/{id}', [RoleManagementController::class, 'get_role'])->name('get_role');

    Route::post('/permission-management/add', [RoleManagementController::class, 'permission_add'])->name('permission_add');
    Route::get('/permission-management/delete/{id}', [RoleManagementController::class, 'permission_delete'])->name('permission_delete');
    Route::post('/permission-management/update', [RoleManagementController::class, 'permission_update'])->name('permission_update');
    Route::get('/get-permission/{id}', [RoleManagementController::class, 'get_permission'])->name('get_permission');

    Route::post('/role-permission-assign', [RoleManagementController::class, 'role_permission_assign'])->name('role_permission_assign');
    Route::get('/role-permission-revoke/{id}', [RoleManagementController::class, 'role_permission_revoke'])->name('role_permission_revoke');

    Route::resource('users', UserController::class);
    Route::resource('contact', ContactController::class);

    Route::resource('category', CategoryController::class);
    Route::resource('blog', BlogController::class);
    Route::post('/update-blog-status/{id}', [BlogController::class,'updateStatus'])->name('update-blog-status');

    Route::resource('news', NewsController::class);
    Route::post('/update-news-status/{id}', [NewsController::class,'updateStatus'])->name('update-news-status');

    Route::resource('department', DepartmentController::class);
    Route::post('/update-department-status/{id}', [DepartmentController::class,'updateStatus'])->name('update-department-status');
    Route::resource('university', UniversityController::class);
    Route::post('/update-university-status/{id}', [UniversityController::class,'updateStatus'])->name('update-university-status');
    Route::resource('testimonial', TestimonialController::class);
    Route::post('/update-testimonial-status/{id}', [TestimonialController::class,'updateStatus'])->name('update-testimonial-status');

    Route::resource('aboutUs', AboutUsController::class);
    Route::get('/edit-about-us/{id}', [AboutUsController::class, 'edit'])->name('edit.about.us');



    Route::get('/account-approve/list', [AdminController::class, 'approval_list'])->name('user_account_approval');
    Route::get('/account-approve/view/{id}', [AdminController::class, 'user_account_view'])->name('user_account_view');
    Route::get('/account-approve/verify/{id}', [AdminController::class, 'account_verify'])->name('account_verify');

});


// Frontend Routes
Route::get('home',[FrontendController::class,'index'])->name('frontend_dashboard');
Route::get('about',[FrontendController::class,'about'])->name('frontend_about');

Route::get('contact',[FrontendController::class,'contact'])->name('frontend_contact');
Route::post('contact-submit',[FrontendController::class,'contact_submit'])->name('contact_submit');

Route::get('blog',[FrontendController::class,'blog'])->name('frontend_blog');
Route::get('blog-category/{id}',[FrontendController::class,'categorywise_blog'])->name('categorywise_blog');
Route::get('search-blog', [FrontendController::class,'blog_search'])->name('search_blogs');
Route::get('blog-details/{id}',[FrontendController::class,'blogDetails'])->name('frontend_blog_details');
Route::post('blog/{blogId}', [FrontendController::class,'likeBlog'])->name('likeBlog');
Route::get('blog/{tag}',[FrontendController::class,'blog_tag'])->name('blog_tag');



Route::post('/comments', [CommentController::class,'store'])->name('comments_store');
Route::post('/comments/{parentComment}/reply', [CommentController::class,'reply'])->name('comments_reply');
Route::delete('/comments-delete', [CommentController::class,'destroy'])->name('comments_destroy');

Route::get('news',[FrontendController::class,'news'])->name('frontend_news');
Route::get('/search-news', [FrontendController::class,'news_search'])->name('search_news');
Route::get('news-details/{id}',[FrontendController::class,'newsDetails'])->name('frontend_news_details');
Route::get('news-category/{name}',[FrontendController::class,'categorywise_news'])->name('categorywise_news');

Route::get('university',[FrontendController::class,'university'])->name('frontend_university');
Route::get('/search-universities', [FrontendController::class,'university_search'])->name('search_universities');
Route::get('university-details/{id}',[FrontendController::class,'universityDetails'])->name('frontend_university_details');

Route::get('nearest-university',[FrontendController::class,'nearest_university_search'])->name('nearest_university_search');
Route::get('/get-universities-geojson', [FrontendController::class,'getUniversitiesGeoJSON']);

Route::get('/multiple-search-universities', [FrontendController::class,'university_search_multiple'])->name('multiple_search_universities');
Route::get('/universities-search-result', [FrontendController::class,'university_search_result'])->name('university_search_result');

Route::post('/subscribe-news', [FrontendController::class,'subscribe_news'])->name('subscribe_news');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CatsController;
use App\Http\Controllers\EntitiesController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ForgotPasswordController;

 

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


//////////////////////////////////////////////////////////////////////////////////
// Autentication
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register/signup', [RegisterController::class, 'signup']);
Route::get('/login', [loginController::class, 'login'])->name('login');
Route::post('/login', [loginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/login/signout', [loginController::class, 'signout']);
//reset password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//dashboard
Route::get('dashboard/index', [DashboardController::class, 'index']);

Route::group([
    'middleware' => ['auth']
], function () {

     //users
     Route::group([
        'prefix' => 'users',
    ], function () {
        //routes
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/create', [UsersController::class, 'create']);
        Route::post('/insert', [UsersController::class, 'insert']);
        Route::get('/edit/{id}', [UsersController::class, 'edit']);
        Route::post('/update', [UsersController::class, 'update']);
        Route::get('/destroy/{id}', [UsersController::class, 'destroy']);
        Route::get('/profile', [UsersController::class, 'profile']);
        Route::get('/edit_userprofile/{id}', [UsersController::class, 'edit_userprofile'])->name('user.edit_userprofile');
        Route::post('/update_profile_password', [UsersController::class, 'update_profile_password'])->middleware('permission:users.update_profile_pass');
        Route::post('/password_reset', [UsersController::class, 'password_reset'])->middleware('permission:users.password_reset');


    });

     //roles
     Route::group([
        'prefix' => 'roles',
    ], function () {
        //routes
        Route::get('/', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/create', [RolesController::class, 'create']);
        Route::post('/insert', [RolesController::class, 'insert']);
        Route::get('/edit/{id}', [RolesController::class, 'edit']);
        Route::post('/update', [RolesController::class, 'update']);
        Route::get('/edit_role_permissions/{id}', [RolesController::class, 'edit_role_permissions']);
        Route::post('/role_permissions_update', [RolesController::class, 'role_permissions_update']);
      
        Route::get('/destroy/{id}', [RolesController::class, 'destroy'])->name('roles.destroy');
    });

    /*cats*/
    Route::group([
        'prefix' => 'cats',
    ], function () {
        //routes
        Route::get('/', [CatsController::class, 'index']);
        Route::get('/create', [CatsController::class, 'create']);
        Route::post('/insert', [CatsController::class, 'insert']);
        Route::get('/edit/{id}', [CatsController::class, 'edit']);
        Route::post('/update', [CatsController::class, 'update']);
        Route::get('/cat_page/', [CatsController::class, 'cat_page']);
        Route::get('/GetcatID/{id}', [CatsController::class, 'GetcatID']);
        Route::get('/destroy/{id}', [CatsController::class, 'destroy'])->name('roles.destroy');
    });
     //entities
     Route::group([
        'prefix' => 'entities',
    ], function () {
        //routes
        Route::get('/', [EntitiesController::class, 'index']);
        Route::get('/create', [EntitiesController::class, 'create']);
        Route::get('/get_city/{id}', [EntitiesController::class, 'get_city']);
        Route::post('/insert', [EntitiesController::class, 'insert']);
        
        Route::get('/getcity', [EntitiesController::class, 'getcity']);
        Route::get('/edit/{id}', [EntitiesController::class, 'edit']);
        Route::post('/update', [EntitiesController::class, 'update']);
        Route::get('/destroy/{id}', [EntitiesController::class, 'destroy'])->name('entities.destroy');
    });

     /*jobs*/
     Route::group([
        'prefix' => 'jobs',
    ], function () {
        //routes
        Route::get('/', [JobsController::class, 'index']);
        Route::get('/create', [JobsController::class, 'create'])->name('jobs.create');
        Route::post('/insert', [JobsController::class, 'insert'])->name('jobs.insert');
        Route::get('/get_city/{id}', [JobsController::class, 'get_city']);
        Route::get('/edit/{id}', [JobsController::class, 'edit']);
        Route::post('/update', [JobsController::class, 'update']);
        Route::get('/destroy/{id}', [JobsController::class, 'destroy'])->name('jobs.destroy');
        
        
        ///////////////////////////////////////////////////////////////////////
        //////////jobs fromted
        Route::get('/frontend', [JobsController::class, 'frontend']);
        //Route::get('/fronted', [JobsController::class, 'fronted'])->name('jobs.fronted');
        Route::get('/getJobForm/{id}', [JobsController::class, 'getJobForm']);
        Route::post('/send_mail', [JobsController::class, 'send_mail']);
    });




});//end route group




//jobs


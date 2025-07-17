<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HelpController;
use App\Http\Controllers\Admin\MyCardController;
use App\Http\Controllers\Admin\ProfileSettingController;
use App\Http\Controllers\Admin\SharedCardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrganizeCardController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Web\HomeController;

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

##########################################################
##          Home Routes
##########################################################


Route::prefix('')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home.page');
    Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy.page');
    Route::get('/terms', [HomeController::class, 'terms'])->name('terms.page');
    Route::get('/m/{slug}', [MyCardController::class, 'index'])->name('my.card.view');
    Route::post('/my-card/{mycard:slug}', [SharedCardController::class, 'acceptCard'])->name('my.card.accept');

});

##########################################################
##          Auth
##########################################################
Route::controller(AuthController::class)->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', 'showLoginPage')->name('show.login.form');
        Route::post('login', 'storeLoginForm')->name('store.login.form');
        Route::get('register', 'showRegistrationPage')->name('show.registration.page');


        Route::get('forgot-password', 'showForgotPasswordPage')->name('password.request');
        Route::post('forgot-password', 'sendResetLinkEmail')->name('password.email');
        Route::get('reset-password', 'showResetForm')->name('password.reset');
        Route::post('reset-password', 'reset')->name('password.update');


        Route::post('register', 'storeRegistrationPageData')->name('store.registration.page.data');
    });
});
##########################################################
##          Dashboard
##########################################################
Route::middleware(['auth'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });

    Route::prefix('/dashboard')->group(function(){
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'show')->name('admin.dashboard');
    });

##########################################################
##          Card
##########################################################

    Route::controller(MyCardController::class)->group(function () {
        Route::prefix('/card')->group(function(){
            Route::get('/view', 'view')->name('admin.dashboard.card.view');
            Route::get('/create', 'create')->name('admin.dashboard.card.create');
            Route::post('/store', 'store')->name('admin.dashboard.card.store');
            Route::get('/edit/{mycard:uuid}', 'edit')->name('admin.dashboard.card.edit');
            Route::post('/update/{mycard:uuid}', 'update')->name('admin.dashboard.card.update');
            Route::post('/delete', 'delete')->name('admin.dashboard.card.delete');
        });
    });

        Route::controller(SharedCardController::class)->group(function () {
            Route::prefix('/shared-card')->group(function(){
                Route::get('/', 'view')->name('admin.dashboard.shared.card.view');
            });
        });

        Route::controller(OrganizeCardController::class)->group(function () {
            Route::prefix('/organize')->group(function(){
                Route::get('/create/{mycard:uuid}', 'create')->name('admin.dashboard.orgainze.card.create');
                Route::post('/store/{mycard:uuid}', 'store')->name('admin.dashboard.orgainze.card.store');
                Route::get('/edit', 'edit')->name('admin.dashboard.orgainze.card.edit');
                Route::get('/update', 'update')->name('admin.dashboard.orgainze.card.update');
            });
        });

##########################################################
##          Tag
##########################################################

         Route::controller(TagController::class)->group(function () {
            Route::prefix('/tag')->group(function(){
                Route::get('/view', 'view')->name('admin.dashboard.tag.view');
                Route::get('/create', 'create')->name('admin.dashboard.tag.create');
                Route::post('/store', 'store')->name('admin.dashboard.tag.store');
                Route::get('/edit/{tag:uuid}', 'edit')->name('admin.dashboard.tag.edit');
                Route::post('/update/{tag:uuid}', 'update')->name('admin.dashboard.tag.update');
            });
        });

##########################################################
##          Category
##########################################################

         Route::controller(CategoryController::class)->group(function () {
            Route::prefix('/category')->group(function(){
                Route::get('/view', 'view')->name('admin.dashboard.category.view');
                Route::get('/create', 'create')->name('admin.dashboard.category.create');
                Route::post('/store', 'store')->name('admin.dashboard.category.store');
                Route::get('/edit/{category:uuid}', 'edit')->name('admin.dashboard.category.edit');
                Route::post('/update/{category:uuid}', 'update')->name('admin.dashboard.category.update');
            });
        });

##########################################################
##          Profile
##########################################################
        Route::controller(ProfileSettingController::class)->group(function () {
            Route::prefix('/profile')->group(function(){
                Route::get('/', 'view')->name('admin.dashboard.profile.view');
            });
        });

##########################################################
##          Help
##########################################################

        Route::controller(HelpController::class)->group(function () {
            Route::prefix('/help')->group(function(){
                Route::get('/', 'view')->name('admin.dashboard.help.view');
                Route::post('/', 'submitHelp')->name('admin.dashboard.help.submit');
            });
        });
    });
});



//  Always at the end
Route::fallback(function () {
    return redirect('/'); // or route('home')
});

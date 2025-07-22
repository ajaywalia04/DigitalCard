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
use App\Http\Controllers\Admin\LandingPageController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\TeamController;
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
    Route::get('/l/{slug}', [LandingPageController::class, 'index'])->name('my.landing.view');
    Route::post('/my-card/{myCard:slug}', [SharedCardController::class, 'acceptCard'])->name('my.card.accept');
    Route::post('/store-contact-us/{landingPage:uuid}', [LandingPageController::class, 'storeContactUs'])->name('landing.contact.store');

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
Route::middleware(['auth'])->name('dashboard.')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('logout', 'logout')->name('logout');
    });

    Route::prefix('/dashboard')->group(function(){
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', 'view')->name('view');
    });

##########################################################
##          Card
##########################################################

    Route::controller(MyCardController::class)->group(function () {
        Route::prefix('/card')->group(function(){
            Route::get('/view', 'view')->name('card.view');
            Route::get('/create', 'create')->name('card.create');
            Route::post('/store', 'store')->name('card.store');
            Route::get('/edit/{myCard:uuid}', 'edit')->name('card.edit');
            Route::post('/update/{myCard:uuid}', 'update')->name('card.update');
            Route::post('/delete', 'delete')->name('card.delete');
        });
    });

        Route::controller(SharedCardController::class)->group(function () {
            Route::prefix('/shared-card')->group(function(){
                Route::get('/', 'view')->name('shared.card.view');
            });
        });

        Route::controller(OrganizeCardController::class)->group(function () {
            Route::prefix('/organize')->group(function(){
                Route::get('/create/{myCard:uuid}', 'create')->name('orgainze.card.create');
                Route::post('/store/{myCard:uuid}', 'store')->name('orgainze.card.store');
                Route::get('/edit', 'edit')->name('orgainze.card.edit');
                Route::get('/update', 'update')->name('orgainze.card.update');
            });
        });

##########################################################
##          Tag
##########################################################

         Route::controller(TagController::class)->group(function () {
            Route::prefix('/tag')->group(function(){
                Route::get('/view', 'view')->name('tag.view');
                Route::get('/create', 'create')->name('tag.create');
                Route::post('/store', 'store')->name('tag.store');
                Route::get('/edit/{tag:uuid}', 'edit')->name('tag.edit');
                Route::post('/update/{tag:uuid}', 'update')->name('tag.update');
            });
        });

##########################################################
##          Category
##########################################################

         Route::controller(CategoryController::class)->group(function () {
            Route::prefix('/category')->group(function(){
                Route::get('/view', 'view')->name('category.view');
                Route::get('/create', 'create')->name('category.create');
                Route::post('/store', 'store')->name('category.store');
                Route::get('/edit/{category:uuid}', 'edit')->name('category.edit');
                Route::post('/update/{category:uuid}', 'update')->name('category.update');
            });
        });

##########################################################
##          Profile
##########################################################
        Route::controller(ProfileSettingController::class)->group(function () {
            Route::prefix('/profile')->group(function(){
                Route::get('/', 'view')->name('profile.view');
            });
        });

##########################################################
##          Help
##########################################################

        Route::controller(HelpController::class)->group(function () {
            Route::prefix('/help')->group(function(){
                Route::get('/', 'view')->name('help.view');
                Route::post('/', 'submitHelp')->name('help.submit');
            });
        });

##########################################################
##          Team
##########################################################
        Route::controller(TeamController::class)->group(function () {
            Route::prefix('/team')->group(function(){
            });
        });

##########################################################
##          LandingPage
##########################################################
        Route::controller(LandingPageController::class)->group(function () {
            Route::prefix('/landing-page')->group(function(){
                Route::get('/create', 'create')->name('landing.create');
                Route::post('/store', 'store')->name('landing.store');
                Route::get('/edit/{landingPage:uuid}', 'edit')->name('landing.edit');
                Route::post('/update/{landingPage:uuid}', 'update')->name('landing.update');

                Route::get('/view-service', 'viewService')->name('landing.service.view');
                Route::get('/create-service', 'createService')->name('landing.service.create');
                Route::post('/store-service', 'storeService')->name('landing.service.store');
                Route::get('/edit-service/{landingService:uuid}', 'editService')->name('landing.service.edit');
                Route::post('/update-service/{landingService:uuid}', 'updateService')->name('landing.service.update');

                Route::get('/view-message', 'viewMessage')->name('landing.message.view');
                Route::get('/show-message/{landingContactUs:uuid}', 'showMessage')->name('landing.message.show');

            });
        });

##########################################################
##          SocialMedia
##########################################################
        Route::controller(SocialMediaController::class)->group(function () {
            Route::prefix('/social-media')->group(function(){
                Route::get('/create', 'create')->name('social.create');
                Route::post('/store', 'store')->name('social.store');
            });
        });
    });

});



//  Always at the end
Route::fallback(function () {
    return redirect('/'); // or route('home')
});

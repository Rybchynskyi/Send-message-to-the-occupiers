<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CabinetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\PurshaseController;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Auth::routes();

// home page with locale
Route::get('/{locale?}', [HomeController::class, 'index'])
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('localeForUrl')
    ->name('home');

// change language
Route::get('/lang/change/', [LangController::class, 'change'])->name('changeLang');

// views
Route::prefix('{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->middleware('localeForUrl')
    ->group(function () {
        Route::get('/cabinet', [CabinetController::class, 'index'])->middleware('auth')->name('cabinet.view');
        Route::view('/certificateExample', 'certificateExample')->name('certificate.example');
        Route::post('/certificate', [CabinetController::class, 'generateCertificate'])->middleware('auth')->name('certificate.show');
});

// admin
Route::prefix('admin')
    ->middleware('localeForUrl', 'auth', 'can:viewAdminPage')
    ->namespace('App\Http\Controllers\Admin')
    ->name('admin.')
    ->group(function (){
        Route::namespace('Purchases')->group( function (){
            Route::get('/purchases', 'IndexController')->name('purchases.index');
        });
        Route::namespace('Users')->group( function (){
            Route::get('/users', 'IndexController')->name('users.index');
            Route::post('/users', 'StoreController')->name('user.store');
            Route::patch('/purchases/{user}', 'UpdateController')->name('user.update');
            Route::delete('/purchases/{user}', 'DeleteController')->name('user.destroy');
        });
        Route::namespace('Settings')->group( function (){
            Route::get('/settings', 'IndexController')->name('settings.index');
            Route::post('/settings', 'EditController')->name('settings.edit');
        });
        Route::namespace('Widgets')->group( function (){
            Route::get('/widgets', 'IndexController')->name('widgets.index');
        });
});

// purchases
Route::prefix('purchases')->namespace('App\Http\Controllers\Purchases')
    ->middleware('localeForUrl')
    ->group(function (){
        Route::post('/', 'StoreController')->name('purchase.store');
        Route::patch('/{purchase}', 'UpdateController')->name('purchase.update');
        Route::post('/upload/{purchase}', 'UploadImageController')->name('purchase.uploadImage');
        Route::delete('/{purchase}', 'DeleteController')->name('purchase.destroy');
});

// oAuth
Route::get('/auth/socialite/github', [SocialiteController::class, 'github'])->name('socialite.github');
Route::get('/auth/socialite/github/callback', [SocialiteController::class, 'githubCallBack'])->name('socialite.github.callback');
Route::get('/auth/socialite/google', [SocialiteController::class, 'google'])->name('socialite.google');
Route::get('/auth/socialite/google/callback', [SocialiteController::class, 'googleCallBack'])->name('socialite.google.callback');
Route::get('/auth/socialite/facebook', [SocialiteController::class, 'facebook'])->name('socialite.facebook');
Route::get('/auth/socialite/facebook/callback', [SocialiteController::class, 'facebookCallBack'])->name('socialite.facebook.callback');


<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\FrontViewController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Front\InfluencerViewController;
use App\Http\Controllers\Front\PartnerViewController;
use App\Http\Controllers\Front\Influencer\InfluencerProfileController;
use App\Http\Controllers\Admin\Product\ProductController;

Route::get('/', [FrontViewController::class,'index'])->name('home');
Route::get('/benefits', [FrontViewController::class,'benefits'])->name('front.benefits');
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class,'loginPage'])->name('login-page');
    Route::get('/partner-register', [AuthController::class,'partnerRegister'])->middleware('noAuthCheck')->name('partner-register');
    Route::get('/influencer-register', [AuthController::class,'influencerRegister'])->middleware('noAuthCheck')->name('influencer-register');

    Route::post('/send-otp-mail', [AuthController::class,'sendOtpMail'])->name('send-otp-mail');
    Route::post('/send-otp-sms', [AuthController::class,'sendOtpSms'])->name('send-otp-sms');
    Route::post('/check-unique-email-or-phone', [AuthController::class,'checkUniqueEmailOrPhoneNumber'])->name('check-unique-email-or-phone');
    Route::post('/login', [AuthController::class,'login'])->name('login');

    Route::post('/register-partner', [AuthController::class,'registerPartner'])->name('register-partner');
    Route::post('/register-influencer', [AuthController::class,'registerInfluencer'])->name('register-influencer');
});

Route::post('auth/register-partner', [AuthController::class,'registerPartner'])->name('auth.register-partner');

Route::get('auth/{provider}/redirect', [SocialLoginController::class , 'redirect'])->name('auth.socialite.redirect');
Route::get('auth/{provider}/callback', [SocialLoginController::class , 'callback'])->name('auth.socialite.callback');

Route::get('/get-product-lists', [ProductController::class,'getProductLists'])->name('get-product-lists');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
//    'auth.acl',
//    'resource.maker',
])->group(function () {

    Route::prefix('influencer')->name('influencer.')->group(function () {
        Route::get('/influencer-profile-verify', [InfluencerViewController::class,'profileVerify'])->name('profile-verify');
        Route::post('/profile-image-update', [InfluencerProfileController::class,'profileImageUpdate'])->name('profile.upload-image');
        Route::post('/request-profile-review', [InfluencerProfileController::class,'requestProfileReview'])->name('request-profile-review');
//        Route::middleware('userApproveStatusCheck')->group(function () {
            Route::get('/dashboard', [InfluencerViewController::class,'dashboard'])->name('dashboard');
            Route::get('/albums', [InfluencerViewController::class,'albums'])->name('albums');
            Route::get('/bank-info', [InfluencerViewController::class,'bankInfo'])->name('bank-info');
            Route::get('/sell-history', [InfluencerViewController::class,'saleHistory'])->name('sell-history');
            Route::get('/profile', [InfluencerViewController::class,'profile'])->name('profile');
            Route::get('/influencer-profile', [InfluencerViewController::class,'profileView'])->name('profile-view');
//        });
    });
    Route::prefix('partner')->name('partner.')->group(function () {
        Route::get('partner-profile-verify', [PartnerViewController::class,'profileVerify'])->name('profile-verify');
//        Route::middleware('userApproveStatusCheck')->group(function () {
            Route::get('partner-dashboard', [PartnerViewController::class,'dashboard'])->name('dashboard');
//        });
    });
});




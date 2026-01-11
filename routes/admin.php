<?php

use App\Helper\HelperClass;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Product\BrandController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Product\ProductCategoryController;
use App\Http\Controllers\Admin\Product\ProductController;

Route::get('login',[AdminController::class,'login'])->name('login');
Route::get('admin',[AdminController::class,'login']);

Route::prefix('admin')->group(function () {
    Route::middleware('web')->group(function () {
        Route::get('login',[AdminController::class,'login']);
        Route::post('/process-to-login',[AdminController::class,'processToLogin']);
        Route::get('/password-reset',[AdminController::class,'resetPassword'])->name('reset.password');
        Route::post('/password-reset',[AdminController::class,'updateResetPw']);
    });
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        /*'password.expiry',*/
        'resource.maker',
        'auth.acl'
    ])->group(function (){
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

        Route::get('/site-settings',[AdminController::class,'siteSettings'])->name('site-settings');
        Route::put('/settings-update',[AdminController::class,'settingsUpdate'])->name('settings-update');

        Route::post('/logout',[AdminController::class,'logout']);
        Route::resource('/roles',RoleController::class);
        Route::resource('/users',UsersController::class);
        Route::post('/user-status',[UsersController::class,'changeStatus'])->name('users.status');
        Route::get('/my-profile',[UsersController::class,'profile']);
        Route::post('/update-profile',[UsersController::class,'updateProfile']);
        Route::get('/password-change',[UsersController::class,'pwChange']);
        Route::post('/update-password',[UsersController::class,'pwUpdate']);

        Route::name('admin.')->group(function () {
            Route::resources([
                'brands'        => BrandController::class,
                'categories'    => ProductCategoryController::class,
                'products'      => ProductController::class,
            ]);
        });
    });
});

Route::get('get-api-date', function (){
    return \Mainul\CustomHelperFunctions\Helpers\CustomHelper::requestApi('http://127.0.0.1:800/api/sync-herlan-brands', 'get', [], []);
    $getData =  \App\Helper\HelperClass::requestApi('https://695cac7d79f2f34749d4f260.mockapi.io/api/all-categories', 'get', [], [], );
    return $getData;
});


<?php

use App\Helper\HelperClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;
use App\Http\Controllers\Api\Influencer\CampaignController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/update-campaign-status', [CampaignController::class, 'updateCampaignStatus']);

Route::get('/test-data', function (Request $request) {
    return \Mainul\CustomHelperFunctions\Helpers\CustomHelper::requestApi('wc-api/v1/products/sku/1400000893'.$request->sku, 'get', [], HelperClass::getRestApiHeaderKey());
});




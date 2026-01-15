<?php

namespace App\Http\Controllers\Front\Influencer;

use App\Helper\HelperClass;
use App\Http\Controllers\Controller;
use App\Models\Campaigns\AffiliateCode;
use App\Models\Campaigns\InfluencerCampain;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class AffiliateCampaignController extends Controller
{
    public function createCampaign(Request $request)
    {
//        return $request->all();
//        try {
//            DB::transaction(function () use ($request) {
//
//            });
//        } catch (\Exception $e) {
//            return CustomHelper::returErrorMessage('Something went wrong. '.$e->getMessage());
//        }
        if ($request->type == 'single')
        {
            $response = CustomHelper::requestApi('wc-api/v1/products/sku/'.$request->sku, 'get', [], HelperClass::getRestApiHeaderKey());
            if ($response['success'] == true && $response['status'] == '200')
            {
                $product = $response['data'];
                $influencerCampaign = InfluencerCampain::createOrEditInfluencerCampain($request, $product);
                $affiliateCode = AffiliateCode::createAffiliateCode($request, $product, $influencerCampaign);
                $apiData = [
                    'campaign_code' => $influencerCampaign->parent_ref_code,
                    'campaign_type' => $request->type,
//            'campaign_full_url' => $request->type,
                    // 'campaign_short_url' => $request->type,
                    'campaign_products' => [
                        'code'  => $affiliateCode->code,
                        'product_sku'  => $affiliateCode->product_sku,
                    ]
                ];

                //                $response = CustomHelper::requestApi('/create-campain-page', 'post', $apiData, HelperClass::getRestApiHeaderKey());
//                if ($response)
//                {
//                    if ($response->status == 200 && $response->success)
//                    {
//                        $responseData = $response['data'];
//                        $influencerCampaign->cam_full_url = $responseData->campaign_full_url;
//                        $influencerCampaign->cam_short_url = $responseData->campaign_short_url;
//                        $influencerCampaign->save();
//                        return CustomHelper::returnSuccessMessage('All campaign data has been saved');
//                    }
//                } else {
//                    return CustomHelper::returErrorMessage('Failed to send data to herlan.');
//                }

                return CustomHelper::returnSuccessMessage('Campaign created successfully');
            } else {
                return response()->json($response);
            }
        } elseif ($request->type == 'album')
        {
            $influencerCampaign = InfluencerCampain::createOrEditInfluencerCampain($request);
            $campaignProductsArray = [];
            foreach ($request->products_sku  as $key => $sku) {
                $response = CustomHelper::requestApi('wc-api/v1/products/sku/'.$request->sku, 'get', [], HelperClass::getRestApiHeaderKey());
                if ($response['success'] == true && $response['status'] == '200')
                {
                    $product = $response['data'];
                    $affiliateCode = AffiliateCode::createAffiliateCode($request, $product, $influencerCampaign);
                    array_push($campaignProductsArray, [
                        'code'  => $affiliateCode->code,
                        'product_sku'  => $affiliateCode->product_sku,
                    ]);
                }
            }
            $apiData = [
                'campaign_code' => $influencerCampaign->parent_ref_code,
                'campaign_type' => $request->type,
                'campaign_products' => $campaignProductsArray
            ];

            //                $response = CustomHelper::requestApi('/create-campain-page', 'post', $apiData, HelperClass::getRestApiHeaderKey());
//                if ($response)
//                {
//                    if ($response->status == 200 && $response->success)
//                    {
//                        $responseData = $response['data'];
//                        $influencerCampaign->cam_full_url = $responseData->campaign_full_url;
//                        $influencerCampaign->cam_short_url = $responseData->campaign_short_url;
//                        $influencerCampaign->save();
//                        return CustomHelper::returnSuccessMessage('All campaign data has been saved');
//                    }
//                } else {
//                    return CustomHelper::returErrorMessage('Failed to send data to herlan.');
//                }

            return CustomHelper::returnSuccessMessage('Campaign created successfully');
        }

//        send data to herlan
        return CustomHelper::returErrorMessage('Campaign creation failed');

    }
}

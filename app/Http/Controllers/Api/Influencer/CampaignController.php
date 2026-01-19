<?php

namespace App\Http\Controllers\Api\Influencer;

use App\Http\Controllers\Controller;
use App\Models\Campaigns\AffiliateCode;
use App\Models\Campaigns\InfluencerCampain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    public function updateCampaignStatus(Request $request)
    {
        $campaign = InfluencerCampain::where('parent_ref_code', $request->campaign_ref_code)->first();
        if ($campaign)
        {
            $affiliatedProduct = AffiliateCode::where(['code' => $request->product_ref_code, 'product_sku' => $request->product_sku])->first();
            try {
                DB::transaction(function () use ($request, $campaign, $affiliatedProduct) {
                    if ($request->status == 'visit')
                    {
                        $campaign->update([
                            'total_viewed'  => ++$campaign->total_viewed,
                        ]);
                        $affiliatedProduct->update([
                            'total_hit'  => ++$affiliatedProduct->total_hit,
                        ]);
                    } elseif ($request->status == 'order')
                    {
                        $affiliatedProduct->update([
                            'total_order'   => ++$affiliatedProduct->total_order,
                        ]);
                    } elseif ($request->status == 'sell')
                    {
                        $affiliatedProduct->update([
                            'total_sell'   => ++$affiliatedProduct->total_sell,
                        ]);
                    }
                });
            } catch (\Exception $exception) {
                return response()->json([
                    'success' => false,
                    'status' => $exception->getCode(),
                    'message' => $exception->getMessage()
                ]);
            }
        }
        return response()->json([
            'success'   => false,
            'status'    => 422,
            'message'   => 'Campaign not found.',
        ]);
    }
}

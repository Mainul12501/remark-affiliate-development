<?php

namespace App\Http\Controllers\Admin\Product;

use App\Helper\HelperClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Product\ProductCommissionRateRequest;
use App\Models\Product\ProductCommissionRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class ProductCommissionRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cruds.product-management.commission-rates', [
            'productCommissionRates' => ProductCommissionRate::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCommissionRateRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $productCommissionRate = ProductCommissionRate::createOrUpdateProductCommissionRate($request);
            });
            return CustomHelper::returnSuccessMessage('Product Commission Rate added successfully');
        } catch (\Exception $exception) {
            return CustomHelper::returErrorMessage('Server Error', $exception->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCommissionRate $productCommissionRate)
    {
        return CustomHelper::returnDataForWebOrApi(['commissionRate' => $productCommissionRate], 'admin.cruds.product-management.includes.edit-commission-rate-form', null, true);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductCommissionRateRequest $request, ProductCommissionRate $productCommissionRate)
    {
        try {
            DB::transaction(function () use ($request, $productCommissionRate) {
                $productCommissionRate = ProductCommissionRate::createOrUpdateProductCommissionRate($request, $productCommissionRate);
            });
            return CustomHelper::returnSuccessMessage('Product Commission Rate added successfully');
        } catch (\Exception $exception) {
            return CustomHelper::returErrorMessage('Server Error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCommissionRate $productCommissionRate)
    {
        $productCommissionRate->delete();
        return CustomHelper::returnSuccessMessage('Product Commission Rate deleted successfully');
    }

    /**
     * Search products from external API
     */
    public function searchProducts(Request $request)
    {
        $search = $request->get('search', '');
        $page = $request->get('page', 1);
        $perPage = $request->get('per_page', 20);

        $products = HelperClass::getProductLists($perPage, $page, $search);

        return response()->json($products);
    }
}

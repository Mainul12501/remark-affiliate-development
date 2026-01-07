<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductBrand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cruds.product-management.brands', [
            'brands'    => ProductBrand::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $status = ProductBrand::syncBrands();
//         $status ? Toastr::success('Brand List Synced Successfully') : Toastr::error('Error!!. Brand List Not Synced');
        if ($status)
        {
            $type = 'success';
            $msg = 'Brand List Synced Successfully';
        } else {
            $type = 'error';
            $msg = 'Error!!. Brand List Not Synced';
        }
         return CustomHelper::returnRedirectWithMessage(route('admin.brands.index'), $type, $msg);
         return redirect(route('admin.brands.index'))->with($msg);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existBrand = ProductBrand::where('herlan_brand_id', $id)->first();
        if ($existBrand)
        {
            $response = ProductBrand::syncBrands($existBrand, $request);
            if ($response)
            {
                return response()->json(['status' => 'success', 'message' => 'Brand List Synced Successfully.']);
            }
            return response()->json(['status' => 'error', 'message' => 'Something Went Wrong. Please try again.']);
        }
        return response()->json(['status' => 'error', 'message' => 'Failed to update Brand. Brand not found.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = ProductBrand::destroy($id);
        $status ? $msg = ['message' => 'Brand deleted Successfully', 'alert-type' => 'success'] : $msg = ['message' => 'Error!!. Can Not delete the brand', 'alert-type' => 'error'];
        return redirect(route('admin.brands.index'))->with($msg);
    }
}

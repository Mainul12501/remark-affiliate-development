<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use Illuminate\Http\Request;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cruds.product-management.category', [
            'categories' => ProductCategory::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = ProductCategory::syncProductCategory();
        if ($response['success']) {
            $type = 'success';
            $msg = 'Category List Synced Successfully';
        } else {
            $type = 'error';
            $msg = $response['message'];
        }
        return CustomHelper::returnRedirectWithMessage(route('admin.categories.index'), $type, $msg);
        return redirect(route('admin.categories.index'))->with($msg);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $category = ProductCategory::where('herlan_cat_id', $id)->first();
        if ($category) {
            $response = ProductCategory::updateProductCategory($request, $category);
            if ($response) {
                return response()->json(['status' => 'success', 'message' => 'Category Updated Successfully.']);
            }
        }
        return response()->json(['status' => 'error', 'message' => 'Failed to update Category. Category not found.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ProductCategory::destroy($id);
        return CustomHelper::returnRedirectWithMessage(route('admin.categories.index'),'success', 'Category Deleted Successfully.');
    }
}

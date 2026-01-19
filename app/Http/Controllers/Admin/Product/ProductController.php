<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cruds.product-management.product', [
            'products' => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Product::syncProductList();
        if ($response){
            $msg = 'Product list successfully created!';
            $type = 'success';
        } else {
            $msg = 'Product list failed to created!';
            $type = 'error';
        }
        return CustomHelper::returnRedirectWithMessage(route('admin.products.index'), $type, $msg);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::destroy($id);
        return CustomHelper::returnSuccessMessage('Product successfully deleted!');
    }

    public function getProductLists(Request $request)
    {
        $products = Product::query();
        if ($request->filled('category') && $request->category != 'null') {
            $products->whereHas('productCategories', function ($q) use ($request) {
                $q->where('slug', $request->input('category'));
            });
        }

        if ($request->filled('query') && $request->query != 'null') {
            $products->where('title', 'like', '%' . $request->input('query') . '%');
        }

        $products = $products->latest()->select('id','thumb_img', 'title', 'slug', 'product_brand_id', 'price', 'regular_price')->with(['productBrand' => function ($brand) {
            return $brand->select('id', 'name');
        }])->paginate(10);
        if ($request->render == 1)
        {
            return view('front.influencer.includes.albums.single-product-album', ['products' => $products, 'forAlbum' => $request->for_album == 1 ])->render();
        }
        return response()->json([
            'status' => 200,
            'products' => $products
        ]);
    }
}

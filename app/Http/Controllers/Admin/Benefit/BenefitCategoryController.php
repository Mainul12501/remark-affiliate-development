<?php

namespace App\Http\Controllers\Admin\Benefit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bank\CommonRequests\BenefitCategoryRequest;
use App\Models\BenefitListCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class BenefitCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cruds.frontend-benefit.benefit-category', ['benefitCategories' => BenefitListCategory::latest()->get()]);
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
    public function store(BenefitCategoryRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $category = BenefitListCategory::createOrUpdateCategory($request);
            });
            return CustomHelper::returnSuccessMessage('Category created successfully');
        } catch (\Exception $exception) {
            \Log::error('Benefit Category Store Error', [
                'error' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
                'request_data' => $request->all()
            ]);
            return CustomHelper::returErrorMessage('Something Went Wrong. '.$exception->getMessage());
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
    public function edit(Request $request, String $id)
    {
        $category = BenefitListCategory::find($id);
        if ($request->filled('render')) {
            return view('admin.cruds.frontend-benefit.category-edit-form', ['category' => $category])->render();
        }
        return response()->json([
            'status'    => 'success',
            'category'   => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BenefitCategoryRequest $request, $id)
    {
        try {
            $category = BenefitListCategory::find($id);
            DB::transaction(function () use ($request, $category) {
                $category = BenefitListCategory::createOrUpdateCategory($request, $category);

            });
            return CustomHelper::returnSuccessMessage('Category updated successfully');
        } catch (\Exception $exception) {
            return CustomHelper::returErrorMessage('Something Went Wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $category = BenefitListCategory::find($id);
        $category->delete();
        return CustomHelper::returnRedirectWithMessage(route('admin.benefit-categories.index'),'success', 'Category deleted successfully');
    }
}

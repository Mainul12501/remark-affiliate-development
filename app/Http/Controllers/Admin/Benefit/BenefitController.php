<?php

namespace App\Http\Controllers\Admin\Benefit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bank\CommonRequests\BenefitCategoryRequest;
use App\Http\Requests\Bank\CommonRequests\BenefitRequest;
use App\Models\BenefitList;
use App\Models\BenefitListCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cruds.frontend-benefit.benefit', [
            'benefitCategories' => BenefitListCategory::latest()->withoutTrashed()->get(['id', 'title', 'user_type']),
            'benefits' => BenefitList::latest()->with(['benefitListCategory' => function ($category) {
                return $category->select('id', 'title');
            }])->get()
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
    public function store(BenefitRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                BenefitList::createOrUpdateBenefit($request);
            });
            return CustomHelper::returnSuccessMessage('Benefit Info created successfully');
        } catch (\Exception $exception) {
            \Log::error('Benefit Store Error', [
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
    public function edit(Request $request, BenefitList $benefitList)
    {
        if ($request->filled('render')) {
            return view('admin.cruds.frontend-benefit.benefit-edit-form', [
                'benefit' => $benefitList,
                'benefitCategories' => BenefitListCategory::latest()->withoutTrashed()->get(['id', 'title', 'user_type']),
            ])->render();
        }
        return response()->json([
            'status'    => 'success',
            'benefit'   => $benefitList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BenefitRequest $request, BenefitList $benefitList)
    {
        try {
            DB::transaction(function () use ($request, $benefitList) {
                BenefitList::createOrUpdateBenefit($request, $benefitList);

            });
            return CustomHelper::returnSuccessMessage('Benefit updated successfully');
        } catch (\Exception $exception) {
            return CustomHelper::returErrorMessage('Something Went Wrong. '.$exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BenefitList $benefitList)
    {
        $benefitList->delete();
        return CustomHelper::returnRedirectWithMessage(route('admin.benefit-lists.index'),'success', 'Benefit deleted successfully');
    }
}

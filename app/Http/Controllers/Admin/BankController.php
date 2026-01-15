<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CommonRequests\BankRequest;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cruds.common-crud-management.bank', ['banks' => Bank::latest()->get()]);
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
    public function store(BankRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $bank = Bank::createOrUpdateBank($request);
            });
            return CustomHelper::returnSuccessMessage('Bank created successfully!');
        } catch (\Exception $exception) {
            return CustomHelper::returErrorMessage('Something went wrong. Error: ', $exception->getMessage());
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
    public function edit(string $id)
    {
        return view('admin.common-views.includes.bank-form', ['bank' => Bank::find($id)])->render();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        try {
            DB::transaction(function () use ($request, $bank) {
                $bank = Bank::createOrUpdateBank($request, $bank);
            });
            return CustomHelper::returnSuccessMessage('Bank updated successfully!');
        } catch (\Exception $exception) {
            return CustomHelper::returErrorMessage('Something went wrong. Error: ', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Bank::destroy($id);
        return CustomHelper::returnSuccessMessage('Bank deleted successfully!');
    }
}

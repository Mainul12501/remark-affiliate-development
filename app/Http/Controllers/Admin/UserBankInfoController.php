<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CommonRequests\UserBankInfoRequest;
use App\Models\UserBankInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class UserBankInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(UserBankInfoRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $loggedUser = CustomHelper::loggedUser();
                $userInfo = $loggedUser->userInfo()->update([
                    'tin_number'    => $request['tin_number'],
                    'tin_cert_img'    => CustomHelper::fileUpload($request->file('tin_cert_img'), 'tin-certificates', 'tin-',600, 800, $loggedUser->tin_cert_img ?? null),
                ]);
                UserBankInfo::createOrUpdateBankInfo($request);
            });

            return CustomHelper::returnSuccessMessage('Bank Info stored Successfully.');
        } catch (\Exception $exception) {
            return CustomHelper::returErrorMessage('Something went wrong. '.$exception->getMessage());
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
        //
    }
}

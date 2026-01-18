<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class UserBankInfo extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'bank_id',
        'account_name',
        'branch_name',
        'routing_number',
        'cheque_img',
        'vendor_type',
        'mobile_vendor',
        'mobile_number',
        'status',
        'active_status',
        'active_till',
        'account_number',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'user_bank_infos';

    public static function createOrUpdateBankInfo($request)
    {
        $loggedUser = CustomHelper::loggedUser();
//        $loggedUser->tin_number = $request->tin_number;
//        $loggedUser->tin_cert_img = CustomHelper::fileUpload($request->file('tin_cert_img'), 'tin-certificates', 'tin-', $loggedUser->tin_cert_img ?? null);

        $userBankInfo = UserBankInfo::where('user_id', $loggedUser->id)->first();
        if (empty($userBankInfo)) {
            $userBankInfo = new UserBankInfo();
        }
        $userBankInfo->user_id = $loggedUser->id;
        $userBankInfo->bank_id = $request->bank_id;
        $userBankInfo->account_name = $request->account_name;
        $userBankInfo->account_number = $request->account_number;
        $userBankInfo->branch_name = $request->branch_name;
        $userBankInfo->routing_number = $request->routing_number;
        $userBankInfo->cheque_img = CustomHelper::fileUpload($request->file('cheque_img'), 'user-bank-cheque-imgs', 'user-bank-cheque-img' , 600, 600,$userBankInfo->cheque_img ?? null);
        $userBankInfo->mobile_vendor = $request->mobile_vendor;
        $userBankInfo->mobile_number = $request->mobile_number;
//        $userBankInfo->vendor_type = $request->vendor_type;
//        $userBankInfo->status = $request->status;
//        $userBankInfo->active_status = $request->active_status;
//        $userBankInfo->active_till = $request->active_till;
        $userBankInfo->save();
        return $userBankInfo;
//        return static::updateOrCreate(['id'=>$userInfo->id], [
//            'user_id',
//            'bank_id',
//            'account_name',
//            'branch_name',
//            'routing_number',
//            'cheque_img',
//            'vendor_type',
//            'mobile_vendor',
//            'mobile_number',
//            'active_status',
//            'account_number',
//        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}

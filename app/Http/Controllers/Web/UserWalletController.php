<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\WalletTransaction;
use App\CPU\Helpers;
use Brian2694\Toastr\Facades\Toastr;

class UserWalletController extends Controller
{
    public function index()
    {
        $wallet_status = Helpers::get_business_settings('wallet_status');
        $user = auth('customer')->check() ? auth('customer')->user() : auth('seller')->user();
        if($wallet_status == 1)
        {
            $total_wallet_balance = $user->wallet_balance;
        $wallet_transactio_list = WalletTransaction::where('user_id',$user->id)
                                                    ->latest()
                                                    ->paginate(15);
        return view('web-views.users-profile.user-wallet',compact('total_wallet_balance','wallet_transactio_list'));
        }else{
            Toastr::warning(\App\CPU\translate('access_denied!'));
            return back();
        }
    }
}

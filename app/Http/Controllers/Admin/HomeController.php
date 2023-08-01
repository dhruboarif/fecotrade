<?php

namespace App\Http\Controllers\Admin;

use App\Models\CashWallet;
use App\Models\MiningWallet;
use App\Models\BonusWallet;
use App\Models\User;
use Auth;
use App\Models\TransferWallet;
use App\Models\Withdraw;
use App\Models\Purchase;
use App\Models\PackageSetting;
use Carbon\Carbon;


class HomeController
{
    public function index()
    {
        $url = request()->url();
        $user = Auth::user();
        $data['referral'] = User::where('sponsor', $user->id)->orderBy('id', 'desc')->paginate(1);

        $data['level_bonus'] = BonusWallet::where([
            'method' => 'Level Bonus',
            'status' => 'approved',
            'user_id' => $user->id
        ])->orderBy('id', 'desc')->paginate(1);

        $data['level_bonus_earn'] = BonusWallet::where([
            'method' => 'Level Bonus',
            'status' => 'approved',
            'user_id' => $user->id,
            'type' => 'Credit'
        ])->sum('amount');

        $data['total_cash_withdraw'] = CashWallet::where([
            'user_id' => $user->id,
            'type' => 'Debit',
            'status' => 'approved',
        ])->sum('amount');

        $data['total_cash'] = CashWallet::where([
            'user_id' => $user->id,
            'type' => 'Credit',
            'status' => 'approved',
        ])->sum('amount');

        $data['cash_wallet'] = CashWallet::where('user_id', $user->id)->where('status', 'approved')->sum('amount');
        $data['bonus_wallet'] = BonusWallet::where('user_id', $user->id)->where('status', 'approved')->sum('amount');
        $data['mining_wallet'] = MiningWallet::where('user_id', $user->id)->where('status', 'approved')->sum('amount');
        $data['transfer_wallet'] = TransferWallet::where('user_id', $user->id)->where('status', 'approved')->sum('amount');
$data['transaction_history'] = MiningWallet::where('method', 'Daily Bonus')
    ->where('amount','>',0)
    ->where('user_id', Auth::user()->id)
    ->orderByDesc('created_at')
    ->get();
$data['level_bonus_history'] = BonusWallet::where('method', 'Level Bonus')
->where('user_id', Auth::user()->id)
->orderByDesc('created_at')
->get();
$data['affiliateuser'] = User::where('sponsor', Auth::id())->get();
$data['total_withdraw'] = Withdraw::where('user_id', Auth::id())->where('status', 'approved')->sum('amount');
$data['total_deposit'] = CashWallet::where('user_id', $user->id)->where('method', 'deposit')->where('status', 'approved')->sum('amount');
$data['assets'] = Purchase::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();


$today = Carbon::today();
// Create a new Carbon instance representing midnight of the current day
            $midnight = Carbon::today();
            
$data['dailybonus'] = MiningWallet::where('method', 'Daily Bonus')
->where('amount','>',0)
->where('user_id', Auth::user()->id)
->whereDate('created_at', '=', $today->startOfDay())
->sum('amount');



             $currentTime1 = Carbon::now()->timezone('Asia/Dhaka');

            // Create a new Carbon instance representing midnight of the current day
            $midnight = Carbon::today();
        
            // Calculate the difference between the current time and midnight in seconds
            $secondsFromMidnight = $currentTime1->diffInSeconds($midnight);

// dd($secondsFromMidnight);
        

$userId = Auth::id();

$data['user_price'] = Purchase::where('user_id', $userId)
        ->join('package_settings', 'purchases.package_id', '=', 'package_settings.id')
        ->sum('package_settings.price');

// Purchase::select(‘purchases.*’)->join(‘package_settings’,’package_settings.id’, ‘purchases.package_id’)->where(‘purchases.user_id’,Auth::id())->sum(‘package_settings.price’);

         if($user->user_name === "admin"){
                return view('home1', compact('data'));
            }else{
                return view('home', compact('data'));
            }
    }
    public function approveWithdrawalRequest()
    {
        $withdrawals = Withdraw::orderBy('id','desc')->get();

        return view('admin.withdrawal_request', compact('withdrawals'));
    }
    public function approveWithdrawal($id,$status)
    {
        
        $withdraw = Withdraw::find($id);
        if($status == 'approve')
        {
            $withdraw->status= 'approved';
             $withdraw->save();
        }else 
        {
            $withdraw->status = 'rejected';
            $withdraw->save();
            $refund= new TransferWallet();
      $refund->user_id = $withdraw->user_id;
      $refund->amount = $withdraw->amount;
      //$deduct->method=$method;

      $refund->method = 'Withdrawal Refund';
      $refund->type = 'Credit';
      $refund->status = 'approved';
      $refund->description = 'Requested withdrwal rejected and amount '.$withdraw->amount . ' Gala resettled to transfer wallet';
      $refund->save();
            
        }

        return back()->with('Money_added', 'Successfully approved withdwal request');
    }
    
  
}

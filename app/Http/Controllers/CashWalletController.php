<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CashWallet;
use App\Models\TransferWallet;
use Auth;
use App\Models\Purchase;
class CashWalletController extends Controller
{
    public function index()
    {
        $cashwallet_history = CashWallet::where('method','Deposit')->where('user_id',Auth::user()->id)->get();

        return view('users.cashwallet.index', compact('cashwallet_history'));
    }
    public function store(Request $request)
    {
        //dd($request);
         $deposit = new CashWallet();

    $deposit->user_id = Auth::id();
    $deposit->amount = $request->amount;
    //$deposit->method=$method;
    $deposit->wallet_id= $request->wallet_id;

    $deposit->method = 'Deposit';
    $deposit->type = 'Credit';
    $deposit->status = 'pending';
    $deposit->description= 'Requested Deposit amount '.$request->amount. ' from '.Auth::user()->user_name;
    $deposit->txn_id = $request->txn_id;
    $deposit->save();

      return back()->with('Money_added', 'Successfully Added Funds. Waiting for the Confirmation!!');
    }
    
    public function approve($id)
    {
        $deposit = CashWallet::find($id);
        $deposit->status = 'approved';
        $deposit->save();
        return back()->with('Money_added', 'Approved. Successfully approved add fund request!!');
    }
     
    public function reject($id)
    {
        $deposit = CashWallet::find($id);
        $deposit->status = 'rejected';
        $deposit->save();
        return back()->with('Money_rejected', 'Rejected. Successfully rejected add fund request!!');
    }
    public function myAsset()
    {
        $assets = Purchase::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        //dd($assets);
         return view('users.cashwallet.my_asset', compact('assets'));
    }
    
    public function convert(Request $request)
    {
       // dd($request);
         $data['transfer_wallet']=TransferWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
         
          if($data['transfer_wallet'] < $request->amount)
    {
        return back()->with('error', 'Insufficent Balance');
    };
    if($request->amount <= 0) {
            return back()->with('error', 'Incorrect amount');
        };
    
    $deduct= new TransferWallet();
      $deduct->user_id = $request->user_id;
      $deduct->amount = -($request->amount);
      //$deduct->method=$method;

      $deduct->method = 'Convert Money';
      $deduct->type = 'Debit';
      $deduct->status = 'approved';
      $deduct->description = 'Converted '.$request->amount . ' from Transfer Wallet to Gala Wallet';
      $deduct->save();
      $add= new CashWallet();
      $add->user_id = $request->user_id;
      $add->amount = ($request->amount);
      //$deduct->method=$method;

      $add->method = 'Transfer Money';
      $add->type = 'Debit';
      $add->status = 'approved';
      $add->description = 'Converted '.$request->amount . ' from Transfer Wallet to Gala Wallet';
      $add->save();
      return back()->with('Money_added', 'Successfully Converted Fund');
    }
}

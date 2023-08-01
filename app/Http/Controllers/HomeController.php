<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BonusWallet;
use App\Models\TransferWallet;
use Auth;
use App\Models\User;
use App\Models\UserWithdrawSetting;
use App\Models\Withdraw;
use App\Models\GeneralSetting;


use App\Models\MiningWallet;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function DailyBonus()
    {
        $transaction_history = MiningWallet::where('method', 'Daily Bonus')->where('amount','>',0)->where('user_id', Auth::user()->id)->get();

        return view('users.daily_bonus_history', compact('transaction_history'));
    }
    public function LevelBonus()
    {
        $transaction_history = BonusWallet::where('method', 'Level Bonus')->where('user_id', Auth::user()->id)->get();

        return view('users.level_bonus_history', compact('transaction_history'));
    }
    public function affilate_index()
    {
        $users = User::where('sponsor', Auth::id())->get();

        return view('admin.users.affilates', compact('users'));
    }
     public function my_tree()
    {
        $users = User::where('sponsor', Auth::id())->get();

        return view('users.my_tree', compact('users'));
    }
    
    public function TransferFund()
    {
        $mining_wallet= MiningWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
        $bonus_wallet= BonusWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
        $transfer_wallet_history= TransferWallet::where('user_id',Auth::id())->where('status','approved')->where('method','Transfer Money')->get();
        return view('users.transfer_fund', compact('mining_wallet','bonus_wallet','transfer_wallet_history'));
    }
    public function TransferFundStore(Request $request)
    {
        if ($request->amount < 10) {
        return back()->with('error', 'Invalid value. Amount must be at least 10.');
        }
        
        if($request->wallet == 'Mining Wallet')
        {
            $data['mining_wallet']=MiningWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
         
          if($data['mining_wallet'] < $request->amount)
    {
        return back()->with('error', 'Insufficent Balance');
    };
    if($request->amount <= 0) {
            return back()->with('purchase_error', 'Incorrect amount');
        };
    
    
      $deduct= new MiningWallet();
      $deduct->user_id = $request->user_id;
      $deduct->amount = -($request->amount);
      //$deduct->method=$method;

      $deduct->method = 'Transfer Money';
      $deduct->type = 'Debit';
      $deduct->status = 'approved';
      $deduct->description = 'Transfered '.$request->amount . ' from Mining Wallet to Transfer Wallet';
      $deduct->save();
      $add= new TransferWallet();
      $add->user_id = $request->user_id;
      $add->amount = ($request->amount);
      //$deduct->method=$method;

      $add->method = 'Transfer Money';
      $add->type = 'Debit';
      $add->status = 'approved';
      $add->description = 'Transfered '.$request->amount . ' from Mining Wallet to Transfer Wallet';
      $add->save();
      return back()->with('Money_added', 'Successfully Transfered money');
            
        }
        elseif($request->wallet == 'Bonus Wallet')
        {
                      $data['bonus_wallet']=BonusWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
         
          if($data['bonus_wallet'] < $request->amount)
    {
        return back()->with('error', 'Insufficent Balance');
    };
    
    
      $deduct= new BonusWallet();
      $deduct->user_id = $request->user_id;
      $deduct->amount = -($request->amount);
      //$deduct->method=$method;

      $deduct->method = 'Transfer Money';
      $deduct->type = 'Debit';
      $deduct->status = 'approved';
      $deduct->description = 'Transfered '.$request->amount . ' from Bonus Wallet to Transfer Wallet';
      $deduct->save();
      $add= new TransferWallet();
      $add->user_id = $request->user_id;
      $add->amount = ($request->amount);
      //$deduct->method=$method;

      $add->method = 'Transfer Money';
      $add->type = 'Debit';
      $add->status = 'approved';
      $add->description = 'Transfered '.$request->amount . ' from Bonus Wallet to Transfer Wallet';
      $add->save();
      return back()->with('Money_added', 'Successfully Transfered money');
            
            
        }
            
        
        
    }
     public function WithdrawSetting()
    {
      
        $wallet_settings= UserWithdrawSetting::where('user_id',Auth::id())->get();
        return view('users.withdrawal_settings', compact('wallet_settings'));
    }
    
    public function WithdrawEdit($id)
    {
        // Fetch the wallet with the given ID from the database
        $wallet = Wallet::findOrFail($id);
       

        return view('users.withdrawal_settings', compact('wallet'));
    }
    
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'wallet_name' => 'required|string|max:255',
            // Add other validation rules for the fields you want to update
        ]);

        // Find the wallet by ID from the database
        $wallet = Wallet::findOrFail($id);

        // Update the wallet attributes based on the incoming request data
        $wallet->update($request->all());

        // Redirect to the view showing the list of wallets or any other desired route
        return redirect()->route('wallets.index')->with('success', 'Wallet updated successfully.');
    }
    
    public function WithdrawSettingStore(Request $request)
    {
      $user_setting = new UserWithdrawSetting();
      $user_setting->user_id= Auth::id();
      $user_setting->wallet_name= $request->wallet_name;
      $user_setting->wallet_id= $request->wallet_id;
      $user_setting->status = $request->status;
      $user_setting->save();
        return back()->with('Money_added', 'Successfully added withdrwal wallet');
    }
    public function Withdraw(Request $request)
    {
        $data['transfer_wallet']=TransferWallet::where('user_id',Auth::id())->where('status','approved')->sum('amount');
        $withdraw_setting= GeneralSetting::first();
        if($data['transfer_wallet'] < $request->amount) {
            return back()->with('purchase_error', 'Insufficent Balance');
        };
        if($request->amount <= 0) {
            return back()->with('purchase_error', 'Incorrect amount');
        };
       $withdraw= new Withdraw();
       $withdraw->user_id = $request->user_id;
       $withdraw->amount = $request->amount;
       $withdraw->payable_amount = $request->amount - ( $request->amount * $withdraw_setting->withdraw_charge/100);
       $withdraw->wallet_name= $request->wallet_name;
       $withdraw->wallet_id= $request->wallet_id3;
       $withdraw->status = 'pending';
       $withdraw->save();
        $deduct= new TransferWallet();
      $deduct->user_id = $request->user_id;
      $deduct->amount = -($request->amount+ $request->amount * $withdraw_setting->withdraw_charge/100);
      //$deduct->method=$method;

      $deduct->method = 'Withdrawal';
      $deduct->type = 'Debit';
      $deduct->status = 'approved';
      $deduct->description = 'Requested withdrwal amount '.$request->amount . ' Gala';
      $deduct->save();
       
       
       return back()->with('Money_added', 'Successfully added withdrwal request');
    }
    
    public function UpdateMining(){
        
       
    $today = Carbon::today();
    // Create a new Carbon instance representing midnight of the current day
                $midnight = Carbon::today();
                
    $data['dailybonus'] = MiningWallet::where('method', 'Daily Bonus')
    ->where('amount','>',0)
    ->where('user_id', Auth::user()->id)
    ->whereDate('created_at', '=', $today->startOfDay())
    ->sum('amount');

            $currentTime = Carbon::now('Asia/Dhaka');

    // Get the start of the day (midnight) in the same timezone
    $startOfDay = $currentTime->copy()->startOfDay();
    
    
    // Calculate the total seconds from the start of the day to the current time
    $totalSeconds = $currentTime->diffInSeconds($startOfDay);
        //dd( $totalSeconds);

    $dailyBonus = number_format($data['dailybonus'] / 86400 * $totalSeconds, 3);
    return response()->json(['dailybonus' => $dailyBonus]);
    }
    
    
    
}

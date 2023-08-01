<div class="modal fade text-left" id="withdrawfund" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Withdraw Fund</h4>
                <button type="button" class="btn-primary close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <section id="multiple-column-form">
                  <div class="row">
                      <div class="col-12">
                          <div class="card">

                              <div class="card-body">

                              <form method="post" action="{{route('make-withdraw')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                  <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Transfer Wallet Balance</label>
    
                                <input type="text" disabled value="{{ $data['transfer_wallet'] }}" class="form-control" required/>
                            </div>

                       <div class="mb-3">
    <?php
    $user_wallets = App\Models\UserWithdrawSetting::where('user_id', Auth::id())->where('status', 1)->get();
    $general_setting= App\Models\GeneralSetting::first();
    ?>
    <label for="email-id-column">Select Gateway<span class="text-danger">*</span></label>
    <select id="DestinationOptions3" name="wallet_name" class="form-control" aria-label="Default select example" required">
        <option label="Choose Wallet"></option>
        @foreach($user_wallets as $payment)
        <option id="{{$payment->wallet_id}}" value="{{$payment->wallet_id}}">{{$payment->wallet_name}}</option>
        @endforeach
    </select>
</div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Wallet or Account No.</label>
                                <input type="text" name="wallet_id3" id="wallet_id3" class="form-control" readonly>

                                <button onclick="copyText()">Copy Wallet or Account No</button>
                            </div>
                          
    
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Amount (Gala)</label>
                                <input type="round" min="{{$general_setting->min_withdraw}}" class="form-control" name="amount" placeholder="Enter Amount" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    
                            </div>
                            
                            
                     </div>
                          </div>
                      </div>
                  </div>
              </section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Withdraw</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
            </div>
              </form>
        </div>
    </div>
</div>

<script>
function copyText() {
  var copyText = document.getElementById("wallet_id");
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
  alert("Wallet & Account copied: " + copyText.value);
}
</script>





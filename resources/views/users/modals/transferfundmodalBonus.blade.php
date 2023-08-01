<div class="modal fade text-left" id="transferbonus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel_bonus1">Bonus Wallet to Withdraw Wallet</h4>
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

                              <form method="post" action="{{route('transfer-fund-store')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                       


                                
                                <div class="mb-3" style="display: none;">
                                    <label for="email-id-column">Select Wallet<span
                                            class="text-danger">*</span></label>
                                 <select  name="wallet" class="form-control" aria-label="Default select example" required>
                                     <option label="Choose Wallet"></option>
                                 <option value="Bonus Wallet" selected>From Bonus Wallet</option>
                               </select>
                                 </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Amount (Gala)</label>
                            <input type="round" class="form-control" name="amount" placeholder="Enter Amount" id="exampleInputEmail1" aria-describedby="emailHelp" required>

                        </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Transfer</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
              </form>
        </div>
    </div>
</div>

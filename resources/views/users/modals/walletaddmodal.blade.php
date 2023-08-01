<div class="modal fade text-left" id="walletadd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Add Wallet</h4>
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

                              <form method="post" action="{{route('add-wallet')}}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                     <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Wallet Name</label>

                            <input type="text" name="wallet_name"  class="form-control"required/>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Wallet or Account No.</label>

                            <input type="text" name="wallet_id"  class="form-control"required/>
                        </div>
                         

                        <div class="mb-3">

                         
                           <label for="email-id-column">Status<span
                                   class="text-danger">*</span></label>
                        <select  name="status" class="form-control" aria-label="Default select example" required>
                            <option label="Choose Status"></option>
                          

                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                        
                      </select>
                        </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add wallet</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Discard</button>
            </div>
              </form>
        </div>
    </div>
</div>

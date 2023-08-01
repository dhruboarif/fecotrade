<div class="modal fade text-left" id="myaffiliate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">                          My First Generation Affiliate
</h4>
                <button type="button" class="btn-primary close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <section id="multiple-column-form">
                  @php
                    $affiliate_firstgenetraion=App\Models\User::where('sponsor',Auth::id())->get();
                         
                    @endphp
                          
                  <div class="row">
                    @foreach ($affiliate_firstgenetraion as $user)
                    <div class="col-md-4 mb-3 text-white">
                        <div class="card">
                            <img src="https://i.pravatar.cc" class="card-img-top" alt="{{ $user->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">{{ $user->email }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                

              </section>
            </div>
            <div class="modal-footer">
    
                
            </div>
              </form>
        </div>
    </div>
</div>

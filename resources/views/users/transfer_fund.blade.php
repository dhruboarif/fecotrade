@extends('layouts.main')
@section('content')

<div class="card">
    @if(Session::has('Money_added'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
             <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
             {{Session::get('Money_added')}}
         </div>
     </div>
     @elseif(Session::has('error')) 
        <div class="alert alert-danger d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
             <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
             {{Session::get('error')}}
         </div>
     </div>
     
     @endif
    <div class="card-header text-white">
        Transfer Fund
    </div>

    <div class="card-body">
        <a class="btn btn-success mb-5" href="#" data-toggle="modal" data-target="#transferfund">Transfer Fund</a>
         @include('users.modals.transferfundmodal')
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-cashWallet">
                <thead class="text-white">
                    <tr class="tr-bg">
                         <th width="20">

                        </th>
                      
                        <th>
                            SL
                        </th>
                        <th>
                           Transfer Method
                        </th>
                       
                        <th>
                           Amount
                        </th>
                        <th>
                           Status
                        </th>
                        
                        <th>
                            Date
                        </th>
                        <th>
                            &nbsp;
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($transfer_wallet_history as $key => $wallet)
                        <tr data-entry-id="{{ $wallet->id }}">
                            <td></td>
                            <td>
                                {{$loop->index+1}}

                            </td>
                            <td>
                               {{$wallet->description}}
                            </td>
                            <td>
                               {{$wallet->amount}}
                            </td>
                            <td>
                               {{$wallet->status}}
                            </td>
                          
                            
                            <td>
                                {{$wallet->created_at}}
                            </td>
                            
                            <td></td>
                            
                           
                          
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-cashWallet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
 <script type="text/javascript">

            //alert('success');
            //console.log(this.getAttribute('id'));
            //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
            //var wallet=  document.getElementById("wallet_id");
            //wallet.innerHTML= id.value;
            document.getElementById('DestinationOptions').addEventListener('change', function (e) {
                var wallet2 = e.target.options[e.target.selectedIndex].getAttribute('id');
                //console.log(wallet2);
                var wallet = document.getElementById("wallet_id").value = wallet2;
                //console.log(wallet);
                //wallet.innerHTML= wallet2;
            });

            //  document.getElementById('').value(id.value);


        </script>
@endsection
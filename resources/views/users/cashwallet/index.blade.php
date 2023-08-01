@extends('layouts.main') 
@section('title', 'Deposit History')
@section('content')

    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 


    <div class="container-fluid">

       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class=" text-white">{{ __('Deposit History')}}</h3></div>
                    <div class="card-header">
        Add Fund Request
    </div>
                    <div class="card-body text-white">
                        <a class="btn btn-success mb-5" href="#" data-toggle="modal" data-target="#addfund">Add Fund</a>
         @include('users.modals.addfundmodal')
                        <table id="data_table" class="table text-white">
                            <thead>
                    <tr class="tr-bg">
                         <th width="20">

                        </th>
                      
                        <th>
                            SL
                        </th>
                        <th>
                           Deposit Method
                        </th>
                        <th>
                            Transcation ID
                        </th>
                        <th>
                           Amount
                        </th>
                        <th>
                           Status
                        </th>
                        <th>
                           Request Date
                        </th>
                        <th>
                            Approval Date
                        </th>
                        <th>
                            &nbsp;
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($cashwallet_history as $key => $cashwallet)
                        <tr data-entry-id="{{ $cashwallet->id }}">
                            <td></td>
                            <td>
                                {{$loop->index+1}}

                            </td>
                            <td>
                               {{$cashwallet->type}}
                            </td>
                            <td>
                               {{$cashwallet->txn_id}}
                            </td>
                            <td>
                               {{$cashwallet->amount}}
                            </td>
                          
                            
                            <td>
                                {{$cashwallet->status}}
                            </td>
                            <td>
                                {{$cashwallet->created_at}}
                            </td>
                            <td>
                               @if($cashwallet->status != 'pending')
                               {{$cashwallet->updated_at}}
                               @else 
                               --
                               @endif
                            </td>
                            <td></td>
                            
                           
                          
                        </tr>
                    @endforeach
                </tbody>
                            
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
               <script type="text/javascript">

            //alert('success');
            //console.log(this.getAttribute('id'));
            //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
            //var wallet=  document.getElementById("wallet_id");
            //wallet.innerHTML= id.value;
            document.getElementById('DestinationOptions').addEventListener('change', function (e) {
                var wallet2 = e.target.options[e.target.selectedIndex].getAttribute('id');
                console.log(wallet2);
                var wallet = document.getElementById("wallet_id").value = wallet2;
                console.log(wallet);
                //wallet.innerHTML= wallet2;
            });

            //  document.getElementById('').value(id.value);


        </script>

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
      

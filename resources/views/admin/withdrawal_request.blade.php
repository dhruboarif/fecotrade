@extends('layouts.admin')
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
      @elseif(Session::has('Money_rejected'))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24">
             <use xlink:href="#check-circle-fill" />
         </svg>
         <div>
             {{Session::get('Money_rejected')}}
         </div>
     </div>
     
     @endif
    <div class="card-header">
        Withdrwal Request
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-CashWallet">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                           Sl
                        </th>
                        <th>
                           UserName
                        </th>
                        <th>
                            Method
                        </th>
                        <th>
                            Wallet ID
                        </th>
                        <th>
                            Amount
                        </th>
                        <th>
                          Payable Amount
                        </th>
                       
                        <th>
                            Status
                        </th>
                         <th>
                            Action
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($withdrawals as $key => $row)
                        <tr data-entry-id="{{ $row->id }}">
                            <td>

                            </td>
                            <td>
                                {{$loop->index+1}}
                            </td>
                            <td>
                                {{ $row->user->user_name ?? '' }}
                            </td>
                            <td>
                                {{ $row->wallet_name ?? '' }}
                            </td>
                             <td>
                                {{ $row->wallet_id ?? '' }}
                            </td>
                            <td>
                                {{ $row->amount ?? '' }}
                            </td>
                             <td>
                                {{ $row->payable_amount ?? '' }}
                            </td>
                           
                           
                            
                            
                            <td>
                               {{$row->status}}
                            </td>
                            <td>
                               
                                @if($row->status == 'pending')
                                 <a class="btn btn-xs btn-success" href="/admin/withdrwal-request-approve/{{$row->id}}/approve">
                                        Approve
                                    </a>
                                     <a class="btn btn-xs btn-danger" href="/admin/withdrwal-request-approve/{{$row->id}}/reject">
                                        Reject
                                    </a>
                                
                                
                                @else 
                                No Action Needed 
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
  let table = $('.datatable-CashWallet:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
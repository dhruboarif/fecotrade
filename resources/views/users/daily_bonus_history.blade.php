@extends('layouts.main') 
@section('title', 'Daily Bonus History')
@section('content')

    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
 


   
       
        <div class="row">
            <div class="col-md-12 text-white">
                <div class="card">
                    <div class="card-header"><h3 class="text-white">{{ __('Daily Bonus History')}}</h3></div>
                    <div class="card-body">
                        <table id="data_table" class="table col-md-12">
                            <thead class="text-white">
                                <tr class="tr-bg">
                                 
                                 <th>SL</th>
                                  <th>DATE</th>
                                  <th>AMOUNT</th>
                                   <th>TYPE</th>
                                  <th>DESCRIPTION</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="text-white">
                               @foreach($transaction_history as $key => $row)
                                <tr>
                                    <td >{{$loop->index+1}}</td>
                                    <td>{{$row->created_at}}</td>
                                    <td>{{$row->amount}} GALA</td>
                                    <td>{{($row->type)}}</td>
                                    <td>{{$row->description}}</td>
                                </tr>
                               @endforeach
 
                            </tbody>
                            
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
               

    <!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/datatables.js') }}"></script>
    @endpush
@endsection
      

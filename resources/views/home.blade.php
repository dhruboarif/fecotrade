@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
        <!--Custom css-->
        <link rel="stylesheet" href="{{asset('assets1/css/custom.css')}}">
    @endpush
    
    <div class="container-fluid">
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
    	<div class="row">
    		<!-- page statustic chart start -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['cash_wallet'] }}</h4>
                                <p class="mb-0">{{ __('Asset Wallet')}}</p>
                            </div>
                            
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                            
                        
                                
                <div class="col-md-6"> <a class="btn btn-info mb-5" href="#" data-toggle="modal" data-target="#addfund" title="Add Fund">
                    <i class='fa fa-plus-circle' ></i>
                </a>  
                </div>  
                <div class="row">
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['bonus_wallet'] }}</h4>
                                <p class="mb-0">{{ __('Bonus Wallet')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>

                            <div class="col-md-6"> <a class="btn btn-info mb-5" href="#" data-toggle="modal" data-target="#transferbonus" title="Transfer Bonus">
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>  
                            </div>  

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['mining_wallet'] }}</h4>
                                <p class="mb-0">{{ __('Mining Wallet')}}</p>
                                
                            </div>
                            <div class="col-4 text-right">
                                 <i class="fas fa-cube f-30"></i>
                            </div>
                            <div class="col-md-6"> <a class="btn btn-info mb-5" href="#" data-toggle="modal" data-target="#transfermining" title="Transfer Mining">
                                <i class="fas fa-layer-group"></i>
                            </a>  
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['transfer_wallet'] }}</h4>
                                <p class="mb-0">{{ __('Withdraw Wallet')}}</p>
                               
                            
                            
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                       
                       
                            </div>
                              <div class="row">
                                <div class="col-md-6"> <a class="btn btn1 btn-info" href="#" data-toggle="modal" data-target="#convertfund">Convert</a></div>
                                 <div class="col-md-6"> <a class="btn btn1 btn-info" href="#" data-toggle="modal" data-target="#withdrawfund">Withdraw</a></div>
                            
                            </div>   
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
            <!--2nd line block started-->
        <div class="row">
    		<!-- page statustic chart start -->
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['total_withdraw'] }}</h4>
                                <p class="mb-0">{{ __('Total Withdraw')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['total_deposit'] }}</h4>
                                <p class="mb-0">{{ __('Total Deposit')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['user_price'] }}</h4>
                                <p class="mb-0">{{ __('Total Purchased Price')}}</p>
                                
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['assets']->count() }}</h4>
                                <p class="mb-0">{{ __('Package')}}</p>
                                
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @php
            use Carbon\Carbon;
             $currentTime = Carbon::now();

            // Create a new Carbon instance representing midnight of the current day
            $midnight = Carbon::today();
        
            // Calculate the difference between the current time and midnight in seconds
            $secondsFromMidnight = $currentTime->diffInSeconds($midnight);
            @endphp
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ $data['dailybonus'] }}</h4>
                                <p class="mb-0">{{ __('Daily Mining')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0">{{ number_format($data['dailybonus'] / 86400, 5) }}</h4>
                                <p class="mb-0">{{ __('Mining speed/s')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="col-xl-3 col-md-6">
                <div class="card card-bg text-white">
                    <div class="card-block">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h4 class="mb-0" id="daily-bonus2"></h4>
                                <p class="mb-0">{{ __('Already Mined Today')}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <i class="fas fa-cube f-30"></i>
                            </div>
                        </div>
                      
                    </div>
                    <!-- <div class="card-body">-->
                    <!--    <canvas id="miningGraph" width="100%" height="100px"></canvas>-->
                    <!--</div>-->
                 </div>
            </div>
           
<div class="col-xl-3 col-md-6">
    <div class="card card-bg text-white">
        <div class="card-block">
            <div class="row align-items-center">
                <div class="col-8">
                    <h4 class="mb-0" id="daily-bonus2"></h4>
                    <p class="mb-0">{{ __('Already Mined Today')}}</p>
                </div>
                <div class="col-4 text-right">
                    <i class="fas fa-cube f-30"></i>
                </div>
            </div>
        </div>
    </div>
</div>
            
            <!--2nd line block started -->
            @include('users.modals.transferfundmodalMining')
            @include('users.modals.transferfundmodalBonus')
             @include('users.modals.convertfundmodal')
            @include('users.modals.withdrawfundmodal')
            @include('users.modals.addfundmodal2')
            <!-- page statustic chart end -->
            <!-- Crypto price tricker started -->
            <!--   <div class="col-md-12 col-xl-12">-->
            <!--    <div class="card">-->
            <!--      <script src="https://public.bnbstatic.com/unpkg/growth-widget/cryptoCurrencyWidget@0.0.9.min.js" ></script><div class="binance-widget-marquee" data-cmc-ids="1,1027,1839,52,3408,5426,74,3890,5805,7083" data-theme="light" data-transparent="false" data-locale="en" data-powered-by="Powered by" data-disclaimer="Disclaimer" ></div>-->
            <!--    </div>-->
            <!--</div>-->
              <!-- Crypto price tricker ended-->
            <!-- sale 2 card start -->
            <!--<div class="col-md-12 col-xl-6">-->
                <!--<div class="card sale-card">-->
                <!--    <div class="card-header">-->
                <!--        <h3>{{ __('Realtime Profit')}}</h3>-->
                <!--    </div>-->
                <!--    <div class="card-block text-center">-->
                <!--        <div id="realtime-profit"></div>-->
                <!--    </div>-->
                <!--</div>-->
            <!--    <script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script> <div class="livecoinwatch-widget-1" lcw-coin="GALA" lcw-base="USD" lcw-secondary="BTC" lcw-period="d" lcw-color-tx="#ffffff" lcw-color-pr="#58c7c5" lcw-color-bg="#1f2434" lcw-border-w="1" ></div>-->
            <!--</div>-->
            <!--<div class="col-md-12 col-xl-6">-->
            <!--    <div class="card sale-card">-->
                    <!--<div class="card-header">-->
                    <!--    <h3>{{ __('Sales Difference')}}</h3>-->
                    <!--</div>-->
                    <!--<div class="card-block text-center">-->
                    <!--    <div id="sale-diff" class="chart-shadow"></div>-->
                    <!--</div>-->
            <!--        <script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script> <div class="livecoinwatch-widget-1" lcw-coin="BTC" lcw-base="USD" lcw-secondary="BTC" lcw-period="d" lcw-color-tx="#ffffff" lcw-color-pr="#58c7c5" lcw-color-bg="#1f2434" lcw-border-w="1" ></div>-->
            <!--    </div>-->
            <!--</div>-->
          
            <!--<div class="col-md-6 col-xl-6">-->
            <!--    <div class="card card-green text-white">-->
            <!--        <div class="card-block pb-0">-->
            <!--            <div class="row mb-50">-->
            <!--                <div class="col">-->
            <!--                    <h6 class="mb-5">{{ __('Toal Mining Bonus')}}</h6>-->
            <!--                    <h5 class="mb-0  fw-700">{{ $data['mining_wallet'] }}</h5>-->
            <!--                </div>-->
            <!--                <div class="col-auto text-center">-->
            <!--                    <p class="mb-5">{{ __('Total Team Bonus')}}</p>-->
            <!--                    <h6 class="mb-0">{{ $data['bonus_wallet'] }}</h6>-->
            <!--                </div>-->

            <!--                <div class="col-auto text-center">-->
            <!--                    <p class="mb-5">{{ __('Referal')}}</p>-->
            <!--                    <h6 class="mb-0">{{ __('$897')}}</h6>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div id="sec-ecommerce-chart-line" class="chart-shadow"></div>-->
            <!--            <div id="sec-ecommerce-chart-bar" ></div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <!--     <div class="col-md-6 col-xl-6">-->
            <!--    <div class="card card-green text-white">-->
            <!--        <div class="card-block pb-0">-->
            <!--            <div class="row mb-50">-->
            <!--                <div class="col">-->
            <!--                    <h6 class="mb-5">{{ __('Toal Mining Bonus')}}</h6>-->
            <!--                    <h5 class="mb-0  fw-700">{{ $data['mining_wallet'] }}</h5>-->
            <!--                </div>-->
            <!--                <div class="col-auto text-center">-->
            <!--                    <p class="mb-5">{{ __('Total Team Bonus')}}</p>-->
            <!--                    <h6 class="mb-0">{{ $data['bonus_wallet'] }}</h6>-->
            <!--                </div>-->

            <!--                <div class="col-auto text-center">-->
            <!--                    <p class="mb-5">{{ __('Referal')}}</p>-->
            <!--                    <h6 class="mb-0">{{ __('$897')}}</h6>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div id="sec-ecommerce-chart-line" class="chart-shadow"></div>-->
            <!--            <div id="sec-ecommerce-chart-bar" ></div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            
            <!-- sale 2 card end -->
            <!-- product and new customar start -->
            <div class="col-xl-4 col-md-6">
                <div class="card new-cust-card">
                    <div class="card-header">
                        <h3 class=" text-white">{{ __('My Affiliates')}}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        
                        @foreach($data['affiliateuser'] as $key => $user)
                          @if($key < 5) <!-- Only show the first 5 users initially -->
                            <div class="align-middle mb-25">
                            <img src="{{asset('img/users/1.jpg')}}" alt="user image" class="rounded-circle img-40 align-top mr-15">
                            <div class="d-inline-block">
                                <a href="#!"><h6 class=" text-white">{{ $user->name }}</h6></a>
                                <p class="text-muted mb-0">{{ $user->user_name ?? '' }}</p>
                                <span class="status active"></span>
                            </div>
                        </div>
                          @endif
                        @endforeach
                            <a href="{{url('admin/home/my-affilate/')}}"><h6 class=" text-white">Show All</h6></a>
                        
                       
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-6">
                <div class="card table-card">
                    <div class="card-header">
                        <h3 class=" text-white">{{ __('Mining Bonus History')}}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                        <table class="table text-white table-hover mb-0">
                                <thead>
                                    <tr class="tr-bg text-white">
                                        <th>{{ __('SL')}}</th>
                                        <th>{{ __('Date')}}</th>
                                        <th>{{ __('Amount')}}</th>
                                        <th>{{ __('Type')}}</th>
                                        <th>{{ __('Description')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                    @php
                                        $totalTransactions = count($data['transaction_history']);
                                    @endphp
                                    
                                    @foreach($data['transaction_history'] as $key => $row)
                                      @if($key < 5)
                                        <tr>
                                          <td>{{$loop->index+1}}</td>
                                          <td>{{$row->created_at}}</td>
                                          <td>{{$row->amount}} GALA</td>
                                          <td>{{$row->type}}</td>
                                          <td>{{$row->description}}</td>
                                        </tr>
                                      @endif
                                    @endforeach
                                    
                                </tbody>
                        </table>
                        <div class="card-footer">
                                    <div class="text-right">
                                        <a href="{{route('daily-bonus-history')}}" class=" b-b-primary text-primary">{{ __('View all Transaction')}}</a>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- product and new customar end -->
            <!-- Level Bonus History -->
            <div class="col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h3 class="text-white">{{ __('Level Bonus History')}}</h3>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="ik ik-chevron-left action-toggle"></i></li>
                                <li><i class="ik ik-minus minimize-card"></i></li>
                                <li><i class="ik ik-x close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block p-b-0">
                        <div class="table-responsive scroll-widget">
                            <table class="table table-hover table-borderless mb-0">
                              <thead>
                                    <tr class="tr-bg text-white">
                                        <th>{{ __('SL')}}</th>
                                        <th>{{ __('Date')}}</th>
                                        <th>{{ __('Amount')}}</th>
                                        <th>{{ __('Type')}}</th>
                                        <th>{{ __('Description')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                              @foreach($data['level_bonus_history'] as $key => $row)
                                @if($key < 5)
                                <tr class="text-white">
                                  <td>{{$loop->index + 1}}</td>
                                  <td>{{$row->created_at}}</td>
                                  <td>{{$row->amount}} GALA</td>
                                  <td>{{ $row->type }}</td>
                                  <td>{{$row->description}}</td>
                                </tr>
                                    @endif
                                @endforeach
                    
                                </tbody>
                            </table>
                            div class="card-footer">
                        <div class="text-right">
                            <a href="{{route('level-bonus-history')}}" class=" b-b-primary text-primary">{{ __('View all Level Bonus History')}}</a>
                        </div>
                    </div>
                        </div>
                        </div>
                    </div>
                    <
                </div>
            </div>
            <!-- Application Sales end -->
    	</div>
    </div>
    
    
    <style>
    /* Default styles for .btn class */
    .btn1 {
        /* Your default button styles here */
    }

    /* Media query for mobile devices */
    @media (max-width: 767px) {
        .btn1 {
            margin-top:10px;
        }
    }
</style>
	<!-- push external js -->
    @push('script')
    <script src="https://www.cryptohopper.com/widgets/js/script"></script>
    <script defer src="https://www.livecoinwatch.com/static/lcw-widget.js"></script>
        <script src="{{ asset('plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
        <!-- <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script> -->
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
       
        
        <script src="{{ asset('js/widget-statistic.js') }}"></script>
        <script src="{{ asset('js/widget-data.js') }}"></script>
        <script src="{{ asset('js/dashboard-charts.js') }}"></script>
        
        
<script type="text/javascript">

    //alert('success');
    //console.log(this.getAttribute('id'));
    //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
    //var wallet=  document.getElementById("wallet_id");
    //wallet.innerHTML= id.value;
    document.getElementById('DestinationOptions3').addEventListener('change', function (e) {
         
         var wallet3 = e.target.options[e.target.selectedIndex].getAttribute('id');
         console.log(wallet3);
         var wallet = document.getElementById("wallet_id3").value = wallet3;
         //wallet.innerHTML= wallet2;
     });


    document.getElementById('DestinationOptions2').addEventListener('change', function (e) {
         
        var wallet2 = e.target.options[e.target.selectedIndex].getAttribute('id');
        console.log(wallet2);
        var wallet = document.getElementById("wallet_id2").value = wallet2;
        console.log(wallet);
        //wallet.innerHTML= wallet2;
    });

    //  document.getElementById('').value(id.value);
    
    $(document).ready(function() {
    $("#showMoreButton").click(function() {
      $("#hiddenUsers").toggle(); // Show/hide the hidden users when the button is clicked
      $(this).text(function(i, text) {
        return text === "Show More" ? "Hide" : "Show More"; // Change the button text dynamically
      });
    });
  });

document.addEventListener('DOMContentLoaded', function() {
    const amountInput = document.querySelector('input[name="amount"]');

    amountInput.addEventListener('input', function() {
      if (parseFloat(amountInput.value) < 10) {
        amountInput.setCustomValidity('Invalid value.');
      } else {
        amountInput.setCustomValidity('');
      }
    });
  });
  
  newValue = document.getElementById("daily-bonus1".textContent);

 function updateDailyBonus() {
        $.ajax({
            url: "{{ route('update-realtime-mining') }}", // Replace with your actual route URL to fetch the updated daily bonus value
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#daily-bonus2').text(data.dailybonus);
            }
        });
    }

    // Update the daily bonus every 5 seconds (adjust the interval as needed)
setInterval(updateDailyBonus, 1000);


</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Function to generate random mining values for each day
    function getRandomMiningValues() {
        var miningValues = [];
        for (var i = 0; i < 7; i++) {
            // Generate a random mining value between 80 and 120
            var miningValue = Math.floor(Math.random() * (120 - 80 + 1)) + 80;
            miningValues.push(miningValue);
        }
        return miningValues;
    }

    // Sample data for the daily mining graph
    var dailyMiningData = {
        labels: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
        datasets: [{
            label: 'Daily Mining',
            data: getRandomMiningValues(),
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            fill: false,
        }]
    };

    // Chart configuration
    var dailyMiningConfig = {
        type: 'line',
        data: dailyMiningData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };

    // Create the daily mining graph using Chart.js
    var ctx = document.getElementById('miningGraph').getContext('2d');
    var dailyMiningChart = new Chart(ctx, dailyMiningConfig);
</script>
    @endpush
@endsection


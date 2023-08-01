@extends('layouts.main') 
@section('title', 'Pricing')
@section('content')
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="fas fa-cubes bg-blue"></i>
                        <div class="d-inline text-white">
                            <h5>{{ __('Mining Contracts')}}</h5>
                            <span>Available Amount: {{$data['cash_wallet'] ? 'DOGE '.number_format((float)$data['cash_wallet'], 2, '.', '') : 'DOGE 00.00'}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href=""><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Pricing')}}</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if(Session::has('purchase_successful'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
            <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
            {{Session::get('purchase_successful')}}
            </div>
            </div>
             @elseif(Session::has('purchase_error'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
            <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
            {{Session::get('purchase_error')}}
            </div>
            </div>
            @endif
        <section class="pricing">
          <div class="container">
            <div class="row">
              @foreach($packages as $row)
              <div class="col-lg-4">
                <div class="card card-bg mb-5 mb-lg-0">
                  <div class="card-body">
                    <h5 class="card-title text-white text-uppercase text-center">{{$row->package_name}}</h5>
                    <h6 class="card-price text-center text-warning"><i class="fa fa-money" aria-hidden="true"></i>{{$row->price}}<span class="period">/Doge</span></h6>
                    <hr>
                   
                   
                          <div class="input-group mb-3">
                          <span class="input-group-text text-right"  id="basic-addon1" style="width: 70%; font-weight:100%;">Price (Doge)</span>
                          <input  type="text" class="form-control" value="{{$row->price}}" disabled>
                            </div>
                            <div class="input-group mb-3">
                            <span class="input-group-text text-right" style="color:#080808; width: 70%; font-weight:100%;" id="basic-addon1">Total Mining</span>
                            <input type="text" class="form-control" value="{{$row->total_roi}}" disabled>
                              </div>
                              <div class="input-group mb-3">
                              <span class="input-group-text text-right" style="color:#080808; width: 70%; font-weight:100%;" id="basic-addon1">Daily Mining</span>
                              <input type="text" class="form-control" value="{{$row->daily_roi}}" disabled>
                                </div>
                                <div class="input-group mb-3">
                                <span class="input-group-text text-right" style="color:#080808; width: 70%; font-weight:100%;" id="basic-addon1">
                                                                                    Validity (days)</span>
                                <input  type="text" class="form-control" value="{{$row->validity}}" disabled>
                                  </div>
                                  <div class="input-group mb-3">
                                <span class="input-group-text text-right" style="color:#080808; width: 70%; font-weight:100%;" id="basic-addon1">
                                                                                    No of Level Bonus</span>
                                <input  type="text" class="form-control" value="{{$row->no_of_levels}}" disabled>
                                  </div>
                                  <div class="text-center">
                                    
                                         
                                    <a href="#" class="btn btn-block btn-primary text-uppercase" data-toggle="modal" data-target="#packagebuymodal{{$row->id}}" >Buy Contract</a>
                                         @include('users.modals.packagebuymodal')
                                      </form>
                                  </div>

                    
                  </div>
                </div>
              </div>
              <!-- Plus Tier -->

              @endforeach
            </div>
          </div>
        </section>
 
    </div>
@endsection

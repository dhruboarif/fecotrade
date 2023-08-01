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
     @endif
    <div class="card-header text-white">
       My Tree
    </div>

    <div class="card-body">
      {{--  <a class="btn btn-success mb-5" href="#" data-toggle="modal" data-target="#addfund">Add Fund</a>
         @include('users.modals.addfundmodal') --}}
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-myasset">
                <thead>
                    <tr class="tr-bg">
                         <th width="20">

                        </th>
                       <th scope="col">SL</th>
                      
                             <th scope="col">GENERATION</th>
                                           <th scope="col">AFFILIATE</th>


                                           
                        <th>
                            &nbsp;
                        </th>
                      
                        
                    </tr>
                </thead>
                <tbody class="text-white">
                    @php
                            $first_generation_count= 0;
                            $second_generation_count = 0;
                            $third_generation_count= 0;
                            $fourth_generation_count= 0;
                            $fifth_generation_count= 0;
                            $sixth_generation_count= 0;
                            $seventh_generation_count= 0;
                            $eight_generation_count= 0;
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            
                            $first_generation_count= App\Models\User::where('sponsor',Auth::id())->count();
                            $first_generation= App\Models\User::where('sponsor',Auth::id())->get();
            
                            $first_generation_id= App\Models\User::where('sponsor',Auth::id())->first();
                            if($first_generation_count > 0)
                            {
                            $second_generation_count= App\Models\User::where('sponsor',$first_generation_id->id)->count();
                            $second_generation= App\Models\User::where('sponsor',$first_generation_id->id)->get();
                            $second_generation_id= App\Models\User::where('sponsor',$first_generation_id->id)->first();
                            }else 
                            {
                            $second_generation_count = 0;
                            $third_generation_count= 0;
                            $fourth_generation_count= 0;
                            $fifth_generation_count= 0;
                            $sixth_generation_count= 0;
                            $seventh_generation_count= 0;
                            $eight_generation_count= 0;
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            
                            }
                            if($second_generation_count > 0)
                            {
                            $third_generation_count= App\Models\User::where('sponsor',$second_generation_id->id)->count();
                            $third_generation= App\Models\User::where('sponsor',$second_generation_id->id)->get();
                            $third_generation_id= App\Models\User::where('sponsor',$second_generation_id->id)->first();
                            
                            }else 
                            {
                                $third_generation_count= 0;
                                $fourth_generation_count= 0;
                            $fifth_generation_count= 0;
                            $sixth_generation_count= 0;
                            $seventh_generation_count= 0;
                            $eight_generation_count= 0;
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seveteen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            
                            
                            if($third_generation_count > 0)
                            {
                            $fourth_generation_count= App\Models\User::where('sponsor',$third_generation_id->id)->count();
                            $fourth_generation= App\Models\User::where('sponsor',$third_generation_id->id)->get();
                            $fourth_generation_id= App\Models\User::where('sponsor',$third_generation_id->id)->first();
                            
                            }else 
                            {
                            //$fourth_generation_count = 0;
                            $fourth_generation_count= 0;
                            $fifth_generation_count= 0;
                            $sixth_generation_count= 0;
                            $seventh_generation_count= 0;
                            $eight_generation_count= 0;
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            
                            }
                            
                            if($fourth_generation_count > 0)
                            {
                            $fifth_generation_count= App\Models\User::where('sponsor',$fourth_generation_id->id)->count();
                            $fifth_generation= App\Models\User::where('sponsor',$fourth_generation_id->id)->get();
                            $fifth_generation_id= App\Models\User::where('sponsor',$fourth_generation_id->id)->first();
                            
                            }else 
                            {
                                $fifth_generation_count = 0;
                                
                            $sixth_generation_count= 0;
                            $seventh_generation_count= 0;
                            $eight_generation_count= 0;
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($fifth_generation_count > 0)
                            {
                            $sixth_generation_count= App\Models\User::where('sponsor',$fifth_generation_id->id)->count();
                            $sixth_generation= App\Models\User::where('sponsor',$fifth_generation_id->id)->get();
                            $sixth_generation_id= App\Models\User::where('sponsor',$fifth_generation_id->id)->first();
                            
                            }else {
                            
                            $sixth_generation_count = 0;
                           
                            $seventh_generation_count= 0;
                            $eight_generation_count= 0;
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            
                                }
                            if($sixth_generation_count > 0)
                            {
                            
                            $seventh_generation_count= App\Models\User::where('sponsor',$sixth_generation_id->id)->count();
                            $seventh_generation= App\Models\User::where('sponsor',$sixth_generation_id->id)->get();
                            $seventh_generation_id= App\Models\User::where('sponsor',$sixth_generation_id->id)->first();
                            
                            }else 
                            {
                                    $seventh_generation_count=0;
                                    $eight_generation_count= 0;
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($seventh_generation_count > 0)
                            {
                            $eight_generation_count= App\Models\User::where('sponsor',$seventh_generation_id->id)->count();
                            $eight_generation= App\Models\User::where('sponsor',$seventh_generation_id->id)->get();
                            $eight_generation_id= App\Models\User::where('sponsor',$seventh_generation_id->id)->first();
                            
                            }else 
                            {
                               
                                $eight_generation_count= 0;
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($eight_generation_count > 0)
                            {
                            $ninth_generation_count= App\Models\User::where('sponsor',$eight_generation_id->id)->count();
                            $ninth_generation= App\Models\User::where('sponsor',$eight_generation_id->id)->get();
                            $ninth_generation_id= App\Models\User::where('sponsor',$eight_generation_id->id)->first();
                               
                            }else 
                            {
                               
                            $ninth_generation_count= 0;
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                           $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($ninth_generation_count > 0)
                            {
                            
                            $tenth_generation_count= App\Models\User::where('sponsor',$ninth_generation_id->id)->count();
                            $tenth_generation= App\Models\User::where('sponsor',$ninth_generation_id->id)->get();
                            $tenth_generation_id= App\Models\User::where('sponsor',$ninth_generation_id->id)->first();
                            
                            }else 
                            {
                            
                            $tenth_generation_count= 0;
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                          $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($tenth_generation_count > 0)
                            {
                            
                            $eleven_generation_count= App\Models\User::where('sponsor',$tenth_generation_id->id)->count();
                            $eleven_generation= App\Models\User::where('sponsor',$tenth_generation_id->id)->get();
                            $eleven_generation_id= App\Models\User::where('sponsor',$tenth_generation_id->id)->first();
                            
                            }else 
                            {
                            $eleven_generation_count= 0;
                            $twelve_generation_count= 0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($eleven_generation_count > 0)
                            {
                            $twelve_generation_count= App\Models\User::where('sponsor',$eleven_generation_id->id)->count();
                            $twelve_generation= App\Models\User::where('sponsor',$eleven_generation_id->id)->get();
                            $twelve_generation_id= App\Models\User::where('sponsor',$eleven_generation_id->id)->first();
                            
                            }else 
                            {
                            $twelve_generation_count=0;
                            $thirteen_generation_count= 0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($twelve_generation_count > 0)
                            {
                            $thirteen_generation_count= App\Models\User::where('sponsor',$twelve_generation_id->id)->count();
                            $thirteen_generation= App\Models\User::where('sponsor',$twelve_generation_id->id)->get();
                            $thirteen_generation_id= App\Models\User::where('sponsor',$twelve_generation_id->id)->first();
                            
                            }else 
                            {
                            $thirteen_generation_count=0;
                            $fourteen_generation_count= 0;
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                           $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($thirteen_generation_count > 0)
                            {
                              $fourteen_generation_count= App\Models\User::where('sponsor',$thirteen_generation_id->id)->count();
                            $fourteen_generation= App\Models\User::where('sponsor',$thirteen_generation_id->id)->get();
                            $fourteen_generation_id= App\Models\User::where('sponsor',$thirteen_generation_id->id)->first();
                            
                            }else 
                            
                            {
                             $fourteen_generation_count=0;
                             
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($fourteen_generation_count > 0)
                            {
                            $fifteen_generation_count= App\Models\User::where('sponsor',$fourteen_generation_id->id)->count();
                            $fifteen_generation= App\Models\User::where('sponsor',$fourteen_generation_id->id)->get();
                            $fifteen_generation_id= App\Models\User::where('sponsor',$fourteen_generation_id->id)->first();
                            
                            }else 
                            {
                               
                            $fifteen_generation_count= 0;
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($fifteen_generation_count > 0)
                            {
                             $sixteen_generation_count= App\Models\User::where('sponsor',$fifteen_generation_id->id)->count();
                            $sixteen_generation= App\Models\User::where('sponsor',$fifteen_generation_id->id)->get();
                            $sixteen_generation_id= App\Models\User::where('sponsor',$fifteen_generation_id->id)->first();
                            
                            }else {
                               
                            $sixteen_generation_count= 0;
                            $seventeen_generation_count= 0;
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($sixteen_generation_count > 0)
                            {
                            
                            $seventeen_generation_count= App\Models\User::where('sponsor',$sixteen_generation_id->id)->count();
                            $seventeen_generation= App\Models\User::where('sponsor',$sixteen_generation_id->id)->get();
                            $seventeen_generation_id= App\Models\User::where('sponsor',$sixteen_generation_id->id)->first();
                            
                            }else 
                            {
                                $seventeen_generation_count= 0;
                              
                            $eighteen_generation_count= 0;
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($seventeen_generation_count > 0)
                            {
                            $eighteen_generation_count= App\Models\User::where('sponsor',$seventeen_generation_id->id)->count();
                            $eighteen_generation= App\Models\User::where('sponsor',$seventeen_generation_id->id)->get();
                            $eighteen_generation_id= App\Models\User::where('sponsor',$seventeen_generation_id->id)->first();
                            
                            }else {
                                $eighteen_generation_count= 0;
                                $
                            $nineteen_generation_count= 0;
                            $twenty_generation_count= 0;
                            }
                            if($eighteen_generation_count > 0)
                            {
                            
                            $nineteen_generation_count= App\Models\User::where('sponsor',$eighteen_generation_id->id)->count();
                            $nineteen_generation= App\Models\User::where('sponsor',$eighteen_generation_id->id)->get();
                            $nineteen_generation_id= App\Models\User::where('sponsor',$eighteen_generation_id->id)->first();
                            
                            }else 
                            {
                            
                            $nineteen_generation_count= 0;
                           
                            $twenty_generation_count= 0;
                            }
                            if($nineteen_generation_count > 0)
                            {
                             $twenty_generation_count= App\Models\User::where('sponsor',$nineteen_generation_id->id)->count();
                            $twenty_generation= App\Models\User::where('sponsor',$nineteen_generation_id->id)->get();
                            $twenty_generation_id= App\Models\User::where('sponsor',$nineteen_generation_id->id)->first();
                            
                            }else 
                            {
                                $twenty_generation_count= 0;
                            }
                            
                           
            
                            
                            
                    @endphp
                    
                        <tr>
                            <td></td>
                       <td >1</td>
                        <td>First Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg1modal">{{$first_generation_count}}</button>
                            @include('users.modals.first_generation_modal')
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >2</td>
                        <td>Second Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg2modal">{{$second_generation_count}}</button>
                            @if($second_generation_count > 0) 
                            @include('users.modals.second_generation_modal')
                            @endif
                            
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >3</td>
                        <td>Third Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg3modal">{{$third_generation_count}}</button>
                            @if($third_generation_count > 0) 
                            @include('users.modals.third_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >4</td>
                        <td>Fourth Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg4modal">{{$fourth_generation_count}}</button>
                            @if($fourth_generation_count > 0) 
                            @include('users.modals.fourth_generation_modal')
                            @endif

                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >5</td>
                        <td>Fifth Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg5modal">
                            {{$fifth_generation_count}}</button>
                            @if($fifth_generation_count > 0) 
                            @include('users.modals.fifth_generation_modal')
                            @endif
                            
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >6</td>
                        <td>Sixth Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg6modal">
                            {{$sixth_generation_count}}</button>
                            @if($sixth_generation_count > 0) 
                            @include('users.modals.sixth_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >7</td>
                        <td>Seventh Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg7modal">
                            {{$seventh_generation_count}}</button>
                            @if($seventh_generation_count > 0) 
                            @include('users.modals.seventh_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >8</td>
                        <td>Eight Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg8modal">
                            {{$eight_generation_count}}</button>
                            @if($eight_generation_count > 0) 
                            @include('users.modals.eight_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >9</td>
                        <td>Ninth Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg9modal">
                            {{$ninth_generation_count}}</button>
                            @if($ninth_generation_count > 0) 
                            @include('users.modals.ninth_generation_modal')
                            @endif
                        </td>
                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >10</td>
                        <td>Tenth Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg10modal">
                            {{$tenth_generation_count}}</button>
                            @if($tenth_generation_count > 0) 
                            @include('users.modals.tenth_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >11</td>
                        <td>Eleven Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg11modal">
                            {{$eleven_generation_count}}</button>
                            @if($eleven_generation_count > 0) 
                            @include('users.modals.eleven_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >12</td>
                        <td>Twelve Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg12modal">
                            {{$twelve_generation_count}}</button>
                            @if($twelve_generation_count > 0) 
                            @include('users.modals.twelve_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >13</td>
                        <td>Thirteen Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg13modal">
                            {{$thirteen_generation_count}}</button>
                            @if($thirteen_generation_count > 0) 
                            @include('users.modals.thirteen_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >14</td>
                        <td>Fourteen Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg14modal">
                            {{$fourteen_generation_count}}</button>
                            @if($fourteen_generation_count > 0) 
                            @include('users.modals.fourteen_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >15</td>
                        <td>Fifteen Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg15modal">
                            {{$fifteen_generation_count}}</button>
                            @if($fifteen_generation_count > 0) 
                            @include('users.modals.fifteen_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >16</td>
                        <td>Sixteen Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg16modal">
                            {{$sixteen_generation_count}}</button>
                            @if($sixteen_generation_count > 0) 
                            @include('users.modals.sixteen_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >17</td>
                        <td>Seventeen Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg17modal">
                            {{$seventeen_generation_count}}</button>
                            @if($seventeen_generation_count > 0) 
                            @include('users.modals.seventeen_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >18</td>
                        <td>Eighteen Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg18modal">
                            {{$eighteen_generation_count}}</button>
                            @if($eighteen_generation_count > 0) 
                            @include('users.modals.eighteen_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >19</td>
                        <td>Nineteen Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg19modal">
                            {{$nineteen_generation_count}}</button>
                            @if($nineteen_generation_count > 0) 
                            @include('users.modals.nineteen_generation_modal')
                            @endif
                        </td>
                    <td></td>
                 </tr>
                  <tr>
                            <td></td>
                       <td >20</td>
                        <td>Twenty Generation</td>

                        <td>
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fg20modal">
                            {{$twenty_generation_count}}</button>
                            @if($twenty_generation_count > 0) 
                            @include('users.modals.twenty_generation_modal')
                            @endif
                        </td>

                    <td></td>
                 </tr>
                   
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
  let table = $('.datatable-myasset:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>

@endsection
@extends('layouts.app')
    <div id="video-background">
       <!--Video Library -->
    <video onload="this.play();" autoplay loop muted>
      <source src="{{asset('assets1/images/animation_video_1.mp4')}}" type="video/mp4" codecs="avc1.4D401E, mp4.40.2">
    </video>
  </div>




@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4">
            <div class="card-body p-4">
                <div class="text-center mb-2">
                    <a href="https://fecotrade.com"><img class="justify-content-center" width="152px" src="{{asset('assets1/images/facotrade_logo.png')}}" alt="Fecotrade"></a>
                </div>
                <div class="card-header border-0 text-center card text-warning">{{ __('Please Verify Your Email Address') }}</div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert card-bg text-secondary " role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link text-info p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
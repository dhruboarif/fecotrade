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
                <p class="text-muted">{{ trans('global.reset_password') }}</p>

                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email') }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-flat btn-block">
                                {{ trans('global.send_password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
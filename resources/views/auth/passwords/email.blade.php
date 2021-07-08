@extends('layouts.main')
@section('content')
<!-- inn Slide Sec Start -->
@include('extends.banner',['bannerTitle'=>'Reset Password'])
<!-- inn Slide Sec End -->

<section class="main-login-sign">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 col-xs-12 col-sm-12 nopadding">
                    <div class="login-second">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf


                                <input placeholder="Your Email Address" id="email" type="email" class="form-control eml {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            <div class="login-butn">
                                <button type="submit" >
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

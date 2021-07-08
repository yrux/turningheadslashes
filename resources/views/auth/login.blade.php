@extends('layouts.main')
@section('content')
<!-- inn Slide Sec Start -->
@include('extends.banner',['bannerTitle'=>'Login & Signup'])
<!-- inn Slide Sec End -->


<section class="main-login-sign">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 col-xs-12 col-sm-6 nopadding">
                    <div class="login-second">
                        <h1>Please Log in</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input placeholder="Email Address" id="email" type="email" class="form-control eml {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <input id="password" type="password" placeholder="Password" class="form-control paswrd {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <div class="login-butn">
                                <button type="submit">Login</button>

                                <p><a href="{{route('password.request')}}">Forgot your password?</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 col-sm-6 nopadding">
                    <div class="login-second sign-up">

                        <h1>Please Sign Up</h1>
                        <!-- <label>Create</label>
                        <select>
                            <option>Account Type</option>
                        </select> -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input placeholder="Email Address" id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            @if ($errors->register->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->register->first('email') }}</strong>
                            </span>
                            @endif
                            <input placeholder="Password" id="password" type="password" class="form-control{{ $errors->register->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            @if ($errors->register->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->register->first('password') }}</strong>
                            </span>
                            @endif
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Re-enter Password" required>
                            <input placeholder="First Name" id="name" type="text" class="form-control{{ $errors->register->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->register->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->register->first('name') }}</strong>
                            </span>
                            @endif
                            <input placeholder="Last Name" id="lname" type="text" class="form-control{{ $errors->register->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>
                            @if ($errors->register->has('lname'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->register->first('lname') }}</strong>
                            </span>
                            @endif
                            <!-- <input class="form-control" type="text" placeholder="Localisation"> -->
                            <div class="login-butn">
                                <label class="box-set">By registering you agree to our <i>Terms of Use</i>
                                    <input name="agree" type="checkbox"> <span class="checkmark"></span></label>
                                    @if ($errors->register->has('agree'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->register->first('agree') }}</strong>
                                    </span>
                                    @endif
                                <button type="submit">Create an Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
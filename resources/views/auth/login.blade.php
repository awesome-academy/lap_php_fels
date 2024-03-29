@extends('layouts.login')

@section('title')
    <title>{{ trans('auth.login') }}</title>
@endsection

@section('content')
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="bower_components/hai-bower/login/images/signin-image.jpg" alt="sing up image"></figure>
                <a href="{{ route('register') }}" class="signup-image-link">{{ trans('auth.create_account') }}</a>
            </div>

            <div class="signin-form">
                <h2 class="form-title">{{ trans('auth.login') }}</h2>
                <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input id="email" type="email" class="form-control @error ('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ trans('auth.email') }}">

                        @error ('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>

                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>

                        <input id="password" type="password" class="form-control @error ('password') is-invalid @enderror " name="password" required autocomplete="current-password" placeholder="{{ trans('auth.password') }}">

                        @error ('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>

                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="{{ trans('auth.login') }}"/>
                    </div>
                    <div class="form-group form-button"> 
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ trans('auth.forgot_password') }}
                        </a>
                        @endif
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">{{ trans('auth.or_login_with') }}</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

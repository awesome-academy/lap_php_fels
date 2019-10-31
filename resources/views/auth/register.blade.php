@extends('layouts.login')

@section('title')
    <title>{{ trans('auth.signup') }}</title>
@endsection

@section('content')
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">{{ trans('signup') }}</h2>
                <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>

                        <input id="name" type="text" class="form-control @error ('name') is-invalid @enderror " name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="{{ trans('auth.name') }}">

                        @error ('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>

                        <input id="email" type="email" class="form-control @error ('email') is-invalid @enderror " name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ trans('auth.email') }}">

                        @error ('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>


                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>

                        <input id="password" type="password" class="form-control @error ('password') is-invalid @enderror " name="password" required autocomplete="new-password" placeholder="{{ trans('auth.password') }}">

                        @error ('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror 
                    </div>

                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ trans('auth.repeat_password') }}">
                    </div>

                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="{{ trans('auth.register') }}"/>
                    </div>
                </form>
            </div>
        <div class="signup-image">
            <figure><img src="bower_components/hai-bower/login/images/signup-image.jpg" alt="{{ trans('layout.signup_image') }}"></figure>
            <a href="{{ route('login') }}" class="signup-image-link">{{ trans('auth.already_member') }}</a>
        </div>
    </div>
</div>
</section>
@endsection

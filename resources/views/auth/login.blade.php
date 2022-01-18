@extends('layouts.app')

@section('content')


<section class="landing-page">
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="owl-carousel owl-theme landing-banner-slider">

                <div class="slider-item">
                    <img class="assea-nav-logo" src="{{ asset('public/img/sol.jpg') }}"  alt="">
                </div>
                <div class="slider-item">
                    <img class="assea-nav-logo" src="{{ asset('public/img/earth.jpg') }}"  alt="">
                </div>
                <div class="slider-item">
                    <img class="assea-nav-logo" src="{{ asset('public/img/boat.jpg') }}"  alt="">
                </div>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="section-right">
                <div id="particles-js"></div>

                <div class="content d-flex flex-column justify-content-between">
                    <div class="login">
                    </div>
                    <div class="form">
                        <div class="logo-wrapper">
                            <img class="assea-nav-logo" src="{{ asset('public/img/logo.png') }}"  alt="">
                        </div>

                        <form name="loginform" id="loginform"  method="POST" action="{{ route('login') }}">
                            @csrf

                            <p class="login-username">
                                <label for="user_login">Username or Email Address</label>
                                <input id="email" type="email"id="user_login" class="input" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" size="20" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input id="password" type="password" id="user_pass" class="input"  @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password"  size="20" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%;">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </p>

                            <p class="login-remember">
                                <label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label>
                            </p>
                            <p class="login-submit">
                                <button type="submit" name="wp-submit" id="wp-submit" class="button button-primary">     {{ __('Login') }}</button>
                            </p>
                        </form>
                    </div>
                    <div class="copyright">
                        <p><span>© 2022 All rights Reserved <a href="#" target="_blank">DCOC | </a></span>
                            <a href="#" target="_blank"> </a><a href="#">Privacy Policy | </a>
                            <a href="#">Terms &amp; Conditions </a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


@endsection

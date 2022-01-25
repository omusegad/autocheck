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
                            <div class="form-group ">
                                <label for="">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email"  autocomplete="email" autofocus>
                                @error('emal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label for="">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password"  autocomplete="password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <p class="login-remember">
                                <label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label>
                            </p>

                           <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                login
                             </button>
                           </div>
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

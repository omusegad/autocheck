@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="text-center">
                {{-- <img src="{{ asset('public/img/asea-logo.png') }}"  alt=""> --}}
                <h3>Toyota</h3>
            </div>
        </div>
    </div>
    <div class="row align-items-center justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card">
                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Welcome Back !</h5>
                        <p class="text-muted">Sign in to continue to Toyota portal.</p>
                    </div>

                    <div class="p-2 mt-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row mb-3">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary col-md-12">
                                        {{ __('Login') }}
                                    </button>

                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection

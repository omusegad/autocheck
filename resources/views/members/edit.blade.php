@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit  {{ $user->name }} </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right text-white">
            <a class="text-info btn btn-outline-info" href="{{route('members.index')}}">Members</a>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-6">
            @if ($message = Session::get('message'))
                <div class="alert alert-info alert-dismissable pt-2">
                    <p>{{ Session::get('message') }}</p>
                    <button type = "button" class = "close  close-btn" data-dismiss = "alert" aria-hidden = "true">×  </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
                    <form method="POST" action="{{ route('members.update', $user->id) }}">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('UPDATE') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
    </div>
</div>

@endsection

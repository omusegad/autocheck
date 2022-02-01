@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
    <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Country </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right text-white">
            <a class="text-info btn btn-outline-info" href="{{route('countries.index')}}">Country</a>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-lg-12">
                    @if ($message = Session::get('message'))
                        <div class="alert alert-info alert-dismissable pt-2">
                            <p>{{ Session::get('message') }}</p>
                            <button type = "button" class = "close  close-btn" data-dismiss = "alert" aria-hidden = "true">×  </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('countries.update', $branch->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label for="">Country Name</label>
                            <input type="text" name="name" value="{{ $country->name }}" class="form-control" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-info font-weight-bold">UPDATE</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

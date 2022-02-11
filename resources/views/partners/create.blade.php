@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
    <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Add Partner</h4>
            </div>
        </div>
        <div class="col-lg-6 text-right text-white">
            <a class="text-info btn btn-outline-info" href="{{route('partners.index')}}">Partners</a>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-10">
            @if ($message = Session::get('message'))
                <div class="alert alert-info alert-dismissable pt-2">
                    <p>{{ Session::get('message') }}</p>
                    <button type = "button" class = "close  close-btn" data-dismiss = "alert" aria-hidden = "true">×  </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-10">

        <div class="card">
            <div class="card-body">
        <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="">Country / Organisation</label>
                    <input id="email" type="text" class="form-control"  name="country"  value="{{ old('country') }}" placeholder="Country/Organisation" required  autofocus>
                </div>

            <div class="col-lg-6">
                <div class="form-group ">
                    <label>Partner Name</label>
                    <input id="partnername" type="text" class="form-control @error('partnername') is-invalid @enderror" name="partnername" value="{{ old('partnername') }}" placeholder="Name" required autocomplete="partnername" autofocus>
                    @error('partnername')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group ">
                    <label>Email</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="Email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group col-lg-12">
               <div class="submit-bx mt-4 text-right">
                 <button class="btn btn-info text-white font-weight-bold"> ADD</button>
               </div>
            </div>

        </div>
        </form>
       </div>
      </div>
       </div>
    </div>



</div>

@endsection

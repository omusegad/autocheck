@extends('layouts.main')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="row">
            <div class="col-sm-8 d-flex align-items-center">
                <div class="page-title-box py-2">
                    <h4 class="mb-0">Edit Contact Details</h4>
                </div>
            </div>
            <div class="col-sm-4 text-right d-flex align-items-center justify-content-end">
                <a class="text-info btn btn-outline-info" href="{{route('partners.index')}}">View Contacts</a>
            </div>
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
        <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
        <form action="{{ route('partners.update',$partner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group ">
                        <label>Country / Organisation</label>
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{$partner->country}}">
                    </div>
                </div>

            <div class="col-lg-6">
                <div class="form-group ">
                    <label>Partner Name</label>
                    <input id="partnername" type="text" class="form-control @error('partnername') is-invalid @enderror" name="partnername" value="{{$partner->partnername}}">

                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group ">
                    <label>Email</label>
                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$partner->email}}">
                </div>
            </div>

            <div class="form-group col-lg-12">
               <div class="submit-bx mt-4 text-right">
                 <button class="btn btn-info text-white font-weight-bold"> UPDATE</button>
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

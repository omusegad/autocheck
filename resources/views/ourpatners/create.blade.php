@extends('layouts.main')

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="row">
            <div class="col-sm-8 d-flex align-items-center">
                <div class="page-title-box py-2">
                    <h4 class="mb-0">Add Partner</h4>
                </div>
            </div>
            <div class="col-sm-4 text-right d-flex align-items-center justify-content-end">
                <a class="text-info btn btn-outline-info" href="{{route('our-partners.index')}}">View Partners</a>
            </div>
        </div>
    </div>
    <!-- end page title -->

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

    <div class="row">
        <div class="col-lg-9">

        <div class="card">
            <div class="card-body">
        <form action="{{ route('our-partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-lg-12">
                    <label for="">Partners</label>
                    <input id="email" type="text" class="form-control"  name="partner_name"  value="{{ old('partner_name') }}" placeholder="Name" required  autofocus>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Profile</label>
                        <textarea  class="form-control" cols="30" rows="5" name="description"></textarea>
                    </div>
                 </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">Specialization Area</label>
                        <textarea  class="form-control" name="specialization_area"></textarea>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label>Upload Image</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-file">
                                    Browse… <input name="partner_logo" type="file" id="imgInp">
                                </span>
                            </span>
                            <input type="text" class="form-control" readonly>
                        </div>
                        <img id='img-upload'/>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <div class="submit-bx mt-4 text-right">
                           <button class="btn btn-info text-white font-weight-bold"> ADD</button>
                        </div>
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

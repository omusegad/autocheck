@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Resources </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn btn-outline-primary" href="{{route('all-resources.index')}}">Resource </a>
        </div>
    </div>

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
                    <form action="{{ route('all-resources.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" name="title" placeholder="Title" class="form-control text-capitalize" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="prio">
                                <label for="">Category</label>
                                 <select class="form-control" name="doc_cat">
                                    <option disabled selected>Choose Category</option>
                                     <option value="Strategies and Roadmaps">Strategies and Roadmaps </option>
                                     <option value="Reports">Reports</option>
                                     <option value="Newslaters">Newslaters</option>
                                     <option value="Flyers">Flyers</option>

                                 </select>
                            </div>
                        </div>
                        <div class="form-group">
                           <div class="card">
                               <div class="card-bod">
                                <div class="field" align="left">
                                    <h5>Upload Document</h5>
                                    <input type="file" class="files" name="upload_doc"  accept="application/pdf" />
                                  </div>
                               </div>
                           </div>
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-info font-weight-bold">Add</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

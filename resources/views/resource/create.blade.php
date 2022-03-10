@extends('layouts.main')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="row">
            <div class="col-sm-8 d-flex align-items-center">
                <div class="page-title-box py-2">
                    <h4 class="mb-0">Add Resource</h4>
                </div>
            </div>
        <div class="col-sm-4 d-flex align-items-center justify-content-end">
            <a class="btn btn btn-outline-primary" href="{{route('all-resources.index')}}">View Resource </a>
        </div>
    </div>
</div>



<div class="row pb-5">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12 pb-4">
                @if ($message = Session::get('message'))
                    <div class="alert alert-info alert-dismissable pt-2">
                        <p>{{ Session::get('message') }}</p>
                        <button type = "button" class = "close  close-btn" data-dismiss = "alert" aria-hidden = "true">×  </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="card p-4">
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
                       <div class="for">
                           <div class="card-bod">
                            <label for="">Upload Document</label>
                            <div class="field" align="left">
                                <input type="file" class="files" name="upload_doc"  accept="application/pdf" />
                              </div>
                           </div>
                       </div>
                    </div>

                    <div class="form-group text-right">
                        <button class="btn btn-info font-weight-bold px-4">Add</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection

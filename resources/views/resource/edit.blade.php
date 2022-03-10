@extends('layouts.main')

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="row">
            <div class="col-sm-8 d-flex align-items-center">
                <div class="page-title-box py-2">
                    <h4 class="mb-0">Edit Resource</h4>
                </div>
            </div>
        <div class="col-sm-4 d-flex align-items-center justify-content-end">
            <a class="btn btn btn-outline-primary" href="{{route('all-resources.index')}}">View Resource </a>
        </div>
    </div>
</div>
        
<div class="row">
    <div class="col-lg-12 pb-4">
        @if ($message = Session::get('message'))
            <div class="alert alert-info alert-dismissable">
                <p>{{ Session::get('message') }}</p>
                <button type = "button" class = "close  close-btn" data-dismiss = "alert" aria-hidden = "true">×  </button>
            </div>
        @endif
    </div>
</div>
<!-- end page title -->
<div class="mb-5"
    <form method="POST" action="{{ route('all-resources.update', $resource->id) }}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}

        <div class="bg-white p-4">
            <div class="col-lg-12">
               <div class="row">
                   <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="pb-3 pt-4"><a class="btn btn btn-outline-primary px-3" href="{{ asset('storage/app/public'.$resource->dockLink) }}"><i class="fas fa-file-contract icon pr-2"></i> Current Document</a> </label>                                  </label>
                            <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$resource->title}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                   </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="prio">
                                <label for="">Category</label>
                                <select class="form-control" name="doc_cat">
                                    <option disabled selected>Choose Category</option>
                                    <option value="{{$resource->doc_cat}}" selected>{{$resource->doc_cat}}</option>
                                    <option value="Strategies and Roadmaps">Strategies and Roadmaps </option>
                                    <option value="Reports">Reports</option>
                                    <option value="Newslaters">Newslaters</option>
                                    <option value="Flyers">Flyers</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                    <div class="form-group">
                       <div class="prio">
                            <label for="">Upload Document</label>
                           <div class="card-bod">
                            <div class="field" align="left">
                                <input type="file" class="files" name="upload_doc"  accept="application/pdf" />
                              </div>
                           </div>
                       </div>
                    </div>
                </div>

                    <div class="col-lg-12 text-right">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-4">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </form>
</div>

      

@endsection
@push('custom')

@endpush

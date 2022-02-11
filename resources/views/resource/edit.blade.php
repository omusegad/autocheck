@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit  Books or Tools </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a href="{{ route('resource.index') }}"> All  Books &  Tools</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($message = Session::get('message'))
                <div class="alert alert-info alert-dismissable">
                    <p>{{ Session::get('message') }}</p>
                    <button type = "button" class = "close  close-btn" data-dismiss = "alert" aria-hidden = "true">×  </button>
                </div>
            @endif
        </div>
    </div>
    <!-- end page title -->
    <div class="clearfix"></div>
       <div>


                <form method="POST" action="{{ route('resource.update', $resource->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}

                    <div class="row bg-white pt-3">
                        <div class="col-lg-7">
                           <div class="row">
                               <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""> Title</label>
                                        <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$resource->title}}" required autocomplete="title" autofocus>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                               </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Choose Thumbnail image</label>
                                        <input type="file" class="form-control" name="thumnail_url" placeholder="Choose Thumbnail image" id="image">
                                            @error('thumnail_url')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for=""> Shop Url</label>
                                        <input id="name" type="text" class="form-control @error('book_url') is-invalid @enderror" name="book_url" value="{{$resource->book_url}}" autocomplete="book_url" autofocus>
                                    </div>
                               </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Choose Document</label>
                                        <input type="file" class="form-control" name="document_url" placeholder="Choose document" id="image">
                                            @error('document_url')
                                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 ">
                                    <label for="">Description</label>
                                    <textarea id="summernote" name="description" class="form-control">
                                        {{$resource->description}}
                                    </textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-12 text-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                           </div>
                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
@push('custom')

@endpush

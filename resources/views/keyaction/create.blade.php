@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
    <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Key Action</h4>
            </div>
        </div>
        <div class="col-lg-6 text-right text-white">
            <a class="text-info btn btn-outline-info" href="{{route('keyaction.index')}}">key Action</a>
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
                    <form action="{{ route('keyaction.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">Choose Pillars</label>
                            @foreach ($pillar as $item)
                              <div class="form-check">
                                <input class="form-check-input" name="pillars[]"  type="checkbox" value="{{$item->id}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   {{ $item->name}}
                                </label>
                              </div>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label for="">Key Action</label>
                            <textarea class="form-control rounded-0" name="description" id="exampleFormControlTextarea1" rows="5"></textarea>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-info font-weight-bold">Save</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection



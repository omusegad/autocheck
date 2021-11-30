@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Import Job Card </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right text-white">
            <a class="text-info btn btn-outline-info" href="{{route('jobcards.index')}}">Jobcards</a>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('jobcards.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <select class="selectpicker form-control" name="company_id">
                                @foreach($branches as $item)
                                  <option value="{{$item->id}}">{{$item->companyName}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <input type="file" name="file" class="form-control">
                        </div>
                        <button class="btn btn-info"><i class="fas fa-file-import"></i> Import Jobcard</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

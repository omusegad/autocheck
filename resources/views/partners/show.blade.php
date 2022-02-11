@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row mb-2">
        <div class="col-lg-6">
            <div class="page-title-box  d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> {{$country->name }} Matrix ({{ $matrix->year }})</h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn btn-outline-primary" href="{{route('matrix.create')}}">Add Matrix </a>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
                <h1>Matrix Details  </h1>
        </div>
    </div>
</div>

@endsection

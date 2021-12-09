@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Edit Matrix </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right text-white">
            <a class="text-info btn btn-outline-info" href="{{route('matrix.index')}}">Matrix</a>
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
        <div class="col-lg-10">
        <form action="{{ route('matrix.update',$matrix->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}

            <div class="row">
            <div class="form-group col-lg-6">
                <label for="">Matrix</label>
                <input type="text" name="matrixType" class="form-control"  value="{{ $matrix->matrixType }}" required>
            </div>
            <div class="form-group col-lg-6">
                <label for="">Year</label>
                <input type="text" class="form-control" name="year"  value="{{ $matrix->year }}" required>
             </div>
            <div class="form-group col-lg-6">
                <label for="">Choose Country</label>
                <select class="form-control" name="country_id">
                    @foreach($country as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

           <div class="form-group col-lg-6">
                <label for="">Status</label>
                <select class="form-control" name="status">
                      <option value="inProgress">In Progress</option>
                      <option value="seekingApproval">Seeking Approval</option>
                      <option value="inDiscussion">In Discussion</option>
                      <option value="established">Established</option>
                      <option value="notFormulated">Not Formulated</option>
                      <option value="formulated">Formulated</option>
                      <option value="developed">Developed</option>
                      <option value="notDeveloped">Not Developed</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="5" required> "{{ $matrix->description }}</textarea>
            </div>
            <div class="form-group col-lg-6">
               <div class="prio">
                   <label for="">Priority</label>
                    <select class="form-control" name="priority">
                        <option value="low">low</option>
                        <option value="high">High</option>
                        <option value="medium">medium</option>
                    </select>
               </div>
               <div class="submit-bx mt-4 text-right">
                 <button class="btn btn-info text-white font-weight-bold"> UPDATE</button>
               </div>
            </div>

        </div>
        </form>
    </div>
</div>

@endsection

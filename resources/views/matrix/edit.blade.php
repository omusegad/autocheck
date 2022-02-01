@extends('layouts.main')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
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
        <div class="card">
            <div class="card-body">
                <form action="{{ route('matrix.update',$matrix->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="">Choose Pillar</label>
                        <select class="form-control" name="pillar_id">
                            <option disabled selected>Choose pillar</option>
                                @foreach($pillars as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-12">
                        <div class="prio">
                            <label for="">Priority</label>
                            <select class="form-control" name="priority">
                                <option disabled selected>Choose priority</option>
                                <option value="low">low</option>
                                <option value="high">High</option>
                                <option value="medium">medium</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="">Key Action</label>
                        <textarea class="form-control" placeholder="Enter Key Action " name="key_action" id="" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="">Status</label>
                        <textarea class="form-control" placeholder="Enter Status" name="status" id="" cols="30" rows="5" required></textarea>
                    </div>
                    <div class="form-group col-lg-12">
                    <div class="submit-bx mt-4 text-right">
                        <button class="btn btn-info text-white font-weight-bold"> ADD</button>
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

@extends('layouts.main')

@section('content')

<div class="app-main__inner pb-5">
    <div class="app-page-title">
        <div class="row">
            <div class="col-sm-8 d-flex align-items-center">
                <div class="page-title-box py-2">
                    <h4 class="mb-0">Edit {{$matrix->pillar['name']}} data</h4>
                </div>
            </div>
            <div class="col-sm-4 text-right d-flex align-items-center justify-content-end">
                <a class="text-info btn btn-outline-info" href="{{route('matrix.index')}}">View Matrix</a>
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
        <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('matrix.update',$matrix->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="">Choose Pillar</label>
                            <select class="form-control" name="pillar_id">
                                <option value="{{$matrix->pillar['id']}}" selected>{{$matrix->pillar['name']}}</option>
                                    @foreach($pillars as $item)
                                       <option value="{{$item->id}}"> {{$item->name }}</option>
                                    @endforeach
                            </select>
                        </div>
            
                        <div class="form-group col-lg-4">
                            <label for="">Choose Country</label>
                            <select class="form-control " name="country">
                                <option disabled selected>Choose country</option>
                                <option value="{{$matrix->country_symbol."-".$matrix->country}}" selected>{{$matrix->country}}</option>
                                <option value="KM-Comoros">Comoros</option>
                                <option value="DJ-Djibouti">Djibouti</option>
                                <option value="ET-Ethiopia">Ethiopia</option>
                                <option value="EG-Egypt">Egypt</option>
                                <option value="ER-Eritrea">Eritrea</option>
                                <option value="JO-Jordan">Jordan</option>
                                <option value="KE-Kenya">Kenya</option>
                                <option value="MG-Madagascar">Madagascar</option>
                                <option value="MA-Maldives">Maldives</option>
                                <option value="MU-Mauritius">Mauritius</option>
                                <option value="MZ-Mozambique">Mozambique</option>
                                <option value="OM-Oman">Oman</option>
                                <option value="SA-Saudi Arabia">Saudi Arabia</option>
                                <option value="SC-Seychelles">Seychelles</option>
                                <option value="SO-Somalia">Somalia</option>
                                <option value="ZA-South Africa">South Africa</option>
                                <option value="SD-Sudan">Sudan</option>
                                <option value="TZ-Tanzania">Tanzania</option>
                                <option value="AE-United Arab Emirates">United Arab Emirates</option>
                                <option value="YE-Yemen">Yemen</option>
                            </select>
                        </div>
            
                        <div class="form-group col-lg-4">
                            <div class="prio">
                                <label for="">Priority</label>
                                 <select class="form-control" name="priority">
                                    <option value="{{$matrix->priority}}" selected>{{$matrix->priority}}</option>
                                     <option value="low">low</option>
                                     <option value="high">High</option>
                                     <option value="medium">medium</option>
                                 </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="">Key Action</label>
                            <textarea class="form-control" name="key_action" id="" cols="30" rows="5" required>{{$matrix->key_action}}</textarea>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="">Status</label>
                            <textarea class="form-control" name="status" id="" cols="30" rows="5" required>{{$matrix->status}}</textarea>
                        </div>
                        <div class="form-group col-lg-12">
                           <div class="submit-bx mt-4 text-right">
                             <button class="btn btn-info text-white font-weight-bold"> UPDATE</button>
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

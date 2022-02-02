@extends('layouts.main')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Edit {{$matrix->pillar['name']}} </h4>
                </div>
            </div>
            <div class="col-lg-6 text-right text-white">
                <a class="text-info btn btn-outline-info" href="{{route('matrix.index')}}">Matrix</a>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-10">
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
                                <option value="{{$matrix->country_symbol."-".$matrix->country}}" selected>{{$matrix->country}}</option>
                                <option value="DZ-Algeria">Algeria</option>
                                <option value="AO-Angola">Angola</option>
                                <option value="BJ-Benin">Benin</option>
                                <option value="BW-Botswana">Botswana</option>
                                <option value="BF-Burkina Faso">Burkina Faso</option>
                                <option value="BI-Burundi">Burundi</option>
                                <option value="CM-Cameroon">Cameroon</option>
                                <option value="CV-Cape Verde">Cape Verde</option>
                                <option value="CF-Central African Republic">Central African Republic</option>
                                <option value="TD-Chad">Chad</option>
                                <option value="CL-Chile">Chile</option>
                                <option value="KM-Comoros">Comoros</option>
                                <option value="CG-Congo">Congo</option>
                                <option value="CD-Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                <option value="CI-Cote D'Ivoire">Cote D'Ivoire</option>
                                <option value="EG-Egypt">Egypt</option>
                                <option value="GQ-Equatorial Guinea">Equatorial Guinea</option>
                                <option value="ET-Ethiopia">Ethiopia</option>
                                <option value="GA-Gabon">Gabon</option>
                                <option value="GM-Gambia">Gambia</option>
                                <option value="GH-Ghana">Ghana</option>
                                <option value="GN-Guinea">Guinea</option>
                                <option value="GW-Guinea Bissau">Guinea Bissau</option>
                                <option value="KE-Kenya">Kenya</option>
                                <option value="XK-Kosovo">Kosovo</option>
                                <option value="LR-Liberia">Liberia</option>
                                <option value="LY-Libyan">Libyan</option>
                                <option value="MG-Madagascar">Madagascar</option>
                                <option value="MW-Malawi">Malawi</option>
                                <option value="ML-Mali">Mali</option>
                                <option value="MZ-Mozambique">Mozambique</option>
                                <option value="NE-Niger">Niger</option>
                                <option value="NG-Nigeria">Nigeria</option>
                                <option value="RO-Romania">Romania</option>
                                <option value="RW-Rwanda">Rwanda</option>
                                <option value="SN-Senegal">Senegal</option>
                                <option value="RS-Serbia">Serbia</option>
                                <option value="SC-Seychelles">Seychelles</option>
                                <option value="SO-Somalia">Somalia</option>
                                <option value="ZA-South Africa">South Africa</option>
                                <option value="SS-South Sudan">South Sudan</option>
                                <option value="SD-Sudan">Sudan</option>
                                <option value="TZ-Tanzania">Tanzania</option>
                                <option value="TG-Togo">Togo</option>
                                <option value="TO-Tonga">Tonga</option>
                                <option value="UG-Uganda">Uganda</option>
                                <option value="UA-Ukraine">Ukraine</option>
                                <option value="ZM-Zambia">Zambia</option>
                                <option value="ZW-Zimbabwe">Zimbabwe</option>
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

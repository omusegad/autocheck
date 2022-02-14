@extends('layouts.main')

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
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
            <div class="col-lg-6">
                Edit {{ $user->name}}
            </div>
            <div class="col-lg-6 text-right">
                <a class="text-info btn btn-outline-info" href="{{route("members.index")}}">View NFPs</a>
            </div>
        </div>
        <form action="{{ route('members.update',$user->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}
                <div class="row pt-2">
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="card-body m-3">
                            <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="">Choose Country</label>
                                <select class="form-control" name="country">
                                    <option value="{{$user->country_symbol."-".$user->country}}" selected>{{$user->country}}</option>
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


                        <div class="form-group col-lg-6">
                            <label for="">Name</label>
                            <input class="form-control" id="name" type="text"  name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Choose Role</label>
                            <select class="form-control" name="role">
                                <option value="{{$user->role}}" selected>{{$user->role}}</option>
                                <option value="admin">Admin</option>
                                <option value="superAdmin">Super Admin</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                                <label for="">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" >
                            </div>

                        <div class="form-group col-lg-6">
                            <label for="">Phone Number</label>
                            <input class="form-control" type="text"  name="phoneNumber" value="{{ $user->phoneNumber }}"  >

                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Password</label>
                            <input class="form-control" id="password" type="password"  value="" name="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-12">
                            <label for="">Job Title</label>
                            <textarea class="form-control" name="job_title" id="" cols="30" rows="5" >{{$user->job_title}}</textarea>
                        </div>

                        <div class="form-group col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('UPDATE') }}
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                    </div>

                </div>
            </form>
    </div>
</div>
@endsection

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
                                    <option value="KE-Kenya">Kenya</option>
                                    <option value="DJ-Djibouti">Djibouti</option>
                                    <option value="KM-Comoros">Comoros</option>
                                    <option value="ET-Ethiopia">Ethiopia</option>
                                    <option value="JO-Jordan">Jordan</option>
                                    <option value="MG-Madagascar">Madagascar</option>
                                    <option value="MA-Maldives">Maldives</option>
                                    <option value="MU-Mauritius">Mauritius</option>
                                    <option value="MZ-Mozambique">Mozambique</option>
                                    <option value="OM-Oman">Oman</option>
                                    <option value="SA-Saudi Arabia">Saudi Arabia</option>
                                    <option value="SC-Seychelles">Seychelles</option>
                                    <option value="ZA-South Africa">South Africa</option>
                                    <option value="SS-South Sudan">South Sudan</option>
                                    <option value="TZ-Tanzania">Tanzania</option>
                                    <option value="AE-United Arab Emirates">United Arab Emirates</option>
                                    <option value="YE-Yemen">Yemen</option>
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

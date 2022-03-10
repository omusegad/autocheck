@extends('layouts.main')

@section('content')
<div class="app-main__inner pb-5">
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
                <h5>Register NFP</h5>
            </div>
            <div class="col-lg-6 text-right">
                <a class="text-info btn btn-outline-info" href="{{route('members.index')}}">View NFPs</a>
            </div>
        </div>
    </div>
            <form class="mt-2" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row pt-2">
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="card-body m-3">
                            <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="">Choose Country</label>
                                <select class="form-control" name="country">
                                    <option disabled selected>Choose country</option>
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


                        <div class="form-group col-lg-6">
                            <label for="">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Choose Role</label>
                            <select class="form-control" name="role">
                                <option disabled selected>Choose Role</option>
                                <option value="admin">Admin</option>
                                <option value="superAdmin">Super Admin</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="">Phone Number</label>
                            <input  type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}"  autocomplete="phoneNumber">
                            @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="">Password</label>
                            <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>


                        <div class="form-group col-lg-12">
                            <label for="">Job Title</label>
                            <textarea class="form-control" name="job_title" id="" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add') }}
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

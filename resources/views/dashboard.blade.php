@extends('layouts.main')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-database icon"></i>
                </div>
                <div>Dashboard

                </div>
            </div>
        </div>
        <div class="row mb-3 mt-4">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-inverse card-success">
                <div class="card-block bg-success">
                  <div class="rotate">
                    <i class="fa fa-user fa-5x"></i>
                  </div>
                  <h6 class="text-uppercase">Users</h6>
                  <h1 class="display-1">{{$users}}</h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-inverse card-danger">
                <div class="card-block bg-danger">
                  <div class="rotate">
                    <i class="fa fa-list fa-4x"></i>
                  </div>
                  <h6 class="text-uppercase">pillars</h6>
                  <h1 class="display-1">{{$pillars}}</h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-inverse card-info">
                <div class="card-block bg-info">
                  <div class="rotate">
                    <i class="fa fa-twitter fa-5x"></i>
                  </div>
                  <h6 class="text-uppercase">Matrice</h6>
                  <h1 class="display-1">{{$matrix}}</h1>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-inverse card-warning">
                <div class="card-block bg-warning">
                  <div class="rotate">
                    <i class="fa fa-share fa-5x"></i>
                  </div>
                  <h6 class="text-uppercase">Others</h6>
                  <h1 class="display-1">0</h1>
                </div>
              </div>
            </div>
          </div>
    </div>

</div>

@endsection

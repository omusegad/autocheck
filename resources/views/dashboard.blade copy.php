@extends('layouts.main')

@section('content')

<div class="app-main__inner pb-5">

    <div class="app-page-title">
        <div class="row mb-2">
            <div class="col-lg-6">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-tachometer-alt icon"></i>
                    </div>
                    <div>Dashboard
                        <div class="page-title-subheading">
                           Hi {{ Auth::user()->name }}, Welcome back!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row py-5">
                <div class="col-md-3">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading"><i class="fas fa-database icon"></i> Matrice</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$matrix}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading"><i class="fas fa-fist-raised icon"></i> Pillars</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{$pillars}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading"><i class="fas fa-flag icon"></i> Countries</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>20</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-3 widget-content bg-premium-dark">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading"><i class="fas fa-users icon"></i> NFPs</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-warning"><span>{{$users}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="slider-item-dash">
                <img class="img-fluid" src="{{ asset('public/img/ship3.jpg') }}">
            </div>
        </div>
    </div>


</div>


@endsection

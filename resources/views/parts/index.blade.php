@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">

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
      <!-- start page title -->
      <div class="row mb-2">
        <div class="col-lg-6">
            <div class="page-title-box  d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> Spareparts </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn btn-outline-primary" href="{{route('spareparts.create')}}">Add Spareparts </a>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
           <div class="table-responsive">
            <table class="table bg-white  table-striped table-condensed table-hover overflow-y">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Branch</th>
                        <th>otherpJOBNO</th>
                        <th>otherp_tr_date</th>
                        <th>otherp_prt_num</th>
                        <th>otherp_DESCRIPTION</th>
                        <th>otherp_qty_deliver</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @if(!empty($spareparts))
                        @foreach ($spareparts as $item)
                        <tr>
                            <td scope="row">{{ $count++ }}</td>
                            <td>{{ $item->company['companyName'] }} </td>
                            <td>{{ $item->otherpJOBNO }}</td>
                            <td>{{ $item->otherp_tr_date }}</td>
                            <td>{{ $item->otherp_prt_num  }}</td>
                            <td>{{ $item->otherp_DESCRIPTION  }}</td>
                            <td>{{ $item->otherp_qty_deliver  }}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td scope="row"> No Spareparts  found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
           </div>

        </div>
    </div>

</div>

@endsection

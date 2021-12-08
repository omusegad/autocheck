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
                <h4 class="mb-0"> Job Cards </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn btn-outline-primary" href="{{route('jobcards.create')}}">Import jobcard</a>
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
                        <th>companyName</th>
                        <th>wsmast_jobno</th>
                        <th>regno</th>
                        <th>customer</th>
                        <th>account</th>
                        <th>address1</th>
                        <th>address2</th>
                        <th>contact</th>
                        <th>email</th>
                        <th>done17</th>
                        <th>chasisno</th>
                        <th>model</th>
                        <th>jobdate</th>
                        <th>tr_date</th>
                        <th>reference</th>
                        <th>gate_n</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @foreach ($jobs as $item)
                    <tr>
                        <td scope="row">{{ $count++ }}</td>
                        <td scope="row">{{ $item->company['companyName'] }}</td>
                        <td scope="row">{{ $item->wsmast_jobno }}</td>
                        <td scope="row">{{ $item->regno }}</td>
                        <td scope="row">{{ $item->customer }}</td>
                        <td scope="row">{{ $item->account }}</td>
                        <td scope="row">{{ $item->address1 }}</td>
                        <td scope="row">{{ $item->address2 }}</td>
                        <td scope="row">{{ $item->email }}</td>
                        <td scope="row">{{ $item->done17 }}</td>
                        <td scope="row">{{ $item->chasisno }}</td>
                        <td scope="row">{{ $item->model }}</td>
                        <td scope="row">{{ $item->jobdate }}</td>
                        <td scope="row">{{ $item->tr_date }}</td>
                        <td scope="row">{{ $item->reference }}</td>
                        <td scope="row">{{ $item->gate_n }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>

        </div>
    </div>

</div>

@endsection

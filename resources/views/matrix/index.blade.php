@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-6">
            @if ($message = Session::get('message'))
                <div class="alert alert-info alert-dismissable pt-2">
                    <p>{{ Session::get('message') }}</p>
                    <button type = "button" class = "close  close-btn" data-dismiss = "alert" aria-hidden = "true">×  </button>
                </div>
            @endif
        </div>
        <div class="col-lg-6 text-right text-white">
            <a class="text-info btn btn-outline-info" href="{{route('matrix.create')}}"> Add Matrix</a>
        </div>
    </div>
      <!-- start page title -->
      <div class="row mb-2">
        <div class="col-lg-6">
            <div class="page-title-box  d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> Countries Matrix </h4>
            </div>
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
                        <th>Country</th>
                        <th>Matrix</th>
                        <th>Year</th>
                        <th>Status</th>
                        <th>Priority</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @foreach ($matrix as $item)
                    <tr>
                        <td scope="row">{{ $count++ }}</td>
                        <td scope="row">
                            <a href="">{{ $item->country['name'] }}</a>
                            {{-- <a href="{{ route('countries.show', $item->country['id'])}}">{{ $item->country['name'] }}</a> --}}
                        </td>
                        <td scope="row">{{ $item->matrixType }}</td>
                        <td scope="row">{{ $item->year }}</td>
                        <td scope="row">{{ $item->status }}</td>
                        <td scope="row">{{ $item->priority }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <span class="action-btns">
                                <a class="edit-btn" href="{{ route('matrix.edit', $item->id ) }}">
                                     <i class="far fa-edit"></i>
                                </a>
                            </span>
                            <span class="action-btns">
                                <form action="{{ route('matrix.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-danger"> <i class="fa fa-trash"></i></button>
                                </form>
                             </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>

        </div>
    </div>

</div>

@endsection

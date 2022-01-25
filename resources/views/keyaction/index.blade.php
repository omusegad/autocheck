@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">

      <!-- start page title -->
      <div class="row mb-2">
        <div class="col-lg-6">
            <div class="page-title-box  d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> KeyAction </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <a class="btn btn btn-outline-primary" href="{{route('keyaction.create')}}">Add Key Action </a>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
           <div class="table-responsive">
            <table class="table bg-white  table-striped table-condensed table-hover overflow-y">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>slug</th>
                        <th>Key Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @if(!empty($keyActions))
                        @foreach ($keyActions as $item)
                        <tr>
                            <td scope="row">{{ $count++ }}</td>
                            <td scope="row">{{ $item->name }}</td>
                            <td>
                                <span class="action-btns">
                                    <a class="edit-btn" href="{{ route('keyaction.edit', $item->id ) }}">
                                         <i class="far fa-edit"></i>
                                    </a>
                                </span>
                                <span class="action-btns">
                                    <form action="{{ route('keyaction.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div type="submit" class="text-danger"> <i class="fa fa-trash"></i></div>
                                    </form>
                                 </span>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td scope="row"> No Key Actions found!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
           </div>

        </div>
    </div>
</div>

@endsection
@extends('layouts.main')

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
            <!-- start page title -->
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="page-title-box  d-flex align-items-center justify-content-between">
                        <h4 class="mb-0"> Partners </h4>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn btn-outline-primary" href="{{route('partners.create')}}">Add Partner </a>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
    
                
                <div class="table-responsive">
                    <table id="matrix" class="table table-bordered table-hover table-striped data-table w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Country / Organisation</th>
                                <th>Email</th>
                                <th>Acton</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count=1
                            @endphp
                            @if(!empty($partners))
                                @foreach ($partners as $item)
                                <tr>
                                    <td scope="row">{{ $count++ }}</td>
                                    <td scope="row">{{ $item->partnername }}</td>
                                    <td scope="row">{{ $item->country }}</td>
                                    <td scope="row">{{ $item->email }}</td>
                                    <td>
                                        <span class="action-btns">
                                            <a class="edit-btn" href="{{ route('partners.edit', $item->id ) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </span>
                                        <span class="action-btns">
                                            <form action="{{ route('partners.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td scope="row"> No Partners found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                </div>
            </div>
    </div>
</div>
@endsection

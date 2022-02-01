@extends('layouts.main')

@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
            <!-- start page title -->
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="page-title-box  d-flex align-items-center justify-content-between">
                        <h4 class="mb-0"> Pillars </h4>
                    </div>
                </div>
                <div class="col-lg-6 text-right">
                    <a class="btn btn btn-outline-primary" href="{{route('pillars.create')}}">Add Pillars </a>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12">
                <div class="table-responsive">
                    <table id="pillar" class="table table-bordered table-hover table-striped data-tabl w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Pillar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count=1
                            @endphp
                            @if(!empty($pillars))
                                @foreach ($pillars as $item)
                                <tr>
                                    <td scope="row">{{ $count++ }}</td>
                                    <td scope="row">{{ $item->name }}</td>
                                    <td>
                                        <span class="action-btns">
                                            <a class="edit-btn" href="{{ route('pillars.edit', $item->id ) }}">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </span>
                                        <span class="action-btns">
                                            <form action="{{ route('pillars.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
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
                                    <td scope="row"> No Pillars found!</td>
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

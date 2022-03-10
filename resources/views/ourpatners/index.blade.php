@extends('layouts.main')

@section('content')
<div class="app-main__inner">

    <div class="app-page-title">
        <div class="row mb-2">
            <div class="col-sm-8 d-flex align-items-center">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="far fa-handshake icon"></i>
                    </div>
                    <div>Our Partners
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 d-flex align-items-center justify-content-end">
                <a class="btn btn btn-outline-primary" href="{{route('our-partners.create')}}">Add Partner </a>
            </div>
        </div>
    </div>

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

    <!-- end page title -->

    <div class="row pb-5">
        <div class="col-md-12">
            <div class="table-responsive">
            <table id="matrix" class="table table-bordered table-hover table-striped data-table w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Identity</th>
                        <th>Name</th>
                        <th>Profile</th>
                        <th>Specialization</th>
                        <th>Acton</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @if(!empty($ourpartners))
                        @foreach ($ourpartners as $item)
                        <tr>
                            <td scope="row">{{ $count++ }}</td>
                            <td scope="row">
                                <img class="partner-logo" src="{{ asset("storage/app/public".$item->partner_logo) }}" alt="">
                            </td>
                            <td scope="row">{{ $item->partner_name }}</td>
                            <td scope="row">{!! $item->description !!}</td>
                            <td scope="row">{!! $item->specialization_area !!}</td>

                            <td>
                                <span class="action-btns">
                                    <a class="edit-btn" href="{{ route('our-partners.edit', $item->id ) }}">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </span>
                                <span class="action-btns">
                                    <form action="{{ route('our-partners.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
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
@endsection

@extends('layouts.main')

@section('content')
<div class="app-main__inner">
        <div class="app-page-title">
            <div class="row mb-4">
                <div class="col-lg-6">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="fas fa-database icon"></i>
                        </div>
                        <div>Resources
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-right text-white">
                    <a class="text-info btn btn-outline-info" href="{{route('resource.create')}}"> Add Resource</a>
                </div>
            </div>
        </div>

        <div class="content pb-4">
            <div class="row">

                <div class="col-4">
                    <div class="btn-group submitter-group float-right">
                        <div class="input-group-prepend pr-3">
                            <div class="input-group-text">Priority</div>
                        </div>
                        <div class="filter-wrapper">
                            <input type="checkbox" class="filter-checkbox" value="Low" /> Low
                            <input type="checkbox" class="filter-checkbox" value="Medium" /> Medium
                            <input type="checkbox" class="filter-checkbox" value="High" /> High
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <table id="matrix" class="table table-bordered table-hover table-striped data-tabl w-100">
            <thead>
                <tr>
                    <th>Created At</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count=1
            @endphp
            @foreach ($resources as $item)
                <tr>
                    <th>{{ $item->created_at}}</th>
                    <th class="text-capitalize">
                       <a href=""> {{ $item->title ?? "" }}</a>
                    </th>
                    <td>{{ $item->doc_cat }} </td>
                    <td>
                        <span class="action-btns">
                            <a class="edit-btn" href="{{ route('resources.edit', $item->id ) }}">
                                <i class="far fa-edit"></i>
                            </a>
                        </span>

                        <span class="action-btns">
                            <button type="button" class="delete-btn text-danger" data-toggle="modal" data-target="#delete_post_{{ $item->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <div class="modal fade" id="delete_post_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('resources.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
                                        @csrf
                                        @method('DELETE');
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure want to delete "<b>{{ $item->title }}</b>" ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-danger">Yes! Delete It</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </span>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>


@endsection

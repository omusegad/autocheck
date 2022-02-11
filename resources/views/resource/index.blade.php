@extends('layouts.main')

@section('content')
<div class="app-main__inner">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Resources </h4>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                <a class="btn btn btn-outline-primary" href="{{route('all-resources.create')}}">Add Resource </a>
            </div>
        </div>

        <div class="row pb-4">
            <div class="col-lg-12 text-right">
                <div class="btn-group submitter-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Country</div>
                    </div>
                <select class="form-control country-dropdown" name="country">
                    <option value="" >All</option>
                    <option value="Algeria">Algeria</option>
                    <option value="Angola">Angola</option>
                    <option value="Benin">Benin</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Chile">Chile</option>
                    <option value="Comoros">Comoros</option>
                </select>
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
                    <th>Downloads</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count=1
            @endphp
            @foreach ($resources as $item)
                <tr>
                    <td>{{ $item->created_at}}</td>
                    <td class="text-capitalize">
                       <a href="{{ asset('storage/app/public'.$item->dockLink) }}"> {{ $item->title ?? "" }}</a>
                    </td>
                    <td>{{ $item->doc_cat }} </td>
                    <td>
                        <span class="action-btns">
                            <a class="edit-btn" href="{{ route('all-resources.edit', $item->id ) }}">
                                <i class="far fa-edit"></i>
                            </a>
                        </span>

                        <span class="action-btns">
                            <button type="button" class="delete-btn text-danger" data-toggle="modal" data-target="#delete_post_{{ $item->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <div class="modal fade" id="delete_post_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('all-resources.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
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
                    <td>
                        <a href="{{ asset('storage/app/public'.$item->dockLink) }}"> Downloads </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>


@endsection

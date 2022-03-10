@extends('layouts.main')

@section('content')
<div class="app-main__inner pb-5">
    <div class="app-page-title">
        <div class="row">
            <div class="col-sm-8">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-database icon"></i>
                    </div>
                    <div>Countries map Data
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 d-flex align-items-center justify-content-end">
                <a class="text-info btn btn-outline-info" href="{{route('map-data.create')}}"> Add Data</a>
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
    </div>
    
        <div class="content pb-4">
            <div class="row">

                <div class="col-lg-12 text-right">
                    <div class="btn-group submitter-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Country</div>
                        </div>
                    <select class="form-control country-map-dropdown" name="country">
                        <option value="" >All</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Egypt">Egypt</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Oman">Oman</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="United Arab Emirates">United Arab Emirates</option>
                        <option value="Yemen">Yemen</option>
                    </select>
                    </div>
                </div>


            </div>
        </div>

        <table id="matrix" class="table table-bordered table-hover table-striped data-tabl w-100">
            <thead>
                <tr>
                    <th>Created At</th>
                    <th>By</th>
                    <th>Country</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $count=1
            @endphp
            @foreach ($data as $item)
                <tr>
                    <th>{{ $item->created_at}}</th>
                    <th class="text-capitalize">{{ $item->user['name'] ?? "" }}</th>
                    <td>
                        <a class="edit-btn" href="{{ route('by-country', $item->country_symbol ) }}">  {{ $item->country }}</a>
                    </td>
                    <td>{!! $item->status !!}</td>
                    <td>
                        <span class="action-btns">
                            <a class="edit-btn" href="{{ route('map-data.edit', $item->id ) }}">
                                <i class="far fa-edit"></i>
                            </a>
                        </span>
                        @if(Auth::user()->role == "superAdmin")
                        <span class="action-btns">
                            <button type="button" class="delete-btn text-danger" data-toggle="modal" data-target="#delete_post_{{ $item->id }}">
                                <i class="fa fa-trash"></i>
                            </button>
                            <div class="modal fade" id="delete_post_{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ route('map-data.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
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
                                                Are you sure want to delete ?
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
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        </div>
    </div>
</div>


@endsection

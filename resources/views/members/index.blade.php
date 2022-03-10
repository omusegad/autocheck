@extends('layouts.main')

@section('content')

<div class="app-main__inner pb-5">
    
    <div class="app-page-title">
        <div class="row mb-2">
            <div class="col-lg-6">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-users icon"></i>
                    </div>
                    <div>National Focal Points
                        <div class="page-title-subheading">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-right">
                @if(Auth::user()->role == "superAdmin")
                    <a class="text-info btn btn-outline-info" href="{{route('register')}}"> Add NFP</a>
                @endif
            </div>
        </div>
    </div>

 

    <div class="row">
         <div class="content pb-4">
            <div class="row">
                <div class="col-12">
                    <div class="btn-group submitter-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Country</div>
                        </div>
                    <select class="form-control country-dropdown-nfp" name="country">
                        <option value="" >All</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Egypt">Egypt</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kenya">Kenya</option>
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
        <div class="col-md-12">
            <table id="matrix" class="table table-bordered table-hover table-striped data-table w-100">
                <thead>
                    <tr>
                        <th>Created At</th>
                        <th>Country</th>
                        <th>NFP Name</th>
                        <th>Job Title</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->created_at }}</th>
                        <th>{{ $user->country }}</th>
                        <td> <a href="{{ route('members.edit', $user->id ) }}">{{ $user->name }} </a> </td>
                        <td>{{ $user->job_title }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phoneNumber }}</td>
                        <td>
                            @if(Auth::user()->role == "superAdmin")
                            <span class="action-btns">
                                <a class="edit-btn" href="{{ route('members.edit', $user->id ) }}">
                                     <i class="far fa-edit"></i>
                                </a>
                            </span>
                           
                             <span class="action-btns">
                                <button type="button" class="delete-btn text-danger" data-toggle="modal" data-target="#delete_post_{{ $user->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <div class="modal fade" id="delete_post_{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('members.destroy', $user->id) }}" id="form_delete_post_{{ $user->id }}" method="post">
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
                                                    Are you sure want to delete "<b>{{ $user->name }}</b>" ?
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

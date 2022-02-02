@extends('layouts.main')

@section('content')

<div class="app-main__inner pb-5">
    <div class="row mb-4">
        <div class="col-lg-6">
         <h4>Users</h4>
        </div>
        <div class="col-lg-6 text-right">
            @if(Auth::user()->role == "superAdmin")
                <a class="text-info btn btn-outline-info" href="{{route('register')}}"> Add User</a>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table id="users" class="table table-bordered table-hover table-striped data-tabl w-100">
                <thead>
                    <tr>
                        <th>Created At</th>
                        <th>Name</th>
                        <th>Country</th>
                        <th>Phone Number</th>
                        <th>Role</th>
                        <th>Email</th>
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
                        <td> <a href="{{ route('members.edit', $user->id ) }}">{{ $user->name }} </a> </td>
                        <th>{{ $user->country }}</th>
                        <td>{{ $user->phoneNumber }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->email }}</td>
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

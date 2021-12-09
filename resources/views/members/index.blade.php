@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-lg-6">
            <div class="page-title-box  d-flex align-items-center justify-content-between">
                <h4 class="mb-0"> Members </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right text-white">
            <a class="text-info btn btn-outline-info" href="{{route('members.create')}}"> Add Members</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-sm m-0 bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Role or Rovoke</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                   {{ $v }},
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <button type="button"  data-userid="{{  $user->id }}" class="btn btn-outline-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm">
                                Asign
                            </button>
                            <!--  Small modal example -->
                            <div class="modal fade bs-example-modal-sm"  data-userid="{{  $user->id }}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="mySmallModalLabel">Asign Role</h5>
                                            <button type="button" class="btn-close btn btn-outline" data-bs-dismiss="modal" aria-label="Close">
                                                X
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('asign-role.store') }}">
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <ul class="permsion-box">
                                                            <input type="hidden" name="userid" value="{{ $user->id }}">
                                                            @foreach ($roles as $role)
                                                                <li>
                                                                    <input class="form-check-input" type="checkbox" name="role_name"  value="{{ $role->name }}"> {{ $role->name }}</input>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn btn-primary role-btn">
                                                            {{ __('Save') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </td>
                        <td>
                            <span class="action-btns">
                                <a class="edit-btn" href="{{ route('members.edit', $user->id ) }}">
                                     <i class="far fa-edit"></i>
                                </a>
                            </span>
                            <span class="action-btns">
                                <form action="{{ route('members.destroy', $user->id) }}" method="post">
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

@endsection

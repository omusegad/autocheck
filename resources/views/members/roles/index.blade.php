@extends('layouts.main')

@section('content')
<div class="page-content">
<div class="container-fluid">
      <!-- start page title -->
      <div class="row pt-3">
        <div class="col-6">
            <div class="page-title-box d-flex  align-items-center justify-content-between">
                <h4 class="mb-0"> Roles </h4>
            </div>
        </div>
        <div class="col-lg-6 text-right">
            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Add Role</button>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            @if ($message = Session::get('message'))
                <div class="alert alert-info alert-dismissable">
                    <p>{{ Session::get('message') }}</p>
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">×  </button>
                </div>
            @endif
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-12">
            <table class="table table-sm m-0 bg-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Role</th>
                        <th>created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count=1
                    @endphp
                    @foreach ($roles as $role)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

 <!--  Large modal example -->
 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Add Role</h5>
                <button type="button" class="btn-close btn-primary btn-outlined" data-bs-dismiss="modal" aria-label="Close">
                    x
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <select  class="form-control" name="role" id="country" class="county" required>
                                <option value="superAdmin">Super Admin</option>
                                <option value="manager">Manager</option>
                                <option value="member">Member</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
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







@endsection

@extends('layouts.main')

@section('content')
<div class="app-main__inner pb-5">

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-database icon"></i>
                </div>
                <div>DCoC NFP Capacity Building Matrix
                    <div class="page-title-subheading">A Small description of the page
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content pb-4">
        <div class="row">
            <div class="col-3">
                <div class="btn-group submitter-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Country</div>
                    </div>
                    <select class="form-control country-dropdown">
                        <option value="">All</option>
                        @foreach ($countries as $item)
                           <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-5">
                <div class="btn-group submitter-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Pillars</div>
                    </div>
                    <select class="form-control pillar-dropdown">
                        <option value="">All</option>
                        @foreach ($pillars  as $item)
                          <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

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
                <th>Pillar</th>
                <th>Key Action</th>
                <th>Country</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $count=1
        @endphp
        @foreach ($matrix as $item)
            <tr>
                <th>{{ $item->pillar['name'] ?? "" }}</th>
                <td>{{ $item->keyAction['name'] ?? "" }} </td>
                <td>{{ $item->country['name'] ?? "" }} </td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->priority }}</td>
                <td>
                    <span class="action-btns">
                        <a class="edit-btn" href="{{ route('matrix.edit', $item->id ) }}">
                             <i class="far fa-edit"></i>
                        </a>
                    </span>
                    <span class="action-btns">
                        <form action="{{ route('matrix.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
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





@endsection

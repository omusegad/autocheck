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
                    <div> Matrix By Country : {{isset($data[0]['country']) ? $data[0]['country'] : "Country data not available" }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-right text-white">
                <a class="text-info btn btn-outline-info" href="{{route('matrix.index')}}">Matrix</a>
            </div>
        </div>

        <div class="content pb-4">
            <div class="row">
                <div class="col-6">
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

                <div class="col-6">
                    <div class="btn-group submitter-group float-right">
                        <div class="input-group-prepend pr-3">
                            <div class="input-group-text">Priority</div>
                        </div>
                        <div class="filter-wrapper">
                            <input type="checkbox" class="filter-checkbox-c" value="Low" /> Low
                            <input type="checkbox" class="filter-checkbox-c" value="Medium" /> Medium
                            <input type="checkbox" class="filter-checkbox-c" value="High" /> High
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <table id="matrix" class="table table-bordered table-hover table-striped data-tabl w-100">
            <thead>
                <tr>
                    <th>Created_at</th>
                    <th>Pillar</th>
                    <th>Key Action</th>
                    <th>Status</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
            </thead>
              @if(!empty($data))
                <tbody>
                    @php
                    $count=1
                @endphp
           
                @foreach ($data as $item)
                    <tr>
                        <th>{{ $item->created_at }}</th>
                        <th>{{ $item->pillar['name'] ?? "" }}</th>
                        <td>{{ $item->key_action }} </td>
                        <td>{{ $item->status }}</td>
                        <td class="text-capitalize">{{ $item->priority }}</td>
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
             @else
             <tbody>
            </tbody>
             @endif
        </table>

        </div>
    </div>
</div>


@endsection

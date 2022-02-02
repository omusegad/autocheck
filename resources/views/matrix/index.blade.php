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
                    <div>DCoC NFP Capacity Building Matrix
                        <div class="page-title-subheading">
                           All data matrice for all countries
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-right text-white">
                <a class="text-info btn btn-outline-info" href="{{route('matrix.create')}}"> Add Matrix</a>
            </div>
        </div>

        <div class="content pb-4">
            <div class="row">
                
                <div class="col-3">
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
                        <option value="Congo">Congo</option>
                        <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                        <option value="Cote D'Ivoire">Cote D'Ivoire</option>
                        <option value="Egypt">Egypt</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guinea Bissau">Guinea Bissau</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kosovo">Kosovo</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libyan">Libyan</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Mali">Mali</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Romania">Romania</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="South Sudan">South Sudan</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Togo">Togo</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
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
                    <th>Created At</th>
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
                    <th>{{ $item->created_at}}</th>
                    <th class="text-capitalize">{{ $item->pillar['name'] ?? "" }}</th>
                    <td>{{ $item->key_action }} </td>
                    <td>
                        <a class="edit-btn" href="{{ route('by-country', $item->country_symbol ) }}">  {{ $item->country }}</a>
                    </td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->priority }}</td>
                    <td>
                        <span class="action-btns">
                            <a class="edit-btn" href="{{ route('matrix.edit', $item->id ) }}">
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
                                    <form action="{{ route('matrix.destroy', $item->id) }}" id="form_delete_post_{{ $item->id }}" method="post">
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
                                                Are you sure want to delete "<b>{{ $item->pillar['name'] }}</b>" ?
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

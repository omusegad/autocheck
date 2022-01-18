@extends('layouts.main')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fas fa-database icon"></i>
                </div>
                <div>Matrix
                    <div class="page-title-subheading">A Small description of the page
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-hover table-striped data-table">

        <thead>
            <tr>
                <th>Pillar</th>
                <th>Country</th>
                <th>Key Action</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Maritime Security Governance</td>
                <td>Kenya</td>
                <td>English, Italian, German, French</td>
                <td>In Progress</td>
                <td>Low</td>
                <td>This is the desctiption for this matrix</td>
                <td>Edit Delete</td>
            </tr>
            <tr>
                <td>Maritime Security Governance</td>
                <td>Ethipoa</td>
                <td>English, Italian, German, French</td>
                <td>In Progress</td>
                <td>Low</td>
                <td>This is the desctiption for this matrix</td>
                <td>Edit Delete</td>
            </tr>
            <tr>
                <td>Maritime Security Governance</td>
                <td>Somalia</td>
                <td>English, Italian, German, French</td>
                <td>In Progress</td>
                <td>Low</td>
                <td>This is the desctiption for this matrix</td>
                <td>Edit Delete</td>
            </tr>
            <tr>
                <td>Maritime Security Governance</td>
                <td>Eritriea</td>
                <td>English, Italian, German, French</td>
                <td>In Progress</td>
                <td>Low</td>
                <td>This is the desctiption for this matrix</td>
                <td>Edit Delete</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection

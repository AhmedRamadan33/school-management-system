@extends('layouts.master')

@section('title')
    Student Details
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Student Details
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Section</th>
                                            <th>Teacher</th>
                                            <th>Topic</th>
                                            <th>Start at</th>
                                            <th>Meeting id</th>
                                            <th>Password</th>
                                            <th>Join url</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($online_sessions as $online_session)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_session->section->name }}</td>
                                                <td>{{ $online_session->teacher->name }}</td>
                                                <td>{{ $online_session->topic }}</td>
                                                <td>{{ $online_session->start_at}}</td>
                                                <td>{{ $online_session->meeting_id }}</td>
                                                <td>{{ $online_session->password }}</td>
                                                <td>
                                                    <a target="_blank" class="btn btn-success" href="{{$online_session->join_url}}">Join Now</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- row closed -->
@endsection

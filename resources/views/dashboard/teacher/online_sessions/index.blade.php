@extends('layouts.master')
@section('title')
online sessions
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
online sessions
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
                            <a href="{{ route('onlineSessions.create') }}" class="btn btn-success mb-3" role="button"
                                aria-pressed="true">add online session</a>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>Grade</th>
                                            <th>Classroom</th>
                                            <th>Section</th>
                                            <th>Topic</th>
                                            <th>Start At</th>
                                            <th>Join Url</th>
                                            <th>Processes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($online_sessions as $online_session)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $online_session->grade->name }}</td>
                                                <td>{{ $online_session->classroom->name }}</td>
                                                <td>{{ $online_session->section->name }}</td>
                                                <td>{{ $online_session->topic }}</td>
                                                <td>{{ $online_session->start_at }}</td>
                                                <td class="text-danger"><a href="{{ $online_session->join_url }}"
                                                        target="_blank">Join Now</a></td>
                                                <td>
                                                    <a href="{{ route('onlineSessions.edit', $online_session->id) }}"
                                                        class="btn btn-info btn-sm" role="button"
                                                        aria-pressed="true"><i class="fa fa-edit"></i></a>

                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_receipt{{ $online_session->id }}"><i
                                                            class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            @include('dashboard.teacher.online_sessions.delete')
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

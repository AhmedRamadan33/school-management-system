@extends('layouts.master')
@section('title')
    final degrees
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    final degrees
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
                                            <th>Name</th>
                                            <th>Grade</th>
                                            <th>Classroom</th>
                                            <th>Section</th>
                                            <th>Academic Year</th>
                                            <th>Sum</th>
                                            <th>Gpa</th>
                                            <th>Show</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($marks as $mark)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ Auth::guard('student')->user()->name }}</td>
                                                <td>{{ $mark->grade->name }}</td>
                                                <td>{{ $mark->classroom->name }}</td>
                                                <td>{{ $mark->section->name }}</td>
                                                <td>{{ $mark->academic_year }}</td>
                                                <td>{{ $mark->sum }}</td>
                                                <td>{{ Auth::guard('student')->user()->gpa }}</td>

                                                <td>
                                                    <a href="{{ route('finalDegrees.show', $mark->id) }}"
                                                        class="btn btn-outline-success btn-sm" role="button"
                                                        aria-pressed="true">
                                                        <i class="fas fa-person-booth"></i></a>
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

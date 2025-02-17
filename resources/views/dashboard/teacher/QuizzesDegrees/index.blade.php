@extends('layouts.master')

@section('title')
    Quizzes List
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Quizzes List
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
                                            <th>Quiz Name</th>
                                            <th>Subject</th>
                                            <th>Grade</th>
                                            <th>Classroom</th>
                                            <th>Section</th>
                                            <th>Student</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($quizzes as $quiz)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $quiz->name }}</td>
                                                <td>{{ $quiz->subject->name }}</td>
                                                <td>{{ $quiz->grade->name }}</td>
                                                <td>{{ $quiz->classroom->name }}</td>
                                                <td>{{ $quiz->section->name }}</td>
                                                <td>

                                                    <a href="{{ route('quizzesDegrees.show', $quiz->id) }}"
                                                        class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true">Show <i class="far fa-eye"></i></a>
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

@extends('layouts.master')
@section('title')
student exams
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
    student exams
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
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>subject</th>
                                            <th>quiz Name </th>

                                            <th>Enter / Score</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($quizzes as $quiz)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$quiz->subject->name}}</td>
                                                <td>{{$quiz->name}}</td>
                                                <td>
                                                    @if($quiz->degree->count() > 0 && $quiz->id == $quiz->degree[0]->quiz_id)
                                                        {{$quiz->degree[0]->score}}
                                                    @else
                                                        <a href="{{route('exams.show',$quiz->id)}}"
                                                           class="btn btn-outline-success btn-sm" role="button"
                                                           aria-pressed="true" onclick="alertAbuse()">
                                                            <i class="fas fa-person-booth"></i></a>
                                                    @endif
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
@section('js')
        <script>
            function alertAbuse() {
                alert(" Please do not reload the page after entering the test If this is done, the test will be automatically canceled");
            }
        </script>
@endsection

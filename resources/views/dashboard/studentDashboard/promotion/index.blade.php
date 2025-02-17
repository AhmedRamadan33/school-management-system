@extends('layouts.master')

@section('title')
 Promotions List 
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Promotions List 
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
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">Student</th>
                                            <th class="alert-danger">Old Educational stage</th>
                                            <th class="alert-danger">Old Academic Year</th>
                                            <th class="alert-danger">Old Class</th>
                                            <th class="alert-danger"> Old Section</th>
                                            <th class="alert-success">Current Educational stage</th>
                                            <th class="alert-success">Current Academic Year</th>
                                            <th class="alert-success">Current Class</th>
                                            <th class="alert-success">Current Section</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->fromGrade->name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->fromClassroom->name}}</td>
                                                <td>{{$promotion->fromSection->name}}</td>
                                                <td>{{$promotion->toGrade->name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->toClassroom->name}}</td>
                                                <td>{{$promotion->toSection->name}}</td>
                                                <td>
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

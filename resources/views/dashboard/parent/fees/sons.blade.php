@extends('layouts.master')
@section('title')
    Students List
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Students List
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
                                            <th> Email</th>
                                            <th> Gender </th>
                                            <th> Grade</th>
                                            <th> Classrooms </th>
                                            <th> Section </th>
                                            <th> Degrees </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->gender->name }}</td>
                                                <td>{{ $student->grade->name }}</td>
                                                <td>{{ $student->classroom->name }}</td>
                                                <td>{{ $student->section->name }}</td>
                                                <td>
                                                    <a target="_blank" class=" btn btn-success" href="{{route('sonFee.show',$student->id)}}"> Show <i style="color: #ffc107" class="far fa-eye "></i>&nbsp;</a>
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
@toastr_js
@toastr_render
@endsection

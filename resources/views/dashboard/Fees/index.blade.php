@extends('layouts.master')
@section('title')
Fees
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    Fees
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
                            <a href="{{ route('fees.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true"> Add Fee </a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Price</th>
                                            <th>Grade</th>
                                            <th>Classroom</th>
                                            <th>Academic Year</th>
                                            <th>Processes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fees as $fee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $fee->type == 1 ? 'Academic Year Fees' : 'Bus Fees'}}</td>
                                                <td>{{ number_format($fee->amount, 2) }}</td>
                                                <td>{{ $fee->grade->name }}</td>
                                                <td>{{ $fee->classroom->name }}</td>
                                                <td>{{ $fee->year }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#Delete_Fee{{ $fee->id }}"
                                                        title="Delete"><i
                                                            class="fa fa-trash"></i></button>
                                                    <a href="{{route('fees.show',$fee->id)}}" class="btn btn-warning btn-sm" role="button"
                                                        aria-pressed="true"><i class="far fa-eye"></i></a>

                                                </td>
                                            </tr>
                                            <!-- Deleted inFormation Student -->
                                            <div class="modal fade" id="Delete_Fee{{ $fee->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 style="font-family: 'Cairo', sans-serif;"
                                                                class="text-warning" id="exampleModalLabel">
                                                                Warning </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('fees.destroy', $fee->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <h5 style="font-family: 'Cairo', sans-serif;"> 
                                                                Delete Fee </h5>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                    <button
                                                                        class="btn btn-danger">submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

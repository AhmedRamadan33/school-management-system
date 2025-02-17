@extends('layouts.master')
@section('title')
Students Fees
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Students Fees
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="card-body">
                    <div class="tab nav-border">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <thead>
                                        <tr class="alert-success">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Grade</th>
                                            <th>Classroom</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($invoices as $invoice)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $invoice->student->name }}</td>
                                            <td>{{ $invoice->date }}</td>
                                            <td>{{ $invoice->grade->name }}</td>
                                            <td>{{ $invoice->classroom->name }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- row closed -->
    @endsection

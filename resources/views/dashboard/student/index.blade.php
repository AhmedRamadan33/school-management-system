@extends('layouts.master')

@section('page-header')
 <div class="page-title" >
        <div class="row">
            <div class="col-sm-6" >
                <h3 class="main-content-title tx-24 mg-b-1 mg-b-lg-1 mb-3">Welcome Back Student : <span class="texxt ml-2 text-success"> {{auth()->user()->name}}</span></h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
   
    <!-- widgets -->
    <div class="row" >
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-danger">
                                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark ">Grade</p>
                        </div>
                    </div>
                    <h6 class="text-muted pt-3 mb-0 mt-2 border-top">
                        {{Auth::user()->grade->name}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-danger">
                                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark ">Classroom</p>
                        </div>
                    </div>
                    <h6 class="text-muted pt-3 mb-0 mt-2 border-top">
                        {{Auth::user()->classroom->name}}
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-danger">
                                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark ">Section</p>
                        </div>
                    </div>
                    <h4 class="text-muted pt-3 mb-0 mt-2 border-top">
                        {{Auth::user()->section->name}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-danger">
                                <i class="fa fa-bar-chart-o highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark ">Gpa</p>
                        </div>
                    </div>
                    <h4 class="text-muted pt-3 mb-0 mt-2 border-top">
                        {{Auth::user()->gpa}}
                    </h4>
                </div>
            </div>
        </div>
    </div>


    <livewire:calendar-student/>

@endsection
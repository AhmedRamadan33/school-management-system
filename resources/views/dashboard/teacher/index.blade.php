@extends('layouts.master')

@section('page-header')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1 mb-3">Welcome Back Teacher : <span
                        class="texxt ml-2 text-success"> {{ auth()->user()->name }}</span></h2>
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
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-success">
                                <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark">Number of students </p>
                            <h4>{{ $student_count }}</h4>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-warning">
                                <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark">Number of section </p>
                            <h4>{{ $section_count }}</h4>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <livewire:calendar/>
@endsection

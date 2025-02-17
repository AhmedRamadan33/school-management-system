@extends('layouts.master')

@section('page-header')
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1 mb-3">Welcome Back Parent : <span
                        class="texxt ml-2 text-success"> {{ auth()->user()->father_name }}</span></h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                </ol>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-success">
                                <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark">Number of your sons in school </p>
                            <h4>{{ $student_count }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <section style="background-color: #eeeeee00;" class=" mb-5">
        <div class="container py-5">
            <div class="row justify-content-center">
                 @foreach($students as $student)
                    <div class="col-md-8 col-lg-6 col-xl-4">
                            <div class="card text-black">
                               <div class="text-center">
                                <img class="w-50 mt-3" src="{{URL::asset('assets/images/student.png')}}"/>
                               </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5 style="font-family: 'Cairo', sans-serif"
                                            class="card-title">{{$student->name}}</h5>
                                        <p class="text-muted mb-4"> Student Info</p>
                                    </div>
                                    <div>
                                        <div >
                                            <span>Grade : </span> <span class=" text-muted"> {{ $student->grade->name}}</span>
                                        </div>
                                        <div >
                                            <span>Classroom :</span> <span class=" text-muted"> {{ $student->classroom->name}}</span>
                                        </div>
                                        <div >
                                            <span>Section : </span> <span class=" text-muted"> {{ $student->section->name}}</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <livewire:calendar-student/>
@endsection

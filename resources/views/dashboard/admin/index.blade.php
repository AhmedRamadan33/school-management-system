@extends('layouts.master')
@section('page-header')
 <div class="page-title" >
        <div class="row">
            <div class="col-sm-6" >
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1 mb-3">Welcome Back Admin : <span class="texxt ml-2 text-success"> {{auth()->user()->name}}</span></h2>
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
                            <span class="text-success">
                                <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark">Number Of Students</p>
                            <h4>{{\App\Models\Student::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('students.index')}}" target="_blank"><span class="text-danger">Show</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-warning">
                                <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark">Number Of Teachers</p>
                            <h4>{{\App\Models\Teacher::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('teachers.index')}}" target="_blank"><span class="text-danger">Show</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-success">
                                <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark">Number Of Parents</p>
                            <h4>{{\App\Models\MyParent::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('parents.index')}}" target="_blank"><span class="text-danger">Show</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-right">
                            <span class="text-primary">
                                <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-left text-left">
                            <p class="card-text text-dark">Number Of Sections</p>
                            <h4>{{\App\Models\Section::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('sections.index')}}" target="_blank"><span class="text-danger">Show</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Orders Status widgets-->

    <div class="row">

        <div  style="height: 400px;" class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="tab nav-border" style="position: relative;">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block w-100">
                                <h5 style="font-family: 'Cairo', sans-serif" class="nav-link"> Last Operations On System</h5>
                            </div>
                            <div class="d-block d-md-flex nav-tabs-custom">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                           href="#students" role="tab" aria-controls="students"
                                           aria-selected="true"> Students</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                           role="tab" aria-controls="teachers" aria-selected="false">Teacher
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                           role="tab" aria-controls="parents" aria-selected="false"> Parents
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                           role="tab" aria-controls="fee_invoices" aria-selected="false">Invoices
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">

                            {{--students Table--}}
                            <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>Name </th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Grade</th>
                                            <th>Classroom</th>
                                            <th>Section</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse(\App\Models\Student::latest()->take(5)->get() as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->gender->name}}</td>
                                                <td>{{$student->grade->name}}</td>
                                                <td>{{$student->classroom->name}}</td>
                                                <td>{{$student->section->name}}</td>
                                                <td class="text-success">{{$student->created_at}}</td>
                                                @empty
                                                    <td class="alert-danger" colspan="8"> You Not Have Data Yet</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--teachers Table--}}
                            <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Joining Date</th>
                                            <th>Specialization</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>

                                        @forelse(\App\Models\Teacher::latest()->take(5)->get() as $teacher)
                                            <tbody>
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$teacher->name}}</td>
                                                <td>{{$teacher->genders->name}}</td>
                                                <td>{{$teacher->joining_date}}</td>
                                                <td>{{$teacher->specializations->name}}</td>
                                                <td class="text-success">{{$teacher->created_at}}</td>
                                                @empty
                                                <td class="alert-danger" colspan="8"> You Not Have Data Yet</td>
                                            </tr>
                                            </tbody>
                                        @endforelse
                                    </table>
                                </div>
                            </div>

                            {{--parents Table--}}
                            <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>Father Name</th>
                                            <th>Email</th>
                                            <th>National ID</th>
                                            <th>Phone</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse(\App\Models\MyParent::latest()->take(5)->get() as $parent)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$parent->father_name}}</td>
                                                <td>{{$parent->email}}</td>
                                                <td>{{$parent->father_national_id}}</td>
                                                <td>{{$parent->father_phone}}</td>
                                                <td class="text-success">{{$parent->created_at}}</td>
                                                @empty
                                                <td class="alert-danger" colspan="8"> You Not Have Data Yet</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--sections Table--}}
                            <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>Date </th>
                                            <th>Student Name</th>
                                            <th>Grade </th>
                                            <th>Classroom</th>
                                            <th>Fee</th>
                                            <th>Amount</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse(\App\Models\Invoice::latest()->take(10)->get() as $invoice)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$invoice->date}}</td>
                                                <td>{{$invoice->student->name}}</td>
                                                <td>{{$invoice->grade->name}}</td>
                                                <td>{{$invoice->classroom->name}}</td>
                                                <td>{{$invoice->fee->type == 1 ? 'Academic Year Fees' :  'Bus Fees' }}</td>
                                                <td>{{$invoice->amount}}</td>
                                                <td class="text-success">{{$invoice->created_at}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="alert-danger" colspan="8"> You Not Have Data Yet</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <livewire:calendar/>


@endsection

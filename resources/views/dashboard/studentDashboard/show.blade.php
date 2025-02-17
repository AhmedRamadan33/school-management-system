@extends('layouts.master')

@section('title')
Student Details
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Student Details
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
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                    role="tab" aria-controls="home-02"
                                    aria-selected="true">Student Details </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                    role="tab" aria-controls="profile-02"
                                    aria-selected="false">Attachments</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3"
                                    role="tab" aria-controls="tab3"
                                    aria-selected="false">Accounts</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                aria-labelledby="home-02-tab">
                                <table class="table table-striped table-hover" style="text-align:center">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{ $Student->name }}</td>
                                            <th scope="row">Email</th>
                                            <td>{{ $Student->email }}</td>
                                            <th scope="row"> Gender</th>
                                            <td>{{ $Student->gender->name }}</td>
                                            <th scope="row">Nationality</th>
                                            <td>{{ $Student->nationality->name }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Grade</th>
                                            <td>{{ $Student->grade->name }}</td>
                                            <th scope="row">Classrooms</th>
                                            <td>{{ $Student->classroom->name }}</td>
                                            <th scope="row">Section</th>
                                            <td>{{ $Student->section->name }}</td>
                                            <th scope="row">Birth Date</th>
                                            <td>{{ $Student->birth_date }}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">Parent</th>
                                            <td>{{ $Student->parent->father_name }}</td>
                                            <th scope="row">Academic Year</th>
                                            <td>{{ $Student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="profile-02" role="tabpanel" aria-labelledby="profile-02-tab">
                                <div class="card card-statistics">
                                    <table class="table center-aligned-table mb-0 table table-hover"
                                        style="text-align:center">
                                        <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">File Name</th>
                                                <th scope="col">created at</th>
                                                <th scope="col">Processes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Student->images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{ $attachment->id }}</td>
                                                    <td>{{ $attachment->name }}</td>
                                                    <td>{{ $attachment->created_at->diffForHumans() }}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                            href="{{ url('students/download') }}/{{ $attachment->imageable_id}}/{{ $attachment->name}}"
                                                            role="button"><i class="fas fa-download"></i>&nbsp;
                                                            Download</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                            data-toggle="modal"
                                                            data-target="#Delete_img{{ $attachment->id }}"
                                                            title="Delete">Delete
                                                        </button>

                                                    </td>
                                                </tr>
                                                <!-- Deleted inFormation Student -->
                                                <div class="modal fade" id="Delete_img{{ $attachment->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;"
                                                                    class="text-danger" id="exampleModalLabel">
                                                                    Delete Attachment
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('students.delete_file',$attachment->id)}}"
                                                                    method="post">
                                                                    @csrf

                                                                    <h5 style="font-family: 'Cairo', sans-serif;">
                                                                        Attachment Name 
                                                                    </h5>
                                                                    <input hidden type="text" name="imageable_id" 
                                                                        value="{{ $attachment->imageable_id }}">

                                                                        <input type="text" name="name" readonly
                                                                        value="{{ $attachment->name }}"
                                                                        class="form-control">

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
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                             {{-- Start Student accounts --}}
                             <div class="tab-pane fade" id="tab3">
                                <div class="table-responsive">
                                    <table class="table table-hover text-md-nowrap text-center" id="example1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($student_accounts as $student_account)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $student_account->date }}</td>
                                                    <td>{{ $student_account->debit }}</td>
                                                    <td>{{ $student_account->credit }}</td>
                                                    <td></td>
                                                </tr>
                                                <br>
                                            @endforeach
                                            <tr>
                                                <th colspan="2" scope="row" class="alert alert-success">
                                                    Total
                                                </th>
                                                <td class="alert alert-primary">
                                                    {{ number_format($debit = $student_accounts->sum('debit'), 2) }}
                                                </td>
                                                <td class="alert alert-primary">
                                                    {{ number_format($credit = $student_accounts->sum('credit'), 2) }}
                                                </td>
                                                <td class="alert alert-danger">
                                                    <span
                                                        class="text-{{ $debit - $credit > 0 ? 'success' : 'danger' }}">
                                                        {{ $debit - $credit }}
                                                        {{ $debit - $credit > 0 ? 'debit' : 'credit' }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                            </div>
                            {{-- End Student accounts --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- row closed -->
    @endsection


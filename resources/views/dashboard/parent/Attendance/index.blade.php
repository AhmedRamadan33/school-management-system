@extends('layouts.master')
@section('title')
    Attendance Report
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Attendance Report
@stop
<!-- breadcrumb -->

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form method="post" action="{{ route('sonAttendance.search') }}" autocomplete="off">
                        @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue"> Attendance</h6><br>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="student">Students</label>
                                    <select class="custom-select mr-sm-2" name="student_id">
                                        <option disabled selected>choose</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('student_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="student">Teacher</label>
                                    <select class="custom-select mr-sm-2" name="teacher_id">
                                        <option disabled selected>choose</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">submit</button>
                    </form>
                    @isset($attendances)
                        <div class="table-responsive mt-5">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                                style="text-align: center">
                                <thead>
                                    <tr>
                                        <th class="alert-success">#</th>
                                        <th class="alert-success">Student</th>
                                        <th class="alert-success">Teacher</th>
                                        <th class="alert-success">Date</th>
                                        <th class="alert-warning">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attendance->student->name }}</td>
                                            <td>{{ $attendance->teacher->name }}</td>
                                            <td>{{ $attendance->date }}</td>

                                            <td class="text-white bg-{{ $attendance->status == 1 ? 'success' : 'danger' }} ">
                                                {{ $attendance->status == 1 ? 'Attended' : 'Absent' }}</td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    @endisset

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

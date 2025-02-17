@extends('layouts.master')

@section('title')
Attendance
@endsection
@section('content')
    <!-- row -->

    <h5 class=" text-success">Date: {{ date('Y-m-d') }}</h5>

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">Date</th>
                <th class="alert-success">Name</th>
                <th class="alert-success">Email</th>
                <th class="alert-success">Gender</th>
                <th class="alert-success">Grade</th>
                <th class="alert-success">Classroom</th>
                <th class="alert-success">Section</th>
                <th class="alert-success">status</th>
                <th class="alert-success">Processes</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($attendances as $attendance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $attendance->date }}</td>
                    <td>{{ $attendance->student->name }}</td>
                    <td>{{ $attendance->student->email }}</td>
                    <td>{{ $attendance->student->gender->name }}</td>
                    <td>{{ $attendance->student->grade->name }}</td>
                    <td>{{ $attendance->student->classroom->name }}</td>
                    <td>{{ $attendance->student->section->name }}</td>
                    <td class=" text-white bg-{{$attendance->status == 1 ? 'success' : 'danger'}} ">{{ $attendance->status == 1 ? 'Attended' : 'Absent'}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                        data-target="#edit{{ $attendance->id }}"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
                @include('dashboard.teacher.Attendance.edit')

            @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">submit</button>
        </P>
    <!-- row closed -->
@endsection


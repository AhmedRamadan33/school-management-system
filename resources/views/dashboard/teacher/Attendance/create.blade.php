@extends('layouts.master')

@section('title')
    Attendance
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show col-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h5 class=" text-success">Date: {{ date('Y-m-d') }}</h5>
    <form method="post" action="{{ route('attendance.store') }}">

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
            style="text-align: center">
            <thead>
                <tr>
                    <th class="alert-success">#</th>
                    <th class="alert-success">Name</th>
                    <th class="alert-success">Email</th>
                    <th class="alert-success">Gender</th>
                    <th class="alert-success">Grade</th>
                    <th class="alert-success">Classroom</th>
                    <th class="alert-success">Section</th>
                    <th class="alert-success">Processes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender->name }}</td>
                        <td>{{ $student->grade->name }}</td>
                        <td>{{ $student->classroom->name }}</td>
                        <td>{{ $student->section->name }}</td>
                        <td>

                            @if (isset($student->attendance()->where('date', date('Y-m-d'))->first()->student_id))
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input name="attendences[{{ $student->id }}]" disabled
                                        {{ $student->attendance()->where('date', date('Y-m-d'))->first()->status == 1 ? 'checked' : '' }}
                                        class="leading-tight" type="radio" value="presence">
                                    <span class="text-success">presence</span>
                                </label>

                                <label class="ml-4 block text-gray-500 font-semibold">
                                    <input name="attendences[{{ $student->id }}]" disabled
                                        {{ $student->attendance()->where('date', date('Y-m-d'))->first()->status == 0 ? 'checked' : '' }}
                                        class="leading-tight" type="radio" value="absence">
                                    <span class="text-danger">absence</span>
                                </label>
                            @else
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                        value="presence">
                                    <span class="text-success">presence</span>
                                </label>

                                <label class="ml-4 block text-gray-500 font-semibold">
                                    <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                        value="absence">
                                    <span class="text-danger">absence</span>
                                </label>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">submit</button>
        </P>
    </form><br>
    <!-- row closed -->
@endsection

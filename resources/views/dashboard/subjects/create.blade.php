@extends('layouts.master')
@section('title')
Add Subjects
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Add Subjects
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('subjects.store')}}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-3">
                                        <label for="title"> Name</label>
                                        <input type="text" name="name" class="form-control">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="inputState"> Grade</label>
                                        <select class="custom-select my-1 mr-sm-2" name="grade_id">
                                            <option selected disabled>Choose...</option>
                                            @foreach($grades as $grade)
                                                <option value="{{$grade->id}}">{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('grade_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="inputState"> Classes</label>
                                        <select name="classroom_id" class="custom-select my-1 mr-sm-2"></select>
                                        @error('classroom_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>


                                    <div class="form-group col-3">
                                        <label for="inputState">Teacher Name</label>
                                        <select class="custom-select my-1 mr-sm-2" name="teacher_id">
                                            <option selected disabled>Choose...</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('teacher_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@extends('layouts.master')

@section('title')
   Add Quizzes

@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Add Quizzes
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
                            <form action="{{route('quizzes.store')}}" method="post" >
                                @csrf

                                <div class="form-row mb-5">
                                    <div class="col">
                                        <label for="title">Quiz Name</label>
                                        <input type="text" name="name" class="form-control">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="subject_id"> Subject : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                <option selected disabled> Choose...</option>
                                                @foreach($subjects as $subject)
                                                    <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subject_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div>
                                <br><br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="grade_id"> Grade : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="grade_id">
                                                <option selected disabled>Choose...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('grade_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="classroom_id"> Classrooms : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="classroom_id">

                                            </select>
                                            @error('classroom_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">Section : </label>
                                            <select class="custom-select mr-sm-2" name="section_id">

                                            </select>
                                            @error('section_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection


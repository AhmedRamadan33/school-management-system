@extends('layouts.master')
@section('title')
    Add Graduate
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Add Graduate
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                        <form action="{{route('graduated.softDelete')}}" method="post">
                        @csrf
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">Grade</label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled>Choose...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">classrooms<span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id">

                                </select>
                                @error('classroom_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group col">
                                <label for="section_id">Sections</label>
                                <select class="custom-select mr-sm-2" name="section_id">

                                </select>
                                @error('section_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">submit</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
    <!-- row closed -->
@endsection


@extends('layouts.master')

@section('title')
    Students Promotions
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Students Promotions
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                        <h6 style="color: red;font-family: Cairo"> Old Educational stage</h6><br>

                    <form method="post" action="{{ route('promotion.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">Grade<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade_id" >
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
                                <label for="classroom_id"> classrooms<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id" >

                                </select>
                                @error('classroom_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="form-group col">
                                <label for="section_id"> section<span class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="section_id" >

                                </select>
                                @error('section_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year"> Academic Year<span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>Choose...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('academic_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>



                        </div>
                        <br><h6 style="color: red;font-family: Cairo"> New Educational stage</h6><br>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputState">New Grade<span class="text-danger">*</span> </label>
                                <select class="custom-select mr-sm-2" name="grade_id_new" >
                                    <option selected disabled> Choose...</option>
                                    @foreach($Grades as $Grade)
                                        <option value="{{$Grade->id}}">{{$Grade->name}}</option>
                                    @endforeach
                                </select>
                                @error('grade_id_new')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group col">
                                <label for="Classroom_id">New Classrooms<span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id_new" >

                                </select>
                                @error('classroom_id_new')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group col">
                                <label for="section_id"> New Section<span class="text-danger">*</span> </label>
                                <select class="custom-select mr-sm-2" name="section_id_new" >

                                </select>
                                @error('section_id_new')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year"> New Academic Year<span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year_new">
                                        <option selected disabled> Choose...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>
                                    @error('academic_year_new')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
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

@extends('layouts.master')

@section('title')
 Edit Student
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Edit Student
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form action="{{ route('students.update', $Students->id) }}" method="post" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        Personal Information</h6><br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Name : <span
                                        class="text-danger">*</span></label>
                                <input value="{{$Students->name}}" type="text" name="name" class="form-control">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        
                        <div class="col">
                            <div class="form-group">
                                <label for="parent_id">Parent : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="parent_id">
                                    <option selected disabled> Choose ...</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}"
                                            {{ $parent->id == $Students->parent_id ? 'selected' : '' }}>
                                            {{ $parent->father_name }}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Email : </label>
                                <input type="email" value="{{ $Students->email }}" name="email"
                                    class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="gender_id">
                                    <option selected disabled>Choose...</option>
                                    @foreach ($Genders as $Gender)
                                        <option value="{{ $Gender->id }}"
                                            {{ $Gender->id == $Students->gender_id ? 'selected' : '' }}>
                                            {{ $Gender->name }}</option>
                                    @endforeach
                                </select>
                                @error('gender_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nal_id">Nationality : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="nationalitie_id">
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($nationals as $nal)
                                        <option value="{{ $nal->id }}"
                                            {{ $nal->id == $Students->nationalitie_id ? 'selected' : '' }}>
                                            {{ $nal->name }}</option>
                                    @endforeach
                                </select>
                                @error('nationalitie_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="blood_id"> blood Type : </label>
                                <select class="custom-select mr-sm-2" name="blood_id">
                                    <option selected disabled>Choose ...</option>
                                    @foreach ($bloods as $blood)
                                        <option value="{{ $blood->id }}"
                                            {{ $blood->id == $Students->blood_id ? 'selected' : '' }}>{{ $blood->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('blood_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Birth Date :</label>
                                <input class="form-control" type="text" value="{{ $Students->birth_date }}"
                                    id="datepicker-action" name="birth_date" data-date-format="yyyy-mm-dd">
                                    @error('birth_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        Student Information</h6><br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="grade_id"> Grade : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    <option selected disabled> Choose ...</option>
                                    @foreach ($Grades as $Grade)
                                        <option value="{{ $Grade->id }}"
                                            {{ $Grade->id == $Students->grade_id ? 'selected' : '' }}>
                                            {{ $Grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="classroom_id"> classrooms : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id">
                                    <option value="{{ $Students->classroom_id }}">
                                        {{ $Students->classroom->name }}</option>
                                </select>
                                @error('classroom_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Section : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="{{ $Students->section_id }}">
                                        {{ $Students->section->name }}</option>
                                </select>
                                @error('section_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">Aacademic Year : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="academic_year">
                                    <option selected disabled>Choose...</option>
                                    @php
                                        $current_year = date('Y');
                                    @endphp
                                    @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                        <option value="{{ $year }}"
                                            {{ $year == $Students->academic_year ? 'selected' : ' ' }}>
                                            {{ $year }}</option>
                                    @endfor
                                </select>
                                @error('academic_year')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="col-form-label">Images</label>
                                <input multiple name="photos[]" class="form-control dropify" accept="image/*"
                                    type="file" data-default-file="">
                                    @error('photos')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div><br>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection


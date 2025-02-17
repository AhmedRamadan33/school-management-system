@extends('layouts.master')

@section('title')
Add Fees
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Add Fees
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form method="post" action="{{ route('fees.store') }}" >
                    @csrf
                    <div class="form-row">

                        <div class="form-group col">
                            <label for="inputZip">Type</label>
                            <select class="custom-select mr-sm-2" name="type">
                                <option selected disabled>Choose...</option>
                                <option value="1">Academic Year Fees</option>
                                <option value="2">Bus Fees</option>
                            </select>
                            @error('type')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group col">
                            <label for="inputEmail4">Price</label>
                            <input type="number" name="amount" class="form-control">
                            @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col">
                            <label for="inputState">Grade</label>
                            <select class="custom-select mr-sm-2" name="grade_id">
                                <option selected disabled> Choose...</option>
                                @foreach ($Grades as $Grade)
                                    <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="form-group col">
                            <label for="inputZip"> Classroom </label>
                            <select class="custom-select mr-sm-2" name="classroom_id">

                            </select>
                            @error('classroom_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="form-group col">
                            <label for="inputZip">Academic Year</label>
                            <select class="custom-select mr-sm-2" name="year">
                                <option selected disabled>Choose...</option>
                                @php
                                    $current_year = date('Y');
                                @endphp
                                @for ($year = $current_year; $year <= $current_year + 1; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                            @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
                       
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection


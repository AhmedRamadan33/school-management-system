@extends('layouts.master')

@section('title')
    Edit Teacher
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Edit Teacher
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
                            <form action="{{route('teachers.update',$Teachers->id)}}" method="post">
                             @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Name</label>
                                    <input type="text" name="name" value="{{ $Teachers->name }}" class="form-control">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col">
                                    <label for="title">Email</label>
                                    <input type="email" name="email" value="{{$Teachers->email}}" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                            </div>
            
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Specialization</label>
                                    <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                        @foreach($specializations as $specialization)
                                        <option {{$Teachers->specialization_id == $specialization->id ? 'selected' : ''}} value="{{$specialization->id}}">{{$specialization->name}}</option>
                                    @endforeach

                                    </select>
                                    @error('specialization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Gender</label>
                                    <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                        @foreach($genders as $gender)
                                            <option {{$Teachers->gender_id == $gender->id ? 'selected' : ''}} value="{{$gender->id}}">{{$gender->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Joining_Date</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text"  id="datepicker-action"  value="{{$Teachers->joining_date}}" name="joining_date" data-date-format="yyyy-mm-dd" >
                                    </div>
                                    @error('joining_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                
                            <div class="col">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <textarea class="form-control" name="address"
                                          id="exampleFormControlTextarea1" rows="1">{{$Teachers->address}}</textarea>
                                @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            </div>
                            <br>


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
@section('js')
    @toastr_js
    @toastr_render
@endsection
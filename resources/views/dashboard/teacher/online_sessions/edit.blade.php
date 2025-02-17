@extends('layouts.master')
@section('title')
    Edit online Session
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
Edit online Session
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <form method="post" action="{{ route('onlineSessions.update',$onlineSession->id) }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="grade_id">Grade : <span
                                    class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="grade_id">
                                    @foreach ($Grades as $Grade)
                                        <option {{ $onlineSession->grade_id == $Grade->id ? 'selected':''}} value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                    @endforeach
                                </select>
                                @error('grade_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="classroom_id">Classrooms : <span
                                    class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="classroom_id">
                                    <option value="{{$onlineSession->classroom_id}}">{{$onlineSession->classroom->name}}</option>                                            </select>

                                </select>
                                @error('classroom_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">Section : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    <option value="{{$onlineSession->section_id}}">{{$onlineSession->section->name}}</option>

                                </select>
                                @error('section_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div><br>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Topic : <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$onlineSession->topic}}" name="topic" type="text">
                                @error('topic')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Start At : <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$onlineSession->start_at}}" type="datetime-local" name="start_at">
                                @error('start_at')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Meeting Id : <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$onlineSession->meeting_id}}" name="meeting_id" type="text">
                                @error('meeting_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label> Url : <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$onlineSession->join_url}}" name="join_url" type="text">
                                @error('join_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Password : <span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$onlineSession->password}}" name="password" type="text">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection

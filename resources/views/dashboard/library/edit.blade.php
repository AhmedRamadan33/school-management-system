@extends('layouts.master')

@section('title')
    Edit Book 
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
Edit Book : <span class=" text-success"> {{$book->name}}</span>
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
                            <form action="{{route('library.update',$book->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title"> Book Name</label>
                                        <input type="text" name="name" value="{{$book->name}}" class="form-control">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>

                                    <div class="col">
                                        <label for="title">subject</label>
                                        <select class="custom-select mr-sm-2" name="subject_id">
                                            <option selected disabled>Choose...</option>
                                            @foreach ($subjects as $subject)
                                            <option  value="{{ $subject->id }}" {{$book->subject_id == $subject->id ?'selected':''}}>{{ $subject->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subject_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
    

                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="grade_id">Grade : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="grade_id">
                                                <option selected disabled>Choose...</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}" {{$book->grade_id == $grade->id ?'selected':''}}>{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('grade_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="classroom_id">Classrooms : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="classroom_id">
                                              <option value="{{$book->classroom_id}}">{{$book->classroom->name}}</option>
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
                                                <option value="{{$book->section_id}}">{{$book->section->name}}</option>
                                            </select>
                                            @error('section_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                </div><br>

                                <div class="form-row">
                                    <div class="col">

                                        <embed src="{{ URL::asset('files/library/'.$book->id .'/' .$book->image->name) }}" type="application/pdf"   height="150px" width="100px"><br><br>

                                        <div class="form-group">
                                            <label for="files">Files : <span class="text-danger">*</span></label>
                                            <input type="file" accept="application/pdf" name="attachment" >
                                            @error('attachment')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>

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


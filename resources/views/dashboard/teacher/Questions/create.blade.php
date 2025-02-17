@extends('layouts.master')

@section('title')
    Add questions
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Add questions
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <h6 style="font-family: 'Cairo', sans-serif;" class="ml-3">Quiz Name :
        <span class=" text-success"> {{$quiz->name}}</span>    
        </h6>
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('questions.store',$quiz->id) }}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">Question</label>
                                    <input type="text" name="title" id="input-name"
                                        class="form-control form-control-alternative" autofocus>
                                        @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label class=" text-dark" for="title">Answers <span class="text-danger">( You must use this formula : answer1-answer2-answer3 )</span></label>
                                    <textarea placeholder="You must use this formula : answer1-answer2-answer3" name="answers" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                                    @error('answers')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title"> Right Answer</label>
                                    <input type="text" name="right_answer" id="input-name"
                                        class="form-control form-control-alternative" autofocus>
                                        @error('right_answer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="score">Score : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="score">
                                            <option selected disabled>choose...</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                        @error('score')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection

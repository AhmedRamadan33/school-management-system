@extends('layouts.master')

@section('title')
    Edit Question
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    Edit Question : <span class="text-success">{{ $question->title }}</span>
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
                        <form action="{{ route('questions.update', $question->id) }}" method="post" autocomplete="off">
                            @csrf
                            <div class="form-row">

                                <div class="col">
                                    <label for="title">Question</label>
                                    <input type="text" name="title" id="input-name"
                                        class="form-control form-control-alternative" value="{{ $question->title }}">
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label class=" text-dark" for="title">Answers <span class="text-danger">( You must use this formula : answer1-answer2-answer3 )</span></label>
                                    <textarea name="answers" placeholder="You must use this formula : answer1-answer2-answer3" class="form-control" id="exampleFormControlTextarea1" rows="4">{{ $question->answers }}</textarea>
                                    @error('answers')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">Right Answer</label>
                                    <input type="text" name="right_answer" id="input-name"
                                        class="form-control form-control-alternative"
                                        value="{{ $question->right_answer }}">
                                        @error('right_answer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <input hidden type="text" name="quiz_id" value="{{ $question->quiz_id }}">

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="score">Score : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="score">
                                        <option selected disabled>choose...</option>
                                        <option value="5" {{ $question->score == 5 ? 'selected' : '' }}>5</option>
                                        <option value="10" {{ $question->score == 10 ? 'selected' : '' }}>10</option>
                                        <option value="15" {{ $question->score == 15 ? 'selected' : '' }}>15</option>
                                        <option value="20" {{ $question->score == 20 ? 'selected' : '' }}>20</option>
                                    </select>
                                    @error('score')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                    </div>
                    <br>
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

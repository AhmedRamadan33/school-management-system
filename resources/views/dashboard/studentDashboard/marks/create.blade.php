@extends('layouts.master')

@section('title')
    add marks
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    add marks
@endsection
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form method="post" action="{{ route('marks.store',$student->id) }}" autocomplete="off">
                    @csrf
                    <h6 style="font-family: 'Cairo', sans-serif;color: blue">
                        Student Info</h6>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Name : <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $student->name}}" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Grade : <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $student->grade->name}}" class="form-control"readonly>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label>Classroom : <span class="text-danger">*</span></label>
                                <input type="text" value="{{ $student->classroom->name}}"  class="form-control"readonly>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Sum : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->sum ?? '---'}}" name="sum" class="form-control">
                                @error('sum')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Gpa : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$student->gpa}}" name="gpa" class="form-control">
                                @error('gpa')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> science : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->science ?? '---'}}" name="science" class="form-control">
                                @error('science')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> social studies : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->social_studies ?? '---'}}" name="social_studies" class="form-control">
                                @error('social_studies')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> math : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->math ?? '---'}}" name="math" class="form-control">
                                @error('math')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> english : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->english ?? '---'}}" name="english" class="form-control">
                                @error('english')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> geography : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->geography ?? '---'}}" name="geography" class="form-control">
                                @error('geography')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> physics : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->physics ?? '---'}}" name="physics" class="form-control">
                                @error('physics')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> history : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->history ?? '---'}}" name="history" class="form-control">
                                @error('history')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> chemistry : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->chemistry ?? '---'}}" name="chemistry" class="form-control">
                                @error('chemistry')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> biology : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->biology ?? '---'}}" name="biology" class="form-control">
                                @error('biology')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> computer : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->computer ?? '---'}}" name="computer" class="form-control">
                                @error('computer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> arabic : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->arabic ?? '---'}}" name="arabic" class="form-control">
                                @error('arabic')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> german : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->german ?? '---'}}" name="german" class="form-control">
                                @error('german')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> french : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->french ?? '---'}}" name="french" class="form-control">
                                @error('french')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> technology : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->technology ?? '---'}}" name="technology" class="form-control">
                                @error('technology')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> religion : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->religion ?? '---'}}" name="religion" class="form-control">
                                @error('religion')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> statistic : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->statistic ?? '---'}}" name="statistic" class="form-control">
                                @error('statistic')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> psychology : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->psychology ?? '---'}}" name="psychology" class="form-control">
                                @error('psychology')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label> philosophy : <span class="text-danger">*</span></label>
                                <input type="text" value="{{$mark->philosophy ?? '---'}}" name="philosophy" class="form-control">
                                @error('philosophy')
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
<!-- row closed -->
@endsection

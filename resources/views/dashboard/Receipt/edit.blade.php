@extends('layouts.master')

@section('title')
Edit Receipt
@endsection
@section('page-header')
    <!-- breadcrumb -->
Edit Receipt For Student : <label class=" text-success">{{ $student_receipt->student->name }}</label>

<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                            <form action="{{route('receipts.update',$student_receipt->id)}}" method="post" autocomplete="off">
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Price : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="amount" value="{{$student_receipt->debit}}" type="number" >
                                        <input hidden class="form-control" name="student_id" value="{{$student_receipt->student_id}}">

                                        @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Student balance : </label>
                                        <input disabled class="form-control" name="final_balance"
                                            value="{{ number_format($student_receipt->student->student_account->sum('debit') - $student_receipt->student->student_account->sum('credit'), 2) }}"
                                            type="text" readonly>
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
@section('js')
    @toastr_js
    @toastr_render

@endsection

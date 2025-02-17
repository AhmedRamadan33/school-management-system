@extends('layouts.master')

@section('title')
    Modify Processing Fees
@endsection
@section('page-header')
 Modify Processing Fees For Student : <label class=" text-success">{{ $processingFee->student->name }}</label>
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    <form action="{{ route('processingFee.update', $processingFee->id) }}" method="post" autocomplete="off">

                        @csrf
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label> Price : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="amount" value="{{ $processingFee->amount }}"
                                        type="number">
                                    @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="student_id" value="{{ $processingFee->student_id }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Student Balance : </label>
                                    <input class="form-control" name="final_balance"
                                        value="{{ number_format($processingFee->student->student_account->sum('debit') - $processingFee->student->student_account->sum('credit'), 2) }}"
                                        type="text" readonly>
                                </div>
                            </div>

                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Submit</button>
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

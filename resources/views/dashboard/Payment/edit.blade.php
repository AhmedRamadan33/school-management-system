@extends('layouts.master')

@section('title')
add payment

@endsection
@section('page-header')
    <!-- breadcrumb -->
    add payment For Student : <label class=" text-success">{{$payment_student->student->name}}</label>
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                            <form action="{{route('payments.update', $payment_student->id)}}" method="post" >
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Price : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="amount" value="{{$payment_student->amount}}" type="number" >
                                        <input hidden class="form-control" name="student_id" value="{{$payment_student->student_id}}">
                                        
                                        @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Student Balance : </label>
                                        <input  class="form-control" name="final_balance" value="{{ number_format($payment_student->student->student_account->sum('debit') - $payment_student->student->student_account->sum('credit'), 2) }}" type="text" readonly>
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

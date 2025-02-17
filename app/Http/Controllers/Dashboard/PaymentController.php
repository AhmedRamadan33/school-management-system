<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentAccountRequest;
use App\Models\FundAccount;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\StudentPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = StudentPayment::all();
        return view('dashboard.Payment.index', compact('payments'));
    }


    public function create($id)
    {
        $student = Student::findorfail($id);
        return view('dashboard.Payment.add', compact('student'));
    }


    public function store(StoreStudentAccountRequest $request,$st_id)
    {
        // حفظ البيانات في جدول سندات الصرف
        $payment = new StudentPayment();
        $payment->date = date('Y-m-d');
        $payment->student_id = $st_id;
        $payment->amount = $request->amount;
        $payment->save();


        // حفظ البيانات في جدول الصندوق
        $fund_account = new FundAccount();
        $fund_account->date = date('Y-m-d');
        $fund_account->payment_id = $payment->id;
        $fund_account->debit = 0.00;
        $fund_account->credit = $request->amount;
        $fund_account->save();


        // حفظ البيانات في جدول حساب الطلاب
        $student_account = new StudentAccount();
        $student_account->date = date('Y-m-d');
        $student_account->type = 'payment';
        $student_account->student_id = $st_id;
        $student_account->payment_id = $payment->id;
        $student_account->debit = $request->amount;
        $student_account->credit = 0.00;
        $student_account->save();

        toastr()->success('Added Successfully');
        return redirect()->back();
    }



    public function edit($id)
    {
        $payment_student = StudentPayment::findorfail($id);
        return view('dashboard.Payment.edit', compact('payment_student'));
    }

    public function update(StoreStudentAccountRequest $request, $id)
    {
        // تعديل البيانات في جدول سندات الصرف
        $payment = StudentPayment::findorfail($id);
        $payment->date = date('Y-m-d');
        $payment->student_id = $request->student_id;
        $payment->amount = $request->amount;
        $payment->save();


        // حفظ البيانات في جدول الصندوق
        $fund_account = FundAccount::where('payment_id', $id)->first();
        $fund_account->date = date('Y-m-d');
        $fund_account->payment_id = $payment->id;
        $fund_account->debit = 0.00;
        $fund_account->credit = $request->amount;
        $fund_account->save();


        // حفظ البيانات في جدول حساب الطلاب
        $student_account = StudentAccount::where('payment_id', $id)->first();
        $student_account->date = date('Y-m-d');
        $student_account->type = 'payment';
        $student_account->student_id = $request->student_id;
        $student_account->payment_id = $payment->id;
        $student_account->debit = $request->amount;
        $student_account->credit = 0.00;
        $student_account->save();

        toastr()->success('Updated Successfully');
        return redirect()->route('payments.index');
    }


    public function destroy($id)
    {
        StudentPayment::destroy($id);
        toastr()->success('Deleted Successfully');
        return redirect()->route('payments.index');
    }
}

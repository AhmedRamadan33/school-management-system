<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentAccountRequest;
use App\Models\FundAccount;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Models\StudentReceipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    public function index()
    {
        $receipts = StudentReceipt::all();
        return view('dashboard.Receipt.index', compact('receipts'));
    }

    public function create($id)
    {
        $student = Student::find($id);
        return view('dashboard.Receipt.create', compact('student'));
    }

    public function store(StoreStudentAccountRequest $request,$st_id)
    {
        // حفظ البيانات في جدول سندات القبض
        $receipt = new StudentReceipt();
        $receipt->date = date('Y-m-d');
        $receipt->student_id = $st_id;
        $receipt->debit = $request->amount;
        $receipt->save();

        // حفظ البيانات في جدول الصندوق
        $fund_account = new FundAccount();
        $fund_account->date = date('Y-m-d');
        $fund_account->receipt_id = $receipt->id;
        $fund_account->debit = $request->amount;
        $fund_account->credit = 0.00;
        $fund_account->save();

        // حفظ البيانات في جدول حساب الطالب
        $student_account = new StudentAccount();
        $student_account->date = date('Y-m-d');
        $student_account->type = 'receipt';
        $student_account->receipt_id = $receipt->id;
        $student_account->student_id = $st_id;
        $student_account->debit = 0.00;
        $student_account->credit = $request->amount;
        $student_account->save();

        toastr()->success('Added Successfully');
        return redirect()->back();
    }


    public function edit($id)
    {
        $student_receipt = StudentReceipt::findorfail($id);
        return view('dashboard.Receipt.edit', compact('student_receipt'));
    }


    public function update(StoreStudentAccountRequest $request, $id)
    {
        // تعديل البيانات في جدول سندات القبض
        $receipt = StudentReceipt::findorfail($id);
        $receipt->date = date('Y-m-d');
        $receipt->student_id = $request->student_id;
        $receipt->debit = $request->amount;
        $receipt->save();

        // تعديل البيانات في جدول الصندوق
        $fund_account = FundAccount::where('receipt_id', $id)->first();
        $fund_account->date = date('Y-m-d');
        $fund_account->receipt_id = $receipt->id;
        $fund_account->debit = $request->amount;
        $fund_account->credit = 0.00;
        $fund_account->save();

        // تعديل البيانات في جدول الصندوق

        $student_account = StudentAccount::where('receipt_id', $id)->first();
        $student_account->date = date('Y-m-d');
        $student_account->type = 'receipt';
        $student_account->student_id = $request->student_id;
        $student_account->receipt_id = $receipt->id;
        $student_account->debit = 0.00;
        $student_account->credit = $request->amount;
        $student_account->save();

        toastr()->success('Updated Successfully');
        return redirect()->route('receipts.index');
    }

    public function destroy($id)
    {
        StudentReceipt::findorfail($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->route('receipts.index');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentAccountRequest;
use App\Models\ProcessingFee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{
    public function index()
    {
        $processingFees = ProcessingFee::all();
        return view('dashboard.processingFee.index', compact('processingFees'));
    }

    public function create($id)
    {
        $student = Student::findorfail($id);
        return view('dashboard.processingFee.add', compact('student'));
    }

    public function store(StoreStudentAccountRequest $request, $st_id)
    {
        // حفظ البيانات في جدول معالجة الرسوم
        $processingFee = new processingFee();
        $processingFee->date = date('Y-m-d');
        $processingFee->student_id = $st_id;
        $processingFee->amount = $request->amount;
        $processingFee->save();


        // حفظ البيانات في جدول حساب الطلاب
        $students_accounts = new StudentAccount();
        $students_accounts->date = date('Y-m-d');
        $students_accounts->type = 'processingFee';
        $students_accounts->student_id = $st_id;
        $students_accounts->processing_id = $processingFee->id;
        $students_accounts->debit = 0.00;
        $students_accounts->credit = $request->amount;
        $students_accounts->save();

        toastr()->success('Added Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $processingFee = ProcessingFee::findorfail($id);
        return view('dashboard.processingFee.edit', compact('processingFee'));
    }

    public function update(StoreStudentAccountRequest $request, $id)
    {
        // تعديل البيانات في جدول معالجة الرسوم
        $processingFee = processingFee::findorfail($id);
        $processingFee->date = date('Y-m-d');
        $processingFee->student_id = $request->student_id;
        $processingFee->amount = $request->amount;
        $processingFee->save();

        // تعديل البيانات في جدول حساب الطلاب
        $students_accounts = StudentAccount::where('processing_id', $id)->first();;
        $students_accounts->date = date('Y-m-d');
        $students_accounts->type = 'processingFee';
        $students_accounts->student_id = $request->student_id;
        $students_accounts->processing_id = $processingFee->id;
        $students_accounts->debit = 0.00;
        $students_accounts->credit = $request->amount;
        $students_accounts->save();

        toastr()->success('Updated Successfully');
        return redirect()->route('processingFee.index');
    }

    public function destroy($id)
    {
        ProcessingFee::findorfail($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->route('processingFee.index');
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFeesRequest;
use App\Models\Fee;
use App\Models\Grade;
use App\Models\Invoice;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::all();
        return view('dashboard.Fees.index', compact('fees'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('dashboard.Fees.create', compact('Grades'));
    }

    public function store(StoreFeesRequest $request)
    {

        $fee = Fee::where('classroom_id', $request->classroom_id)->where('type', $request->type)->where('year', $request->year)->first();

        if ($fee) {

            toastr()->error('Wrong entry');
            return redirect()->back();
        }

        $fee = new Fee();
        $fee->type = $request->type;
        $fee->amount = $request->amount;
        $fee->grade_id = $request->grade_id;
        $fee->classroom_id = $request->classroom_id;
        $fee->year = $request->year;
        $fee->save();

        $students = Student::where('grade_id', $request->grade_id)->where('classroom_id', $request->classroom_id)->get();
        foreach ($students as $student) {
            $invoice = Invoice::create([
                'date' => date('Y-m-d'),
                'student_id' => $student->id,
                'grade_id' => $request->grade_id,
                'classroom_id' => $request->classroom_id,
                'amount' => $request->amount,
                'fee_id' => $fee->id,
            ]);

            StudentAccount::create([
                'date' => date('Y-m-d'),
                'type' => 'invoice',
                'invoice_id' => $invoice->id,
                'student_id' => $student->id,
                'debit' => $request->amount,
                'credit' => 0.00,
            ]);
        }

        toastr()->success('Added Successfully');
        return redirect()->back();
    }

    public function show($id){
        $invoices = Invoice::where('fee_id',$id)->get();
        return view('dashboard.Fees.show',compact('invoices'));
    }

    public function destroy($id)
    {
        Fee::find($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
}

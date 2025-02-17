<?php

namespace App\Http\Controllers\ParentDashboard;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SonFeeController extends Controller
{
    public function index() {
        $parent_id = Auth::guard('parent')->user()->id;
        $students = Student::where('parent_id',$parent_id)->get();
        return view('dashboard.parent.fees.sons',compact('students'));
    }


    public function show($id){
        $parent_id = Auth::guard('parent')->user()->id;
        $Student = Student::where('id',$id)->where('parent_id',$parent_id)->first();
        $fees = Fee::where('classroom_id',$Student->classroom_id)->get();
        $student_accounts = StudentAccount::where('student_id',$Student->id)->get();
        return view('dashboard.parent.fees.show',compact('fees','student_accounts','Student'));
    }

}

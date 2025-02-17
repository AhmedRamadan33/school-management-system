<?php

namespace App\Http\Controllers\StudentDashboard;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\StudentAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentInfoController extends Controller
{
    public function index(){
        $Student = Auth::guard('student')->user();
        $fees = Fee::where('classroom_id',$Student->classroom_id)->get();
        $student_accounts = StudentAccount::where('student_id',$Student->id)->get();
        return view('dashboard.student.accounts.show',compact('Student','fees','student_accounts'));
    }
}

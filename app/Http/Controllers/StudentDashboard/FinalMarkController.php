<?php

namespace App\Http\Controllers\StudentDashboard;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalMarkController extends Controller
{
    public function index(){
        $studentId = Auth::guard('student')->user()->id;
        $marks = Mark::where('student_id',$studentId)->get();
        return view('dashboard.student.finalDegrees.index',compact('marks'));
    }


    public function show($id){
        $mark = Mark::find($id);
        return view('dashboard.student.finalDegrees.show',compact('mark'));
    }
}

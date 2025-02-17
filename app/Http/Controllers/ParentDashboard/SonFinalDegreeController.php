<?php

namespace App\Http\Controllers\ParentDashboard;

use App\Http\Controllers\Controller;
use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SonFinalDegreeController extends Controller
{
    public function index() {
        $parent_id = Auth::guard('parent')->user()->id;
        $students = Student::where('parent_id',$parent_id)->get();
        return view('dashboard.parent.finalDegrees.sons',compact('students'));
    }

    public function degrees($id) {
        $marks = Mark::where('student_id',$id)->get(); 
        return view('dashboard.parent.finalDegrees.index',compact('marks'));

    }

    public function showDegrees($id , $st_id) {
        $mark = Mark::where('id',$id)->where('student_id',$st_id)->first(); 
        return view('dashboard.parent.finalDegrees.show',compact('mark'));
    }
}

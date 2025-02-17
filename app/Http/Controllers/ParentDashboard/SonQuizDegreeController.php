<?php

namespace App\Http\Controllers\ParentDashboard;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SonQuizDegreeController extends Controller
{
    public function index() {
        $parent_id = Auth::guard('parent')->user()->id;
        $students = Student::where('parent_id',$parent_id)->get();
        return view('dashboard.parent.quizDegrees.sons',compact('students'));
    }

    public function degrees($id) {
        $degrees = Degree::where('student_id',$id)->get(); 
        return view('dashboard.parent.quizDegrees.degrees',compact('degrees'));

    }
}

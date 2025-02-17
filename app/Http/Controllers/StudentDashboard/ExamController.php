<?php

namespace App\Http\Controllers\StudentDashboard;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        $quizzes = Quiz::where('grade_id', $student->grade_id)
            ->where('classroom_id', $student->classroom_id)
            ->where('section_id', $student->section_id)
            ->orderBy('id', 'DESC')
            ->get();
        return view('dashboard.student.exams.index', compact('quizzes'));
    }

    public function show($quiz_id){
        $student_id  = Auth::guard('student')->user()->id;
        $student = Degree::where('quiz_id',$quiz_id)->where('student_id',$student_id)->first();
        if($student){
            return abort(404);
        }
        return view('dashboard.student.exams.show', compact('quiz_id','student_id'));
    }
}

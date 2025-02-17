<?php

namespace App\Http\Controllers\TeacherDashboard;

use App\Http\Controllers\Controller;
use App\Models\Degree;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizDegreeController extends Controller
{
    public function index()
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $quizzes = Quiz::where('teacher_id',$teacherId)->OrderBy('id','DESC')->get();
        return view('dashboard.teacher.QuizzesDegrees.index', compact('quizzes'));
    }

    public function show($id)
    {
        $teacherId = Auth::guard('teacher')->user()->id;
        $quiz = Quiz::where('id',$id)->where('teacher_id',$teacherId)->first();
        $degrees = Degree::where('quiz_id',$id)->get();
        return view('dashboard.teacher.QuizzesDegrees.show', compact('degrees','quiz'));
    }
}

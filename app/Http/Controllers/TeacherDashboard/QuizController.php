<?php

namespace App\Http\Controllers\TeacherDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuizzesRequest;
use App\Models\Grade;
use App\Models\Quiz;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::get();
        return view('dashboard.teacher.Quizzes.index', compact('quizzes'));
    }


    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id', Auth::guard('teacher')->user()->id)->get();
        $data['teachers'] = Teacher::all();
        return view('dashboard.teacher.Quizzes.create', $data);
    }


    public function store(StoreQuizzesRequest $request)
    {
        $quizzes = new Quiz();
        $quizzes->name = $request->name;
        $quizzes->subject_id = $request->subject_id;
        $quizzes->grade_id = $request->grade_id;
        $quizzes->classroom_id = $request->classroom_id;
        $quizzes->section_id = $request->section_id;
        $quizzes->teacher_id = Auth::guard('teacher')->user()->id;
        $quizzes->save();
        toastr()->success('Added Successfully');
        return redirect()->back();
    }


    public function edit($id)
    {
        $quiz = Quiz::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id', Auth::guard('teacher')->user()->id)->get();
        $data['teachers'] = Teacher::all();
        return view('dashboard.teacher.Quizzes.edit', $data, compact('quiz'));
    }

    public function update(StoreQuizzesRequest $request, $id)
    {
        $quiz = Quiz::findorFail($id);
        $quiz->name = $request->name;
        $quiz->subject_id = $request->subject_id;
        $quiz->grade_id = $request->grade_id;
        $quiz->classroom_id = $request->classroom_id;
        $quiz->section_id = $request->section_id;
        $quiz->teacher_id = Auth::guard('teacher')->user()->id;
        $quiz->save();
        toastr()->success('Updated Successfully');
        return redirect()->route('quizzes.index');
    }

    public function destroy($id)
    {
        Quiz::findorFail($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->route('quizzes.index');
    }
}

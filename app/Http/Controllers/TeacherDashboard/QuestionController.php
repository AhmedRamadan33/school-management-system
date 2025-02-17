<?php

namespace App\Http\Controllers\TeacherDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionsRequest;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show($id)
    {
        $questions = Question::where('quiz_id', $id)->get();
        return view('dashboard.teacher.Questions.show', compact('questions','id'));
    }

    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('dashboard.teacher.Questions.create',compact('quiz'));
    }

    public function store(StoreQuestionsRequest $request, $quiz_id)
    {
        $question = new Question();
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quiz_id = $quiz_id;
        $question->save();
        toastr()->success('Added Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);
        $quizzes = Quiz::get();
        return view('dashboard.teacher.Questions.edit', compact('question', 'quizzes'));
    }

    public function update(StoreQuestionsRequest $request, $id)
    {
        $question = Question::findorfail($id);
        $question->title = $request->title;
        $question->answers = $request->answers;
        $question->right_answer = $request->right_answer;
        $question->score = $request->score;
        $question->quiz_id = $request->quiz_id;
        $question->save();
        toastr()->success('Updated Successfully');
        return redirect()->to('questions/show/' . $request->quiz_id);
    }

    public function destroy($id)
    {
        Question::findorfail($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
}

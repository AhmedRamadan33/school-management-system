<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Question;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class ShowQuestions extends Component
{
    public $quiz_id, $student_id, $data, $counter = 0, $questionCount = 0;

    public function render()
    {
        $this->data = Question::where('quiz_id', $this->quiz_id)->get();
        $this->questionCount = $this->data->count();
        return view('livewire.show-questions', ['data']);
    }

    public function nextQuestion($question_id, $answer, $right_answer, $score)
    {
        $student_degree = Degree::where('student_id', $this->student_id)->where('quiz_id', $this->quiz_id)->first();
        // insert
        if ($student_degree == null) {
            $degree = new Degree();
            $degree->quiz_id = $this->quiz_id;
            $degree->student_id = $this->student_id;
            $degree->question_id = $question_id;
            $degree->date = date('Y-m-d');
            if (strcmp(trim($answer), trim($right_answer)) === 0) {
                $degree->score += $score;
            } else {
                $degree->score += 0;
            }
            $degree->save();
        } else {
            // update
            $student_degree->question_id = $question_id;
            if (strcmp(trim($answer), trim($right_answer)) === 0) {
                $student_degree->score += $score;
            } else {
                $student_degree->score += 0;
            }
            $student_degree->save();
        }

        if ($this->counter < $this->questionCount - 1) {
            $this->counter++;
        } else {
            toastr()->success('The exam is over');
            return redirect()->route('exams.index');
        }
    }
}

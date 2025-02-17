<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMarksRequest;
use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function create($id)
    {
        $student = Student::find($id);
        $mark = Mark::where('student_id', $id)->where('grade_id',$student->grade_id)
        ->where('classroom_id',$student->classroom_id)->first();
        return view('dashboard.studentDashboard.marks.create', compact('student', 'mark'));
    }

    public function store(StoreMarksRequest $request, $id)
    {
        $student = Student::find($id);
        $check = Mark::where('student_id', $id)->where('grade_id',$student->grade_id)->where('classroom_id',$student->classroom_id)->first();
        if ($check) {
            $mark = $check;
        } else {
            $mark = new Mark();
        }

        $student->gpa = $request->gpa;
        $mark->student_id = $id;
        $mark->sum = $request->sum;
        $mark->grade_id = $student->grade_id;
        $mark->classroom_id = $student->classroom_id;
        $mark->section_id = $student->section_id;
        $mark->academic_year = $student->academic_year;
        $mark->science = $request->science;
        $mark->social_studies = $request->social_studies;
        $mark->math = $request->math;
        $mark->english = $request->english;
        $mark->geography = $request->geography;
        $mark->physics = $request->physics;
        $mark->history = $request->history;
        $mark->chemistry = $request->chemistry;
        $mark->biology = $request->biology;
        $mark->computer = $request->computer;
        $mark->arabic = $request->arabic;
        $mark->french = $request->french;
        $mark->german = $request->german;
        $mark->technology = $request->technology;
        $mark->religion = $request->religion;
        $mark->statistic = $request->statistic;
        $mark->psychology = $request->psychology;
        $mark->philosophy = $request->philosophy;
        $student->save();
        $mark->save();
        toastr()->success('Updated Successfully');
        return redirect()->back();
    }

}

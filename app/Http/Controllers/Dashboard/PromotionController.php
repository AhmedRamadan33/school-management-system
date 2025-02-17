<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionsRequest;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('dashboard.studentDashboard.promotion.index', compact('promotions'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('dashboard.studentDashboard.promotion.create', compact('Grades'));
    }

    public function store(StorePromotionsRequest $request)
    {
        $students = Mark::where('grade_id', $request->grade_id)->where('classroom_id', $request->classroom_id)->where('section_id', $request->section_id)
            ->where('academic_year', $request->academic_year)
            ->where('sum', '>=', 200)->get();

        if ($students->count() < 1) {

            toastr()->error('Wrong entry');
            return redirect()->back();
        }

        foreach ($students as $student) {

            $ids = explode(',', $student->student_id);
            student::whereIn('id', $ids)
                ->update([
                    'grade_id' => $request->grade_id_new,
                    'classroom_id' => $request->classroom_id_new,
                    'section_id' => $request->section_id_new,
                    'academic_year' => $request->academic_year_new,
                ]);

            $check = Promotion::where('student_id', $student->student_id)->where('to_classroom', $request->classroom_id_new)->first();
            if ($check) {
                $promotion = $check;
            } else {
                $promotion = new Promotion();
            }
            // insert in to promotions
            $promotion->student_id = $student->student_id;
            $promotion->from_grade = $request->grade_id;
            $promotion->from_classroom = $request->classroom_id;
            $promotion->from_section = $request->section_id;
            $promotion->to_grade = $request->grade_id_new;
            $promotion->to_classroom = $request->classroom_id_new;
            $promotion->to_section = $request->section_id_new;
            $promotion->academic_year = $request->academic_year;
            $promotion->academic_year_new = $request->academic_year_new;
            $promotion->save();
        }

        toastr()->success('Students Promotion Updated Successfully');
        return redirect()->back();
    }
}

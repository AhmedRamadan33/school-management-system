<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGraduateRequest;
use App\Models\Grade;
use App\Models\Mark;
use App\Models\Student;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    public function index()
    {
        $students = Student::onlyTrashed()->get();
        return view('dashboard.studentDashboard.graduated.index',compact('students'));
    }
    
    public function create()
    {
        $Grades = Grade::all();
        return view('dashboard.studentDashboard.graduated.create',compact('Grades'));
    }

    public function SoftDelete(StoreGraduateRequest $request)
    {
        $students = Mark::where('grade_id',$request->grade_id)->where('classroom_id',$request->classroom_id)
        ->where('section_id',$request->section_id) ->where('sum', '>=', 200)->get();

        if ($students->count() < 1) {

            toastr()->error('Wrong Entry');
            return redirect()->back();
        }

        foreach ($students as $student){
            $ids = explode(',',$student->student_id);
            Student::whereIn('id', $ids)->delete();
        }

        toastr()->success('Students Graduated Updated Successfully');
        return redirect()->route('graduated.index');
    }

    public function returnStudent($id)
    {
        Student::onlyTrashed()->where('id', $id)->first()->restore();
        toastr()->success('Return Student Successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Student::onlyTrashed()->where('id', $id)->first()->forceDelete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }

}

<?php

namespace App\Http\Controllers\ParentDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchAttendencesRequest;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class sonAttendanceController extends Controller
{
    public function index(){
        $parent_id = Auth::guard('parent')->user()->id;
        $students = Student::where('parent_id',$parent_id)->get();
        $teachers = Teacher::get();
        return view('dashboard.parent.Attendance.index',compact('students','teachers'));
    }

    public function search(SearchAttendencesRequest $request){
        $parent_id = Auth::guard('parent')->user()->id;
        $students = Student::where('parent_id',$parent_id)->get();
        $teachers = Teacher::get();

        $attendances = Attendance::where('student_id', $request->student_id)
        ->where('teacher_id', $request->teacher_id)->get();
        return view('dashboard.parent.Attendance.index',compact('attendances','students','teachers'));
    }
}

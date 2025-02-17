<?php

namespace App\Http\Controllers\StudentDashboard;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\TeacherSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceReportController extends Controller
{
    public function index(){
        $student = Auth::guard('student')->user();
        $teachers = TeacherSection::where('section_id',$student->section_id)->OrderBy('id','DESC')->get();
        return view('dashboard.student.AttendanceReport.index',compact('teachers'));
    }


    public function show($teacher_id){
        $studentId = Auth::guard('student')->user()->id;
        $attendances = Attendance::where('student_id',$studentId)->where('teacher_id',$teacher_id)->OrderBy('id','DESC')->get();
        return view('dashboard.student.AttendanceReport.show',compact('attendances'));
    }
}

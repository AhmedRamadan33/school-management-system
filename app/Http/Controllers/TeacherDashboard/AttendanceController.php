<?php

namespace App\Http\Controllers\TeacherDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttendencesRequest;
use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\TeacherSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $teacherSections = TeacherSection::where('teacher_id', Auth::guard('teacher')->user()->id)->get();
        return view('dashboard.teacher.Attendance.index', compact('teacherSections'));
    }

    public function create($id)
    {
        $students = Student::where('section_id', $id)->get();
        return view('dashboard.teacher.Attendance.create', compact('students'));
    }


    public function store(StoreAttendencesRequest $request)
    {
        foreach ($request->attendences as $studentId => $attendence) {

            if ($attendence == 'presence') {
                $status = 1;
            } else {
                $status = 0;
            }

            Attendance::create([
                'date' => date('Y-m-d'),
                'status' => $status,
                'student_id' => $studentId,
                'teacher_id' => Auth::user()->id,
            ]);
        }

        toastr()->success('Added Successfully');
        return redirect()->back();
    }

    public function history()
    {
        $attendances = Attendance::where('teacher_id', Auth::guard('teacher')->user()->id)->OrderBY('id', 'DESC')->get();
        return view('dashboard.teacher.Attendance.history', compact('attendances'));
    }

    public function update(Request $request, $id)
    {
        $attendance = Attendance::find($id);
        if ($request->attendence == 'presence') {
            $status = 1;
        } else {
            $status = 0;
        }
        $attendance->status = $status;
        $attendance->save();

        toastr()->success('Updated Successfully');
        return redirect()->back();
    }
}

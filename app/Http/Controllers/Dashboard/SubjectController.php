<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
   public function index(){
    $subjects = Subject::all();
    return view('dashboard.subjects.index', compact('subjects'));
   }

   public function create()
   {
       $grades = Grade::all();
       $teachers = Teacher::all();
       return view('dashboard.subjects.create', compact('grades', 'teachers'));
   }

   public function store(StoreSubjectRequest $request)
   {
       $subjects = new Subject();
       $subjects->name = $request->name;
       $subjects->grade_id = $request->grade_id;
       $subjects->classroom_id = $request->classroom_id;
       $subjects->teacher_id = $request->teacher_id;
       $subjects->save();
       toastr()->success('Added Successfully');
       return redirect()->back();
   }

   public function edit($id)
   {
       $subject =Subject::findorfail($id);
       $grades = Grade::get();
       $teachers = Teacher::get();
       return view('dashboard.subjects.edit',compact('subject','grades','teachers'));
   }

   public function update(StoreSubjectRequest $request, $id)
   {
       $subjects = Subject::findorfail($id);
       $subjects->name = $request->name;
       $subjects->grade_id = $request->grade_id;
       $subjects->classroom_id = $request->classroom_id;
       $subjects->teacher_id = $request->teacher_id;
       $subjects->save();
       toastr()->success('Updated Successfully');
       return redirect()->route('subjects.index');
   }

   public function destroy($id)
   {
       $subjects =  Subject::findorfail($id);
       $subjects->delete();
       toastr()->success('Deleted Successfully');
       return redirect()->back();
   }
 
}

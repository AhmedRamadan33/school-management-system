<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachersRequest;
use App\Http\Requests\UpdateTeachersRequest;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $Teachers = Teacher::all(); 
        return view('dashboard.teacherDashboard.index',compact('Teachers'));
    }

 
    public function create()
    {
        $specializations = Specialization::all();
        $genders = Gender::all();

        return view('dashboard.teacherDashboard.create',compact('specializations','genders'));
    }


    public function store(StoreTeachersRequest $request)
    {
        
        $Teachers = new Teacher;
        $Teachers->email = $request->email;
        $Teachers->password = Hash::make($request->password);
        $Teachers->name = $request->name;
        $Teachers->specialization_id = $request->specialization_id;
        $Teachers->gender_id = $request->gender_id;
        $Teachers->joining_date = $request->joining_date;
        $Teachers->address = $request->address;
        $Teachers->save();
        toastr()->success('Added Successfully');
        return redirect()->back();

        
    }


    public function edit($id)
    {
        $Teachers = Teacher::find($id); 
        $specializations = Specialization::all();
        $genders = Gender::all();
        return view('dashboard.teacherDashboard.edit',compact('Teachers','specializations','genders'));
    }


    public function update(UpdateTeachersRequest $request, $id)
    {
        $Teachers = Teacher::find($id);
        $Teachers->email = $request->email;
        $Teachers->name = $request->name;
        $Teachers->specialization_id = $request->specialization_id;
        $Teachers->gender_id = $request->gender_id;
        $Teachers->joining_date = $request->joining_date;
        $Teachers->address = $request->address;
        $Teachers->save();
        toastr()->success('Updated Successfully');
        return redirect()->route('teachers.index');
    }


    public function destroy($id)
    {
        Teacher::find($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
}

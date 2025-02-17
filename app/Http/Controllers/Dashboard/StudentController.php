<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use App\Models\BloodGroup;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Section;
use App\Models\Student;
use App\Models\StudentAccount;
use App\Traits\UploadFilesTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    use UploadFilesTrait;
    
    public function index()
    {
        $students = Student::all();
        return view('dashboard.studentDashboard.index', compact('students'));
    }

    public function create()
    {
        $Genders = Gender::all();
        $nationals = Nationalitie::all();
        $bloods = BloodGroup::all();
        $grades = Grade::all();
        $parents = MyParent::all();
        return view('dashboard.studentDashboard.create', compact('Genders', 'nationals', 'bloods', 'grades', 'parents'));
    }

    public function store(StoreStudentsRequest $request)
    {
        $students = new Student();
        $students->name = $request->name;
        $students->email = $request->email;
        $students->password = Hash::make($request->password);
        $students->gender_id = $request->gender_id;
        $students->nationalitie_id = $request->nationalitie_id;
        $students->blood_id = $request->blood_id;
        $students->birth_date = $request->birth_date;
        $students->grade_id = $request->grade_id;
        $students->classroom_id = $request->classroom_id;
        $students->section_id = $request->section_id;
        $students->parent_id = $request->parent_id;
        $students->academic_year = $request->academic_year;
        $students->save();
        $this->storeImage('students/',$request->photos, $students->id,'App\Models\Student');
        toastr()->success('Added Successfully');
        return redirect()->back();
    }

    public function show($id)
    {
        $Student = Student::find($id);
        $student_accounts = StudentAccount::where('student_id',$id)->get();
        return view('dashboard.studentDashboard.show', compact('Student','student_accounts'));
    }

    public function edit($id)
    {
        $Students = Student::findOrFail($id);
        $Genders = Gender::all();
        $nationals = Nationalitie::all();
        $bloods = BloodGroup::all();
        $Grades = Grade::all();
        $parents = MyParent::all();
        return view('dashboard.studentDashboard.edit', compact('Students', 'Genders', 'nationals', 'bloods', 'Grades', 'parents'));
    }


    public function update(UpdateStudentsRequest $request, $id)
    {
        $students = Student::findOrFail($id);
        $students->name = $request->name;
        $students->email = $request->email;
        $students->gender_id = $request->gender_id;
        $students->nationalitie_id = $request->nationalitie_id;
        $students->blood_id = $request->blood_id;
        $students->birth_date = $request->birth_date;
        $students->grade_id = $request->grade_id;
        $students->classroom_id = $request->classroom_id;
        $students->section_id = $request->section_id;
        $students->parent_id = $request->parent_id;
        $students->academic_year = $request->academic_year;
        $students->save();
        $this->storeImage('students/',$request->photos, $students->id,'App\Models\Student');

        toastr()->success('Updated Successfully');
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $this->deleteImage($id,'students/','App\Models\Student');
        $students->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->route('students.index');
    }

    public function getSection($id)
    {
        $sections = Section::where("class_id", $id)->pluck("name", "id");
        return $sections;
    }

    public function delete_file(Request $request, $id)
    {
        $imagePath = public_path('files/students/' . $request->imageable_id . '/' . $request->name);
        unlink($imagePath);
        toastr()->success('Deleted Successfully');
        Image::find($id)->delete();
        return redirect()->back();
    }

    public function download($imageable_id, $name)
    {
        $imagePath = public_path('files/students/' . $imageable_id . '/' . $name);
        return response()->download($imagePath);
        
    }
}

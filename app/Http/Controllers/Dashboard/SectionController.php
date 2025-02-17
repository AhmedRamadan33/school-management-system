<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSectionsRequest;
use App\Http\Requests\UpdateSectionsRequest;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $Grades = Grade::with(['sections'])->get();
        $list_Grades = Grade::all();
        $teachers = Teacher::all();
        return view('dashboard.Sections.index', compact('Grades', 'list_Grades', 'teachers'));
    }

    public function store(StoreSectionsRequest $request)
    {
        $Sections = new Section();
        $Sections->name = $request->name;
        $Sections->grade_id = $request->grade_id;
        $Sections->class_id = $request->classroom_id;
        $Sections->save();

        // Save the sections_teachers data
        $Sections->teachers()->attach($request->teacher_id);
        toastr()->success('Added Successfully');
        return redirect()->back();
    }

    public function update(UpdateSectionsRequest $request,$id)
    {
        $Sections = Section::find($id);
        $Sections->name = $request->name;
        $Sections->grade_id = $request->grade_id;
        $Sections->class_id = $request->classroom_id;

        if (isset($request->status)) {
            $Sections->status = 1;
        } else {
            $Sections->status = 2;
        }

        if (isset($request->teacher_id)) {
            $Sections->teachers()->sync($request->teacher_id);
        } else {
            $Sections->teachers()->sync(array());
        }

        $Sections->save();
        toastr()->success('Updated Successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        Section::findOrFail($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }

    public function getClasses($id)
    {
        $list_classes = Classroom::where("grade_id", $id)->pluck("name", "id");
        return $list_classes;
    }
}

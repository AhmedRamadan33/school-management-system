<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $Grades = Grade::all();
        return view('dashboard.grades.index', compact('Grades'));
    }

    public function store(StoreGradeRequest $request)
    {
        $Grades = new Grade();
        $Grades->name = $request->name;
        $Grades->notes = $request->notes;
        $Grades->save();
        toastr()->success('Added Successfully');
        return redirect()->back();
    }


    public function update(UpdateGradeRequest $request ,$id)
    {
        $Grades = Grade::find($id);
        $Grades->name = $request->name;
        $Grades->notes = $request->notes;
        $Grades->save();
        toastr()->success('Updated Successfully');
        return redirect()->back();
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $Grades = Grade::findOrFail($id);
        $Grades->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }
}

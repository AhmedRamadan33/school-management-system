<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;
use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $Classes = Classroom::all();
        $Grades  = Grade::all();
        return view('dashboard.myClasses.index', compact('Classes', 'Grades'));
    }

    public function store(StoreClassesRequest $request)
    {
        $list_classes = $request->list_classes;

        foreach ($list_classes as $list_class) {

            $Classes = new Classroom();
            $Classes->name =  $list_class['name'];
            $Classes->grade_id = $list_class['grade_id'];
            $Classes->save();
        }
        toastr()->success('Added Successfully');
        return redirect()->back();
    }


    public function update(UpdateClassesRequest $request,$id)
    {
        $Classes = Classroom::find($id);
        $Classes->name = $request->name;
        $Classes->grade_id = $request->Grade_id;
        $Classes->save();
        toastr()->success('Updated Successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $Classes = Classroom::find($id);
        $Classes->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->back();
    }

}

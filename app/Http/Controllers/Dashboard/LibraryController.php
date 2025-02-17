<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLibraryRequest;
use App\Http\Requests\UpdateLibraryRequest;
use App\Models\Grade;
use App\Models\Library;
use App\Models\Subject;
use App\Models\Teacher;
use App\Traits\UploadFilesTrait;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    use UploadFilesTrait;

    public function index()
    {
        $books = Library::all();
        return view('dashboard.library.index', compact('books'));
    }

    public function create()
    {
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('dashboard.library.create', compact('grades', 'subjects'));
    }

    public function store(StoreLibraryRequest $request)
    {
        $books = new Library();
        $books->name = $request->name;
        $books->grade_id = $request->grade_id;
        $books->classroom_id = $request->classroom_id;
        $books->section_id = $request->section_id;
        $books->subject_id = $request->subject_id;
        $books->save();
        $this->storeFile('library/',$request->attachment, $books->id,'App\Models\Library');
        toastr()->success('Added Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $subjects = Subject::all();
        $grades = Grade::all();
        $book = Library::findorFail($id);
        return view('dashboard.library.edit', compact('book', 'grades', 'subjects'));
    }

    public function update(UpdateLibraryRequest $request, $id)
    {
        $book = Library::findorFail($id);
        $book->name = $request->name;
        $book->grade_id = $request->grade_id;
        $book->classroom_id = $request->classroom_id;
        $book->section_id = $request->section_id;
        $book->subject_id = $request->subject_id;
        $this->updateFile('library/',$request->attachment, $book->id,'App\Models\Library');
        $book->save();
        toastr()->success('Updated Successfully');
        return redirect()->route('library.index');
    }


    public function destroy($id)
    {
        
        $this->deleteImage($id,'library/','App\Models\Library');
        Library::findorFail($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->route('library.index');
    }

    public function download($imageable_id,$name)
    {
        $path = public_path('files/library/' . $imageable_id . '/' . $name);
        return response()->download($path);
    }
}

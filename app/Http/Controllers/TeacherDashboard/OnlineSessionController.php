<?php

namespace App\Http\Controllers\TeacherDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOnlineSessionRequest;
use App\Models\Grade;
use App\Models\OnlineSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlineSessionController extends Controller
{
    public function index()
    {
        $online_sessions = OnlineSession::all();
        return view('dashboard.teacher.online_sessions.index', compact('online_sessions'));
    }

    public function create()
    {
        $Grades = Grade::all();
        return view('dashboard.teacher.online_sessions.add', compact('Grades'));
    }

    public function store(StoreOnlineSessionRequest $request)
    {
        OnlineSession::create([
            'grade_id' => $request->grade_id,
            'classroom_id' => $request->classroom_id,
            'section_id' => $request->section_id,
            'teacher_id' => Auth::guard('teacher')->user()->id,
            'start_at' => $request->start_at,
            'topic' => $request->topic,
            'meeting_id' => $request->meeting_id,
            'password' => $request->password,
            'join_url' => $request->join_url,
        ]);
        toastr()->success('Added Successfully');
        return redirect()->route('onlineSessions.index');
    }

    public function edit($id)
    {
        $Grades = Grade::all();
        $onlineSession = OnlineSession::find($id);
        return view('dashboard.teacher.online_sessions.edit', compact('onlineSession', 'Grades'));
    }


    public function update(StoreOnlineSessionRequest $request, $id)
    {
        $onlineSession = OnlineSession::find($id);
        $onlineSession->grade_id = $request->grade_id;
        $onlineSession->classroom_id = $request->classroom_id;
        $onlineSession->section_id = $request->section_id;
        $onlineSession->teacher_id = Auth::guard('teacher')->user()->id;
        $onlineSession->start_at = $request->start_at;
        $onlineSession->topic = $request->topic;
        $onlineSession->meeting_id = $request->meeting_id;
        $onlineSession->password = $request->password;
        $onlineSession->join_url = $request->join_url;
        $onlineSession->save();

        toastr()->success('Updated Successfully');
        return redirect()->route('onlineSessions.index');
    }


    public function destroy($id)
    {
        OnlineSession::find($id)->delete();
        toastr()->success('Deleted Successfully');
        return redirect()->route('onlineSessions.index');
    }
}

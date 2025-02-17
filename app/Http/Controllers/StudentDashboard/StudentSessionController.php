<?php

namespace App\Http\Controllers\StudentDashboard;

use App\Http\Controllers\Controller;
use App\Models\OnlineSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentSessionController extends Controller
{
    public function index(){
        $section_id = Auth::guard('student')->user()->section_id;
        $online_sessions = OnlineSession::where('section_id',$section_id)->get();
        return view('dashboard.student.onlineSession.index',compact('online_sessions'));
    }
}

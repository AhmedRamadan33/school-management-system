<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LoginTeacherRequest;
use App\Models\Student;
use App\Models\TeacherSection;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginTeacherController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $teacherId = Auth::user()->id;
        $sections = TeacherSection::where('teacher_id', $teacherId)->get();
        $section_count =  $sections->count();
        $ids  =  $sections->pluck('section_id');
        $student_count = Student::whereIn('section_id', $ids)->count();

        return view('dashboard.teacher.index', compact('section_count', 'student_count'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginTeacherRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::TEACHER);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

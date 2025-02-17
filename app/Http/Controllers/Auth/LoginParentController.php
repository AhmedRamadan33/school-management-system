<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginParentRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Student;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginParentController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $parentId = Auth::user()->id;
        $students = Student::where('parent_id', $parentId)->get();
        $student_count = $students->count();
        return view('dashboard.parent.index',compact('students','student_count'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginParentRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::PARENT);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('parent')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

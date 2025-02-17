<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfilePasswordRequest;
use App\Models\Admin;
use App\Models\MyParent;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile');
    }

    public function update(UpdateProfilePasswordRequest $request, $id)
    {
        $currentPassword = $request->currentPassword;
        $newPassword = $request->newPassword;
        $confirmPassword = $request->confirmPassword;

        if (!Hash::check($currentPassword, Auth::user()->password)) {
            toastr()->error('current Password invalid');
            return redirect()->back();
        } else {

            if ($newPassword == $confirmPassword) {
                if (Auth::guard('admin')->check()) {
                    Admin::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                } elseif (Auth::guard('student')->check()) {
                    Student::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                } elseif (Auth::guard('teacher')->check()) {
                    Teacher::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                } else {
                    MyParent::find($id)->update([
                        'password' => Hash::make($confirmPassword),
                    ]);
                }
            }

            toastr()->success('Password Updated successfully');
            return redirect()->back();
        }
    }
}

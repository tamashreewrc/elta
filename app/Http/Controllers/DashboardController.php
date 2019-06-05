<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;
use Validator;
use \App\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function change_password_view()
    {
        return view('admin.change_password');
    }

    public function change_password_submit(Request $request)
    {

        Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|different:old_password|min:6|max:32',
            'confirm_password' => 'required|same:new_password',
        ], [
            'old_password.required' => "Please enter old password",
            'new_password.required' => "Please enter new password",
            'new_password.different' => "New password can't be same with old password",
            'new_password.min' => 'New password must have minimum 6 characters',
            'new_password.max' => 'New password must have maximum 32 characters',
            'confirm_password.required' => "Please enter confirm password",
            'confirm_password.same' => "Confirm password must be same with new password",
        ])->validate();

        if (Hash::check($request->old_password, Auth::guard('admin')->user()->password)) {
            $edit = User::find(Auth::guard('admin')->user()->id);
            $edit->password = bcrypt($request->new_password);
            if ($edit->save()) {
                $request->session()->flash("message", "Password has been changed successfully");
                return redirect('/admin/change_password');
            }
        } else {
            $request->session()->flash("error_message", "Old password doesn't match");
            return redirect('/admin/change_password');
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

}

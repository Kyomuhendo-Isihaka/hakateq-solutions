<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function index(){
        return view('hakateq_admin.changepassword');
    }

    public function updatePassword(Request $request)
{
    // Validate the request
    $request->validate([
        'old_password' => 'required',
        'password' => 'required|confirmed|min:8',
    ]);

    // Check if the old password matches
    if (!Hash::check($request->old_password, auth()->user()->password)) {
        return back()->withErrors(['old_password' => 'Old password is incorrect']);
    }

    // Update the password
    $user = auth()->user();
    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('status', 'Password changed successfully');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class TeamController extends Controller
{
    //
    public function index()
    {
        $team = User::orderBy('created_at', 'desc')->paginate(10);
        return view('hakateq_admin.team', compact('team'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15',
        'email' => 'required|email|unique:users,email',
        'user_type' => 'required|in:user,admin',
        'profile' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        'password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Retrieve the validated input data
    $validatedData = $validator->validated();

    // Store the uploaded profile picture
    $profilePath = $request->file('profile')->store('profiles', 'public');

    // Create a new user instance and save it to the database
    User::create([
        'name' => $validatedData['name'],
        'phone' => $validatedData['phone'],
        'email' => $validatedData['email'],
        'user_type' => $validatedData['user_type'],
        'profile' => $profilePath,
        'password' => Hash::make($validatedData['password']),
    ]);

    return redirect()->back()->with('success', 'Team Member added successfully!');
}

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . $id,
            'user_type' => 'required|in:user,admin',
            'profile' => 'nullable|file|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        $member = User::findOrFail($id);

        $member->name = $validatedData['name'];
        $member->phone = $validatedData['phone'];
        $member->email = $validatedData['email'];
        $member->user_type = $validatedData['user_type'];

        if ($request->hasFile('profile')) {
            if ($member->profile && Storage::disk('public')->exists($member->profile)) {
                Storage::disk('public')->delete($member->profile);
            }

            $profilePath = $request->file('profile')->store('profiles', 'public');
            $member->profile = $profilePath;
        }

        if ($request->filled('password')) {
            $member->password = bcrypt($validatedData['password']);
        }

        $member->save();
        return redirect()->route('team')->with('success', 'Team Member updated successfully!');
    }

    public function destroy($id)
    {
        $member = User::findOrFail($id);

        if ($member->profile && Storage::exists($member->profile)) {
            Storage::delete($member->profile);
        }

        $member->delete();
        return redirect()->back()->with('success', 'Member deleted successfully!');
    }
}

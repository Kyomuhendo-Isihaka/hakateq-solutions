<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(10);
        return view('hakateq_admin.services', compact('services'));
    }

    public function addService(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'icon_color' => 'nullable|string|max:40',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'brief_description' => 'nullable|string|max:255',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Create the service record
        Service::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'icon_color' => $request->icon_color,
            'image' => $imagePath,
            'brief_description' => $request->brief_description,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Service created successfully!');
    }


    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'icon_color' => 'nullable|string|max:40',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'brief_description' => 'nullable|string',
            'description' => 'required|string',
        ]);


        $imagePath = $service->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::delete('public/' . $imagePath);
            }

            $imagePath = $request->file('image')->store('images', 'public');
        }

        $service->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'icon_color' => $request->icon_color,
            'image' => $imagePath,
            'brief_description' => $request->brief_description,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Service updated successfully!');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->back()->with('success', 'Service is Deleted');
    }
}

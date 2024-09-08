<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index(){
        $projects = Project::orderBy('id', 'desc')->paginate(10);
        return view('hakateq_admin.projects', compact('projects'));
    }

    protected $publicHtmlImagePath = '/home/hakabvzf/public_html/images';


    public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        'title' => 'required|string|max:255',
        'link' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'project_image' => 'nullable|image|max:2048',
        'description' => 'nullable|string|max:160',
    ]);

    // Handle the image upload
    $imageUrl = null;
    if ($request->hasFile('project_image')) {
        $imageName = time() . '_' . $request->file('project_image')->getClientOriginalName();
        $destinationPath = $this->publicHtmlImagePath;

        // Move the image to public_html/images directory
        $request->file('project_image')->move($destinationPath, $imageName);

        // Set the URL path to access the image
        $imageUrl = '/images/' . $imageName;
    }

    // Create the blog post
    Project::create([
        'title' => $request->title,
        'link' => $request->link,
        'type' => $request->type,
        'project_image' => $imageUrl,
        'description' => $request->description,
    ]);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Project created successfully.');
}


    public function update(Request $request, Project $project)
{
    // Validate the request data
    $request->validate([
        'title' => 'required|string|max:255',
        'link' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'project_image' => 'nullable|image|max:2048',
        'description' => 'nullable|string|max:160',
    ]);

    // Handle image replacement if a new image is uploaded
    if ($request->hasFile('project_image')) {
        // Delete the old image if it exists
        if ($project->project_image) {
            $oldImagePath = $this->publicHtmlImagePath . '/' . basename($project->project_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $imageName = time() . '_' . $request->file('project_image')->getClientOriginalName();
        $destinationPath = $this->publicHtmlImagePath;

        // Move the new image to public_html/images directory
        $request->file('poject_image')->move($destinationPath, $imageName);

        // Update the image path in the blog
        $project->project_immage= '/images/' . $imageName;
    }

    // Update the blog post
    $project->update([
        'title' => $request->input('title'),
        'link' => $request->input('link'),
        'type' => $request->input('type'),
        'description' => $request->input('description'),
        'project_image' => $project->project_image,
    ]);

    // Redirect to the blog index with a success message
    return redirect()->back()->with('success', 'Project updated successfully.');
}



    public function destroy($id)
{
    $project = Project::findOrFail($id);

    // Delete the image if it exists
    if ($project->image_path) {
        $imagePath = $this->publicHtmlImagePath . '/' . basename($project->project_image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete the blog post
    $project->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Project deleted successfully.');
}

}

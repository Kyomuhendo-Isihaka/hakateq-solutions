<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    //

    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(10);
        return view('hakateq_admin.blogs', compact('blogs'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author' => 'required|string|max:255',
    //         'published_at' => 'nullable|date_format:Y-m-d',
    //         'image' => 'nullable|image|max:2048',
    //         'content' => 'required|string',
    //         'meta_description' => 'nullable|string|max:160',
    //     ]);

    //     $imagePath = null;
    //     if ($request->hasFile('image')) {
    //         $imagePath = $request->file('image')->store('images/posts', 'public');
    //     }

    //     Blog::create([
    //         'title' => $request->title,
    //         'author' => $request->author,
    //         'published_at' => $request->published_at,
    //         'image_path' => $imagePath,
    //         'content' => $request->content,
    //         'meta_description' => $request->meta_description,
    //     ]);

    //     return redirect()->back()->with('success', 'Blog created successfully.');
    // }

    // public function update(Request $request, Blog $blog)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'author' => 'required|string|max:255',
    //         'published_at' => 'nullable|date',
    //         'image' => 'nullable|image|max:2048',
    //         'content' => 'required|string',
    //         'meta_description' => 'nullable|string|max:160',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         if ($blog->image_path) {
    //             Storage::delete('public/' . $blog->image_path);
    //         }

    //         $blog->image_path = $request->file('image')->store('images/posts', 'public');
    //     }


    //     $blog->update([
    //         'title' => $request->input('title'),
    //         'author' => $request->input('author'),
    //         'published_at' => $request->input('published_at'),
    //         'content' => $request->input('content'),
    //         'meta_description' => $request->input('meta_description'),
    //         'image_path' => $blog->image_path ?? $blog->image_path,
    //     ]);

    //     return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    // }


    // public function destroy($id){
    //     $blog = Blog::findOrFail($id);
    //     $blog->delete();
    //     return redirect()->back()->with('success', 'Blog is deleted');
    // }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date_format:Y-m-d',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:160',
        ]);

        // Handle the image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/posts'), $imageName);
            $imagePath = 'images/posts/' . $imageName;
        }

        // Create the blog post
        Blog::create([
            'title' => $request->title,
            'author' => $request->author,
            'published_at' => $request->published_at,
            'image_path' => $imagePath,
            'content' => $request->content,
            'meta_description' => $request->meta_description,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Blog created successfully.');
    }
    public function update(Request $request, Blog $blog)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date_format:Y-m-d',
            'image' => 'nullable|image|max:2048',
            'content' => 'required|string',
            'meta_description' => 'nullable|string|max:160',
        ]);

        // Handle image replacement if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($blog->image_path && file_exists(public_path($blog->image_path))) {
                unlink(public_path($blog->image_path));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/posts'), $imageName);
            $blog->image_path = 'images/posts/' . $imageName;
        }

        // Update the blog post
        $blog->update([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'published_at' => $request->input('published_at'),
            'content' => $request->input('content'),
            'meta_description' => $request->input('meta_description'),
            'image_path' => $blog->image_path,
        ]);

        // Redirect to the blog index with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete the image if it exists
        if ($blog->image_path && file_exists(public_path($blog->image_path))) {
            unlink(public_path($blog->image_path));
        }

        // Delete the blog post
        $blog->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Blog deleted successfully.');
    }
}

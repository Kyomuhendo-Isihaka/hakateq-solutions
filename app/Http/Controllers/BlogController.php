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

   protected $publicHtmlImagePath = '/home/hakabvzf/public_html/images';


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
    $imageUrl = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $destinationPath = $this->publicHtmlImagePath;
        
        // Move the image to public_html/images directory
        $request->file('image')->move($destinationPath, $imageName);
        
        // Set the URL path to access the image
        $imageUrl = '/images/' . $imageName;
    }

    // Create the blog post
    Blog::create([
        'title' => $request->title,
        'author' => $request->author,
        'published_at' => $request->published_at,
        'image_path' => $imageUrl,
        'content' => $request->input('content'),
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
        if ($blog->image_path) {
            $oldImagePath = $this->publicHtmlImagePath . '/' . basename($blog->image_path);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $destinationPath = $this->publicHtmlImagePath;
        
        // Move the new image to public_html/images directory
        $request->file('image')->move($destinationPath, $imageName);
        
        // Update the image path in the blog
        $blog->image_path = '/images/' . $imageName;
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
    if ($blog->image_path) {
        $imagePath = $this->publicHtmlImagePath . '/' . basename($blog->image_path);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete the blog post
    $blog->delete();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Blog deleted successfully.');
}

}

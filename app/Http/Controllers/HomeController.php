<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $projects = Project::take(3)->get();
        return view('welcome', compact('projects'));
    }
    public function services(){
        $services = Service::paginate(10);
        return view('services',compact('services'));
    }
    public function contact(){
        return view('contact');
    }
    public function blogs(){
        $blogs = Blog::orderBy('id', 'desc')->paginate(9);
        return view('blogs', compact('blogs'));
    }
    public function projects(){
        $projects = Project::orderBy('id', 'desc')->paginate(9);
        return view('projects', compact('projects'));
    }

    public function showBlog($id, $title)
{

    $blog = Blog::where('id', $id)->firstOrFail();

    return view('blogShow', compact('blog'));
}


    public function about(){
        $team = User::paginate(4);
        return view('about', compact('team'));
    }
}

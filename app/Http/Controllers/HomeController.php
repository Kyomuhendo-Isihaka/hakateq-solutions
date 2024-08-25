<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }
    public function services(){
        return view('services');
    }
    public function contact(){
        return view('contact');
    }
    public function blogs(){
        return view('blogs');
    }

    public function about(){
        return view('about');
    }
}

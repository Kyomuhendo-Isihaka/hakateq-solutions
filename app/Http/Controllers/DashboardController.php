<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    //
    public function index(){
        $teamMemberCount = User::count();
        $blogCount = Blog::count();
        $serviceCount = Service::count();
        $contactCount = Contact::count();
        return view('hakateq_admin.dashboard', compact('teamMemberCount', 'blogCount', 'serviceCount', 'contactCount'));
    }
}

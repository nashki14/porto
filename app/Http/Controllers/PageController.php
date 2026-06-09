<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function projects()
    {
        $projects = Project::latest()->get();
        return view('projects', compact('projects'));
    }

    public function contact()
    {
        return view('contact');
    }
}

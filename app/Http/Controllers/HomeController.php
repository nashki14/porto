<?php

namespace App\Http\Controllers;

use App\Models\Project; // <-- INI YANG PENTING

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(3)->get();

        return view('home', compact('projects'));
    }
}

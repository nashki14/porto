<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
		return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    Project::create([
        'title' => $request->title,
		'slug' => Str::slug($request->title),
		'description' => $request->description,
		'image' => $imagePath ?? null,
		'status' => $request->status,
    ]);

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
	{
		return view('admin.projects.edit', compact('project'));
	}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $project->update([
        'title' => $request->title,
        'description' => $request->description,
		'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('projects', 'public');
    }

    Project::create($data);

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
{
    $project->delete();

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project berhasil dihapus');
}
}

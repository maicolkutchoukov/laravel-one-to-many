<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Models
use App\Models\Project;

// Helpers
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

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
        $projectData = $request->all();

        $slug = Str::slug($projectData['title']);

        $existingProjectWithThisSlug = Project::where('slug', $slug)->first();

        // Se entra qui, vuol dire che non ha trovato un project con questo slug
        if ($existingProjectWithThisSlug != null) {
            // Genera un nuovo slug
            $slug = $slug.'-1';
        }

        $project = Project::create([
            'title' => $projectData['title'],
            'slug' => $slug,
            'content' => $projectData['content'],
        ]);
        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
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
        $projectData = $request->all();
        $slug = Str::slug($projectData['title']);
        $project->update($projectData);

        return redirect()->route('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}

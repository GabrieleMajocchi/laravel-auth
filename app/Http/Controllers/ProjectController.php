<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);

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
            'title'=> 'required|unique:projects|min:3|max:255',
            'description'=> 'required|min:3|max:255',
            'lang'=> 'required|min:3|max:255',
            'link'=> 'required|unique:projects|min:5|max:255'
        ]);
        $data = $request->all();

        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->description = $data['description'];
        $newProject->lang = $data['lang'];
        $newProject->link = $data['link'];
        $newProject->date = date('y-m-d');
        $newProject->save();
        return redirect()->route('projects.show', $newProject->id)->with('stored', $newProject->title);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'=> ['required', 'min:3', 'max:255', Rule::unique('projects')->ignore($project->id)],
            'description'=> ['required', 'min:3', 'max:255'],
            'lang'=> ['required', 'min:3', 'max:255'],
            'link'=> ['required', 'min:5', 'max:255', Rule::unique('projects')->ignore($project->id)],
        ]);
        $data = $request->all();
        $project->update($data);

        return redirect()->route("projects.show", $project->id)->with("updated", $project->title);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route("projects.index")->with("deleted", $project->title);
    }

    public function trashed()
    {
        $projects = Project::onlyTrashed()->paginate(10);

        return view('admin.projects.trashed', compact('projects'));
    }

    public function restore($id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();

        return redirect()->route('projects.index')->with('restored', $project->title);
    }
}

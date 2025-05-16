<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProject;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::paginate()]);
    }

    public function create()
    {
        return view('projects.create', ['project' => new Project()]);
    }

    public function store(StoreProject $request)
    {
        Project::create( ['name' => $request['name']]);

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    public function update(Project $project, StoreProject $request)
    {
        $project['name'] = $request['name'];

        $project->save();

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}

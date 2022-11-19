<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::with(['category', 'projectstatus'])->latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create', [
            'categories' => Category::all(),
            'status' => ProjectStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectStoreRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::of($request->name)->slug('-').'-'.rand(1,99);
        Project::create($data);

        return redirect('projects')->with('add', 'Project '.$data['name'].' Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', [
            'project' => $project,
            'tasks' => Task::where('project_id', $project->id)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project' => $project,
            'categories' => Category::all(),
            'status' => ProjectStatus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => ['required', 'max:100'],
            'slug' => ['required', 'alpha_dash', 'unique:projects,slug,'.$project->id],
            'category_id' => ['required', 'numeric'],
            'status' => ['required'],
            'description' => [''],
            'deadline' => ['date'],
        ]);

        Project::where('id', $project->id)->update($data);

        return redirect('projects')->with('edit', 'Project '.$project->name.' Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        Project::destroy('id', $project->id);

        return redirect('projects')->with('delete', 'Project '.$project->name.' Deleted!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tasks.index', [
            'tasks' => Task::with(['project', 'user', 'taskstatus'])->latest()->get(),
            'projects' => Project::latest()->get(),
            'users' => User::all(),
            'status' => TaskStatus::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:200'],
            'project_id' => ['numeric', 'nullable'],
            'user_id' => ['numeric', 'nullable'],
            'due_date' => ['date', 'nullable'],
            'description' => ['max:255'],
            'status' => ['required', 'numeric', 'max:3']
        ]);
        $data['slug'] = Str::of($request->name)->slug('-').'-'.rand(1,99);
        Task::create($data);

        // return redirect('tasks')->with('add', 'Task '.$request->name. ' Created!');
        return redirect('tasks')->withSuccess('Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'name' => ['required', 'max:200'],
            'slug' => ['required', 'alpha_dash', 'unique:tasks,slug,'.$task->id],
            'project_id' => ['numeric', 'nullable'],
            'user_id' => ['numeric', 'nullable'],
            'due_date' => ['date', 'nullable'],
            'description' => ['max:255'],
        ]);

        Task::where('id', $task->id)->update($data);
        return redirect()->back()->with('info', 'Task '.$data['name']. ' Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::destroy('id', $task->id);
        return redirect()->back()->withWarning('Task '.$task->name.' Deleted!');
    }

    public function get_tasks_by_user(User $user)
    {
        return view('admin.tasks.index', [
            'tasks' => Task::with(['project', 'user', 'taskstatus'])->where('user_id', $user->id)->get(),
            'projects' => Project::latest()->get(),
            'users' => User::all(),
            'status' => TaskStatus::all(),
        ]);
    }

    public function set_complete_status(Task $task)
    {
        Task::where('id', $task->id)->update(['status' => 1]);
        return redirect()->back()->withSuccess('Task '. $task->name .' set to Complete!');
    }
}

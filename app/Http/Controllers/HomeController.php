<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'qty_project_active' => collect(Project::where('status', 1)->get())->count(),
            'qty_project_complete' => collect(Project::where('status', 3)->get())->count(),
            'qty_task' => collect(Task::all())->count(),
            'qty_user' => collect(User::all())->count(),
        ]);
    }
}

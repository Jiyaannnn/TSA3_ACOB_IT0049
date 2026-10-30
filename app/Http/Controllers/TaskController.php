<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('pages.tasks', ['title' => 'Task List', 'activePage' => 'tasks', 'tasks' => Task::orderBy('task_date')->orderBy('id')->get(), 'todayOnly' => false]);
    }

    public function today(): View
    {
        // Filtering in Eloquent keeps other dates out of the Welcome page response.
        return view('pages.home', ['title' => 'Overview', 'activePage' => 'home', 'tasks' => Task::whereDate('task_date', today())->orderBy('id')->get(), 'todayOnly' => true]);
    }
}

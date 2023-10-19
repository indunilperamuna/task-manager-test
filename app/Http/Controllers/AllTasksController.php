<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __invoke(Request $request)
    {

        $query = Task::query()->with(['project']);

        if ($request->has('project')) {
            $tasks = $query->where('project_id', $request->project)->get();
        } else {
            $tasks = $query->get();
        }




        return view('tasks.index', compact('tasks'));
    }
}

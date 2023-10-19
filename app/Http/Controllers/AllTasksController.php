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
            $query->where('project_id', $request->project);
        }

        if ($request->has('sort') && $request->sort == 'asc') {
            $query->orderBy('due_date', 'asc');
        } else {
            $query->orderBy('due_date', 'desc');
        }

        $tasks = $query->get();

        return view('tasks.index', compact('tasks'));
    }
}

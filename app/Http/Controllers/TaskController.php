<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($project)
    {
        $tasks = Task::where('project_id', $project)
            ->orderBy("due_date", "asc")->paginate(10);
        return view('tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($project)
    {
        $project = auth()->user()->projects()->findOrFail($project);

        return view('tasks.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $project)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        $project = auth()->user()->projects()->findOrFail($project);

        $task = $project->tasks()->create($request->all());

        return redirect('/projects/' . $project->id . '/tasks/' . $task->id)->with('success', 'Task created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($project, $task)
    {
        $project = auth()->user()->projects()->findOrFail($project);
        $task = Task::findOrFail($task);
        return view('tasks.edit', compact('project', 'task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $project, $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required'
        ]);

        $task = Task::findOrFail($task);
        $task->update($request->all());
        return redirect('/projects/' . $task->project_id . '/tasks/' . $task->id . '/edit')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/projects/' . $task->project_id . '/tasks')->with('success', 'Task deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        return view('welcome', ['tasks' => $tasks]); // associative array
        // return view('welcome', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $dataValid = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|string|in:low,medium,high'
        ]);

        $dataValid['completed'] = false; //completed tasks set to false default

        Task::create($dataValid);
        
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        return view('show', ['task' => $task]);   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrfail($id);
        return view('edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $task = Task::findOrFail($id);
    
    // Check if you're updating the 'completed' status or the whole task
    if ($request->has('completed')) {
        // Only update the 'completed' status
        $task->completed = !$task->completed;
    } else {    
        // Otherwise, update the task with title and description
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'priority' => 'required|string|in:low,medium,high'
        ]);

        $task->update($validatedData); // UPDATE the new task
    }

    $task->save();

    return redirect()->route('tasks.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete($id);
        return redirect()->route('tasks.index');
    }

    // public function toggleCompleted($id)
    // {
    //     $task = Task::findOrFail($id);
    //     $task->completed = !$task->completed;
    //     $task->save();

    //     return redirect()->route('tasks.index');
    // }
}

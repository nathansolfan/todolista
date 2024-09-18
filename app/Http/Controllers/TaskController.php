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
        // dd($request->title);
        $response = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        Task::create($response);
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
        $task = Task::findOrFail($id); // find or fail  the specified resource in storage if it already exists in the database
        
        // validate the requested task
        $validatedData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string'
        ]);  
        
        // $task->save();
        $task->update($validatedData);
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
}

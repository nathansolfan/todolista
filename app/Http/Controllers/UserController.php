<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|email|unique:users,email',
            'password' => 'string|required|confirmed'
        ]);

        $user['password'] = bcrypt($user['password']);

        User::create($user);

        return redirect()->route('users.index')->with('success_create', 'User created the account succesfully bruh');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findorFail($id);
        $validatedData = $request->validate([
            'name' => 'string|required',
            'email' => 'string|required|email|unique:users,email,' . $user->id,
            'password' => 'string|nullable|confirmed'
        ]);

        // If password is provided, hash it, otherwise don't update it
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']); // dont update pw if not provided
        }

        // dd($validatedData);
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success_update', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete($id);
        return redirect()->route('tasks.index');
    }
}

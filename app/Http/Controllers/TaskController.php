<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index()
{
    $tasks = Task::where('user_id', Auth::id())->get();
    
    $stats= [
        'total' => $tasks->count(),
        'done' => $tasks->where('statut', 'done')->count(),
        'doing' => $tasks->where('statut', 'doing')->count(),
        'todo' => $tasks->where('statut', 'todo')->count(),
    ];
    return view('dashboard', compact('tasks', 'stats'));
}
   
    public function create()
    {
        $categories = Category::all();
        return view ('tasks.create', compact('categories'));
    }

  
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'statut' => 'required|in:todo,doing,done',
        ]);
        Task::create($validateData + [
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

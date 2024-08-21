<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index()
    {
    $tasks = Task::all();
    return response()->json($tasks);
    }


    public function store(Request $request)
    {
    $validatedData = $request->validate([
    'title' => 'required|string|max:255',
    ]);
    $task = Task::create($validatedData);
    return response()->json($task, 201);
    }
}

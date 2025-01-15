<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('user', 'client', 'project')->paginate(10);
        return view("tasks.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select(["id", "first_name", "last_name"])->get();
        $clients = Client::select(["id", "company_name"])->get();
        $projects = Project::select(["id", "title"])->get();

        return view("tasks.create", compact("users", "clients", "projects"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}

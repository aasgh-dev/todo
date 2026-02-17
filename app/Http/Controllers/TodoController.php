<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \App\Models\Project;
use \App\Models\Todo;

class TodoController extends Controller
{
    public function index(Project $project)
    {

        return view('todo.todos', ['todos' => $project->todos, 'project' => $project]);
    }

    public function create(Project $project)
    {
        // return create page    
        return view('todo.create',['project'=> $project]);
    }

    // show => details
    public function show(Project $project,Todo $todo)
    {
        return view('todo.details',['todo' => $todo, 'project' => $project]);
    }

    public function edit(Project $project,Todo $todo)
    {
        return view('todo.edit',['todo' => $todo, 'project' => $project]);
    }

    public function update(StoreTodoRequest $request, Project $project,Todo $todo)
    {
        // send form values to validator in {storeTodoRequest} to make it east to edit role
        $validated = $request->validated();


        // the shorter way
        $todo->update($validated);

        // show dialog in home page to notify the user
        session()->flash('success', 'Todo updated successfully');

        return redirect(route('projects.todos.index',['todo' => $project->todos, 'project' => $project]));
    }

    // destroy => delete
    public function destroy(Project $project,Todo $todo)
    {

        // delete specific todo 
        $todo->delete();

        // show dialog in home page to notify the user
        session()->flash('success', "Todo Delete succesfully");

        return redirect(route('projects.todos.index',['todos' => $project->todos, 'project' => $project]));
    }

    public function store(StoreTodoRequest $request, Project $project)
    {
        $validated = $request->validated();

        $user = Auth::user();

        // make new instance of todo model
        $todo = Todo::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => $user->id,
            'project_id' => $request['project_id'],
            'status' => 'todo',
        ]);

        // save new record in database
        $todo->save();

        session()->flash('success', "Todo created succesfully");

        return redirect(route('projects.todos.index',['todo' => $project->todos, 'project' => $project]));
    }
}

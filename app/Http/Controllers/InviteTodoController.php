<?php

namespace App\Http\Controllers;

use App\Models\Invites_project;
use App\Models\Invites_todo;
use App\Models\Project;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class InviteTodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Project $project, Todo $todo)
    {
        $users = User::whereHas( 'invites_project',function($query)use ($project){
            $query->where('project_id', $project->id);
        })->get();

        // $users = User::all();

        return view('todo.assign', ['users' => $users, 'todo' => $todo, 'project' => $project]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Project $project, Todo $todo)
    {
        $invite = Invites_todo::create(
            [
                'user_id' => $request['user_id'],
                'todo_id' => $todo->id,
            ]
        );

        // $invite->save();

        session()->flash('success', 'member added successfully');

        return redirect(route('projects.todos.invites_todo.index',  ['project' => $project, 'todo' => $todo]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Invites_todo $invites_todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invites_todo $invites_todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invites_todo $invites_todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invites_todo $invites_todo)
    {
        //
    }
}

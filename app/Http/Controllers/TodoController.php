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
    public function index(Request $request)
    {
        // bring all record in todos table
        $todo = Todo::where('project_id', $request['project_id'])->get();
        // return to home page with records
        return view('todo.todos')
            ->with('todos', $todo)->with('project_id', $request['project_id']);
    }

    public function create(Request $request)
    {
        // return create page    
        return view('todo.create')->with('project_id', $request['project_id']);
    }

    // show => details
    public function show(Todo $todo, Request $request)
    {
        // return page with specific todo to edit it or deleta it 
        return view('todo.details')->with('todos', $todo)->with('project_id', $request['project_id']);
    }

    public function edit(Todo $todo, Request $request)
    {
        return view('todo.edit')->with("todos", $todo)->with('project_id',$request['project_id']);
    }

    public function update(StoreTodoRequest $request, Todo $todo)
    {
        // send form values to validator in {storeTodoRequest} to make it east to edit role
        $validated = $request->validated();

        // old way || old school
        // $todo->name = $validated['name'];
        // $todo->description = $validated["description"];

        // // update existing record in database
        // $todo->save();

        // ANTHOR WAY TO UPDATAE
        // DB::table("todos")->where('id',$todo['id'])->update(['name'=>$request['name'],'description'=>$request["description"]]);

        // the shorter way
        $todo->update($validated);

        // show dialog in home page to notify the user
        session()->flash('success', 'Todo updated successfully');

        return redirect(route('todos.index', ['project_id' => $request['project_id']]));
    }

    // destroy => delete
    public function destroy(Todo $todo, Request $request)
    {

        // delete specific todo 
        $todo->delete();

        // show dialog in home page to notify the user
        session()->flash('success', "Todo Delete succesfully");

        return redirect(route('todos.index', ['project_id' => $request['project_id']]));
    }

    public function store(StoreTodoRequest $request)
    {
        $validated = $request->validated();

        // for debuging
        //dd($validated);

        $user = Auth::user();

        // make new instance of todo model
        $todo = Todo::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'user_id' => $user->id,
            'project_id' => $request['project_id'],
            'status'=>'todo',
        ]);

        // save new record in database
        $todo->save();

        session()->flash('success', "Todo created succesfully");

        return redirect(route('todos.index', ['project_id' => $request['project_id']]));
    }
}

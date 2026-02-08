<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTodoRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

use \App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = Todo::all();
        return view('index')->with('todos', $todo);
    }

    public function create()
    {
        return view('create');
    }

    public function login(){
        return view('login');
    }

    public function show(Todo $todo)
    {
        return view('details')->with('todos', $todo);
    }

    public function edit( Todo $todo)
    {
        return view('edit')->with("todos", $todo);
    }

    public function update(StoreTodoRequest $request, Todo $todo)
    {
        $validated = $request->validated();

        $todo->name = $validated['name'];
        $todo->description = $validated["description"];
        $todo->save();

        // ANTHOR WAY TO UPDATAE
        // DB::table("todos")->where('id',$todo['id'])->update(['name'=>$request['name'],'description'=>$request["description"]]);

        session()->flash('success', 'Todo updated successfully');

        return redirect(route('todo.index'));
    }

    public function destroy(Todo $todo)
    {

        $todo->delete();
        session()->flash('success', "Todo Delete succesfully");

        return redirect(route('todo.index'));
    }

    public function store(StoreTodoRequest $request)
    {
        $validated = $request->validated();
        
        // for debuging
        //dd($validated);

        $todo=Todo::create($validated);
        $todo->save();
        
        session()->flash('success', "Todo created succesfully");

        return redirect(route('todo.index'));
    }
}

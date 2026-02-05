<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
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

    public function details(Todo $todo)
    {
        return view('details')->with('todos', $todo);
    }

    public function edit(Todo $todo)
    {
        return view('edit')->with("todos", $todo);
    }

    public function update(StorePostRequest $request, Todo $todo)
    {
        $validated = $request->validated();

        $todo->name = $validated['name'];
        $todo->description = $validated["description"];
        $todo->save();

        // ANTHOR WAY TO UPDATAE
        // DB::table("todos")->where('id',$todo['id'])->update(['name'=>$request['name'],'description'=>$request["description"]]);

        session()->flash('success', 'Todo updated successfully');

        return redirect('/');
    }

    public function delete(Todo $todo)
    {

        $todo->delete();
        return redirect('/');
    }

    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $todo=Todo::create(['name'=>$validated['name'],'description'=>$validated["description"]]);
        $todo->save();

        session()->flash('success', "Todo created succesfully");

        return redirect('/');
    }
}

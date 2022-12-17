<?php

namespace App\Http\Controllers;
use App\Models\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos = Todo::orderBy('id','desc')->paginate(5);
        return view('todos.index', compact('todos'));
    }

 

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
        Todo::create($request->all());
        return redirect('todos')->with('success','Task has been created successfully.');
    }
    public function update(Todo $todo)
    {

        if ($todo->isDone == true) {
            $todo ->update(['isDone' => false]);
        } else {
            $todo ->update(['isDone' => true]);
        }
        return redirect('todos');

    }

    public function destroy(Todo $todo)
    {
        $todo ->delete();
        return redirect('todos');

    }

}

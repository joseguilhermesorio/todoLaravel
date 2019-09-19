<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::select('id','name','description','completed')->paginate(5);
        return view('todos.index')->with(['todos' => $todos]);
    }


    public function show($todoId) {
        $todo = Todo::findOrFail($todoId);
        return view('todos.show')->with(['todo' => $todo]);
    }

    public function create() {
        return view('todos.create');
    }


    public function save(TodoRequest $request) {
        $data           = $request->all();
        $name           = $data['name'];
        $description    = $data['description'];
        $completed      = false;

        try{
            $todo               = new Todo();
            $todo->name         = $name;
            $todo->description  = $description;
            $todo->completed    = $completed;
            $todo->save();
            session()->flash('success','Todo was created successfully');
            return redirect()->route('todos.index');

        }catch(\Exception $e) {
            session()->flash('danger', 'Opss.. An error has occurred');
            return view('todos.create');
        }
        
    }

    public function edit($todoId) {
        $todo = Todo::findOrFail($todoId);
        return view('todos.edit')->with(['todo' => $todo]);
    }


    public function update(TodoRequest $request, $id) {
        $data               = $request->all();
        $todo               = Todo::findOrFail($id);
        $todo->name         = $data['name'];
        $todo->description  = $data['description'];
        $todo->completed    = false;
        $todo->save();
        session()->flash('success', 'Todo was updated successfully');
        return redirect()->route('todos.index');
    }


    public function destroy($id) {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        session()->flash('success', 'Todo was deleted successfully');
        return redirect()->route('todos.index');
    }

    public function completed($id) {
        $todo = Todo::findOrFail($id);
        $todo->update([
            'completed' => !$todo->completed
        ]);
        if($todo->completed) {
            session()->flash('success', 'Todo was completed successfully');
        }else {
            session()->flash('success', 'Todo was restarted successfully');
        }
        return redirect()->route('todos.index');
    }


    public function search(Request $request) {
        $data = $request->all();
        $todos = Todo::select('id','name','description','completed')
                    ->where(function($query) use ($data) {
                        $query->where('name','like','%'.$data['search'].'%')
                                ->orWhere('description','like','%'.$data['search'].'%');
                    })
                    ->paginate(5);
        if($data['search'] == null) {
            return redirect()->route('todos.index');
        }

        return view('todos.index')->with(['todos' => $todos]);
    }
}

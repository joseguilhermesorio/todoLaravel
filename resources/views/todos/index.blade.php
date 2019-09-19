@extends('layout.master')
@section('title','Todos List')

@section('content')
    <div class="container">
        <h2 class="text-center my-5">Todos List</h2>
        <div class="card card-default">
            <div class="card-header">
                Todos
                <form action="{{ route('todos.search') }}" method="get" class="form-inline float-right">
                    <input type="search" name="search" class="form-control">
                    <button class="btn btn-success ml-2">Search</button>
                </form>
            </div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <a href="{{ route('todos.create') }}" class="btn btn-secondary mb-2" role="button">Create</a>
                <ul class="list-group">
                    @foreach($todos as $todo) 
                        <li class="list-group-item {{ $todo->completed ? 'list-group-item-success' : '' }}">{{ $todo->name }}
                            <a href="{{ route('todos.delete',['id' => $todo->id]) }}" class="btn btn-danger btn-sm float-right ml-3"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            <a href="{{ route('todos.completed',['id' => $todo->id]) }}" class="btn btn-success btn-sm float-right ml-3"><i class="fa fa-check" aria-hidden="true"></i></a>
                            <a href="{{ route('todos.show',['id' => $todo->id]) }}" class="btn btn-primary btn-sm float-right" role="button">View</a>
                        </li>
                    @endforeach
                </ul>
                <div class="my-2">
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
            
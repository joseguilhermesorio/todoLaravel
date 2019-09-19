@extends('layout.master')
@section('title','Todo Show')

@section('content')
<div class="container">
    <h2 class="text-center my-5">Todo Show</h2>
    <div class="card card-default">
        <div class="card-header">
            Todo Show 
            <a href="{{ route('todos.index') }}" class="btn btn-success btn-sm float-right" role="button">Back</a>
        </div>
        <div class="card-body text-center">
            <h3>{{ $todo->name }}</h3>
            <p>{{ $todo->description }}</p>
            Completed? 
            @if($todo->completed)
                Yes
            @else 
                No 
            @endif
            
        </div>
    </div>
    <a href="{{ route('todos.edit',['id' => $todo->id]) }}" class="btn btn-info btn-md float-right my-2" role="button">Edit</a>
</div>
@endsection
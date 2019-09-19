@extends('layout.master')
@section('title','Create Todo')

@section('content')
<div class="container">
    <h2 class="text-center my-5">Create Todo</h2>
    <div class="card card-default">
        <div class="card-header">
            Create Todo
            <a href="{{ route('todos.index') }}" class="btn btn-success btn-sm float-right" role="button">Back</a>
        </div>
        <div class="card-body">
            @if(session()->has('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div>
            @endif
            <form method="POST" action="{{ route('todos.save') }}">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description:</label>
                    <div class="col-sm-10">
                        <textarea name="description" id="description" cols="30" rows="3" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"></textarea>
                        @if($errors->has('description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button class="btn btn-success float-right">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
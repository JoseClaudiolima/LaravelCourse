@extends('layouts.app')

@section('title', 'Create a new Task')

@section('content')
    <form action="{{ROUTE('tasks.store')}}" method="post">
        @csrf
        <div class='input-border'>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class='input-text'>
        </div>

        <div class='input-border'>
            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>
        </div>
         
        <div class='flex gap-4'>
            <input type="submit" value="Add Task" class='btn'>
            <a href="{{route('tasks.index')}}" class='btn'>Cancel</a>
        </div>
    </form>
@endsection
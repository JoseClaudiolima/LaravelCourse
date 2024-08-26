@extends('layouts.app')

@section('title', 'Create a new Task')

@section('content')
    <form action="{{ROUTE('tasks.store')}}" method="post">
        @csrf
        <div class='input-border'>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" 
            value="{{$task->title ?? old('title')}}"
            @class(['input-text',
            'border border-2 border-red-600' => $errors->has('title'),
            'border border-gray-200' => !$errors->has('title') ])>
        </div>
        @error('title')
            <p class='error'> {{$message}} </p>
        @enderror

        <div class='input-border'>
            <label for="description">Description:</label>
            <textarea name="description" id="description"
            @class(['border  border-gray-200' => !$errors->has('description'),
             'border border-red-600' => $errors->has('description')])></textarea>
        </div>
        @error('description')
            <p class='error'>{{$message}}</p>
        @enderror
         
        <div class='flex gap-4'>
            <input type="submit" value="Add Task" class='btn'>
            <a href="{{route('tasks.index')}}" class='btn'>Cancel</a>
        </div>
    </form>
@endsection
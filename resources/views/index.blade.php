@extends('layouts.app')

@section('title' ,'All Task List')


@section('content')

<div>
    <a href="{{route('tasks.create')}}" class='link'>Create</a>
</div>
    
<div class='mt-5'>
    
    @foreach ($tasks as $task)
    
        <p><a href="{{route('tasks.show', ['task' => $task])}}" 
            @class(
                ['taskLink', 'line-through' => $task->completed])
                >{{$task->title}} </a></p>
    
    @endforeach
</div>

<nav class='w-[440px]'>
    {{$tasks->links()}}
</nav>

@endsection
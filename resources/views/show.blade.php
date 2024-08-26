@extends('layouts.app')

@section('title', "$task->title")

@section('content')
    
    <a href="{{route('tasks.index')}}" class='link'>Home</a>

    <div class='mt-5'>
        <p>
            {{$task->description}}
        </p>

        <div class='mt-5 flex flex-col'>
            <p class='text-gray-500 '>Created: {{$task->created_at->diffForHumans()}}</p>
            <p class='text-gray-500 mt-1'>Updated: {{$task->updated_at->diffForHumans()}}</p>
        </div>
        
        @if ($task->completed)
            <p class='text-green-500 mt-3'>Completed</p>
        @else
            <p class='text-red-500 mt-3'> Uncompleted </p>
        @endif
        
        <div class='mt-5 flex gap-5'>
            <a href="#" class='btn'>Edit</a>
        <form action="{{route('tasks.toggle-completed', ['task' => $task])}}" method="post">
            @csrf
            @method('PUT')
            <button class='btn'>
                {{$task->completed ? 'Mark as Uncompleted' : 'Mark as Completed'}}
            </button>

            <form action="{{route('tasks.delete', ['task' => $task])}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn">
                    DELETE
                </button>
            </form>
        </form>
        </div>
    </div>


@endsection
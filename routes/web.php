<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Task;


Route::get('/', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate()
    ]);
})->name('tasks.index');

Route::get('/tasks/{task}', function (Task $task){
    return view('show', [
        'task' => $task
    ]); 
})->name('tasks.show');


Route::put('tasks/{task}', function (Task $task){
    $task->toggle_completed();

    return view('show', [
        'task' => $task
    ]);
})->name('tasks.toggle-completed');


Route::delete('tasks/{task}', function(Task $task) {
    $task->delete();

    return redirect()->route('tasks.index');
})->name('tasks.delete');

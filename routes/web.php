<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Task;
use App\Http\Requests\TaskRequest;



Route::get('/', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate()
    ]);
})->name('tasks.index');

Route::view('tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task){
    return view('show', [
        'task' => $task
    ]); 
})->name('tasks.show');


Route::get('tasks/edit/{task}', function(Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');


Route::post('/tasks', function(TaskRequest $request){
    $data = $request->validated();

    $task = Task::create($data);

    return redirect()->route('tasks.index');
})->name('tasks.store');


Route::put('tasks/toggle/{task}', function (Task $task){
    $task->toggle_completed();

    return view('show', [
        'task' => $task
    ]);
})->name('tasks.toggle-completed');


Route::put('tasks/{task}', function(Task $task, TaskRequest $request){
    $data = $request->validated();

    $task->update($data);

    return redirect()->route('tasks.show', [
        'task' => $task
    ]);
})->name('tasks.update');


Route::delete('tasks/{task}', function(Task $task) {
    $task->delete();

    return redirect()->route('tasks.index');
})->name('tasks.delete');
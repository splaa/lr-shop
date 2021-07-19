<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(): string
    {
        $hello = 'Hello';
        return view('book.tasks.index')->with([
            'hello' => $hello,
            'helloWorld' => 'Hello, Test'
        ]);
    }

    public function store(Request $request)
    {
        Task::create($request->only(['title', 'description']));
        return redirect(route('tasks.index'));
    }

}

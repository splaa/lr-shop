<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Models\Book\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(): string
    {
        return 'Hello, World!!!';
    }

    public function store(Request $request)
    {
        Task::create($request->only(['title', 'description']));
        return redirect(route('tasks.index'));
    }

    //todo:splx Внедрение зависимостей в контроллереры str:69
}

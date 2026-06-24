<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::query();

        if ($request->status === 'completed') {

            $tasks->where(
                'completed',
                true
            );

        }

        return view(
            'tasks.index',
            [
                'tasks' => $tasks->get()
            ]
        );
    }
    // public function index()
    // {
    //     $tasks = Task::all();

    //     return view('tasks.index', compact('tasks'));
    // }

    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title
        ]);

        return redirect('/');
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->title
        ]);

        return redirect('/');
    }

    public function complete(Task $task)
    {
        $task->update([
            'completed' => true
        ]);

        return redirect('/');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/');
    }

    public function toggle(Task $task)
    {
        $task->update([
            'completed' => !$task->completed
        ]);

        return redirect('/');
    }
}

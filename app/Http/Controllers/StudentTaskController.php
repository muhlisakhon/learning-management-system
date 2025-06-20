<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentTaskController extends Controller
{
    public function show(Task $task)
    {
        $task->load('subject.teacher');
        return view('student.tasks.show', compact('task'));
    }

    public function submit(Request $request, Task $task)
    {
        $request->validate([
            'solution_text' => 'required|string',
        ]);

        Solution::create([
            'task_id' => $task->id,
            'user_id' => Auth::id(),
            'content' => $request->solution_text, 
        ]);

        return redirect()->route('student.tasks.show', $task)->with('submission_success', true);


    }
}

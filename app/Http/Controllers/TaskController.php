<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Subject $subject)
    {
        return view('tasks.create', compact('subject'));
    }

    public function store(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'points' => 'required|numeric|min:0',
        ]);

        $validated['subject_id'] = $subject->id;

        Task::create($validated);

        return redirect()->route('subjects.show', $subject)->with('success', 'Task created successfully!');
    }
    public function show(Task $task)
    {
        $task->load('solutions.student'); 
        $submittedSolutionsCount = $task->solutions()->count();
        $evaluatedSolutionsCount = $task->solutions()->whereNotNull('points')->count();

        return view('tasks.show', compact('task', 'submittedSolutionsCount', 'evaluatedSolutionsCount'));
    }
    

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'description' => 'required',
            'points' => 'required|integer|min:0',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.show', $task)->with('success', 'Task updated successfully!');
    }


}

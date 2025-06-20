<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function edit(Solution $solution)
    {
        $solution->load('student', 'task.subject'); 
        $task = $solution->task; 
    
        return view('solutions.evaluate', compact('solution', 'task'));
    }
    
    public function update(Request $request, Solution $solution)
    {
        $task = $solution->task;

        $validated = $request->validate([
            'points' => "required|integer|min:0|max:{$task->points}",
        ]);

        $solution->points_awarded = $validated['points'];
        $solution->evaluated_at = now(); 
        $solution->save();

        return redirect()->route('tasks.show', $solution->task)->with('success', 'Solution evaluated successfully!');
    }
}

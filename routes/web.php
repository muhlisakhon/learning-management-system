<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController; 
use App\Http\Controllers\TaskController; 
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\StudentSubjectController;



Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    if (Auth::user()->is_teacher) {
        return redirect()->route('teacher.home');
    } else {
        return redirect()->route('student.home');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {

  
    Route::get('/teacher/home', function () {
        return view('teacher.home');
    })->name('teacher.home');

    
    Route::resource('subjects', SubjectController::class);

    
    Route::get('/student/home', function () {
        return view('student.home');
    })->name('student.home');

});

Route::get('/subjects/{subject}/tasks/create', [\App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');


Route::post('/subjects/{subject}/tasks', [\App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');


Route::get('/solutions/{solution}/evaluate', [SolutionController::class, 'edit'])->name('solutions.evaluate');
Route::put('/solutions/{solution}', [SolutionController::class, 'update'])->name('solutions.update');


Route::view('/contact', 'contact')->name('contact');


Route::get('/student/subjects/my', [\App\Http\Controllers\StudentSubjectController::class, 'mySubjects'])->name('student.subjects.my');


Route::get('/student/subjects/available', [\App\Http\Controllers\StudentSubjectController::class, 'availableSubjects'])->name('student.subjects.available');
Route::post('/student/subjects/{subject}/take', [StudentSubjectController::class, 'takeSubject'])->name('student.subjects.takeSubject');


Route::delete('/student/subjects/{subject}/leave', [StudentSubjectController::class, 'leaveSubject'])->name('student.subjects.leaveSubject');

Route::get('/student/subjects/{subject}', [StudentSubjectController::class, 'show'])->name('student.subjects.show');


Route::get('/student/tasks/{task}', [\App\Http\Controllers\StudentTaskController::class, 'show'])->name('student.tasks.show');
Route::post('/student/tasks/{task}/submit', [\App\Http\Controllers\StudentTaskController::class, 'submit'])->name('student.tasks.submit');


require __DIR__ . '/auth.php';

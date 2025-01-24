<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard uniquement pour les utilisateurs authentifiés
Route::get('/dashboard', function () {
    $projects = \App\Models\Project::where('user_id', auth()->id())->get();
    return view('dashboard', compact('projects'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées par middleware `auth`
Route::middleware('auth')->group(function () {
    // Routes pour les projets
    Route::resource('projects', ProjectController::class);
    Route::post('/projects/{project}/tasks', [ProjectController::class, 'addTask'])->name('projects.addTask');
    Route::put('/tasks/{task}/status', [ProjectController::class, 'updateTaskStatus'])->name('tasks.updateStatus');
    Route::delete('/tasks/{task}', [ProjectController::class, 'destroyy'])->name('tasks.destroyy');

    // Routes liées au profil utilisateur
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard uniquement pour les utilisateurs authentifiés
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées par auth
Route::middleware('auth')->group(function () {
    // Route pour afficher la liste des projets
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    
    // Route pour afficher le formulaire de création d'un projet
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    
    // Route pour stocker un nouveau projet
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    
    // Route pour afficher le formulaire de modification d'un projet
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    
    // Route pour mettre à jour un projet
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    
    // Routes liées au profil
     
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');   
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     
    
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('/projects/{project}/tasks', [ProjectController::class, 'addTask'])->name('projects.addTask');


    Route::put('/tasks/{task}/status', [ProjectController::class, 'updateTaskStatus'])->name('tasks.updateStatus');

    Route::delete('/tasks/{task}', [ProjectController::class, 'destroyy'])->name('tasks.destroyy');



});

require __DIR__.'/auth.php';

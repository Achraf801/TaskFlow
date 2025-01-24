<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class ProjectController extends Controller
{
    // Met à jour le statut d'une tâche
    public function updateTaskStatus(Request $request, $taskId)
    {
        $request->validate([
            'status' => 'required|string|in:À faire,En cours,Terminé',
        ]);

        $task = Task::findOrFail($taskId);
        $task->status = $request->status;
        $task->save();

        return redirect()->back();
    }

    // Ajoute une tâche à un projet
    public function addTask(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'due_date' => 'required|date',
        ]);

        $project = Project::findOrFail($id);
        $task = new Task();
        $task->name = $request->name;
        $task->project_id = $project->id;
        $task->due_date = $request->due_date;
        $task->save();

        return redirect()->route('projects.index');
    }

    // Supprimer un projet
    public function destroy(Project $project)
    {
        if ($project->user_id !== auth()->id()) {
            return redirect()->route('projects.index');
        }

        $project->delete();
        return redirect()->route('projects.index');
    }

    // Affiche tous les projets de l'utilisateur authentifié
    public function index()
    {
        $projects = Project::where('user_id', auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    // Crée un nouveau projet
    public function create()
    {
        return view('projects.create');
    }

    // Supprime une tâche
    public function destroyy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Tâche supprimée avec succès.');
    }

    // Sauvegarde un projet
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Project::create([
            'name' => $request->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard');
    }
}

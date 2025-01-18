<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;   


class ProjectController extends Controller

{
    public function updateTaskStatus(Request $request, $taskId)
{
    $request->validate([
        'status' => 'required|string|in:À faire,En cours,Terminé',
    ]);

    // Trouver la tâche par son ID
    $task = Task::findOrFail($taskId);

    // Mettre à jour le statut
    $task->status = $request->status;
    $task->save();

    return redirect()->back() ;
}

    public function show($id)
{
    $project = Project::findOrFail($id);
    return view('projects.show', compact('project'));
}

public function addTask(Request $request, $id)
{
    // Validation
    $request->validate([
        'name' => 'required|string|max:255',
        'due_date' => 'required|date',  // Validation pour la date
    ]);

    // Trouver le projet
    $project = Project::findOrFail($id);

    // Créer la tâche et l'associer au projet
    $task = new Task();
    $task->name = $request->name;
    $task->project_id = $project->id;
    $task->due_date = $request->due_date;  // Sauvegarder la date limite
    $task->save();

    // Rediriger vers la page des projets
    return redirect()->route('projects.index');
}



    public function destroy(Project $project)
{
    // Vérifiez si l'utilisateur actuel a créé ce projet
    if ($project->user_id !== auth()->id()) {
        return redirect()->route('projects.index');
    }

    // Supprimer le projet
    $project->delete();

    return redirect()->route('projects.index');
}

public function index()
{
    
    // Récupérer tous les projets de l'utilisateur authentifié
    $projects = Project::where('user_id', auth()->id())->get();

    // Retourner la vue avec les projets
    return view('projects.index', compact('projects'));
}

     // Affiche le formulaire de modification du projet
     public function edit(Project $project)
     {
         // Vérifiez si l'utilisateur actuel a créé ce projet
         if ($project->user_id !== auth()->id()) {
             return redirect()->route('projects.index');
         }
 
         return view('projects.edit', compact('project'));
     }
 
     // Met à jour un projet
     public function update(Request $request, Project $project)
     {
         // Vérifiez si l'utilisateur actuel a créé ce projet
         if ($project->user_id !== auth()->id()) {
             return redirect()->route('projects.index');
         }
 
         // Validation des données
         $request->validate([
             'name' => 'required|string|max:255',
         ]);
 
         // Mettre à jour le projet
         $project->update([
             'name' => $request->input('name'),
         ]);
 
         return redirect()->route('projects.index');
     }
    
    public function create()
    {
        return view('projects.create');
    }
    public function destroyy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();

    return redirect()->back()->with('success', 'Tâche supprimée avec succès.');
}


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

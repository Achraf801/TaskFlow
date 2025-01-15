@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h1 class="text-4xl font-extrabold text-gray-800 mb-8 text-center">Mes Projets</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($projects as $project)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
                <!-- Titre du projet -->
                <div class="px-6 py-4 bg-gray-100 flex justify-between items-center">
                    <h2 class="text-2xl font-bold text-gray-800">{{ $project->name }}</h2>
                    <span class="bg-blue-100 text-blue-800 text-sm font-medium px-2.5 py-0.5 rounded">
                        {{ $project->tasks->count() }} Tâches
                    </span>
                </div>

                <!-- Tâches associées -->
                <div class="px-6 py-4 bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-600 mb-3">Tâches :</h3>
                    <ul class="list-none space-y-3">
                        @foreach ($project->tasks as $task)
                            <li class="flex justify-between items-center bg-white shadow-sm rounded-md p-3">
                                <div class="flex-1">
                                    <span class="text-sm font-medium text-gray-800">{{ $task->name }}</span>
                                    <div class="text-xs text-gray-500">
                                        <span>Échéance: {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : 'Non définie' }}</span>
                                    </div>
                                    
                                </div>

                                <!-- Formulaire pour modifier le statut -->
                                <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="border border-gray-300 text-sm rounded-lg px-3 py-1.5">
                                        <option value="À faire" {{ $task->status === 'À faire' ? 'selected' : '' }}>À faire</option>
                                        <option value="En cours" {{ $task->status === 'En cours' ? 'selected' : '' }}>En cours</option>
                                        <option value="Terminé" {{ $task->status === 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                    </select>
                                    <button type="submit" class="bg-blue-500 text-white text-sm px-3 py-1 rounded-md hover:bg-blue-600">
                                        <i class="fas fa-save"></i> Modifier
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Ajouter une tâche -->
                <div class="px-6 py-4 bg-gray-100">
                    <button onclick="toggleTaskForm({{ $project->id }})" class="bg-green-500 text-white font-medium px-4 py-2 rounded-lg hover:bg-green-600 w-full">
                        + Ajouter une Tâche
                    </button>

                    <form id="taskForm{{ $project->id }}" action="{{ route('projects.addTask', $project->id) }}" method="POST" style="display: none;" class="mt-4">
                        @csrf
                        <input type="text" name="name" placeholder="Nom de la tâche" class="border border-gray-300 px-4 py-2 rounded-lg w-full mb-2 focus:ring focus:ring-green-200" required>

                        <select name="status" class="border border-gray-300 px-4 py-2 rounded-lg w-full mb-2 focus:ring focus:ring-green-200" required>
                            <option value="À faire">À faire</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                        </select>

                        <input type="date" name="due_date" class="border border-gray-300 px-4 py-2 rounded-lg w-full mb-2 focus:ring focus:ring-green-200">

                        <button type="submit" class="bg-blue-500 text-white font-medium px-4 py-2 rounded-lg hover:bg-blue-600 w-full">
                            Ajouter
                        </button>
                    </form>
                </div>

                <!-- Actions -->
                <div class="px-6 py-4 bg-gray-200 flex justify-between items-center">
                    <a href="{{ route('projects.edit', $project->id) }}" class="bg-yellow-500 text-white font-medium px-4 py-2 rounded-lg hover:bg-yellow-600">
                        <i class="fas fa-edit"></i> Modifier
                    </a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white font-medium px-4 py-2 rounded-lg hover:bg-red-600">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

<script>
    function toggleTaskForm(projectId) {
        const form = document.getElementById('taskForm' + projectId);
        form.style.display = (form.style.display === 'none' || form.style.display === '') ? 'block' : 'none';
    }
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12 bg-gray-50">
    <h1 class="text-4xl font-bold text-indigo-700 mb-8 text-center">Mes Projets</h1>

    <!-- Barre de recherche -->
    <div class="mb-6 flex justify-center">
        <input 
            type="text" 
            id="searchInput" 
            placeholder="Rechercher un projet..." 
            class="border border-indigo-300 rounded-lg px-6 py-3 w-full sm:w-2/3 lg:w-1/3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-200 ease-in-out"
            oninput="filterProjects()">
    </div>

    <!-- Liste des projets -->
    <div id="projectList">
        @foreach ($projects as $project)
            <div class="project mb-8 bg-white rounded-lg shadow-xl p-6 transition transform hover:scale-105 hover:shadow-2xl" data-name="{{ strtolower($project->name) }}">
                <!-- Titre du projet -->
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $project->name }}</h2>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline text-sm">Supprimer</button>
                    </form>
                </div>

                <!-- Liste des tâches -->
                <div class="mt-4">
                    @if ($project->tasks->count() > 0)
                        <table class="table-auto w-full text-left border-collapse">
                            <thead class="bg-indigo-100 text-indigo-800">
                                <tr>
                                    <th class="px-4 py-2">Nom</th>
                                    <th class="px-4 py-2">Échéance</th>
                                    <th class="px-4 py-2">Statut</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project->tasks as $task)
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="px-4 py-2">{{ $task->name }}</td>
                                        <td class="px-4 py-2">
                                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : 'Non définie' }}
                                        </td>
                                        <td class="px-4 py-2">
                                            <span class="text-sm font-medium px-2 py-1 rounded 
                                                {{ $task->status === 'Terminé' ? 'bg-green-200 text-green-800' : 
                                                   ($task->status === 'En cours' ? 'bg-yellow-200 text-yellow-800' : 
                                                   'bg-red-200 text-red-800') }}">
                                                {{ $task->status }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2 flex space-x-2">
                                            <!-- Modifier le statut -->
                                            <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="border rounded px-3 py-2 text-sm focus:ring-2 focus:ring-indigo-500">
                                                    <option value="À faire" {{ $task->status === 'À faire' ? 'selected' : '' }}>À faire</option>
                                                    <option value="En cours" {{ $task->status === 'En cours' ? 'selected' : '' }}>En cours</option>
                                                    <option value="Terminé" {{ $task->status === 'Terminé' ? 'selected' : '' }}>Terminé</option>
                                                </select>
                                                <button type="submit" class="text-indigo-600 hover:underline text-sm">Modifier</button>
                                            </form>
                                            <!-- Supprimer -->
                                            <form action="{{ route('tasks.destroyy', $task->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline text-sm">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-500 text-sm">Aucune tâche pour ce projet.</p>
                    @endif
                </div>

                <!-- Ajouter une tâche -->
                <div class="mt-6">
                    <form action="{{ route('projects.addTask', $project->id) }}" method="POST" class="flex space-x-4">
                        @csrf
                        <input type="text" name="name" placeholder="Nom de la tâche" class="border rounded-lg px-6 py-3 w-1/2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                        <input type="date" name="due_date" class="border rounded-lg px-6 py-3 w-1/4 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <select name="status" class="border rounded-lg px-6 py-3 w-1/4 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="À faire">À faire</option>
                            <option value="En cours">En cours</option>
                            <option value="Terminé">Terminé</option>
                        </select>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function filterProjects() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const projects = document.querySelectorAll('.project');

        projects.forEach(project => {
            const name = project.getAttribute('data-name');
            project.style.display = name.includes(input) ? '' : 'none';
        });
    }
</script>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Projet: {{ $project->name }}</h1>

        <!-- Formulaire pour ajouter une tâche -->
        <form action="{{ route('projects.addTask', $project->id) }}" method="POST" class="mb-6">
            @csrf
            <input type="text" name="name" placeholder="Nom de la tâche" class="border border-gray-300 px-4 py-2 rounded-lg w-1/2" required>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">
                Ajouter une tâche
            </button>
        </form>

        <!-- Liste des tâches -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tâches associées</h2>
        <ul class="list-disc pl-6">
            @foreach ($project->tasks as $task)
                <li class="text-lg text-gray-700">{{ $task->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection

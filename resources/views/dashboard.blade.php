@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
    <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
        <div class="p-8 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-lg shadow-md text-white">
            <!-- Titre "Bienvenue" -->
            <h2 class="font-extrabold text-5xl mb-4">
                Bienvenue, {{ Auth::user()->name }} !
            </h2>

            <!-- Texte "Vous êtes connecté(e)" -->
            <p class="text-xl italic mb-8">
                Vous êtes connecté(e) avec succès.
            </p>

            <!-- Statistiques -->
            <div class="flex space-x-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow-xl text-center w-1/3">
                    <h3 class="text-2xl font-semibold text-indigo-600">Total Projets</h3>
                    <p class="text-lg text-gray-700">{{ $projects->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-xl text-center w-1/3">
                    <h3 class="text-2xl font-semibold text-purple-600">Total Tâches</h3>
                    <p class="text-lg text-gray-700">{{ $projects->sum(function($project) { return $project->tasks->count(); }) }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-xl text-center w-1/3">
                    <h3 class="text-2xl font-semibold text-pink-600">Tâches Complètes</h3>
                    <p class="text-lg text-gray-700">{{ $projects->sum(function($project) { return $project->tasks->where('status', 'Terminé')->count(); }) }}</p>
                </div>
            </div>

            <!-- Liste des projets -->
            <div class="mt-8">
                <h3 class="text-2xl font-bold text-white mb-4">Vos Projets</h3>
                @if($projects->isEmpty())
                    <p class="text-white italic">Vous n'avez encore créé aucun projet. Cliquez sur "Créer un projet" pour commencer.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($projects as $project)
                            <div class="bg-white p-6 shadow-xl rounded-lg transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h4 class="text-xl font-semibold text-gray-800">{{ $project->name }}</h4>
                                        <p class="text-sm text-gray-600">
                                            Créé le {{ $project->created_at->format('d/m/Y') }}
                                        </p>
                                    </div>
                                    <span class="bg-indigo-100 text-indigo-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                        {{ $project->tasks->count() }} Tâches
                                    </span>
                                </div>

                                <div class="mt-4">
                                    <p class="text-sm text-gray-600">
                                        {{ \Illuminate\Support\Str::limit($project->description, 100, '...') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

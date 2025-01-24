@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@section('content')
<div class="py-12 bg-gradient-to-r from-gray-100 to-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- En-tête -->
            <div class="p-8 bg-gradient-to-r from-indigo-500 to-purple-500 text-white rounded-t-lg">
                <h1 class="text-3xl font-extrabold">Créer un nouveau projet</h1>
                <p class="mt-2 text-lg font-medium">Simplifiez la gestion de vos tâches en créant un projet personnalisé.</p>
            </div>
            
            <!-- Contenu principal -->
            <div class="p-8 bg-white border-t-4 border-indigo-500">
                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf

                    <!-- Champ Nom du projet -->
                    <div class="mb-6">
                        <label for="name" class="block text-lg font-semibold text-gray-700">Nom du projet</label>
                        <input type="text" name="name" id="name" placeholder="Entrez le nom du projet" 
                            class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-3 sm:text-sm" required>
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition duration-300 ease-in-out transform hover:scale-105">
                        <i class="fas fa-plus-circle mr-2"></i>Créer le projet
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-8 bg-white border-b border-gray-200">
                <!-- Formulaire de création de projet -->
                <form method="POST" action="{{ route('projects.store') }}">
                    @csrf

                    <!-- Champ Nom du projet -->
                    <div class="mb-6">
                        <label for="name" class="block text-lg font-semibold text-gray-700">Nom du projet</label>
                        <input type="text" name="name" id="name" class="mt-2 block w-full border border-gray-300 rounded-lg shadow-sm focus:border-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2 sm:text-sm" required>
                    </div>

                    <!-- Bouton de soumission -->
                    <button type="submit" class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition duration-300 ease-in-out transform hover:scale-105">
                        Créer le projet
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

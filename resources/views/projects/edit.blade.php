@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-12">
    <h1 class="text-4xl font-semibold text-gray-800 mb-6">Modifier le Projet</h1>
    
    <div class="bg-white shadow-xl rounded-lg p-8">
        <form method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT') <!-- Utilisation de @method('PUT') pour envoyer une requête PUT -->

            <!-- Champ Nom du Projet -->
            <div class="mb-6">
                <label for="name" class="block text-lg font-semibold text-gray-700">Nom du Projet</label>
                <input 
                    type="text" 
                    class="mt-2 block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-indigo-600 transition duration-300 ease-in-out"
                    id="name" 
                    name="name" 
                    value="{{ old('name', $project->name) }}" 
                    required
                >
                @error('name')
                    <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                    Mettre à Jour
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

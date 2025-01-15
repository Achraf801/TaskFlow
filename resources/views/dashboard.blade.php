@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <!-- Titre "Bienvenue" -->
                    <h2 class="font-extrabold text-4xl text-indigo-600 mb-4 tracking-wide">
                        Bienvenue, {{ Auth::user()->name }} !
                    </h2>
                    
                    <!-- Texte "Vous êtes connecté(e)" -->
                    <p class="text-xl text-gray-600 italic mb-8">
                        Vous êtes connecté(e) avec succès.
                    </p>

                    <!-- Section des actions -->
                    <div class="flex space-x-4">
                        <!-- Lien pour créer un projet -->
                        <a href="{{ route('projects.create') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:scale-105">
                            Créer un projet
                        </a>
                        
                        <!-- Lien pour voir les projets -->
                        <a href="{{ route('projects.index') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300 ease-in-out transform hover:scale-105">
                            Mes projets
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

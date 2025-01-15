@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-semibold text-gray-800 mb-8">Modifier mon Profil</h1>

        <div class="bg-white shadow-xl rounded-lg p-8">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Champ Nom -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-semibold text-gray-700">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Champ Email -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
                <!-- Champ Nouveau mot de passe -->
                <div class="mb-6">
                    <label for="password" class="block text-lg font-semibold text-gray-700">Nouveau mot de passe (optionnel)</label>
                    <input type="password" name="password" id="password" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Champ Confirmation mot de passe -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-lg font-semibold text-gray-700">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-2 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Bouton Sauvegarder -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
                        Sauvegarder les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

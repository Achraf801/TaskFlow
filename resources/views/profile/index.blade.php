@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Mon Profil</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <p class="mt-1 text-gray-900">{{ $user->name }}</p>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <p class="mt-1 text-gray-900">{{ $user->email }}</p>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('profile.edit') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:outline-none">
                    Modifier mon profil
                </a>
            </div>
        </div>
    </div>
@endsection

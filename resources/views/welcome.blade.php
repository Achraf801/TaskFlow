<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow - Bienvenue</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-blue-500 via-teal-500 to-green-500 text-white flex items-center justify-center min-h-screen">

    <!-- Logo en haut à gauche -->
    <div class="absolute top-6 left-6">
        <img src="images/platform.png" alt="TaskFlow" class="w-20 h-20">
    </div>

    <div class="text-center">
        <div class="mb-8">
            <h1 class="text-5xl font-extrabold text-white">TaskFlow</h1>
            <p class="text-lg font-medium mt-2">Simplifiez la gestion de vos projets et tâches</p>
        </div>
        
        <div class="bg-white p-8 rounded-xl shadow-lg max-w-sm mx-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Bienvenue sur TaskFlow</h2>
            <div class="flex justify-center space-x-6">
                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition duration-200 transform hover:scale-105">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="bg-green-600 text-white px-6 py-3 rounded-md hover:bg-green-700 transition duration-200 transform hover:scale-105">
                    Inscription
                </a>
            </div>
        </div>
    </div>

</body>
</html>

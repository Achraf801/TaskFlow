<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MegaTask - Bienvenue</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .gradient-text {
            background: linear-gradient(to right, #0d00ff, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .bg-almost-black {
            background-color: #0a0b1e; /* Bleu très sombre presque noir */
        }
    </style>
</head>
<body class="bg-almost-black text-white flex items-center justify-center min-h-screen">

    <!-- Logo en haut à gauche -->
    <div class="absolute top-6 left-6">
        <img src="images/platform.png" alt="MegaTask" class="w-20 h-20">
    </div>

    <div class="text-center">
        <div class="mb-8">
            <!-- Titre avec dégradé, et espacement augmenté -->
            <h1 class="text-5xl font-extrabold gradient-text mb-4" style="line-height: 1.3;">MegaTask</h1>
            <p class="text-lg font-medium mt-2">Simplifiez la gestion de vos projets et tâches</p>
        </div>
        
        <div class="bg-white p-8 rounded-xl shadow-lg max-w-sm mx-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Bienvenue sur MegaTask</h2>
            <div class="flex justify-center space-x-6">
                <a href="{{ route('login') }}" class="bg-purple-700 text-white px-6 py-3 rounded-md hover:bg-purple-700 transition duration-200 transform hover:scale-105">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="bg-purple-700 text-white px-6 py-3 rounded-md hover:bg-purple-600 transition duration-200 transform hover:scale-105">
                    Inscription
                </a>
            </div>
        </div>
    </div>

</body>
</html>

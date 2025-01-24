<nav x-data="{ open: false }" class="flex">
    <!-- Lien pour ouvrir/fermer la sidebar -->
    <div class="flex items-center justify-between p-4">
        <a href="#" @click="open = !open">
            <img src="{{ asset('images/aa.png') }}" alt="Platform Logo" class="h-10 w-auto cursor-pointer transition duration-300 ease-in-out transform hover:scale-105">
        </a>
    </div>

    <!-- Sidebar -->
    <div :class="{'-translate-x-full': !open, 'translate-x-0': open}" 
         class="fixed top-0 left-0 w-48 h-full bg-white shadow-lg transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
        <div class="p-4 border-b">
            <a href="#" @click="open = !open">
                <img src="{{ asset('images/pp.png') }}" alt="Platform Logo" class="h-10 w-auto cursor-pointer transition duration-300 ease-in-out transform hover:scale-105">
            </a>
        </div>
        <div class="mt-4">
            <ul>
                <li class="mb-2">
                    <a href="{{ route('dashboard') }}" 
                       class="block py-3 px-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-indigo-500 hover:text-white rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                        Tableau de bord
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('profile.edit') }}" 
                       class="block py-3 px-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-indigo-500 hover:text-white rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                        Profile
                    </a>
                    <a href="{{ route('projects.create') }}" 
                       class="block py-3 px-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-indigo-500 hover:text-white rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                         Créer un projet
                    </a>
                    <a href="{{ route('projects.index') }}" 
                       class="block py-3 px-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-indigo-500 hover:text-white rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                         Mes Projets
                    </a>
                </li>
                <li class="mb-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" 
                                class="block w-full text-left py-3 px-4 text-gray-700 hover:bg-gradient-to-r hover:from-blue-500 hover:to-indigo-500 hover:text-white rounded-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                            Se déconnecter
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

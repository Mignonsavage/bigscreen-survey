<?php
// =========================================================================
// FICHIER À METTRE À JOUR : resources/views/layouts/admin.blade.php
// =========================================================================
?>
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration Bigscreen')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">
<div class="flex h-screen bg-gray-200">
    <!-- A - Barre latérale fixe -->
    <div class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white p-6 flex flex-col">
        <!-- Logo -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center mb-10">
            <x-logo theme="dark" class="w-auto h-12" />
        </a>


        <nav class="flex-grow">
            <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-700' : '' }}">
                Accueil
            </a>
            <a href="{{ route('admin.questionnaire') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.questionnaire') ? 'bg-gray-700' : '' }}">
                Questionnaire
            </a>
            <a href="{{ route('admin.reponses') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 {{ request()->routeIs('admin.reponses') ? 'bg-gray-700' : '' }}">
                Réponses
            </a>
        </nav>

        <!-- Bouton de déconnexion -->
        <div>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="w-full text-left block py-2.5 px-4 rounded transition duration-200 bg-red-600 hover:bg-red-700">
                    Déconnexion
                </button>
            </form>
        </div>
    </div>

    <!-- B - Contenu principal avec scroll -->
    <main class="flex-1 ml-64 p-8 overflow-y-auto">
        @yield('content')
    </main>
</div>
</body>
</html>

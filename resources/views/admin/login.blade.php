?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-900 flex items-center justify-center h-screen">
<div class="w-full max-w-md">
    <form method="POST" action="{{ route('admin.login.submit') }}" class="bg-gray-800 shadow-2xl rounded-2xl px-8 pt-6 pb-8 mb-4 border border-gray-700">
        <div class="mb-8 text-center">
            <x-logo theme="dark" class="w-auto h-12 mx-auto mb-4" />
            <h1 class="text-white text-2xl font-bold">Administration</h1>
        </div>
        @csrf
        <div class="mb-4">
            <label class="block text-gray-400 text-sm font-bold mb-2" for="email">
                Adresse e-mail
            </label>
            <input class="bg-gray-700 border border-gray-600 rounded-lg w-full py-3 px-4 text-gray-200 leading-tight focus:outline-none focus:bg-gray-600 focus:border-blue-500" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="mb-6">
            <label class="block text-gray-400 text-sm font-bold mb-2" for="password">
                Mot de passe
            </label>
            <input class="bg-gray-700 border border-gray-600 rounded-lg w-full py-3 px-4 text-gray-200 mb-3 leading-tight focus:outline-none focus:bg-gray-600 focus:border-blue-500" id="password" type="password" name="password" required>
            @error('email')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline w-full" type="submit">
                Connexion
            </button>
        </div>
    </form>
</div>
</body>
</html>

<?php

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci ! - Sondage Bigscreen</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
body {
    font-family: 'Inter', sans-serif;
            background-color: #1a202c;
            color: #e2e8f0;
        }
    </style>
</head>
<body class="antialiased">

    <div class="container mx-auto px-4 py-8 md:py-12 max-w-3xl text-center flex items-center justify-center min-h-screen">
        <div class="bg-gray-800 p-8 md:p-12 rounded-xl shadow-2xl border border-gray-700">

            <x-logo class="w-auto h-16 mx-auto mb-6" />


            <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Toute l'équipe de Bigscreen vous remercie !</h1>
            <p class="text-lg text-gray-400 mb-6">Grâce à votre investissement, nous vous préparons une application toujours plus facile à utiliser, seul ou en famille.</p>

            <div class="bg-gray-900 p-4 rounded-lg">
                <p class="text-gray-400 mb-2">Si vous désirez consulter vos réponses ultérieurement, conservez cette adresse unique :</p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <input id="responseLink" type="text" readonly value="{{ route('survey.responses', ['token' => $submission->link_token]) }}" class="form-input bg-gray-700 border-gray-600 text-gray-300 w-full text-center sm:text-left">
                    <button onclick="copyLink()" id="copyButton" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition w-full sm:w-auto">Copier</button>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('survey.responses', ['token' => $submission->link_token]) }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-3 px-6 rounded-lg transition">
                    Voir mes réponses maintenant
                </a>
            </div>
        </div>
    </div>

    <script>
        function copyLink() {
            const linkInput = document.getElementById('responseLink');
            linkInput.select();
            linkInput.setSelectionRange(0, 99999); // For mobile devices
            document.execCommand('copy');

            const copyButton = document.getElementById('copyButton');
            copyButton.innerText = 'Copié !';
            setTimeout(() => {
                copyButton.innerText = 'Copier';
            }, 2000);
        }
    </script>

</body>
</html>

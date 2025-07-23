<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos Réponses - Sondage Bigscreen</title>

    <!-- Tailwind CSS & Google Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; background-color: #1a202c; color: #e2e8f0; }
        .question-card { background-color: #2d3748; border: 1px solid #4a5568; border-radius: 0.75rem; padding: 1.5rem; margin-bottom: 1.5rem; }
        .answer-box { background-color: #4a5568; color: #e2e8f0; border-radius: 0.5rem; padding: 0.75rem 1rem; }
    </style>
</head>
<body class="antialiased">

<div class="container mx-auto px-4 py-8 md:py-12 max-w-4xl">

    <!-- En-tête -->
    <header class="text-center mb-8">
        <a href="{{ route('survey.index') }}">
            <x-logo class="w-auto h-12 mx-auto mb-4" />
        </a>
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Vos Réponses au Sondage</h1>
        <p class="text-lg text-gray-400">
            Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le {{ $submission->created_at->format('d/m/Y à H:i') }}.
        </p>
    </header>


    <div>
        @foreach ($submission->answers->sortBy('question.order') as $answer)
            <div class="question-card">
                <h2 class="font-semibold text-lg text-white mb-1">Question {{ $answer->question->order }}/20</h2>
                <p class="mb-4 text-gray-300">{{ $answer->question->body }}</p>
                <div class="border-t border-dashed border-gray-600 pt-4">
                    <div class="answer-box">
                        {{ $answer->value }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <footer class="text-center mt-8">
        <a href="{{ route('survey.index') }}" class="text-blue-400 hover:text-blue-300">Retourner au sondage</a>
    </footer>

</div>

</body>
</html>

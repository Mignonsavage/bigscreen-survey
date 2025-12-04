<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sondage Bigscreen</title>

    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>

        body {
            font-family: 'Inter', sans-serif;
            background-color: #1a202c; /* bg-gray-900 */
            color: #e2e8f0; /* text-gray-300 */
        }
        .question-card {
            background-color: #2d3748; /* bg-gray-800 */
            border: 1px solid #4a5568; /* border-gray-700 */
            border-radius: 0.75rem; /* rounded-xl */
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease-in-out;
        }
        .question-card.has-error {
            border-color: #e53e3e; /* border-red-600 */
            box-shadow: 0 0 0 3px rgba(229, 62, 62, 0.4);
        }
        .form-input, .form-textarea, .form-select {
            background-color: #4a5568; /* bg-gray-700 */
            border: 1px solid #718096; /* border-gray-500 */
            color: #e2e8f0; /* text-gray-300 */
            border-radius: 0.5rem;
            width: 100%;
            padding: 0.75rem 1rem;
        }
        .form-input:focus, .form-textarea:focus, .form-select:focus {
            outline: none;
            border-color: #4299e1; /* border-blue-500 */
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }
        .radio-label {
            background-color: #4a5568;
            padding: 0.75rem 1.25rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            display: block;
            text-align: center;
        }
        input[type="radio"]:checked + .radio-label {
            background-color: #4299e1;
            color: #ffffff;
            border-color: #2b6cb0;
        }
        .rating-label {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-message {
            color: #fca5a5; /* text-red-400 */
            font-size: 0.875rem; /* text-sm */
            margin-top: 0.5rem; /* mt-2 */
        }
    </style>
</head>
<body class="antialiased">

<div class="container mx-auto px-4 py-8 md:py-12 max-w-4xl">


    <header class="text-center mb-8">

        <x-logo class="w-auto h-21 mx-auto mb-4" />

        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Sondage Utilisateur Bigscreen</h1>
        <p class="text-lg text-gray-400">Merci de répondre à toutes les questions et de valider le formulaire en bas de page.</p>
    </header>


    <form action="{{ route('survey.store') }}" method="POST">
        @csrf <!-- Jeton de sécurité Laravel -->

        @foreach ($questions as $question)
            <div class="question-card @error('answers.' . $question->id) has-error @enderror">
                <h2 class="font-semibold text-lg text-white mb-1">Question {{ $question->order }}/20</h2>
                <p class="mb-4 text-gray-300">{{ $question->body }}</p>
                <div class="border-t border-dashed border-gray-600 pt-4">

                    {{-- Type B: Champ de saisie de texte --}}
                    @if ($question->type === 'B')
                        @if ($question->order === 1) {{-- Question Email --}}
                        <input type="email" name="answers[{{ $question->id }}]" class="form-input" placeholder="vous@exemple.com" value="{{ old('answers.' . $question->id) }}" required>
                        @else {{-- Autre texte --}}
                        <input type="text" name="answers[{{ $question->id }}]" class="form-input" value="{{ old('answers.' . $question->id) }}" required maxlength="255">
                        @endif

                        {{-- Type A: Choix unique (radio) --}}
                    @elseif ($question->type === 'A')
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            @foreach ($question->options as $option)
                                <label>
                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option }}" class="sr-only" required {{ old('answers.' . $question->id) == $option ? 'checked' : '' }}>
                                    <span class="radio-label">{{ $option }}</span>
                                </label>
                            @endforeach
                        </div>


                    @elseif ($question->type === 'C')
                        {{-- Cas spécial pour la notation 1-5 --}}
                        @if ($question->order >= 11 && $question->order <= 15)
                            <div class="flex justify-center items-center gap-3">
                                <span class="text-gray-400">Mauvais</span>
                                <div class="flex gap-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label>
                                            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $i }}" class="sr-only" required {{ old('answers.' . $question->id) == $i ? 'checked' : '' }}>
                                            <span class="radio-label rating-label">{{ $i }}</span>
                                        </label>
                                    @endfor
                                </div>
                                <span class="text-gray-400">Excellent</span>
                            </div>
                        @else

                            <input type="number" name="answers[{{ $question->id }}]" class="form-input" value="{{ old('answers.' . $question->id) }}" min="1" required>
                        @endif
                    @endif

                </div>
                @error('answers.' . $question->id)
                <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        @endforeach


        <div class="mt-8 text-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-lg text-lg transition duration-300 ease-in-out transform hover:scale-105 w-full md:w-auto">
                Finaliser
            </button>
            <footer class="text-center mt-12">
                <a href="{{ route('admin.login') }}" class="text-sm text-gray-600 hover:text-gray-500 transition-colors">
                    Administration
                </a>
            </footer>
        </div>

    </form>

</div>

</body>
</html>


<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Tout le monde peut soumettre le sondage
    }

    public function rules(): array
    {
        // Créer une règle de validation pour chaque question
        $rules = [
            'answers.1' => 'required|email|max:255|unique:survey_submissions,email', // Question 1: Email
            'answers.2' => 'required|integer|min:13|max:120', // Question 2: Age
            // ... Ajoutez les règles pour les 18 autres questions
        ];

        // Exemple pour les questions restantes
        for ($i = 3; $i <= 20; $i++) {
            $rules['answers.' . $i] = 'required';
        }

        // Règle spécifique pour la question 5 et 20 (max 255 char)
        $rules['answers.5'] = 'required|string|max:255';
        $rules['answers.20'] = 'required|string|max:255';

        return $rules;
    }

    public function messages()
    {
        return [
            'answers.1.unique' => 'Cette adresse e-mail a déjà été utilisée pour répondre au sondage.',
            'answers.*.required' => 'La réponse à cette question est obligatoire.',
        ];
    }
}

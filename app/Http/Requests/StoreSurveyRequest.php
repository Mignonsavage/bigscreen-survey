<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSurveyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Question 1: Email (unique et format valide)
            'answers.1' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'unique:survey_submissions,email'
            ],

            // Question 2: Âge (entre 13 et 120 ans)
            'answers.2' => [
                'required',
                'integer',
                'min:13',
                'max:120'
            ],

            // Questions 3-4: Choix unique obligatoire (marque casque, magasin)
            'answers.3' => ['required', 'string', 'max:100'],
            'answers.4' => ['required', 'string', 'max:100'],

            // Question 5: Texte libre court (utilisation principale)
            'answers.5' => [
                'required',
                'string',
                'min:10',
                'max:255'
            ],

            // Questions 6-10: Choix multiples obligatoires
            'answers.6' => ['required', 'string', 'max:100'],
            'answers.7' => ['required', 'string', 'max:100'],
            'answers.8' => ['required', 'string', 'max:100'],
            'answers.9' => ['required', 'string', 'max:100'],
            'answers.10' => ['required', 'string', 'max:100'],

            // Questions 11-15: Notation de 1 à 5
            'answers.11' => ['required', 'integer', 'min:1', 'max:5'],
            'answers.12' => ['required', 'integer', 'min:1', 'max:5'],
            'answers.13' => ['required', 'integer', 'min:1', 'max:5'],
            'answers.14' => ['required', 'integer', 'min:1', 'max:5'],
            'answers.15' => ['required', 'integer', 'min:1', 'max:5'],

            // Questions 16-19: Choix binaires (Oui/Non)
            'answers.16' => ['required', 'string', 'in:Oui,Non'],
            'answers.17' => ['required', 'string', 'in:Oui,Non'],
            'answers.18' => ['required', 'string', 'in:Oui,Non'],
            'answers.19' => ['required', 'string', 'in:Oui,Non'],

            // Question 20: Commentaire libre
            'answers.20' => [
                'required',
                'string',
                'min:20',
                'max:500'
            ],
        ];
    }

    /**
     * Messages d'erreur personnalisés et explicites
     */
    public function messages(): array
    {
        return [
            // Question 1: Email
            'answers.1.required' => 'Votre adresse email est obligatoire pour participer au sondage.',
            'answers.1.email' => 'Veuillez saisir une adresse email valide (ex: vous@exemple.com).',
            'answers.1.unique' => 'Cette adresse email a déjà été utilisée. Chaque participant ne peut répondre qu\'une seule fois.',
            'answers.1.max' => 'L\'adresse email ne doit pas dépasser 255 caractères.',

            // Question 2: Âge
            'answers.2.required' => 'Votre âge est requis pour continuer.',
            'answers.2.integer' => 'L\'âge doit être un nombre entier.',
            'answers.2.min' => 'Vous devez avoir au moins 13 ans pour participer.',
            'answers.2.max' => 'Veuillez saisir un âge valide (maximum 120 ans).',

            // Question 5: Utilisation principale
            'answers.5.required' => 'Décrivez votre utilisation principale de Bigscreen.',
            'answers.5.min' => 'Votre réponse doit contenir au moins 10 caractères pour être significative.',
            'answers.5.max' => 'Votre réponse ne doit pas dépasser 255 caractères.',

            // Questions 11-15: Notations
            'answers.11.required' => 'Veuillez noter la qualité d\'image (1 à 5).',
            'answers.11.integer' => 'La note doit être un nombre entier.',
            'answers.11.min' => 'La note minimale est 1.',
            'answers.11.max' => 'La note maximale est 5.',

            'answers.12.required' => 'Veuillez noter la qualité audio (1 à 5).',
            'answers.12.integer' => 'La note doit être un nombre entier.',
            'answers.12.min' => 'La note minimale est 1.',
            'answers.12.max' => 'La note maximale est 5.',

            'answers.13.required' => 'Veuillez noter l\'interface utilisateur (1 à 5).',
            'answers.13.integer' => 'La note doit être un nombre entier.',
            'answers.13.min' => 'La note minimale est 1.',
            'answers.13.max' => 'La note maximale est 5.',

            'answers.14.required' => 'Veuillez noter les fonctionnalités sociales (1 à 5).',
            'answers.14.integer' => 'La note doit être un nombre entier.',
            'answers.14.min' => 'La note minimale est 1.',
            'answers.14.max' => 'La note maximale est 5.',

            'answers.15.required' => 'Veuillez noter l\'expérience globale (1 à 5).',
            'answers.15.integer' => 'La note doit être un nombre entier.',
            'answers.15.min' => 'La note minimale est 1.',
            'answers.15.max' => 'La note maximale est 5.',

            // Questions 16-19: Oui/Non
            'answers.16.required' => 'Veuillez indiquer si vous recommanderiez Bigscreen.',
            'answers.16.in' => 'Veuillez choisir "Oui" ou "Non".',

            'answers.17.required' => 'Veuillez indiquer si vous utilisez Bigscreen régulièrement.',
            'answers.17.in' => 'Veuillez choisir "Oui" ou "Non".',

            'answers.18.required' => 'Veuillez indiquer si vous avez rencontré des bugs.',
            'answers.18.in' => 'Veuillez choisir "Oui" ou "Non".',

            'answers.19.required' => 'Veuillez indiquer si vous souhaitez de nouvelles fonctionnalités.',
            'answers.19.in' => 'Veuillez choisir "Oui" ou "Non".',

            // Question 20: Commentaire
            'answers.20.required' => 'Partagez vos suggestions ou remarques finales.',
            'answers.20.min' => 'Votre commentaire doit contenir au moins 20 caractères.',
            'answers.20.max' => 'Votre commentaire ne doit pas dépasser 500 caractères.',

            // Messages génériques pour les autres questions
            'answers.*.required' => 'Cette question est obligatoire. Merci de fournir une réponse.',
            'answers.*.string' => 'La réponse doit être du texte.',
            'answers.*.max' => 'Votre réponse est trop longue.',
        ];
    }

    /**
     * Attributs personnalisés pour les messages d'erreur
     */
    public function attributes(): array
    {
        return [
            'answers.1' => 'adresse email',
            'answers.2' => 'âge',
            'answers.5' => 'utilisation principale',
            'answers.11' => 'note qualité d\'image',
            'answers.12' => 'note qualité audio',
            'answers.13' => 'note interface',
            'answers.14' => 'note fonctionnalités sociales',
            'answers.15' => 'note expérience globale',
            'answers.20' => 'commentaire final',
        ];
    }
}

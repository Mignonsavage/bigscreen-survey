<?php

namespace Tests\Feature;

use App\Models\SurveySubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class SecurityValidationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Génère un ensemble de réponses valides pour le sondage.
     * Permet de surcharger certaines réponses pour les tests.
     */
    private function getValidAnswers(array $overrides = []): array
    {
        $answers = [
            '1' => 'test@example.com',      // Email
            '2' => 25,                       // Âge
            '3' => 'Meta Quest 3',           // Marque casque
            '4' => 'Amazon',                 // Magasin
            '5' => 'Je regarde des films en réalité virtuelle', // Utilisation
            '6' => 'Films',                  // Choix multiple
            '7' => 'Jeux',
            '8' => 'Social',
            '9' => 'Travail',
            '10' => 'Sport',
            '11' => 4,                       // Notations 1-5
            '12' => 5,
            '13' => 4,
            '14' => 3,
            '15' => 5,
            '16' => 'Oui',                   // Oui/Non
            '17' => 'Oui',
            '18' => 'Non',
            '19' => 'Oui',
            '20' => 'Excellente application, je recommande vivement !', // Commentaire
        ];

        return array_merge($answers, $overrides);
    }

    /**
     * Test : Un email déjà utilisé doit être rejeté.
     * Sécurité : Empêche les soumissions multiples par participant.
     */
    public function test_it_rejects_duplicate_email(): void
    {
        // Créer une première soumission
        SurveySubmission::create([
            'email' => 'duplicate@example.com',
            'link_token' => Str::random(32),
        ]);

        // Tenter de soumettre avec le même email
        $response = $this->post(route('survey.store'), [
            'answers' => $this->getValidAnswers(['1' => 'duplicate@example.com']),
        ]);

        // Vérifier que l'erreur de validation est présente
        $response->assertSessionHasErrors('answers.1');
    }

    /**
     * Test : Les participants de moins de 13 ans doivent être rejetés.
     * Sécurité : Conformité RGPD pour la protection des mineurs.
     */
    public function test_it_rejects_underage_participants(): void
    {
        $response = $this->post(route('survey.store'), [
            'answers' => $this->getValidAnswers(['2' => 12]), // Âge < 13
        ]);

        $response->assertSessionHasErrors('answers.2');
    }

    /**
     * Test : Les routes d'administration sont protégées.
     * Sécurité : Accès réservé aux administrateurs authentifiés.
     */
    public function test_it_protects_admin_routes(): void
    {
        // Tenter d'accéder au dashboard sans être connecté
        // Le middleware devrait rediriger vers le login
        $response = $this->followingRedirects()->get('/administration');

        // On devrait voir le formulaire de connexion
        $response->assertSee('Connexion');
        $response->assertSee('Adresse e-mail');
    }
}

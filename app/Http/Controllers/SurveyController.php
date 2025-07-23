<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSurveyRequest;
use App\Models\Answer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Question;
use App\Models\SurveySubmission;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function index()
    {
        $questions=Question::orderBy('order')->get();
        return view('survey',['questions'=>$questions]);
    }

    public function store(StoreSurveyRequest $request)
    {
        $validated = $request->validated();
        $email = $validated['answers'][1];

        // Utiliser une transaction pour assurer l'intégrité des données
        $submission = DB::transaction(function () use ($validated, $email) {

            // 1. Créer la soumission
            $submission = SurveySubmission::create([
                'email' => $email,
                'link_token' => Str::random(32) // Jeton sécurisé
            ]);

            // 2. Enregistrer chaque réponse
            foreach ($validated['answers'] as $questionId => $value) {
                Answer::create([
                    'survey_submission_id' => $submission->id,
                    'question_id' => $questionId,
                    'value' => $value,
                ]);
            }

            return $submission;
        });


        return redirect()->route('survey.thankyou', ['token' => $submission->link_token]);
    }
    public function thankyou($token)
    {
        $submission = SurveySubmission::where('link_token', $token)->firstOrFail();
        return view('thankyou', ['submission' => $submission]);
    }

    /**
     * Affiche la page des réponses pour un utilisateur.
     */
    public function showResponses($token)
    {
        // Étape 1: On récupère d'abord la soumission seule.
        // Si cela échoue, le token est invalide.
        $submission = SurveySubmission::where('link_token', $token)->firstOrFail();

        // Étape 2: On charge ensuite les relations.
        // Si l'erreur se produit ici, le problème est 100% lié à la définition
        // de la relation dans le modèle ou à un cache persistant.
        $submission->load('answers.question');

        // Si tout va bien, on retourne la vue.
        return view('responses', ['submission' => $submission]);
    }
}

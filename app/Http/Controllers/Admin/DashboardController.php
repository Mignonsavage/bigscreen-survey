<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        // Données pour le Pie Chart "Équipement" (Question 6)
        $headsetData = Answer::where('question_id', 6)
            ->select('value', DB::raw('count(*) as total'))
            ->groupBy('value')
            ->pluck('total', 'value');

        // Données pour le Pie Chart "Magasin d'application" (Question 7)
        $storeData = Answer::where('question_id', 7)
            ->select('value', DB::raw('count(*) as total'))
            ->groupBy('value')
            ->pluck('total', 'value');

        // Données pour le Pie Chart "Utilisation principale" (Question 10)
        $usageData = Answer::where('question_id', 10)
            ->select('value', DB::raw('count(*) as total'))
            ->groupBy('value')
            ->pluck('total', 'value');

        // Données pour le Radar Chart "Qualité" (Questions 11 à 15)
        $qualityData = Answer::whereIn('question_id', [11, 12, 13, 14, 15])
            ->join('questions', 'answers.question_id', '=', 'questions.id')
            ->select('questions.body', DB::raw('avg(answers.value) as average'))
            ->groupBy('questions.id', 'questions.body')
            ->orderBy('questions.id')
            ->pluck('average', 'body');

        return view('admin.dashboard', [
            'headsetData' => $headsetData,
            'storeData' => $storeData,
            'usageData' => $usageData,
            'qualityData' => $qualityData,
        ]);
    }
}

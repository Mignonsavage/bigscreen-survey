<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SurveySubmission;
use Illuminate\Http\Request;

class ReponsesController extends Controller
{
    public function index()
    {
        $submissions = SurveySubmission::with('answers.question')->latest()->get();
        return view('admin.reponses', ['submissions' => $submissions]);
    }
}

<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\QuestionnaireController;
use App\Http\Controllers\Admin\ReponsesController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [SurveyController::class, 'index'])->name('survey.index');

// Route pour soumettre le sondage (Rate Limiting : 5 soumissions par minute)
Route::post('/survey', [SurveyController::class, 'store'])
    ->name('survey.store')
    ->middleware('throttle:5,1');
Route::get('/thank-you/{token}', [SurveyController::class, 'thankyou'])->name('survey.thankyou');
Route::get('/responses/{token}', [SurveyController::class, 'showResponses'])->name('survey.responses');

Route::prefix('administration')->name('admin.')->group(function () {
    Route::middleware(['guest:admin', 'throttle:5,1'])->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    });


    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('/questionnaire', [QuestionnaireController::class, 'index'])->name('questionnaire');
        Route::get('/reponses', [ReponsesController::class, 'index'])->name('reponses');
    });
});

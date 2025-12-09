<?php

namespace Database\Factories;

use App\Models\SurveySubmission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SurveySubmissionFactory extends Factory
{
    protected $model = SurveySubmission::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'link_token' => Str::random(32),
        ];
    }
}

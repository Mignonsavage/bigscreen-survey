<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveySubmission extends Model
{
    use HasFactory;
    protected $fillable=['email','link_token'];
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}

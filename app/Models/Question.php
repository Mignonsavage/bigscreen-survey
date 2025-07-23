<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['body','type','options','order'];
    protected $casts=[
        'options'=>'array',
    ];
}

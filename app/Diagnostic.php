<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{
    protected $fillable = [
        'userId',
        'symptom',
        'affliction',
        'treatment'
      ];
}

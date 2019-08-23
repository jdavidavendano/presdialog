<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical_r extends Model
{
    protected $fillable = [
        'email',
        'id',
        'gender',
        'date',
        'birthDate',
        'bloodType'
    ];
}

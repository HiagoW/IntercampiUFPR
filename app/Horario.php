<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = [
        'horario',
        'chegada',
        'linha',
        'campus'
    ];
}

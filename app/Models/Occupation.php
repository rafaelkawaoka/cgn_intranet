<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'profissao',
        'profissaoM',
        'profissaoF'
    ];
}

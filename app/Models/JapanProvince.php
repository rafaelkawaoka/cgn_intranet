<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JapanProvince extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'provincia',
        'kanji'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function ($provincia) {
            $provincia->provincia = capitalizarNome($provincia->provincia);
        });
        static::updating(function ($provincia) {
            $provincia->provincia = capitalizarNome($provincia->provincia);
        });
    }

    public function cidades(){
        return $this->hasMany(JapanCity::class, 'provincia_id');
    }
}

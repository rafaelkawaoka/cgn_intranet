<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JapanCity extends Model
{
    public $timestamps = false;

    protected static function boot(){
        parent::boot();
        static::creating(function ($cidade) {
            $cidade->cidade = capitalizarNome($cidade->cidade);
        });
        static::updating(function ($cidade) {
            $cidade->cidade = capitalizarNome($cidade->cidade);
        });
    }

    public function provincia(){
        return $this->belongsTo(JapanProvince::class, 'provincia_id');
    }
}

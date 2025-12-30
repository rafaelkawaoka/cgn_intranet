<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'nome','sexo','nascimento','matricula','cpf',
        'telefone_celular','telefone_fixo','email',
        'provincia_id','cidade_id',
    ];

    protected $casts = [
        'nascimento' => 'date',
    ];

    public function provincia()
    {
        return $this->belongsTo(JapanProvince::class, 'provincia_id');
    }

    public function cidade()
    {
        return $this->belongsTo(JapanCity::class, 'cidade_id');
    }
}

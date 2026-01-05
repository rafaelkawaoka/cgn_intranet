<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'nome','sexo','nascimento','matricula','cpf',
        'telefone_celular','telefone_fixo','email',
        'provincia_id','cidade_id',
        'created_by','updated_by',
        'occupation_id',
        'estado_civil',
        'escolaridade',
        'idioma',
        'pais_nascimento_id',
        'estado_nascimento_br_id',
        'estado_nascimento_jp_id',
        'estado_nascimento_outro',
        'cidade_nascimento_br_id',
        'cidade_nascimento_jp_id',
        'cidade_nascimento_outro',
        'identidade_tipo',
        'identidade_numero',
        'identidade_orgao',
        'identidade_emissao',
        'titulo_eleitor',
        'titulo_secao',
        'titulo_zona',
        'titulo_local',
        'zayriu_card',
        'habilitacao_japonesa',
        'passaporte_estrangeiro',
        'passaporte_estrangeiro_validade',
    ];

    protected $casts = [
        'nascimento' => 'date',
        'identidade_emissao' => 'date',
        'passaporte_estrangeiro_validade' => 'date',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            $uid = auth()->id();
            $model->created_by ??= $uid;
            $model->updated_by ??= $uid;
        });

        static::updating(function ($model) {
            $model->updated_by = auth()->id();
        });
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function provincia()
    {
        return $this->belongsTo(JapanProvince::class, 'provincia_id');
    }

    public function cidade()
    {
        return $this->belongsTo(JapanCity::class, 'cidade_id');
    }

    public function nationalities()
    {
        return $this->belongsToMany(Country::class, 'customer_nationality');
    }

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }

    public function paisNascimento()
    {
        return $this->belongsTo(Country::class, 'pais_nascimento_id');
    }

    public function estadoNascimentoBr()
    {
        return $this->belongsTo(BrazilState::class, 'estado_nascimento_br_id');
    }

    public function estadoNascimentoJp()
    {
        return $this->belongsTo(JapanProvince::class, 'estado_nascimento_jp_id');
    }

    public function cidadeNascimentoBr()
    {
        return $this->belongsTo(BrazilCity::class, 'cidade_nascimento_br_id');
    }

    public function cidadeNascimentoJp()
    {
        return $this->belongsTo(JapanCity::class, 'cidade_nascimento_jp_id');
    }

    public function phones()
    {
        return $this->hasMany(CustomerPhone::class);
    }

    public function emails()
    {
        return $this->hasMany(CustomerEmail::class);
    }

    public function emergencyContacts()
    {
        return $this->hasMany(CustomerEmergencyContact::class);
    }
}

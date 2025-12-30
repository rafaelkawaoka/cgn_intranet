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
    ];

    protected $casts = [
        'nascimento' => 'date',
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
}

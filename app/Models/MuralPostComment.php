<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MuralPostComment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mural_post_comments';

    protected $fillable = [
        'post_id',
        'funcionario_id',
        'comentario',
    ];

    public function post()
    {
        return $this->belongsTo(MuralPost::class, 'post_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(User::class, 'funcionario_id');
    }
}


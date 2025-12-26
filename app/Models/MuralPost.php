<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MuralPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'funcionario_id',
        'tipo',
        'data_inicio',
        'data_termino',
        'modalidade',
        'titulo',
        'conteudo',
        'link_externo',
        'link_title',
        'users_cientes',
        'users_vote_yes',
        'users_vote_no',
        'enquete_end',
        'published_teams',
        'edited_at',
    ];

    protected $casts = [
        'data_inicio'      => 'date',
        'data_termino'     => 'date',
        'users_cientes'    => 'array',
        'users_vote_yes'   => 'array',
        'users_vote_no'    => 'array',
        'enquete_end'      => 'boolean',
        'published_teams'  => 'boolean',
        'edited_at' => 'datetime',
    ];

    protected $attributes = [
        'users_cientes'   => '[]',
        'users_vote_yes'  => '[]',
        'users_vote_no'   => '[]',
        'enquete_end'     => false,
        'published_teams' => false,
        'tipo'            => 1,
    ];

    protected static function booted(): void
    {
        static::deleting(function (self $post) {
            if ($post->isForceDeleting()) {
                $post->attachments()->withTrashed()->forceDelete();
            } else {
                $post->attachments()->delete();
            }
        });
        static::restoring(function (self $post) {
            $post->attachments()->withTrashed()->restore();
        });
    }

    private function usersByIds(array $ids)
    {
        if (empty($ids)) {
            return collect();
        }
        return User::query()->whereIn('id', $ids)->orderBy('name')->get(['id', 'name']);
    }

    public function attachments()
    {
        return $this->hasMany(MuralPostAttachment::class, 'post_id');
    }

    public function comments()
    {
        return $this->hasMany(\App\Models\MuralPostComment::class, 'post_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(User::class, 'funcionario_id');
    }
}

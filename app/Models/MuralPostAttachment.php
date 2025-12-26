<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MuralPostAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'post_id',
        'file_url',
        'file_extension',
        'file_size',
        'download_count',
    ];

    protected $attributes = [
        'download_count' => 0,
    ];

    public function post()
    {
        return $this->belongsTo(MuralPost::class, 'post_id');
    }
}

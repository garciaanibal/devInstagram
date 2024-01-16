<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'titulo',
        'descripcion',
        'imagen',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select(['name','username']);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}

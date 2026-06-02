<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    /**
     * Campos que se pueden llenar de forma masiva
     */
    protected $fillable = [
        'body',     
        'user_id',
        'video_id',
    ];

    /**
     * Relaciones
     */

    // Un comentario pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un comentario pertenece a un video
    public function video()
    {
        return $this->belongsTo(Video::class);
    }
}
<?php

namespace App\Models;                    // ← Namespace moderno

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // Si el nombre de la tabla NO es el plural del modelo, lo especificas:
    protected $table = 'videos';

    // Campos que se pueden llenar masivamente (muy importante)
    protected $fillable = [
        'title',
        'description',
        'url',
        'user_id',        // si tienes relación con usuario
        // agrega aquí todos los campos que vayas a usar con create() o update()
    ];

    // ====================== RELACIONES ======================


    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('id', 'desc');       
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
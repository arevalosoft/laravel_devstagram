<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'user_id',
    ];

    /*
     * Declaración de relaciones entre tablas.
     * post -> one to many -> users
     * Esta es la otra parte de la relación.
    */
    public function user() {
        return $this->belongsTo(User::class)->select(['name', 'username', 'email']);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}

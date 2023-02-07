<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }
}

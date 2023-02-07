<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, User $user, Post $post) {
        //validar
        $this->validate($request, [
            'comment' => ['required', 'max:255'],
        ]);

        // almacenar el resultado
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comment' => $request->comment,
        ]);

        // imprimir mensaje
        return back()->with('SysMsg', 'Comentario realizado correctamente.');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth')->except('index','show');
    }


    public function index(User $user) {
        
        $posts = Post::where('user_id', $user->id)->latest()->paginate(12);
       
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

        Post::create([
           'title' => $request->title,
           'description' => $request->description,
           'image' => $request->image,
           'user_id' => auth()->user()->id
        ]);

        // Otra forma de insertar un registro a la DB
        // $post = new Post;
        // $post->title = $request->title;
        // $post->description = $request->description;
        // $post->image = $request->image;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post) {
        return view('posts.show', [
            'user' => $user,
            'post' => $post,
        ]);
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();

        // eliminar la imagen
        $imagePath = public_path('uploads/' . $post->image);
        if (File::exists($imagePath)) {
            unlink($imagePath);
            //File::delete();
        }

        return redirect()->route('posts.index', [auth()->user()->username]);
    }
}

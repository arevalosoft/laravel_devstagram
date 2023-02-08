<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index() {
        return view('profile.index');
    }

    public function store(Request $request) {
        $request->request->add(['username' => Str::slug($request->get('username'))]);
        
        $this->validate($request, [
            'username' => ['required', 'max:20', 'min:3', 'unique:users,username,'.auth()->user()->id, 'not_in:devstagram,edit-profile,administrator,admin,root'],
        ]);

        if ($request->image) {
            // se subió una imagen de reemplazo del perfil
            $image = $request->file('image');
            $extension = $image->extension();
            
            $imageName = Str::uuid() . "." . $extension;
            $imageServer = Image::make($image);
            $imageServer->fit(500, 500);

            $imagePath = public_path('profiles') . '/' . $imageName;
            $imageServer->save($imagePath);
        }

        // guardar
        $thisUser = User::find(auth()->user()->id);
        $thisUser->username = $request->username;
        $thisUser->image = $imageName ?? '';
        $thisUser->save();

        return redirect()->route('posts.index', [$thisUser->username]);
    }
}

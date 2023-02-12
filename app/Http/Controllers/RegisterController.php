<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index() {
        return view('auth.register');  //auth <- folder register <-file
    }

    public function store(Request $request) {
        //dd($request);
        //dd($request->get('email'));

        // modificar el $request
        $request->request->add(['username' => Str::slug($request->get('username'))]);

        // validación
        $this->validate($request, [
            'name' => ['required', 'max:30'],
            'username' => ['required', 'max:20', 'min:3', 'unique:users'],
            'email' => ['required', 'max:120', 'email', 'unique:users'],
            'password' => ['required', 'max:120', 'confirmed', 'min:6'],
            //password_confirmation
        ]);

        // pasó la validación, se procede a insertar el registro
        User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        // autenticar el usuario
        // auth()->attempt([
        //     'email' => $request->get('email'),
        //     'password' => $request->get('password'),
        // ]);

        // otra forma de autenticar
        auth()->attempt($request->only('email', 'password'));

        // redireccionar
        return redirect()->route('posts.index', [auth()->user()->username]);
    }
}

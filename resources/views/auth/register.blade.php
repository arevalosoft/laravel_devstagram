@extends('layouts.app')

@section('title')
  Regístrate en DevStagram
@endsection

@section('content')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/registrar.jpg') }}" alt="Image de registro de usuarios.">
    </div>

    <diV class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form action="{{ route('register') }}" method="POST" novalidate>
        @csrf
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="name">Nombre</label>
          <input id="name" name="name" type="text" placeholder="Tu nombre" class="w-full border p-3 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('name') }}">
          @error('name')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="username">Usuario</label>
          <input id="username" name="username" type="text" placeholder="Tu nombre de usuario" class="w-full border p-3 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('username') }}">
          @error('username')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">E-Mail</label>
          <input id="email" name="email" type="email" placeholder="Tu E-Mail" class="w-full border p-3 rounded-lg @error('name') border-red-500 @enderror" value="{{ old('email') }}">
          @error('email')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">Password</label>
          <input id="password" name="password" type="password" placeholder="Password de registro" class="w-full border p-3 rounded-lg @error('name') border-red-500 @enderror">
          @error('password')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="password_confirmation">Confirmar Password</label>
          <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Password de confirmación" class="w-full border p-3 rounded-lg @error('name') border-red-500 @enderror">
        </div>

        <input type="submit" value="Registrar la Cuenta" class="block bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white text-lg mx-auto p-2 rounded">
      </form>
    </diV>
  </div>
@endsection
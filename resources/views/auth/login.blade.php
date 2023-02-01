@extends('layouts.app')

@section('title')
  Inicia sesión en DevStagram
@endsection

@section('content')
  <div class="md:flex md:justify-center md:gap-10 md:items-center">
    <div class="md:w-6/12 p-5">
      <img src="{{ asset('img/login.jpg') }}" alt="Image de login de usuarios.">
    </div>

    <diV class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
      <form action="{{ route('login') }}" method="POST" novalidate>
        @csrf

        @if (session('sysMSG'))
        <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ session('sysMSG') }}</p>
        @endif

        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="email">E-Mail</label>
          <input id="email" name="email" type="email" placeholder="Tu E-Mail" class="w-full border p-3 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
          @error('email')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <label class="mb-2 block uppercase text-gray-500 font-bold" for="password">Password</label>
          <input id="password" name="password" type="password" placeholder="Password de ingreso" class="w-full border p-3 rounded-lg @error('password') border-red-500 @enderror">
          @error('password')
          <p class="bg-red-500 text-white my-2 rounded text-sm p-2 text-center">{{ $message }}</p>
          @enderror
        </div>
        <div class="mb-5">
          <input type="checkbox" name="remember" id="remember"><label for="remember" class="text-gray-500 text-sm">&nbsp;Mantener mi sesión abierta</label>
        </div>
        
        <input type="submit" value="Iniciar Sesión" class="block bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full text-white text-lg mx-auto p-2 rounded">
      </form>
    </diV>
  </div>
@endsection
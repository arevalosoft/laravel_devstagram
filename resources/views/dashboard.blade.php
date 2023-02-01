@extends('layouts.app')

@section('title')
  Informacion de Cuenta :: Perfil {{ $user->username }}
@endsection

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
      <div class="w-8/12 lg:w-6/12 px-5">
        <img src="{{ asset('img/usuario.svg') }}" alt="Imagen del Usuario">
      </div>
      <div class="md:w-8/12 lg:w-6/12 px-5 md:flex md:flex-col md:justify-center items-center md:items-start py-10 md:py-10">
        <p class="text-gray-700 text-2xl">{{ $user->username }}</p>

        <p class="text-gray-800 text-sm font-bold mb-3 mt-5">
          XXXX<span class="font-normal">&nbsp;seguidores</span>
        </p>

        <p class="text-gray-800 text-sm font-bold mb-3">
          XXXX<span class="font-normal">&nbsp;siguiendo</span>
        </p>

        <p class="text-gray-800 text-sm font-bold mb-3">
          XXXX<span class="font-normal">&nbsp;posts</span>
        </p>
      </div>
    </div>
  </div>
@endsection
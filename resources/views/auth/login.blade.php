@extends('layouts.app')

@section('titulo')
Inicia sesión en Devstagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-4 items-center">
    <div class="md:w-6/12 p-5">
        <img src="{{asset('img/login.jpg')}}" alt="Imagen registro">
    </div>

    <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-lg">
        <form method="POST" action="{{route('login')}}">
            @csrf
            @if (session('mensaje'))
            <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{session('mensaje')}}</p>
            
                
            @endif
            <div class="mb-5">
                <label for="email" class="uppercase mb-2 text-gray-500 font-bold">Email:</label>
                <input 
                name="email"
                id="email"
                placeholder="Tu correo de registro"
                type="text"
                class="border p-3 w-full rounded-lg @error('email')
                    border-red-500
                @enderror"
                value="{{old('email')}}"
                >
                @error('email')
                    <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="uppercase mb-2 text-gray-500 font-bold">Password:</label>
                <input 
                name="password"
                id="password"
                placeholder="Tu contraseña"
                type="password"
                class="border p-3 w-full rounded-lg @error('password')
                    border-red-500
                @enderror" >
                @error('password')
                    <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-5">
                <input type="checkbox" name="remember" id="remember"> 
                <label class="text-gray-500 text-sm" for="">
                    Mantener mi sesión abierta
                </label>   
            </div>


            <input type="submit" value="Iniciar Sesión" class="bg-sky-600 transition-colors w-full p-3 rounded-lg text-white font-bold">
        </form>
    </div>
</div>
@endsection
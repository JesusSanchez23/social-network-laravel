@extends('layouts.app')

@section('titulo')
Registrate en Devstagram
@endsection

@section('contenido')
<div class="md:flex md:justify-center md:gap-4 items-center">
    <div class="md:w-6/12 p-5">

        <div id="glitched-image">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro">
        </div>

    </div>

    <div class="md:w-6/12 bg-white p-6 rounded-lg shadow-lg">
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="uppercase mb-2 text-gray-500 font-bold">Nombre:</label>
                <input 
                name="name"
                id="name"
                placeholder="Tu Nombre"
                type="text"
                class="border p-3 w-full rounded-lg @error('name')
                    border-red-500
                @enderror"
                value="{{old('name')}}"
                >
                @error('name')
                    <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{$message}}</p>
                @enderror
            </div>


            <div class="mb-5">
                <label for="username" class="uppercase mb-2 text-gray-500 font-bold">Username:</label>
                <input 
                name="username"
                id="username"
                placeholder="Tu Nombre de usuario"
                type="text"
                class="border p-3 w-full rounded-lg @error('username')
                    border-red-500
                @enderror"
                value="{{old('username')}}"
                >
                @error('username')
                    <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{$message}}</p>
                @enderror
            </div>

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
                <label for="password_confirmation" class="uppercase mb-2 text-gray-500 font-bold">Repetir Password:</label>
                <input 
                name="password_confirmation"
                id="password_confirmation"
                placeholder="Repite tu contraseña"
                type="password"
                class="border p-3 w-full rounded-lg @error('password_confirmation')
                    border-red-500
                @enderror">
                @error('password_confirmation')
                    <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{$message}}</p>
                @enderror
            </div>
            

            <input type="submit" value="Crear Cuenta" class="bg-sky-600 transition-colors w-full p-3 rounded-lg text-white font-bold">
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('titulo')
    Editar Perfil : {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('perfil.store') }}" enctype="multipart/form-data" class="mt-10 md:mt-0" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="username" class="uppercase mb-2 text-gray-500 font-bold">Username:</label>
                    <input name="username" id="username" placeholder="Tu Nombre" type="text"
                        value="{{ auth()->user()->username }}"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror">
                    @error('username')
                        <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="uppercase mb-2 text-gray-500 font-bold">Email:</label>
                    <input name="email" id="email" placeholder="Tu Nombre" type="email"
                        value="{{ auth()->user()->email }}"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="uppercase mb-2 text-gray-500 font-bold">Escribe tu password:</label>
                    <input name="password" id="password" placeholder="Tu password" type="password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="uppercase mb-2 text-gray-500 font-bold">Imagen perfil:</label>
                    <input name="imagen" id="imagen" type="file" value="" accept=".jpg, .jpeg, .png"
                        class="border p-3 w-full rounded-lg">
                </div>

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{ session('mensaje') }}
                    </p>
                @endif

                <input type="submit" value="Guardar Cambios"
                    class="bg-sky-600 transition-colors w-full p-3 rounded-lg text-white font-bold">
            </form>
        </div>
    </div>
@endsection

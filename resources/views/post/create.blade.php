@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
        Imagen aquí
        </div>
        <div class="md:w-1/2 px-10 bg-white p-3 rounded shadow-lg mt-10 md:mt-0">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="uppercase mb-2 text-gray-500 font-bold">Titulo:</label>
                    <input 
                    name="titulo"
                    id="titulo"
                    placeholder="Titulo de la publicación"
                    type="text"
                    class="border p-3 w-full rounded-lg @error('titulo')
                        border-red-500
                    @enderror"
                    value="{{old('titulo')}}"
                    >
                    @error('name')
                        <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{$message}}</p>
                    @enderror
                </div>
    
    
                <div class="mb-5">
                    <label for="descripcion" class="uppercase mb-2 text-gray-500 font-bold">Descripción:</label>
                    <textarea 
                    name="descripcion"
                    id="descripcion"
                    placeholder="Descripción de la publicación"
                    class="border p-3 w-full rounded-lg @error('username')
                        border-red-500
                    @enderror"
                    >{{old('descripcion')}}</textarea>
                    @error('username')
                        <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{$message}}</p>
                    @enderror
                </div>
     
    
                <input type="submit" value="Crear Publicación" class="bg-sky-600 transition-colors w-full p-3 rounded-lg text-white font-bold">
            </form>
        </div>

    </div>
@endsection
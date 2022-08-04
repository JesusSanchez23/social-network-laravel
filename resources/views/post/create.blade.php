@extends('layouts.app')

@section('titulo')
    Crea una nueva Publicación
@endsection

@section('contenido')
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    @endpush
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone"
                class="dropzone border-dashed border-2 rounded flex h-96 flex-col justify-center items-center w-full">
            @csrf

            </form>
        </div>
        <div class="md:w-1/2 px-10 bg-white p-3 rounded shadow-lg mt-10 md:mt-0">
            <form action="{{ route('post.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="uppercase mb-2 text-gray-500 font-bold">Titulo:</label>
                    <input name="titulo" id="titulo" placeholder="Titulo de la publicación" type="text"
                        class="border p-3 w-full rounded-lg @error('titulo') border-red-500 @enderror"
                        value="{{ old('titulo') }}">
                    @error('titulo')
                        <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-5">
                    <label for="descripcion" class="uppercase mb-2 text-gray-500 font-bold">Descripción:</label>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripción de la publicación"
                        class="border p-3 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input
                    name="imagen",
                    type="hidden"
                    value="{{old('imagen')}}"
                    >
                    @error('imagen')
                    <p class="bg-red-500 text-white font-bold text-center my-2 text-sm p-2 rounded">{{ $message }}</p>
                @enderror
                </div>


                <input type="submit" value="Crear Publicación"
                    class="bg-sky-600 transition-colors w-full p-3 rounded-lg text-white font-bold">
            </form>
        </div>

    </div>
@endsection

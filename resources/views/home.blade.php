@extends('layouts.app')


@section('titulo')
    HomePage
@endsection

@section('contenido')
 <x-listar-post :posts="$posts" />
   
@endsection

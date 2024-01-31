@extends('layout.masterpage')

@section('titulo')

@endsection

@section('estilos')
<style>


</style>
@endsection

@section('contenido')

    <a class="nav-link" href="{{ route('blog.create') }}">@lang('Create Post')</a>


    <a class="nav-link" href="{{ route('tags.index') }}">@lang('View Blog Categories')</a>


    <a class="nav-link" href="{{ route('tags.create') }}">@lang('Create Blog Category')</a>


    <a class="nav-link" href="{{ route('restaurants.create') }}">@lang('New Restaurant')</a>


    <a class="nav-link" href="{{ route('restaurants.index') }}">@lang('View Restaurants')</a>

    <a class="nav-link" href="{{ route('galeria-comidas.create') }}">@lang('Create comida')</a>

@endsection

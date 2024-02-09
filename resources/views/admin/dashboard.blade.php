@extends('layout.adminlte-layout')

@section('titulo')
Dashboard
@endsection

@section('estilos')
<style>


</style>
@endsection

@section('contenido')

    <a class="nav-link" href="{{ route('user.index') }}">@lang('View Users')</a>

    <a class="nav-link" href="{{ route('blog.index') }}">@lang('View Posts')</a>

    <a class="nav-link" href="{{ route('blog.create') }}">@lang('Create Post')</a>

    <a class="nav-link" href="{{ route('tags.index') }}">@lang('View Blog Categories')</a>

    <a class="nav-link" href="{{ route('tags.create') }}">@lang('Create Blog Category')</a>

    <a class="nav-link" href="{{ route('restaurants.create') }}">@lang('New Restaurant')</a>

    <a class="nav-link" href="{{ route('restaurants.index') }}">@lang('View Restaurants')</a>

    <a class="nav-link" href="{{ route('galeria-comidas.create') }}">@lang('Create comida')</a>

    <a class="nav-link" href="{{ route('categorias.index') }}">@lang('View Food Categories')</a>

@endsection

@extends('main_view\Standard-Admin')
@php $version = 'v.1'; @endphp
    
@section('content')

<link rel="stylesheet" href="{{ mix('compilacion/seccion-administrador.css') }}">

{{--------------| Administrador Inicio: AI  --}}
<main class="AI-Container">
    <div class="AI-Barra AI-Flex">
        <div class="AI-Flex" style="width: 16%">
            <p class="AI-Fuente">SalvaNatura</p>
        </div>
        <div class="AI-Flex" style="width: 70%">
            {{-- <p class="AI-Fuente">{{ Auth::user()->name}}</p> --}}
        </div>
        <div class="AI-Flex" style="width: 15%">
            <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>

    <div class="AI-GS AI-Border">
        <div class="AI-Gestor AI-Flex AI-Border">
            <p class="AI-Gestor-Title">GESTOR DE CONTENIDOS</p>
        </div>
        <div class="AI-Secciones AI-Flex AI-Border">
            <div class="AI-SeccionesSty AI-Flex">🏠 INICIO</div>
            <div class="AI-SeccionesSty AI-Flex">SERVICIOS</div>
            <div class="AI-SeccionesSty AI-Flex">CORDILLERAS</div>
            <div class="AI-SeccionesSty AI-Flex">PRODUCTOS</div>
            <div class="AI-SeccionesSty AI-Flex">REGENERA</div>
        </div>
    </div>

    <div class="AI-Contenido AI-BorderDos">
        @include('secciones.inicio-vista')
    </div>
</main>

<script src="{{ mix('compilacion/seccion-administrador.js') }}"></script>
@endsection
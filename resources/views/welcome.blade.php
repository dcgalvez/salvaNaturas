@extends('main_view/Standard')
@section('content')
<link rel="stylesheet" href="{{ mix('compilacion/usuario.css') }}">
    @include('main_view.navbar')
    @include('secciones.inicio-vista')
<script src="{{ mix('compilacion/usuario.js') }}"></script>
@endsection
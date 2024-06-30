@extends('main_view/Standard')
@section('top')
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="css/p-inicio.css">
@endsection
@section('content')
    @include('main_view.navbar')
    @include('secciones.inicio-vista')
@endsection

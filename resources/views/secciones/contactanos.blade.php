@extends('main_view/Standard')
@section('content')
<link rel="stylesheet" href="{{ mix('compilacion/usuario.css') }}">
    @include('main_view.navbar')
    <div class="container">
        <div class="card">
            <h2>Formulario de Contacto</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="fullname">Nombre Completo:</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
<script src="{{ mix('compilacion/usuario.js') }}"></script>
@endsection
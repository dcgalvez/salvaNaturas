@extends('Standard')
@section('content')
<main class="container align-center p-5">
    <form method="POST" action="{{ route('admin.registrar') }}">
        @csrf
        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="emailInput"
            required autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" id="passwordInput" required>
        </div>
        <div class="mb-3">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="name" id="userInput" required autocomplete="disabled">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</main>
@endsection
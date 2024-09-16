<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('compilacion/seccion-administrador.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Bienvenido a mi Formulario</title>
</head>

<body>
    <div class="container-form sign-up">
        <form class="formulario" method="POST" action="{{ route('admin.login') }}">
            @csrf
            <h2 class="create-account">Iniciar Sesion</h2>
            <p class="cuenta-gratis">Introduce las credenciales correctas</p>
            <input type="email" placeholder="Email" class="form-control" name="email" id="emailInput" required autocomplete="off">
            <input type="password" placeholder="Passwprd" class="form-control" name="password" id="passwordInput" required autocomplete="off">
            <input type="submit" class="btn" value="Iniciar Sesion">
        </form>
    </div>
    <script src="{{ mix('compilacion/seccion-administrador.js') }}"></script>
</body>

</html>
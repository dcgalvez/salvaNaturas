<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Monoton&family=Oregano:ital@0;1&display=swap');
    </style>
</head>

<body>
    @include('main_view.navbar')

    {{-- Mapa del pais con sus cordilleras --}}
    <div>
        <div class="col-12">
            <p class="GBFontBebasN GBTextCenter" id="PREC-Title">Mapa de El Salvador con Cordilleras y Cuencas</p>
        </div>
        <div class="MAS-BannerDiv mt-4">
            <div class="MAS-MapCordilleraImg GBborderWhite"></div>
        </div>
        <div class="col-12">
            <p class="GBFontBebasN GBTextCenter" id="PREC-Title">Actividades</p>
        </div>
        <div class="MAS-Container mt-4">
            <div class="MAS-BannerCalenDiv">
                <div class="MAS-CalendarioActiveImg GBborderWhite"></div>
            </div>
            <div class="MAS-Activities">
                <div class="MAS-Activity">
                    <h3>Actividad 1:</h3>
                    <p>Asender cordillera Ilamatepeq</p>
                    <h3>Fecha:</h3>
                    <p>Agosto 8</p>
                </div>
                <div class="MAS-Activity">
                    <h3>Actividad 2:</h3>
                    <p>Decender cordillera Ilamatepeq</p>
                    <h3>Fecha:</h3>
                    <p>Agosto 9</p>
                </div>
            </div>
        </div>
        <div class="success-slider">
            <div class="col-12">
                <p class="GBFontBebasN GBTextCenter" id="PREC-Title">Historias de exito</p>
            </div>
            <div class="container">
                
                <div class="cards">
                    <div class="card" draggable="true">
                        <div class="card-title">Card 1</div>
                        <div class="card-content">
                            This is the content of card 1.
                        </div>
                    </div>

                    <div class="card" draggable="true">
                        <div class="card-title">Card 2</div>
                        <div class="card-content">
                            This is the content of card 2.
                        </div>
                    </div>

                    <div class="card" draggable="true">
                        <div class="card-title">Card 3</div>
                        <div class="card-content">
                            This is the content of card 3.
                        </div>
                    </div>

                    <div class="card" draggable="true">
                        <div class="card-title">Card 4</div>
                        <div class="card-content">
                            This is the content of card 4.
                        </div>
                    </div>

                    <div class="card" draggable="true">
                        <div class="card-title">Card 5</div>
                        <div class="card-content">
                            This is the content of card 5.
                        </div>
                    </div>

                    <div class="card" draggable="true">
                        <div class="card-title">Card 6</div>
                        <div class="card-content">
                            This is the content of card 6.
                        </div>
                    </div>
                </div>
            </div>
            <!-- <button id="moveLeft">Move Left</button>
            <button id="moveRight">Move Right</button> -->

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
            <script src="{{ asset('js/Home-Index.js') }}"></script>
            <script src="{{ asset('js/Home-Tools.js') }}"></script>
            <script src="{{ asset('js/Slides-Cordilleras.js') }}"></script>
</body>

</html>
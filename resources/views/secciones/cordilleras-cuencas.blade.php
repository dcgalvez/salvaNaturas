<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cordilleras y Cuencas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Monoton&family=Oregano:ital@0;1&display=swap');
    </style>
    <link rel="stylesheet" href="css/p-cordillera.css">
    <link rel="stylesheet" href="css/p-inicio.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap');
    </style>
</head>

<body>
    @include('main_view.navbar')

    {{-- Mapa del pais con sus cordilleras --}}
    <div>
        <div class="col-12 mt-5">
            <p class="GBFontBebasN GBTextCenter" id="PREC-Title">Mapa de El Salvador con Cordilleras y Cuencas</p>
        </div>
        <div class="MAS-BannerDiv mt-2">
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
            <div class="carousel-container">
                <div id="carouselExampleIndicators" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/assets/images/exito1.png" class="d-block w-100" alt="Historia de exito 1">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/images/exito2.png" class="d-block w-100" alt="Historia de exito 2">
                        </div>
                        <div class="carousel-item">
                            <img src="/assets/images/exito3.png" class="d-block w-100" alt="Historia de exito 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12 mt-5">
            <p class="GBFontBebasN GBTextCenter" id="PREC-Title">CORDILLERAS</p>
        </div>

        <div class="GBDisplayFlex PI-Flex-Wrap mb-5">
            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">CADENA INTERIOR</p>
                </div>
                {{-- <div class="PI-Card-Body PI-BorderB"></div> --}}
            </div>

            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">APANECA ILAMATEPEQ</p>
                </div>
            </div>
            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">ALOTEPEQUE METAPAN</p>
                </div>
            </div>
            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">BALSAMO QUESALTEPEQUE</p>
                </div>
            </div>
            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">SIERRA TECAPA CHINAMECA</p>
                </div>
            </div>
            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">CACAHUATIQUE COROBAN</p>
                </div>
            </div>
            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">NAHUATERIQUE</p>
                </div>
            </div>
            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">CACAHUATIQUE COROBAN</p>
                </div>
            </div>
            <div class="PI-Card ">
                <div class="PI-Card-Head  GBDisplayFlex">
                    <p class="source-code-font PI-Card-Head-P">JUCUARAN INTIPUCA</p>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/Home-Index.js') }}"></script>
    <script src="{{ asset('js/Home-Tools.js') }}"></script>
    <script src="{{ asset('js/Slides-Cordilleras.js') }}"></script>
</body>

</html>
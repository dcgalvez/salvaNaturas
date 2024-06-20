<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" href="css/p-inicio.css">
    <style> @import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap'); </style>
    {{-- <style> @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Monoton&family=Oregano:ital@0;1&display=swap'); </style> --}}
</head>
<body>
    @include('main_view.navbar')

    {{-- Banner Home Screen --}}
    {{-- <div class="MAS-BannerDiv mt-4">
        <div class="MAS-BannerImg GBborderWhite"></div>      
    </div> --}}

    {{-- @include('main_view.card_proyect') --}}
    {{-- @include('NewsEvents')    --}}

    {{-- NUEVO DISEÑO --}}

    {{-- <div class="col-12">
        <p class="GBFontBebasN GBTextCenter PI-Title">CORDILLERAS</p>
    </div> --}}

    {{-- Cards Cordilleras --}}

    <div class="col-12 mt-5 mb-5">
        <h1 class="GBFontBebasN GBTextCenter">CORDILLERAS</h1>
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
                <p class="source-code-font PI-Card-Head-P">APANECA ILAMATEPEQ</p></div>
        </div>
        <div class="PI-Card ">
            <div class="PI-Card-Head  GBDisplayFlex">
                <p class="source-code-font PI-Card-Head-P">ALOTEPEQUE METAPAN</p></div>
        </div>
        <div class="PI-Card ">
            <div class="PI-Card-Head  GBDisplayFlex">
                <p class="source-code-font PI-Card-Head-P">BALSAMO QUESALTEPEQUE</p></div>
        </div>
        <div class="PI-Card ">
            <div class="PI-Card-Head  GBDisplayFlex">
                <p class="source-code-font PI-Card-Head-P">SIERRA TECAPA CHINAMECA</p></div>
        </div>
        <div class="PI-Card ">
            <div class="PI-Card-Head  GBDisplayFlex">
                <p class="source-code-font PI-Card-Head-P">CACAHUATIQUE COROBAN</p></div>
        </div>
        <div class="PI-Card ">
            <div class="PI-Card-Head  GBDisplayFlex">
                <p class="source-code-font PI-Card-Head-P">NAHUATERIQUE</p></div>
        </div>
        <div class="PI-Card ">
            <div class="PI-Card-Head  GBDisplayFlex">
                <p class="source-code-font PI-Card-Head-P">CACAHUATIQUE COROBAN</p></div>
        </div>
        <div class="PI-Card ">
            <div class="PI-Card-Head  GBDisplayFlex">
                <p class="source-code-font PI-Card-Head-P">JUCUARAN INTIPUCA</p></div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="/js/Home-Index.js"></script>
    <script src="/js/Home-Tools.js"></script>
</body>
</html>
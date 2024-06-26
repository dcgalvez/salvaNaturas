@extends('Standard')
@section('content')
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

    {{-- LOGO E CITA DE INICIO --}}

    <div class="PI-FD">
        <div class="PI-FD-Logo"></div>
        <div class="PI-FD-Cita PI-BorderB GBDisplayFlex">
            <p class="">SalvaNATURA es colaboración de equipos intergeneracionales multidiciplinarios conocedores de
                ecosistemas acuáticos y terrestres que regeneramos cuencas hidrográficas desde las cordilleras hasta los
                océanos y en estas, sus bienes culturales, económicos, naturales, políticos no partidarios y sociales...
            </p>
        </div>
    </div>

    {{-- CARDS CORDILLERAS --}}

    <div class="col-12 mt-5 mb-5">
        <h1 class="GBFontBebasN GBTextCenter" style="font-size: 4em;">CORDILLERAS</h1>
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
@endsection

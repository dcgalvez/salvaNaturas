@extends('main_view/Standard')
@section('content')
<link rel="stylesheet" href="{{ mix('compilacion/usuario-programas.css') }}">
    @include('main_view.navbar')
    <main class="PP-Main">
        {{-- <div class="">
            <h1>PROGRAMAS</h1>
        </div> --}}

        <div class="p-5">
            <div class="PSSN-Main ">
                <div class="PSSN-Title GBTextCenter">
                <h1 style="color:#ffcc00;">NOMBRE DEL PROGRAMA</h1>
                </div>
                <div class="PSSN-Img ">
                    <div class="PSSN-I-1 PSSN-BB"></div>
                    <div class="PSSN-I-2 ">
                        <div class="PSSN-I-I-1 PSSN-BB"></div>
                        <div class="PSSN-I-I-2 PSSN-BB"></div>
                        <div class="PSSN-I-I-3 PSSN-BB"></div>
                    </div>
                </div>
                <div class="PSSN-Text PSSN-BB p-3">
                    <p style="color: white;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div>
    
        {{-- <div class="">
            <div class="PP-Programas GBTextCenter">
                <div class="PP-Programas-Imagen1  PP-Programas-Img-Main">
                    <img class="" src="\assets\images\AdminWallpaper2.png" alt="">
                </div>
                <div class="PP-Programas-Imagen2 PP-Programas-Img">
                    <img class="" src="\assets\images\AdminWallpaper2.png" alt="">
                </div>
                <div class="PP-Programas-Imagen3 PP-Programas-Img">
                    <img class="" src="\assets\images\AdminWallpaper2.png" alt="">
                </div>
                <div class="PP-Programas-Imagen4 PP-Programas-Img">
                    <img class="" src="\assets\images\AdminWallpaper2.png" alt="">
                </div>


                <div class="PP-Programas-Titulo PP-BordePrueba ">
                    <h3>TITULO</h3>
                </div>
                <div class="PP-Programas-Texto PP-BordePrueba ">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
        </div> --}}
    </main>
<script src="{{ mix('compilacion/usuario-programas.js') }}"></script>
@endsection
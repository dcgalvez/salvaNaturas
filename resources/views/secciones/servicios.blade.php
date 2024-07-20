{{---------------------------------| Standard: PSER |--------------------------------}}
@extends('main_view/Standard')
@section('content')
<link rel="stylesheet" href="{{ mix('compilacion/usuario-servicios.css') }}">
    @include('main_view.navbar')
    {{-- <div class="mt-5" id="PSER-Main">

    </div> --}}

    {{---------------------------| NUEVO DiSENO |-------------------- --}}
    <div class="PSER-Titulo GB-Flex">
        <div class="PSER-Titulo-1">
            <h1 class="PSER-TextSeccion">SERVICIOS</h1>
            <hr>
        </div>
    </div>

    <div class="TESTSN-Container">
        <div class="TESTSN-CardsMain" id="TESTSN-CardsMain">
            {{-- <div class="TESTSN-Cards TESTSN-Flex">
                <div class="TESTSN-CardText TESTSN-Flex">CORDILLERA DEL CHAPARRASTIQEU</div>
            </div>
            <div class="TESTSN-Cards TESTSN-Flex">
                <div class="TESTSN-CardText TESTSN-Flex">CONTABILIDAD</div>
            </div> --}}
        </div>
    </div>

    <div class="TESTSN-Container">
        <div class="mt-5" id="PSER-Main">

        </div>
    </div>








    {{-- <div class="GBborderBlack">
        <div class="GB-Flex PSER-ND-Cards">
            <div class="PSER-ND-Cards-Ch GB-Flex">
                <h1>EDUCACION</h1>
            </div>
            <div class="PSER-ND-Cards-Ch GB-Flex">
                <h1>CERTIFICADOS</h1>
            </div>
        </div>

    </div> --}}
<script src="{{ mix('compilacion/usuario-servicios.js') }}"></script>
<script>
    const URL_GetContenidoServiciosAll = '{{ route('servicios.getContenidosTodos') }}';
    const URL_GetContenidoServicios = '{{ route('servicios.getContenidos') }}';
</script>
@endsection
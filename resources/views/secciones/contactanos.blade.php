@extends('main_view/Standard')
@section('content')
<link rel="stylesheet" href="{{ mix('compilacion/usuario-contactanos.css') }}">
    @include('main_view.navbar')
    <main>
        <div class="mt-5 GB-Flex">
            <h1 class="londrina-solid-regular PSSN-Titulo">CONTACTANOS</h1>
        </div>
        <div class=" PSSN-Div">
            <div class="">
                <div class="row">
                    <div class="col-6">
                        <label for="" class="PSSN-FC-Label">NOMBRE Y APELLIDO </label>
                        <input type="text" class="mt-2 form-control PSSN-FC-Label" id="">
                    </div>
                    <div class="col-6">
                        <label for="" class="PSSN-FC-Label">TELEFONO</label>
                        <input type="text" class="mt-2 form-control PSSN-FC-Label" id="">
                    </div>
                    <div class="col-12 mt-4">
                        <label for="" class="PSSN-FC-Label">EMAIL</label>
                        <input type="text" class=" mt-2 form-control PSSN-FC-Label" id="">
                    </div>
                    <div class="col-12 mt-4">
                        {{-- <label for="" class="PSSN-FC-Label">ESCRIBE UN MENSAJE</label> --}}
                        <textarea class="form-control PSSN-FC-Label" name="" id="" cols="30" rows="7" placeholder="MENSAJE..."></textarea>
                    </div>
                    <div class="mt-4 col-12 GB-Flex">
                        <button class="btn btn-secondary"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> ENVIAR</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script src="{{ mix('compilacion/usuario-contactanos.js') }}"></script>
@endsection
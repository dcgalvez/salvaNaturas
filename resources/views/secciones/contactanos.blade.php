@extends('main_view/Standard')
@section('content')
<link rel="stylesheet" href="{{ mix('compilacion/usuario-contactanos.css') }}">
    @include('main_view.navbar')
    <main>
        <div class="PSER-Titulo GB-Flex">
            <div class="PSER-Titulo-1">
                <h1 class="PSER-TextSeccion">CONTACTANOS</h1>
                <hr>
            </div>
        </div>

        <div class="PSER-ND GB-Flex">
            <div class="PSER-ND-2">
                <div class="PSER-ND-2-Container">
                    <div class="row p-5">
                        <form action="" id="contactanos-identificador" class="row">
                            @csrf
                            <div class="col-6">
                                {{-- <label for="" class="PSER-ND-Label">NOMBRE</label>
                                <input type="text" class="form-control PSER-ND-Input">   --}}
                                
                                <label for="contactanos-nombre" class="form-label">NOMBRE</label>
                                <div class="input-group">
                                <span class="input-group-text"><i class="PSER-ND-ColorBTN bi bi-person-fill-check"></i></span>
                                <input type="text" class="form-control ConTKV" id="contactanos-nombre" name="nombre" required>
                                </div>
                                {{-- <div class="form-text" id="basic-addon4">Example help text goes outside the input group.</div> --}}
                            </div>
                            <div class="col-6">
                                <label for="contactanos-apellidos" class="form-label">APELLIDO</label>
                                <div class="input-group">
                                <span class="input-group-text"><i class="PSER-ND-ColorBTN bi bi-person-fill-check"></i></span>
                                <input type="text" class="form-control ConTKV" id="contactanos-apellidos" name="apellido" required>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="contactanos-telefono" class="form-label">TELEFONO</label>
                                <div class="input-group">
                                <span class="input-group-text"><i class="PSER-ND-ColorBTN bi bi-telephone"></i></span>
                                <input type="text" class="form-control ConTKV" id="contactanos-telefono" name="telefono" required>
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <label for="contactanos-email" class="form-label">EMAIL</label>
                                <div class="input-group">
                                <span class="input-group-text"><i class="PSER-ND-ColorBTN bi bi-envelope-at"></i></span>
                                <input type="email" class="form-control ConTKV" id="contactanos-email" name="email" required>
                                </div>
                            </div>
                            {{-- <div class="col-6 mt-4">
                                <label for="contactanos-nombre" class="form-label">SERVICIO</label>
                                <div class="input-group">
                                <span class="input-group-text"><i class="PSER-ND-ColorBTN bi bi-globe-americas"></i></span>
                                <input type="text" class="form-control" id="contactanos-nombre">
                                </div>
                            </div>
                            <div class="col-6 mt-4">
                                <label for="contactanos-nombre" class="form-label">PROYECTO</label>
                                <div class="input-group">
                                <span class="input-group-text"><i class="PSER-ND-ColorBTN bi bi-buildings-fill"></i></span>
                                <input type="text" class="form-control" id="contactanos-nombre">
                                </div>
                            </div> --}}
                            <div class="col-12 mt-4">
                                {{-- <label for="" class="PSER-ND-Label">---</label>
                                <input type="text" class="form-control PSER-ND-Input"> --}}
                                <textarea id="contactanos-mensaje" cols="30" rows="10" class="form-control ConTKV" placeholder="DEJANOS TU COMENTARIO O UN MENSAJE" name="mensaje" required></textarea>
                            </div>

                            <div class="col-12 mt-5 GB-Flex">
                                <button type="submit" class="btn btn-secondary"><i class="bi bi-send-check-fill"></i> ENVIAR</button>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
            {{-- <div class="PSER-ND-1">
  
            </div> --}}
        </div>


        {{-- <div class=" PSSN-Div">
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
                        <textarea class="form-control PSSN-FC-Label" name="" id="" cols="30" rows="7" placeholder="MENSAJE..."></textarea>
                    </div>
                    <div class="mt-4 col-12 GB-Flex">
                        <button class="btn btn-secondary"><i class="fa fa-paper-plane-o" aria-hidden="true"></i> ENVIAR</button>
                    </div>
                </div>
            </div>
        </div> --}}


    </main>
    @include('main_view.endCard')

<script src="{{ mix('compilacion/usuario-contactanos.js') }}"></script>
<script>
    const urlEnviarContacto = '{{ route('contactanos.enviar') }}'
</script>
@endsection
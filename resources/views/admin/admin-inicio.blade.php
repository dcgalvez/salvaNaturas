@extends('main_view\Standard-Admin')
@php $version = 'v.1'; @endphp
    
@section('content')

<link rel="stylesheet" href="{{ mix('compilacion/seccion-administrador.css') }}">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>

{{--------------| Administrador Inicio: AI  --}}
<main class="AI-Container">
 
    {{-- Barra de Administrador --}}
    <div class="AI-Barra GB-Flex">
        <div class="GB-Flex" style="width: 16%">
            <p class="AI-Fuente">SalvaNatura</p>
        </div>
        <div class="GB-Flex" style="width: 70%">
        </div>
        <div class="GB-Flex" style="width: 15%">
            <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </div>

    {{-- Opciones de Contenidos --}}
    <div class="AI-GS AI-Border">
        <div class="AI-Gestor GB-Flex AI-Border">
            <p class="AI-Gestor-Title">GESTOR DE CONTENIDOS</p>
        </div>
        <div class="AI-Secciones GB-Flex AI-Border">
            <div class="AI-SeccionesSty GB-Flex" id="AM-Seccion-General">GENERAL</div>
            <div class="AI-SeccionesSty GB-Flex" id="AM-Seccion-Inicio">INICIO</div>
            <div class="AI-SeccionesSty GB-Flex" id="AM-Seccion-Servicios">SERVICIOS</div>
            <div class="AI-SeccionesSty GB-Flex" id="AM-Seccion-Programas">PROGRAMAS</div>
            <div class="AI-SeccionesSty GB-Flex" id="AM-Seccion-Contactos">CONTACTOS</div>
        </div>
    </div>

    {{-- Opciones de Contenidos | Contenido --}}
    <div class="AI-Contenido">
        <div class="AI-CC d-none" id="AI-CC-General">
            <div class="AI-GB-T GB-Flex">
                <h1 class="AI-GB-TITULO">CONFIGURACION GENERAL</h1>
            </div>
            @include('admin.contenidos.admin-Inicio')
        </div>
        <div class="AI-CC d-none" id="AI-CC-Inicio">
            <div class="AI-GB-T GB-Flex">
                <h1 class="AI-GB-TITULO">ADMINISTRADOR INICIO</h1>
            </div>
            @include('admin.contenidos.admin-Inicio')
        </div>
        <div class="AI-CC d-none" id="AI-CC-Servicios">
            <div class="AI-GB-T GB-Flex">
                <h1 class="AI-GB-TITULO">ADMINISTRADOR SERVICIOS</h1>
            </div>
            @include('admin.contenidos.admin-Servicios')
        </div>
        <div class="AI-CC d-none" id="AI-CC-Programas">
            <div class="AI-GB-T GB-Flex">
                <h1 class="AI-GB-TITULO">ADMINISTRADOR PROGRAMAS</h1>
            </div>
            @include('admin.contenidos.admin-Programas')
        </div>
        <div class="AI-CC d-none" id="AI-CC-Contactos">
            <div class="AI-GB-T GB-Flex">
                <h1 class="AI-GB-TITULO">ADMINISTRADOR DE CONTACTOS</h1>
            </div>
            @include('admin.contenidos.admin-contactanos')
        </div>
    </div>
</main>

<script src="{{ mix('compilacion/seccion-administrador.js') }}"></script>
<script>
    const rutaInicio = '{{ route('admin.Inicio') }}';

    const rutaPrograma = '{{ route('admin.Programas') }}';
    const rutaPrograma_Add = '{{ route('admin.addProgramas') }}';
    const rutaprograma_Editar = '{{ route('admin.editProgramas') }}';
    const rutaPrograma_Eliminar = '{{ route('admin.deleteProgramas') }}';
    const rutaPrograma_Guardar = '{{ route('admin.guardarInformacion') }}';
    const rutaPrograma_Activo = '{{ route('admin.programasActivos') }}';
    const rutaGet_ContenidoP = '{{ route('admin.programasContenido') }}';
    const rutaPrograma_vistaPrevia = '{{ route('admin.Programas.getContenidos') }}';
    const rutaPrograma_modImagen = '{{ route('admin.programas.modImagen') }}';
    const rutaPrograma_modTexto = '{{ route('admin.programas.modTexto') }}';
    const rutaPrograma_updTexto = '{{ route('admin.programas.updTexto') }}';

    
    const rutaServicios = '{{ route('admin.Servicios') }}';
    const rutaServicios_Add = '{{ route('admin.addServicios') }}';
    const rutaServicios_Editar = '{{ route('admin.editServicio') }}';
    const rutaServicios_Eliminar = '{{ route('admin.deleteServicio') }}';
    const rutaServicios_Activo = '{{ route('admin.ServicioActivos') }}';
    const rutaServicios_Guardar = '{{ route('admin.guardarInfoServicios') }}';
    const rutaGet_ContenidoS = '{{ route('admin.serviciosContenido') }}';
    const rutaServicios_vistaPrevia = '{{ route('admin.getContenidos') }}';
    const rutaServicios_modImagen = '{{ route('admin.servicios.modImagen') }}';
    const rutaServicios_updImagen = '{{ route('admin.servicios.updImagen') }}';
    const rutaServicios_modTexto = '{{ route('admin.servicios.modTexto') }}';
    const rutaServicios_updTexto = '{{ route('admin.servicios.updTexto') }}';
    
    const rutaContactos_Info = '{{ route('admin.Contactos') }}';
    
</script>
    @include('admin.modals.modal-vistaPrevia')
@endsection
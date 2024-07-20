<?php

namespace App\Http\Services;

use App\Models\Contenido;
use App\Models\ImagenesContenido;
use App\Models\Programas;
use App\Models\TextoContenido;
use Illuminate\Support\Facades\DB;

class ClienteServices
{
    // PROGRAMAS QUERYS - CONSULTA

    public function SER_getContenidos() {
        $query = Contenido::select('contenido.id_seccion',
        'contenido.id_programas',
        'contenido.id_imagen_contenido',
        'contenido.id_texto_contenido',
        'pro.programa')
        ->join('programas as pro', 'contenido.id_programas', '=', 'pro.id_programas')
        ->where('id_seccion', '3')
        // ->where('activo', '1')
        ->where('contenido.trash', null)
        ->orderBy('contenido.id_programas', 'ASC')
        ->get();
        return $query;
    }

    public function SER_getContenidosImg($datos) {
        $query = ImagenesContenido::select(
            'id_imagen_contenido',
            'id_tipo_imagen',
            'nombre_original',
            'url_imagen'
        )
        ->where('id_imagen_contenido', $datos)->first();
        return $query;
    }

    public function SER_getContenidosText($datos) {
        $query = TextoContenido::select(
            'texto',
            'id_texto_contenido'
            )
        ->where('id_texto_contenido', $datos)->first();
        return $query;
    }

     // SERVICIOS QUERYS - CONSULTA

     public function SER_getContenidos_Servicios() {
        $query = Contenido::select('contenido.id_seccion',
        'contenido.id_programas',
        'contenido.id_imagen_contenido',
        'contenido.id_texto_contenido',
        'pro.Servicios')
        ->join('programas as pro', 'contenido.id_programas', '=', 'pro.id_programas')
        ->where('id_seccion', '2')
        ->where('contenido.trash', null)
        ->orderBy('contenido.id_programas', 'ASC')
        ->get();
        return $query;
    }


    // NUEVO FORMATO
    
    // QUERYS SERVICIOS
    public function getAllContenidos(){
        $query = Programas::query()
        ->whereNotNull('Servicios')
        ->where('activc', 1)
        ->where('contenido', 1)
        ->get();

        return $query;
    }

    public function SER_getContenidos_ServiciosEspecificos($id) {
        $query = Contenido::select('contenido.id_seccion',
        'contenido.id_programas',
        'contenido.id_imagen_contenido',
        'contenido.id_texto_contenido',
        'pro.Servicios')
        ->join('programas as pro', 'contenido.id_programas', '=', 'pro.id_programas')
        ->where('id_seccion', '2')
        ->where('contenido.id_programas', $id)
        ->where('contenido.trash', null)
        ->orderBy('contenido.id_programas', 'ASC')
        ->get();
        return $query;
    }

    // QUERYS PROGRAMAS
    public function getAllContenidos_Programas(){
        $query = Programas::query()
        ->whereNotNull('programa')
        ->where('activc', 1)
        ->where('contenido', 1)
        ->get();

        return $query;
    }

    public function SER_getContenidos_ProgramasEspecificos($id) {
        $query = Contenido::select('contenido.id_seccion',
        'contenido.id_programas',
        'contenido.id_imagen_contenido',
        'contenido.id_texto_contenido',
        'pro.programa')
        ->join('programas as pro', 'contenido.id_programas', '=', 'pro.id_programas')
        ->where('id_seccion', '3')
        // ->where('activo', '1')
        ->where('contenido.id_programas', $id)
        ->where('contenido.trash', null)
        ->orderBy('contenido.id_programas', 'ASC')
        ->get();
        return $query;
    }
}
<?php

namespace App\Http\Services;

use App\Models\Contactanos;
use App\Models\Contenido;
use App\Models\ImagenesContenido;
use App\Models\Programas;
use App\Models\TextoContenido;
use Illuminate\Support\Facades\DB;

class AdminServices
{
    // ------------------------| CONSULTAS GLOBALES |---------------------------- //

    public function getContenidosImg($datos) {
        $query = ImagenesContenido::select(
            'id_imagen_contenido',
            'id_tipo_imagen',
            'nombre_original',
            'url_imagen'
        )
        ->where('id_imagen_contenido', $datos)->first();
        return $query;
    }

    public function getContenidosText($datos) {
        $query = TextoContenido::select(
            'texto',
            'id_texto_contenido'
            )
        ->where('id_texto_contenido', $datos)->first();
        return $query;
    }

    // ------------------------| CONSULTAS PROGRAMAS |---------------------------- //

    public function getProgramas() {
        $query = Programas::query()->whereNotNull('programa')->get();
        return $query;
    }

    public function getProgramasActivos() {
        $query = Programas::select('id_programas AS codID', 'programa AS valPRO')
        ->whereNotNull('programa')
        // ->where('activc', '1')
        ->where('contenido', '0')
        ->get();
        return $query;
    }

    public function getContenidos_Programas($id) {
        $query = Contenido::select('contenido.id_seccion',
        'contenido.id_programas',
        'contenido.id_imagen_contenido',
        'contenido.id_texto_contenido',
        'pro.programa')
        ->join('programas as pro', 'contenido.id_programas', '=', 'pro.id_programas')
        ->where('id_seccion', '3')
        ->where('contenido.id_programas', $id)
        ->where('contenido.trash', null)
        ->orderBy('contenido.id_programas', 'ASC')
        ->get();
        return $query;
    }

    // ------------------------| INICIO CONSULTAS |---------------------------- //

    public function getInfoInicio() {
        $query = Contenido::select('contenido.id_seccion',
        'contenido.id_programas',
        'contenido.id_imagen_contenido',
        'contenido.id_texto_contenido'
        )
        ->where('id_seccion', 1)
        ->where('activo', 1)
        ->get();

        return $query;
    }

    // ------------------------| SERVICIOS CONSULTAS |---------------------------- //
    
    public function getServicios() {
        $query = Programas::query()->whereNotNull('Servicios')->get();
        return $query;
    }
    
    public function getServiciosActivos() {
        $query = Programas::select('id_programas AS codID', 'Servicios AS valPRO')
        ->whereNotNull('Servicios')
        // ->where('activc', '1')
        ->where('contenido', '0')
        ->get();
        return $query;
    }

    public function getContenidos_Servicios($id) {
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
    
    // ------------------------| SERVICIOS SAVE |---------------------------- //
    
    public function nuevoServicio($programa) {
        $fillData = [
            "programa" => null,
            "Servicios" => $programa,
            "activc" => 1,
            'contenido' => 0
        ];
        $model = new Programas();
        $model->fill($fillData);
        $model->save();
        return $model;
    }

    public function Contenidos_AgregarTexto($datos) {
        $fillData = [
            'id_tipo_texto' => 1,
            'texto' => $datos['texto'],
            'activo' => 1
        ];
        
        $model = new TextoContenido();
        $model->fill($fillData);
        $model->save();

        return $model;
    }

    public function ContenidoGeneral($datos) {
        $fillData = [
            'id_seccion' => $datos['seccion'],
            'id_programas' => $datos['programas'],
            'id_imagen_contenido' => $datos['imagen'] ? $datos['imagen'] : null,
            'id_texto_contenido' => $datos['texto'] ? $datos['texto'] : null,
            'activo' => 1,
        ];
        
        $model = new Contenido();
        $model->fill($fillData);
        $model->save();

        return $model;
    }

    public function Contenido_AgregarImagen($datos) {
        $fillData = [
            'id_tipo_imagen' => $datos['id_tipo_imagen'],
            'nombre_original' => $datos['nombreO'],
            'nombre_modificado' => $datos['nombreM'],
            'url_imagen' => $datos['url'],
            'activo' => 1,
        ];
        
        $model = new ImagenesContenido();
        $model->fill($fillData);
        $model->save();

        return $model;
    }
    
    // ------------------------| SERVICIOS UPDATE |---------------------------- //
    
    public function editPrograma_Servicios(array $datos) {
        // dd($datos, $datos['idPrograma']);
        $query = Programas::query()->where('id_programas', $datos['idPrograma'])
        ->update(['Servicios' => $datos['nombrePrograma'], 'activc' => $datos['estadoPrograma']]);
        
        return $query;
    }

    public function ActualizarProgramas($datos) {
        $query = Programas::where('id_programas', $datos)
        ->update(['contenido' => 1]);
    }

    public function UpdateImagenes_Servicios($datos) {
        $query = ImagenesContenido::query()->where('id_imagen_contenido', $datos['id'])
        ->update(['nombre_original' => $datos["nombreO"],
                  'nombre_modificado' => $datos["nombreM"],
                  'url_imagen' => $datos["url"]]);

        return $query;
    }

    public function UpdateTexto_Servicios($datos) {
        $query = TextoContenido::query()->where('id_texto_contenido', $datos['id'])
        ->update(['texto' => $datos['texto']]);

        return $query;
    }

    // ------------------------| SERVICIOS DELETE |---------------------------- //

    public function deleteServicios(array $datos) {
        // dd($datos, $datos['programas']);
        $query = Programas::query()->where('id_programas', $datos['programas'])->first();
        $query->delete();
        return $query;
    }

    // ------------------------| CONTACTANOS INICIO |---------------------------- //
    
    public function getContactanos() {
        $query = Contactanos::all();
        return $query;
    }

    // ------------------------| CONTACTANOS INICIO |---------------------------- //

}
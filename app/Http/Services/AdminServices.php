<?php

namespace App\Http\Services;

use App\Models\Contenido;
use App\Models\ImagenesContenido;
use App\Models\Programas;
use App\Models\TextoContenido;
use Illuminate\Support\Facades\DB;

class AdminServices
{

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
        ->where('activc', '1')
        ->where('contenido', '0')
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

    // ------------------------| SERVICIOS DELETE |---------------------------- //

    public function deleteServicios(array $datos) {
        // dd($datos, $datos['programas']);
        $query = Programas::query()->where('id_programas', $datos['programas'])->first();
        $query->delete();
        return $query;
    }
}
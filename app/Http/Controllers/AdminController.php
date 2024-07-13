<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\pais;
use stdClass;

use App\Models\Programas;
use Illuminate\Support\Collection;
use Laravel\Prompts\Progress;
use PHPUnit\TestRunner\TestResult\Collector;
use Throwable;

class AdminController extends Controller
{
    public function getInfoProgramas() {
        $query = $this->SER_getProgramas();
        $query = $this->formatProgramas($query);
        return $this->responseSuccess($query, "", 200);

    }

    public function saveProgramas(Request $request) {
        $query_savePrograma = $this->SER_nuevoPrograma($request->programa);
        if($query_savePrograma) {
            return $this->getInfoProgramas();
        } else {
            return $this->responseError("", 404);
        }
    }

    public function editProgramas(Request $request) {
        // dd($request->all());
        $query_savePrograma = $this->SER_editPrograma($request->all());
        if($query_savePrograma) {
            return $this->getInfoProgramas();
        } else {
            return $this->responseError("", 404);
        }
    }

    public function deleteProgramas(Request $request) {
        // dd($request->all());
        $query_deletePrograma = $this->SER_deletePrograma($request->all());
        if($query_deletePrograma){
            return $this->getInfoProgramas();
        } else {
            return $this->responseError("",404);
        }
    }

    public function saveNuevoContenido(Request $request) {
        // dd('Si LLego, Si funciona al Contenido', $request->all(),$request->hasFile('imagen1'));

        try {
            for ($i = 1; $i < 5; $i++) {
                // echo "El valor de i es: " . $i . "<br>";
                if ($request->hasFile('archivo'.$i)) {
                    $pdfFile = $request->file('archivo'.$i);
                    $pdfOriginalName = $pdfFile->getClientOriginalName();
                    $pdfFilename = time() . '_' . $pdfOriginalName;
                    $url = "CarpetaPruebas/{$pdfFilename}"; 
                    $guardarArchivo = Storage::disk('SalvaNaturaFTP2')->put($url, file_get_contents($pdfFile));
                }
            }
  
            return $this->responseSuccess([], "Contenido Agregado con exito", 200);    
        } catch(Throwable $e) {
            return $this->responseError($e . "Error en la subida",404);
        }


        // dd('Si LLego, Si funciona', $request->all());
    }




    // PASAR A UN SERVICES

    public function SER_getProgramasActivos() {
        $query = Programas::select('id_programas AS codID', 'programa AS valPRO')
        ->whereNotNull('programa')
        ->where('activc', '1')
        ->get();
        return $query;
    }

    public function SER_getProgramas() {
        $query = Programas::query()->whereNotNull('programa')->get();
        return $query;
    }

    public function SER_nuevoPrograma($programa) {
        $fillData = [
            "programa" => $programa,
            "Servicios" => null,
            "activc" => 1,
            // 'fecha_creacion' => date('d-m-Y H:i:s'),
            // 'fecha_actualizacion' => date('d-m-Y H:i:s'),
        ];
        $model = new Programas();
        $model->fill($fillData);
        // dd($model);
        $model->save();
        return $model;
    }

    public function SER_editPrograma(array $datos) {
        // dd($datos, $datos['idPrograma']);
        $query = Programas::query()->where('id_programas', $datos['idPrograma'])
        ->update(['programa' => $datos['nombrePrograma'], 'activc' => $datos['estadoPrograma']]);

        return $query;
    }

    public function SER_deletePrograma(array $datos) {
        // dd($datos, $datos['programas']);
        $query = Programas::query()->where('id_programas', $datos['programas'])->first();
        $query->delete();
        return $query;
    }

    // PASAR A UN REPOSITORY

    public function responseSuccess($datos, $mensaje, $code) {
        $respuesta = new stdClass();
        $respuesta->data = $datos;
        $respuesta->mensaje = $mensaje;
        $respuesta->code = $code;
        // $respuesta = [
        //     "data" => $datos,
        //     "mensaje" => $mensaje,
        //     "code" => $code
        // ];
        return $respuesta;
    }

    public function responseError($mensaje, $code) {
        // $respuesta = [
        //     "mensaje" => $mensaje,
        //     "code" => $code
        // ];
        $respuesta = new stdClass();
        $respuesta->mensaje = $mensaje;
        $respuesta->code = $code;
        return $respuesta;
    }

    public function formatProgramas(Collection $data) {
        $formated = [];
        foreach ($data as $datos) {
            $format = new stdClass();
            $format->Pro_ID = $datos->id_programas;
            $format->Pro_Programa = $datos->programa;
            $format->Pro_Estado = $datos->activc;
            $formated[] = $format;
        }

        return $formated;
    }
}
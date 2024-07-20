<?php

namespace app\Http\Repositories;

use App\Models\Programas;
use Illuminate\Support\Facades\DB;
use stdClass;

class ClienteRepository
{
    public function responseSuccess($datos, $mensaje, $code) {
        $respuesta = new stdClass();
        $respuesta->data = $datos;
        $respuesta->mensaje = $mensaje;
        $respuesta->code = $code;
        return $respuesta;
    }

    public function responseError($mensaje, $code) {
        $respuesta = new stdClass();
        $respuesta->mensaje = $mensaje;
        $respuesta->code = $code;
        return $respuesta;
    }

    public function formatporID($mapData) {
        $mapDataCombinado = [];

        foreach ($mapData as $mapa) {
            $codigo = $mapa->id_programas;
            if (!isset($mapDataCombinado[$codigo])) {
                $mapDataCombinado[$codigo] = new \stdClass();
                foreach ($mapa->getAttributes() as $campo => $valor) {
                    $mapDataCombinado[$codigo]->$campo = $valor;
                }
            } else {
                foreach ($mapa->getAttributes() as $campo => $valor) {
                    if (isset($mapDataCombinado[$codigo]->$campo)) {
                        if ($mapDataCombinado[$codigo]->$campo !== $valor) {
                            if (is_array($mapDataCombinado[$codigo]->$campo)) {
                                if (!in_array($valor, $mapDataCombinado[$codigo]->$campo)) {
                                    $mapDataCombinado[$codigo]->$campo[] = $valor;
                                }
                            } else {
                                $mapDataCombinado[$codigo]->$campo = [$mapDataCombinado[$codigo]->$campo, $valor];
                            }
                        }
                    } else {
                        $mapDataCombinado[$codigo]->$campo = $valor;
                    }
                }
            }
        }
        return $mapDataCombinado;
    }

    public function formatAllServicios($programa) {
        // dd($programa);
        $formated = [];
        foreach ($programa as $progra) {
            $format = new stdClass();
            $format->S_IDServicio = $progra->id_programas;
            $format->S_Servicio = $progra->Servicios;
            $formated[] = $format;
        }
        return $formated;
    }

    public function formatAllProgramas($programa) {
        // dd($programa);
        $formated = [];
        foreach ($programa as $progra) {
            $format = new stdClass();
            $format->S_IDServicio = $progra->id_programas;
            $format->S_Servicio = $progra->programa;
            $formated[] = $format;
        }
        return $formated;
    }
}
// CTDL
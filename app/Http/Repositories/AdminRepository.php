<?php

namespace app\Http\Repositories;

use Illuminate\Support\Facades\DB;
use stdClass;
use Illuminate\Support\Collection;
use PHPUnit\TestRunner\TestResult\Collector;

class AdminRepository
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

    // -------------------------| SERVICIOS FORMATS |------------------------ // 
    
    public function formatServicios(Collection $data) {
        $formated = [];
        foreach ($data as $datos) {
            $format = new stdClass();
            $format->Ser_ID = $datos->id_programas;
            $format->Ser_Programa = $datos->Servicios;
            $format->Ser_Estado = $datos->activc;
            $formated[] = $format;
        }

        return $formated;
    }

    // -------------------------| PROGRAMAS FORMATS |------------------------ // 
    
    
    // -------------------------| GLOBAL FORMATS |------------------------ // 

    public function formartAdminOp2(Collection $datos) {
        $formated = [];
        foreach ($datos as $info) {
            // dd($info);
            $format = new stdClass();
            $format->Tipo = $info->programa ? "Programa" : "Servicios";
            $format->Tipo_ID = $info->id_programas;
            $format->Nombre = $info->programa ? $info->programa : $info->Servicios;
            $format->Estado_ID = $info->activc;
            $format->Estado_Texto = $info->activc == 1 ? "Activo" : "Inactivo";
            $format->Contenido_ID = $info->contenido;
            $format->Contenido_Texto = $info->contenido == 1 ? "Con Contenido" : "Sin Contenido";
            $formated[] = $format;
        }
        return $formated;
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
}
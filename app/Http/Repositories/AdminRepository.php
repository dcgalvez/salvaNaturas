<?php

namespace app\Http\Repositories;

use Illuminate\Support\Facades\DB;
use stdClass;
use Illuminate\Support\Collection;


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
}
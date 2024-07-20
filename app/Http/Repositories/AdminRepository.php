<?php

namespace app\Http\Repositories;

use Illuminate\Support\Facades\DB;
use stdClass;

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
}
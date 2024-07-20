<?php

namespace App\Http\Controllers;

use App\Models\ImagenesContenido;
use App\Models\TipoImagenContenido;
use App\Models\Contenido;
use App\Models\TextoContenido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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
            DB::connection("mysql")->beginTransaction();

            $queryTexto = $this->SER_Contenido_AgregarTexto(["texto" => $request->input('ADP_TUP_texto1')]);
            if($queryTexto) {
                $queryContenido = $this->SER_ContenidoGeneral(["seccion" => 3,
                                                                "programas" => $request->input('ADP_Programa'),
                                                                "imagen" => "",
                                                                "texto" => $queryTexto->id_texto_contenido,
                                                            ]);
            }

            $tiempo_actual = microtime(true);
            $hora_exacta = date("Y-m-d H:i:s.", $tiempo_actual) . substr((string)$tiempo_actual, 11, 3);

            for ($i = 1; $i < 5; $i++) {
                // echo "El valor de i es: " . $i . "<br>";
                if ($request->hasFile('archivo'.$i)) {
                    $pdfFile = $request->file('archivo'.$i);
                    $pdfOriginalName = $pdfFile->getClientOriginalName();
                    $pdfFilename = $hora_exacta . ' - ' . $pdfOriginalName;
                    $url = "Programas/{$pdfFilename}"; 
                    $guardarArchivo = Storage::disk('SalvaNaturaFTP2')->put($url, file_get_contents($pdfFile));
                    if ($guardarArchivo) {
                        $queryImagen = $this->SER_Contenido_AgregarImagen(["id_tipo_imagen" => $i,
                                                                        "nombreO" => $pdfOriginalName,
                                                                        "nombreM" => $pdfFilename,
                                                                        "url" => $url]);
                        if ($queryImagen) {
                            $queryContenido = $this->SER_ContenidoGeneral(["seccion" => 3,
                                                                              "programas" => $request->input('ADP_Programa'),
                                                                              "imagen" => $queryImagen->id_imagen_contenido,
                                                                              "texto" => "",
                                                                            ]);
                        }
                    }
                }
            }

            $queryActualizarPrograma = $this->SER_ActualizarProgramas($request->input('ADP_Programa'));
            
            DB::connection("mysql")->commit(); 
            return $this->responseSuccess([], "Contenido Agregado con exito", 200);    
        } catch(Throwable $e) {
            DB::connection("mysql")->rollBack();
            return $this->responseError("Error en la subida",404);
        }


        // dd('Si LLego, Si funciona', $request->all());
    }

    public function obtenerContenidos_Programas() {
        try {
            $recopilacion = [];
            $query = $this->SER_getContenidos();
            foreach ($query as $consulta) {
                if ($consulta->id_imagen_contenido) {
                    $queryExtra = $this->SER_getContenidosImg($consulta->id_imagen_contenido);
                    // dd($queryExtra);
                    $consulta->Con_TipoContenido = 'IMAGEN';
                    $consulta->Con_ID_Imagen = $queryExtra->id_imagen_contenido;
                    $consulta->Con_Imagen_Nombre = $queryExtra->nombre_original;
                    $consulta->Con_Imagen_Posicion = $queryExtra->id_tipo_imagen;
                    $consulta->Con_Imagen_URL = $queryExtra->url_imagen;

                    if (Storage::disk('SalvaNaturaFTP2')->exists($queryExtra->url_imagen)) {
                        $contents = Storage::disk('SalvaNaturaFTP2')->get($queryExtra->url_imagen);
                        $mimeType = Storage::disk('SalvaNaturaFTP2')->mimeType($queryExtra->url_imagen);
                        // return response($contents)->header('Content-Type', $mimeType);
                        // $consulta->Con_ImagenServer = base64_encode($contents);

                        $file = base64_encode($contents);
                        $imagen = 'data:' . $mimeType . ';base64,' . $file;
                        $consulta->Con_ImagenServer = $imagen;
                    }
                } else if ($consulta->id_texto_contenido) {
                    $queryExtra = $this->SER_getContenidosText($consulta->id_texto_contenido); 
                    // dd($queryExtra);
                    $consulta->Con_TipoContenido = 'TEXTO';
                    $consulta->Con_ID_Texto = $queryExtra->id_texto_contenido;
                    $consulta->Con_Texto = $queryExtra->texto;
    
                }

                $recopilacion[] = $consulta;
            } 

            // $agrupados = [];
            // foreach ($recopilacion as $contenido) {
            //     $id_programas = $contenido['id_programas'];
            //     if (!isset($agrupados[$id_programas])) {
            //         $agrupados[$id_programas] = [];
            //     }
            //     $agrupados[$id_programas][] = $contenido;
            // }

            // dd('agrupados', $agrupados);
            
            // dd($recopilacion);
            $recopilacion = $this->formatporID($recopilacion);
            // dd($recopilacion);
    
            // dd('La recopilacion', $recopilacion);
            // return $recopilacion;
            return $this->responseSuccess($recopilacion, "Contenido Agregado con exito", 200);    
        } catch (Throwable $e) {
            return $this->responseError($e . "Error en la consulta", 404); 
        }

    }


    public function getImagenesServer($url) {
        $query = $this->getImagenConsultaShow($url);
        if (Storage::disk('SalvaNaturaFTP2')->exists($query->url_imagen)) {
            $contents = Storage::disk('SalvaNaturaFTP2')->get($query->url_imagen);
            $mimeType = Storage::disk('SalvaNaturaFTP2')->mimeType($query->url_imagen);
            return response($contents)->header('Content-Type', $mimeType);
        }
    }



    // PASAR A UN SERVICES

    public function SER_getProgramasActivos() {
        $query = Programas::select('id_programas AS codID', 'programa AS valPRO')
        ->whereNotNull('programa')
        ->where('activc', '1')
        ->where('contenido', '0')
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

    // .............................. Contenido de programas

    public function SER_Contenido_AgregarImagen($datos) {
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
        // app\Models\ImagenesContenido.php
    }

        public function SER_Contenido_AgregarTexto($datos) {
        $fillData = [
            'id_tipo_texto' => 1,
            'texto' => $datos['texto'],
            'activo' => 1
        ];
        
        $model = new TextoContenido();
        $model->fill($fillData);
        $model->save();

        return $model;
        // app\Models\ImagenesContenido.php
    }

    public function SER_ActualizarProgramas($datos) {
        $query = Programas::where('id_programas', $datos)
        ->update(['contenido' => 1]);
    }

    public function SER_ContenidoGeneral($datos) {
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
        // app\Models\ImagenesContenido.php
    }

    public function getImagenConsultaShow($id) {
        $query = ImagenesContenido::where('id_imagen_contenido', $id)->first();
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

    public function formatContenido($datos) {
        // $format = new stdClass();
        $format["Con_ID_Programa"] = $datos->id_programas;
        $format["Con_programa"] = $datos->programa;
        $format["Con_Seccion"] = $datos->id_seccion;
        return $format;
    }

    public function formatporID($mapData) {

        $mapDataCombinado = [];

        foreach ($mapData as $mapa) {
            $codigo = $mapa->id_programas;
            if (!isset($mapDataCombinado[$codigo])) {
                // Inicializa un nuevo objeto con el primer registro encontrado
                $mapDataCombinado[$codigo] = new \stdClass();
                foreach ($mapa->getAttributes() as $campo => $valor) {
                    $mapDataCombinado[$codigo]->$campo = $valor;
                }
            } else {
                // Combina los valores de los campos
                foreach ($mapa->getAttributes() as $campo => $valor) {
                    if (isset($mapDataCombinado[$codigo]->$campo)) {
                        if ($mapDataCombinado[$codigo]->$campo !== $valor) {
                            // Si el valor ya es un array, añade el nuevo valor
                            if (is_array($mapDataCombinado[$codigo]->$campo)) {
                                if (!in_array($valor, $mapDataCombinado[$codigo]->$campo)) {
                                    $mapDataCombinado[$codigo]->$campo[] = $valor;
                                }
                            } else {
                                // Si no es un array, convierte el campo a un array y añade ambos valores
                                $mapDataCombinado[$codigo]->$campo = [$mapDataCombinado[$codigo]->$campo, $valor];
                            }
                        }
                    } else {
                        $mapDataCombinado[$codigo]->$campo = $valor;
                    }
                }
            }
        }
    
        // dd('mapDataCombinado Version 2', $mapDataCombinado);

        return $mapDataCombinado;
        // // dd($mapData);

        // $mapDataCombinado = [];

        //     foreach ($mapData as $mapa) {

        //         $codigo = $mapa->id_programas;
        //         if (isset($mapDataCombinado[$codigo])) {
        //             foreach ($mapa as $campo => $valor) {
        //                 if (!isset($mapDataCombinado[$codigo]->$campo) || $mapDataCombinado[$codigo]->$campo === $valor) {
        //                     $mapDataCombinado[$codigo]->$campo = $valor;
        //                 } else {
        //                     if (!is_array($mapDataCombinado[$codigo]->$campo)) {
        //                         $mapDataCombinado[$codigo]->$campo = [$mapDataCombinado[$codigo]->$campo];
        //                     }
        //                     $mapDataCombinado[$codigo]->$campo[] = $valor;
        //                 }

        //             }
        //         } else {
        //             $mapDataCombinado[$codigo] = clone $mapa;
        //         }
        //     }

        // dd('mapDataCombinado', $mapDataCombinado);

    }
}
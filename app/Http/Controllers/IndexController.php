<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\pais;
use stdClass;

use Illuminate\Support\Facades\Storage;
use Throwable;

use App\Http\Repositories\ClienteRepository;
use App\Http\Services\ClienteServices;
use App\Models\ImagenesContenido;

class IndexController extends Controller
{
    private $clienteRepository;
    private $clienteServices;

    public function __construct(ClienteRepository $clienteRepository, ClienteServices $clienteServices) {
        $this->clienteRepository = $clienteRepository;
        $this->clienteServices = $clienteServices;
    }

    public function index()
    {
        return view('welcome');
    }

    public function infoHome(Request $request) {
        return 'Dago';
       $query = DB::connection('mysql')->select('CALL consulta_contenido_home');
      // dd($query);
        return $query;
    }

    public function NoticiasProcedure(Request $request) {
        $query = DB::connection('mysql')->select('CALL consulta_contenido_home(NULL, NULL)');
       // dd($query);
          return $query;
     }

    public function getRoutes() 
    {
        $route = new stdClass();
        $route->infoH = route('infoHome');

        return $route;
    }

    public function tooServicios() {
        // dd('En tiempo real');
        return view('secciones.servicios');
    }

    public function tooProgramas() {
        // dd('En tiempo real');
        return view('secciones.programas');
    }

    public function tooContactanos() {
        // dd('En tiempo real');
        return view('secciones.contactanos');
    }

    public function contactanosSave(Request $request) {
        // dd('Si llego', $request->all());
        try {
            $query = $this->clienteServices->guardarContactanos($request->all());
            if ($query) {
                return $this->clienteRepository->responseSuccess([], "Contacto con exito", 200);    
            }
        } catch (Throwable $e) {
            return $this->clienteRepository->responseError($e . "Error en la consulta", 404); 
        }
        // dd("Exacto", $query);
    }

    public function obtenerContenidos_ProgramasEspecificos(Request $request) {
        $query = $this->clienteServices->getAllContenidos_Programas();
        $query = $this->clienteRepository->formatAllProgramas($query);

        return $this->clienteRepository->responseSuccess($query, "", 200);    
    }

    public function obtenerContenidos_ProgramasEspe(Request $request) {
        try {
            // dd($request->id);
            $recopilacion = [];
            $query = $this->clienteServices->SER_getContenidos_ProgramasEspecificos($request->id);
            // dd($query);
            foreach ($query as $consulta) {
                if ($consulta->id_imagen_contenido) {
                    $queryExtra = $this->clienteServices->SER_getContenidosImg($consulta->id_imagen_contenido);
                    // dd($queryExtra);
                    $consulta->Con_TipoContenido = 'IMAGEN';
                    $consulta->Con_ID_Imagen = $queryExtra->id_imagen_contenido;
                    $consulta->Con_Imagen_Nombre = $queryExtra->nombre_original;
                    $consulta->Con_Imagen_Posicion = $queryExtra->id_tipo_imagen;
                    $consulta->Con_Imagen_URL = $queryExtra->url_imagen;
    
                    if (Storage::disk('s3')->exists($queryExtra->url_imagen)) {
                        $contents = Storage::disk('s3')->get($queryExtra->url_imagen);
                        $mimeType = Storage::disk('s3')->mimeType($queryExtra->url_imagen);
                        // return response($contents)->header('Content-Type', $mimeType);
                        // $consulta->Con_ImagenServer = base64_encode($contents);
    
                        $file = base64_encode($contents);
                        $imagen = 'data:' . $mimeType . ';base64,' . $file;
                        $consulta->Con_ImagenServer = $imagen;
                    }
                } else if ($consulta->id_texto_contenido) {
                    $queryExtra = $this->clienteServices->SER_getContenidosText($consulta->id_texto_contenido); 
                    // dd($queryExtra);
                    $consulta->Con_TipoContenido = 'TEXTO';
                    $consulta->Con_ID_Texto = $queryExtra->id_texto_contenido;
                    $consulta->Con_Texto = $queryExtra->texto;
    
                }
    
                $recopilacion[] = $consulta;
                // dd('recopilacion', $recopilacion);
            } 
            $recopilacion = $this->clienteRepository->formatporID($recopilacion);
            // dd($)
            return $this->clienteRepository->responseSuccess($recopilacion, "Contenido Agregado con exito", 200);    
        } catch (Throwable $e) {
            return $this->clienteRepository->responseError($e . "Error en la consulta", 404); 
        }
    
    }

    public function obtenerContenidos_Programas(Request $request    ) {
        try {
            $recopilacion = [];
            $query = $this->clienteServices->SER_getContenidos();
            foreach ($query as $consulta) {
                if ($consulta->id_imagen_contenido) {
                    $queryExtra = $this->clienteServices->SER_getContenidosImg($consulta->id_imagen_contenido);
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
                    $queryExtra = $this->clienteServices->SER_getContenidosText($consulta->id_texto_contenido); 
                    // dd($queryExtra);
                    $consulta->Con_TipoContenido = 'TEXTO';
                    $consulta->Con_ID_Texto = $queryExtra->id_texto_contenido;
                    $consulta->Con_Texto = $queryExtra->texto;
    
                }
    
                $recopilacion[] = $consulta;
                // dd('recopilacion', $recopilacion);
            } 
            $recopilacion = $this->clienteRepository->formatporID($recopilacion);
            return $this->clienteRepository->responseSuccess($recopilacion, "Contenido Agregado con exito", 200);    
        } catch (Throwable $e) {
            return $this->clienteRepository->responseError($e . "Error en la consulta", 404); 
        }
    
    }


    public function getServiciosTodos(Request $request) {
        $query = $this->clienteServices->getAllContenidos();
        $query = $this->clienteRepository->formatAllServicios($query);

        return $this->clienteRepository->responseSuccess($query, "", 200);    
    }

    public function obtenerContenidos_ServiciosEspecificos(Request $request) {
        try {
            // dd($request->id);
            $recopilacion = [];
            $query = $this->clienteServices->SER_getContenidos_ServiciosEspecificos(intval($request->id));
            // dd($query);
            foreach ($query as $consulta) {
                if ($consulta->id_imagen_contenido) {
                    $queryExtra = $this->clienteServices->SER_getContenidosImg($consulta->id_imagen_contenido);
                    // dd($queryExtra);
                    $consulta->Con_TipoContenido = 'IMAGEN';
                    $consulta->Con_ID_Imagen = $queryExtra->id_imagen_contenido;
                    $consulta->Con_Imagen_Nombre = $queryExtra->nombre_original;
                    $consulta->Con_Imagen_Posicion = $queryExtra->id_tipo_imagen;
                    $consulta->Con_Imagen_URL = $queryExtra->url_imagen;

    
                    if (Storage::disk('s3')->exists($queryExtra->url_imagen)) {
                        $contents = Storage::disk('s3')->get($queryExtra->url_imagen);
                        $mimeType = Storage::disk('s3')->mimeType($queryExtra->url_imagen);
                        // return response($contents)->header('Content-Type', $mimeType);
                        // $consulta->Con_ImagenServer = base64_encode($contents);
    
                        $file = base64_encode($contents);
                        $imagen = 'data:' . $mimeType . ';base64,' . $file;
                        $consulta->Con_ImagenServer = $imagen;
                    }
                    
                        // $consulta->Con_ImagenServer = $this->getImagePortada($queryExtra->url_imagen);
                } else if ($consulta->id_texto_contenido) {
                    $queryExtra = $this->clienteServices->SER_getContenidosText($consulta->id_texto_contenido); 
                    // dd($queryExtra);
                    $consulta->Con_TipoContenido = 'TEXTO';
                    $consulta->Con_ID_Texto = $queryExtra->id_texto_contenido;
                    $consulta->Con_Texto = $queryExtra->texto;
    
                }
    
                $recopilacion[] = $consulta;
                // dd('recopilacion', $recopilacion);
            } 
            $recopilacion = $this->clienteRepository->formatporID($recopilacion);
            // dd($recopilacion)
            return $this->clienteRepository->responseSuccess($recopilacion, "Contenido Agregado con exito", 200);    
        } catch (Throwable $e) {
            return $this->clienteRepository->responseError($e . "Error en la consulta", 404); 
        }
    
    }

    // public function getImagePortada($id)
    // {
    //     // dd($id);
    //     $query = ImagenesContenido::where('id_imagen_contenido', $id)->first();
    //     // dd($query);
    //     if (Storage::disk('SalvaNaturaFTP2')->exists($query->url_imagen)) {
    //         $contents = Storage::disk('SalvaNaturaFTP2')->get($query->url_imagen);
    //         $mimeType = Storage::disk('SalvaNaturaFTP2')->mimeType($query->url_imagen);
    //         // $file = base64_encode($contents);
    //         // $imagen = 'data:' . $mimeType . ';base64,' . $file;
    //         return response($contents)->header('Content-Type', $mimeType);
    //     }
    //     // dd($imagen);
    //     // return $imagen;
    // }   

    // public function getImagePortada(int $id)
    // {
    //     // Retrieve the image record by id
    //     $query = ImagenesContenido::find($id);

    //     if (!$query) {
    //         return response()->json(['error' => 'Image not found'], 404);
    //     }

    //     $imagePath = $query->url_imagen;

    //     // Check if the image exists in the storage
    //     if (Storage::disk('SalvaNaturaFTP2')->exists($imagePath)) {
    //         $contents = Storage::disk('SalvaNaturaFTP2')->get($imagePath);
    //         $mimeType = Storage::disk('SalvaNaturaFTP2')->mimeType($imagePath);

    //         return response($contents)->header('Content-Type', $mimeType);
    //     } else {
    //         return response()->json(['error' => 'Image file not found in storage'], 404);
    //     }
    // }


    public function obtenerContenidos_Servicios(Request $request) {
        try {
            $recopilacion = [];
            $query = $this->clienteServices->SER_getContenidos_Servicios();
            foreach ($query as $consulta) {
                if ($consulta->id_imagen_contenido) {
                    $queryExtra = $this->clienteServices->SER_getContenidosImg($consulta->id_imagen_contenido);
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
                    $queryExtra = $this->clienteServices->SER_getContenidosText($consulta->id_texto_contenido); 
                    // dd($queryExtra);
                    $consulta->Con_TipoContenido = 'TEXTO';
                    $consulta->Con_ID_Texto = $queryExtra->id_texto_contenido;
                    $consulta->Con_Texto = $queryExtra->texto;
    
                }
    
                $recopilacion[] = $consulta;
                // dd('recopilacion', $recopilacion);
            } 
            $recopilacion = $this->clienteRepository->formatporID($recopilacion);
            return $this->clienteRepository->responseSuccess($recopilacion, "Contenido Agregado con exito", 200);    
        } catch (Throwable $e) {
            return $this->clienteRepository->responseError($e . "Error en la consulta", 404); 
        }
    
    }
}

<div class="ADSER">

    {{--------------------------|  Menu de Opciones |-------------------------}}
    <div class="ADSER-Menu GBTextCenter">
        <p class="GBL-Titulo4">MENU</p><hr>
        <div class="ADSER-CintaOpciones">
            <div class="ADSER-Opciones ADSER-Opciones1 GB-Flex">
                <div class="ADSER-Op-Texto">ADMINISTRAR SERVICIOS</div>                
            </div>
            <div class="ADSER-Opciones ADSER-Opciones2 GB-Flex">
                <div class="ADSER-Op-Texto">ADMINISTRAR CONTENIDO</div>                
            </div>
            <div class="ADSER-Extras">
                <p class="GBL-Titulo4 mt-5">EXTRAS</p><hr>
                <div class="ADSER-Opciones ADSER-Opciones3 GB-Flex">
                    <div class="ADSER-Op-Texto">NUEVO CONTENIDO</div>                
                </div>
            </div>
        </div>
    </div>

    {{------------------| Contenedor Principal | -------------------}}
    <div class="ADSER-Contenido">

        {{-------------------- | Imagen inicial Fondo| ---------------------}}
        <div class="ADSER-Contenido-Fondo d-none ADSER-ManageContenidos">
        </div>

        {{---------------------| Contenedor Mantenimiento Programas |---------------------}}
        <div class="ADSER-Contenido-Agregar d-none ADSER-ManageContenidos">
        
            {{----------------------| Tabla de Programas | ----------------------}}
            <div class="ADSER-Contenido-Agregar-1 ">
                <div class="GBL-Titulo4"> PROGRAMAS</div><hr>
                <div>
                    <table class="table table-bordered GBL-Radius mt-4">
                        <thead>
                            <tr>
                                <th>PROGRAMA</th>
                                <th>ESTADO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="ADSER-tablaPrograma-Body">
                        </tbody>
                    </table>
                </div>

                <div class=" mt-4">
                    <div><button type="button" class="btn btn-secondary" id="ADSER-AddPrograma">
                        <i class="bi bi-plus-circle"></i> Agregar Programas</button></div>
                </div>
            </div>

            {{---------------------| Agregar programa nuevo | ---------------------}}
            <div class="ADSER-Contenido-Agregar-2 d-none ADSER-ManageContenidos">
                <div class="GB-SpaceB">
                    <div class="GBL-Titulo4"> NUEVO PROGRAMA</div>
                    <div><i class="bi bi-arrow-right-circle-fill bi2x" style="color: green; font-size: 1.5em;"></i></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12"><input type="text" class="form-control" id="ADSER-nombrePrograma" placeholder="Nombre del Programa"></div>
                    <div class="col-12 mt-3">
                        <select name="" id="" class="form-control" readonly>
                            <option value="Activo" selected>Activo</option>
                            <option value="Activo">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4 GB-Flex">
                        <button type="button" class="btn btn-success" id="ADSER-AddPrograma-Peticion"><i class="bi bi-check2"></i> Agregar</button>
                    </div>
                </div>
            </div>

            {{-------------------------| Editar Programa | ----------------------}}
            <div class="ADSER-Contenido-Agregar-3 d-none ADSER-ManageContenidos">
                <div class="GB-SpaceB">
                    <div class="GBL-Titulo4"> EDITAR PROGRAMA</div>
                    <div>
                        <button type="button" class="btn ADSER-BtnEditarPrograma">
                            <i class="bi bi-arrow-right-circle-fill bi2x" style="color: green; font-size: 1.5em;"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <input type="hidden" id="ADSER-idProgramaEdit">
                    <div class="col-12"><input type="text" class="form-control" id="ADSER-nombreProgramaEdit" placeholder="Nombre del Programa"></div>
                    <div class="col-12 mt-3">
                        <select name="" id="ADSER-estadoProgramaEdit" class="form-control" readonly>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4 GB-Flex">
                        <button type="button" class="btn btn-warning" id="ADSER-AddProgramaEdit-Peticion"><i class="bi bi-arrow-repeat"></i> Modificar</button>
                    </div>
                </div>
            </div>

        </div>

                {{---------------------| Lista de Contenidos de Programas | ----------------------}}
        <div class="ADSER-Contenido-Programas d-none ADSER-ManageContenidos">

            {{--------------| Menu Opciones |-------------}}
            <div class="GB-SpaceOther">
                {{-- <button type="button" class="btn btn-outline-success ADSER-AddNewPrograma" style="margin-right: 0.75em;"><i class="bi bi-check-lg"></i> Activos</button>
                <button type="button" class="btn btn-outline-warning ADSER-AddNewPrograma" style="margin-right: 0.75em;"><i class="bi bi-slash-circle"></i> Inactivos</button>
                <button type="button" class="btn btn-outline-primary ADSER-AddNewPrograma" style="margin-right: 0.75em;"><i class="bi bi-folder-plus"></i> Nuevo Contenido</button> --}}
            </div>

            {{-----------------------| Contenidos Container | --------------------}}
            <div class="ADSER-Contenidos-ContMain" id="ADSER-Contenidos-ContMain">
                <div class="row" id="ADSER-ContenidosRow">
                    {{-- <div class="col-6">
                        <div class="GCAD_C ">
                            <div class="GCAD_CUno ">
                                <div class=""><p class="TESTING_GB_ForTitle3">Programas - Progrmas Nombre</p><hr></div>
                                <div class="row">
                                    <div class="col-5"><p class="TESTING_GB_ForText">Estado: Activo</p></div>
                                    <div class="col-5"><p class="TESTING_GB_ForText">Contenido : Si</p></div>
                                    <div class="col-2"></div>
                                </div>
                            </div>
                            <div class="GCAD_CDos ">
                                <input type="button" class="btn btn-outline-primary" value="Imagenes" name="" id="">
                                <input type="button" class="btn btn-outline-primary" value="Texto" name="" id="">
                                <input type="button" class="btn btn-outline-primary" value="Vista Previa" name="" id="">
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="ADPDC-Main GBborderBlack">
                    <div class="ADPDC-Title GBTextCenter">
                    <h1 style="color:#ffcc00;">NOMBRE DEL PROGRAMA</h1>
                    </div>
                    <div class="ADPDC-Img ">
                        <div class="ADPDC-I-1 ADPDC-BB">
                            <img src="/assets/images/AdminWallpaper2.png" style="width: 100%; height: 100%; " alt="">
                        </div>
                        <div class="ADPDC-I-2 ">
                            <div class="ADPDC-I-I-1 ADPDC-BB">
                                <img src="/assets/images/AdminWallpaper2.png" style="width: 100%; height: 100%; " alt="">
                            </div>
                            <div class="ADPDC-I-I-2 ADPDC-BB">
                                <img src="/assets/images/AdminWallpaper2.png" style="width: 100%; height: 100%; " alt="">
                            </div>
                            <div class="ADPDC-I-I-3 ADPDC-BB">
                            <img src="/assets/images/AdminWallpaper2.png" style="width: 100%; height: 100%; " alt="">
                                                        
                            </div>
                        </div>
                    </div>
                    <div class="ADPDC-Text ADPDC-BB p-3">
                        <p style="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div> --}}
            </div>

        </div>

        {{----------------------| Agregar nuevos contenidos |--------------------------}}
        <div class="ADSER-Contenido-NuevoContenido d-none ADSER-ManageContenidos">
            <div class="ADSER-Contenido-NC-0">
                <h1 class="GBL-Titulo4">ESTRUCTURA DE CONTENIDO <hr></h1>
            </div>

            {{-------------------------| Imagen Estructura |------------------------}}
            <div class="ADSER-Contenido-NC-1">
            </div>

            {{-------------------------| Formulario Contenidos |-------------------------}}
            <div class="ADSER-Contenido-NC-2">
                <div class="GBL-Titulo4"> NUEVO CONTENIDO</div><hr>

                <form id="nuevoDocumentoForm_Servicios" action="{{ route('admin.guardarInformacion') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 mt-3">
                            <select class="form-control ADSER-Validate-Data" name="ADSER_Programa" id="ADSER_Programa-Change" data-nombrev="Programa">
                                <option value="">Seleccione un Programa</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <textarea class="form-control ADSER-Validate-Data" name="ADSER_TUP_texto1" id="ADSER_TUP_texto1" cols="30" rows="7" placeholder="Ingrese: Texto 1" data-nombrev="Texto 1"></textarea>
                        </div>
                        
                        <div class="col-12 mt-3"><input type="file" class="form-control-file ADSER-Validate-Data" id="archivoDocumento" name="archivo1" data-nombrev="Imagen 1"></div>
                        <div class="col-12 mt-3"><input type="file" class="form-control-file ADSER-Validate-Data" id="archivoDocumento" name="archivo2" data-nombrev="Imagen 2"></div>
                        <div class="col-12 mt-3"><input type="file" class="form-control-file ADSER-Validate-Data" id="archivoDocumento" name="archivo3" data-nombrev="Imagen 3"></div>
                        <div class="col-12 mt-3"><input type="file" class="form-control-file ADSER-Validate-Data" id="archivoDocumento" name="archivo4" data-nombrev="Imagen 4"></div>                     
                    </div>
                </form>
                <div class="mt-5 GB-Flex">
                    <button type="submit" class="btn btn-outline-dark" form="nuevoDocumentoForm_Servicios"><i class="bi bi-check2"></i> Agregar Contenido</button>
                </div>
                
            </div>
        </div>
    </div>

</div>
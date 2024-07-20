{{-- | administrador Programas: ADP- | --}}
<div class="ADP">

    {{--------------------------|  Menu de Opciones |-------------------------}}
    <div class="ADP-Menu GBTextCenter">
        <p class="GBL-Titulo4">MENU</p><hr>
        <div class="ADP-CintaOpciones">
            <div class="ADP-Opciones ADP-Opciones1 GB-Flex">
                <div class="ADP-Op-Texto">ADMINISTRAR PROGRAMAS</div>                
            </div>
            <div class="ADP-Opciones ADP-Opciones2 GB-Flex">
                <div class="ADP-Op-Texto">ADMINISTRAR CONTENIDO</div>                
            </div>
            <div class="ADP-Extras">
                <p class="GBL-Titulo4 mt-5">EXTRAS</p><hr>
                <div class="ADP-Opciones ADP-Opciones3 GB-Flex">
                    <div class="ADP-Op-Texto">NUEVO CONTENIDO</div>                
                </div>
            </div>
        </div>
    </div>

    {{------------------| Contenedor Principal | -------------------}}
    <div class="ADP-Contenido">

        {{-------------------- | Imagen inicial Fondo| ---------------------}}
        <div class="ADP-Contenido-Fondo d-none ADP-ManageContenidos">
        </div>

        {{---------------------| Contenedor Mantenimiento Programas |---------------------}}
        <div class="ADP-Contenido-Agregar d-none ADP-ManageContenidos">

            {{----------------------| Tabla de Programas | ----------------------}}
            <div class="ADP-Contenido-Agregar-1 ">
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
                        <tbody id="ADP-tablaPrograma-Body">
                        </tbody>
                    </table>
                </div>

                <div class=" mt-4">
                    <div><button type="button" class="btn btn-secondary" id="ADP-AddPrograma">
                        <i class="bi bi-plus-circle"></i> Agregar Programas</button></div>
                </div>
            </div>

            {{---------------------| Agregar programa nuevo | ---------------------}}
            <div class="ADP-Contenido-Agregar-2 d-none ADP-ManageContenidos">
                <div class="GB-SpaceB">
                    <div class="GBL-Titulo4"> NUEVO PROGRAMA</div>
                    <div><i class="bi bi-arrow-right-circle-fill bi2x" style="color: green; font-size: 1.5em;"></i></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12"><input type="text" class="form-control" id="ADP-nombrePrograma" placeholder="Nombre del Programa"></div>
                    <div class="col-12 mt-3">
                        <select name="" id="" class="form-control" readonly>
                            <option value="Activo" selected>Activo</option>
                            <option value="Activo">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4 GB-Flex">
                        <button type="button" class="btn btn-success" id="ADP-AddPrograma-Peticion"><i class="bi bi-check2"></i> Agregar</button>
                    </div>
                </div>
            </div>

            {{-------------------------| Editar Programa | ----------------------}}
            <div class="ADP-Contenido-Agregar-3 d-none ADP-ManageContenidos">
                <div class="GB-SpaceB">
                    <div class="GBL-Titulo4"> EDITAR PROGRAMA</div>
                    <div>
                        <button type="button" class="btn ADP-BtnEditarPrograma">
                            <i class="bi bi-arrow-right-circle-fill bi2x" style="color: green; font-size: 1.5em;"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <input type="hidden" id="ADP-idProgramaEdit">
                    <div class="col-12"><input type="text" class="form-control" id="ADP-nombreProgramaEdit" placeholder="Nombre del Programa"></div>
                    <div class="col-12 mt-3">
                        <select name="" id="ADP-estadoProgramaEdit" class="form-control" readonly>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4 GB-Flex">
                        <button type="button" class="btn btn-warning" id="ADP-AddProgramaEdit-Peticion"><i class="bi bi-arrow-repeat"></i> Modificar</button>
                    </div>
                </div>
            </div>

        </div>

        {{---------------------| Lista de Contenidos de Programas | ----------------------}}
        <div class="ADP-Contenido-Programas d-none ADP-ManageContenidos">

            {{--------------| Menu Opciones |-------------}}
            <div class="GB-SpaceOther">
                <button type="button" class="btn btn-outline-success ADP-AddNewPrograma" style="margin-right: 0.75em;"><i class="bi bi-check-lg"></i> Activos</button>
                <button type="button" class="btn btn-outline-warning ADP-AddNewPrograma" style="margin-right: 0.75em;"><i class="bi bi-slash-circle"></i> Inactivos</button>
                <button type="button" class="btn btn-outline-primary ADP-AddNewPrograma" style="margin-right: 0.75em;"><i class="bi bi-folder-plus"></i> Nuevo Contenido</button>
            </div>

            {{-----------------------| Contenidos Container | --------------------}}
            <div class="ADP-Contenidos-ContMain" id="ADP-Contenidos-ContMain">
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
        <div class="ADP-Contenido-NuevoContenido d-none ADP-ManageContenidos">
            <div class="ADP-Contenido-NC-0">
                <h1 class="GBL-Titulo4">ESTRUCTURA DE CONTENIDO <hr></h1>
            </div>

            {{-------------------------| Imagen Estructura |------------------------}}
            <div class="ADP-Contenido-NC-1">
            </div>

            {{-------------------------| Formulario Contenidos |-------------------------}}
            <div class="ADP-Contenido-NC-2">
                <div class="GBL-Titulo4"> NUEVO PROGRAMA</div><hr>

                <form id="nuevoDocumentoForm" action="{{ route('admin.guardarInformacion') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 mt-3">
                            <select class="form-control ADP-Validate-Data" name="ADP_Programa" id="ADP_Programa-Change" data-nombrev="Programa">
                                <option value="">Seleccione un Programa</option>
                            </select>
                        </div>
                        <div class="col-12 mt-3">
                            <textarea class="form-control ADP-Validate-Data" name="ADP_TUP_texto1" id="ADP_TUP_texto1" cols="30" rows="7" placeholder="Ingrese: Texto 1" data-nombrev="Texto 1"></textarea>
                        </div>
                        
                        <div class="col-12 mt-3"><input type="file" class="form-control-file ADP-Validate-Data" id="archivoDocumento" name="archivo1" data-nombrev="Imagen 1"></div>
                        <div class="col-12 mt-3"><input type="file" class="form-control-file ADP-Validate-Data" id="archivoDocumento" name="archivo2" data-nombrev="Imagen 2"></div>
                        <div class="col-12 mt-3"><input type="file" class="form-control-file ADP-Validate-Data" id="archivoDocumento" name="archivo3" data-nombrev="Imagen 3"></div>
                        <div class="col-12 mt-3"><input type="file" class="form-control-file ADP-Validate-Data" id="archivoDocumento" name="archivo4" data-nombrev="Imagen 4"></div>                     
                    </div>
                </form>
                <div class="mt-5 GB-Flex">
                    <button type="submit" class="btn btn-outline-dark" form="nuevoDocumentoForm"><i class="bi bi-check2"></i> Agregar Contenido</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
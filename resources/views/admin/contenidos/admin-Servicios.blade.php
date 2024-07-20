<div class="ADS">

    {{--------------------------|  Menu de Opciones |-------------------------}}
    <div class="ADS-Menu GBTextCenter">
        <p class="GBL-Titulo4">MENU</p><hr>
        <div class="ADS-CintaOpciones">
            <div class="ADS-Opciones ADS-Opciones1 GB-Flex">
                <div class="ADS-Op-Texto">ADMINISTRAR SERVICIOS</div>                
            </div>
            <div class="ADS-Opciones ADS-Opciones2 GB-Flex">
                <div class="ADS-Op-Texto">ADMINISTRAR CONTENIDO</div>                
            </div>
            <div class="ADS-Extras">
                <p class="GBL-Titulo4 mt-5">EXTRAS</p><hr>
                <div class="ADS-Opciones ADS-Opciones3 GB-Flex">
                    <div class="ADS-Op-Texto">NUEVO CONTENIDO</div>                
                </div>
            </div>
        </div>
    </div>

    {{------------------| Contenedor Principal | -------------------}}
    <div class="ADS-Contenido">

        {{-------------------- | Imagen inicial Fondo| ---------------------}}
        <div class="ADS-Contenido-Fondo d-none ADS-ManageContenidos">
        </div>

        {{---------------------| Contenedor Mantenimiento Programas |---------------------}}
        <div class="ADS-Contenido-Agregar d-none ADS-ManageContenidos">
        
            {{----------------------| Tabla de Programas | ----------------------}}
            <div class="ADS-Contenido-Agregar-1 ">
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
                        <tbody id="ADS-tablaPrograma-Body">
                        </tbody>
                    </table>
                </div>

                <div class=" mt-4">
                    <div><button type="button" class="btn btn-secondary" id="ADS-AddPrograma">
                        <i class="bi bi-plus-circle"></i> Agregar Programas</button></div>
                </div>
            </div>

            {{---------------------| Agregar programa nuevo | ---------------------}}
            <div class="ADS-Contenido-Agregar-2 d-none ADS-ManageContenidos">
                <div class="GB-SpaceB">
                    <div class="GBL-Titulo4"> NUEVO PROGRAMA</div>
                    <div><i class="bi bi-arrow-right-circle-fill bi2x" style="color: green; font-size: 1.5em;"></i></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12"><input type="text" class="form-control" id="ADS-nombrePrograma" placeholder="Nombre del Programa"></div>
                    <div class="col-12 mt-3">
                        <select name="" id="" class="form-control" readonly>
                            <option value="Activo" selected>Activo</option>
                            <option value="Activo">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4 GB-Flex">
                        <button type="button" class="btn btn-success" id="ADS-AddPrograma-Peticion"><i class="bi bi-check2"></i> Agregar</button>
                    </div>
                </div>
            </div>

            {{-------------------------| Editar Programa | ----------------------}}
            <div class="ADS-Contenido-Agregar-3 d-none ADS-ManageContenidos">
                <div class="GB-SpaceB">
                    <div class="GBL-Titulo4"> EDITAR PROGRAMA</div>
                    <div>
                        <button type="button" class="btn ADS-BtnEditarPrograma">
                            <i class="bi bi-arrow-right-circle-fill bi2x" style="color: green; font-size: 1.5em;"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <input type="hidden" id="ADS-idProgramaEdit">
                    <div class="col-12"><input type="text" class="form-control" id="ADS-nombreProgramaEdit" placeholder="Nombre del Programa"></div>
                    <div class="col-12 mt-3">
                        <select name="" id="ADS-estadoProgramaEdit" class="form-control" readonly>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="col-12 mt-4 GB-Flex">
                        <button type="button" class="btn btn-warning" id="ADS-AddProgramaEdit-Peticion"><i class="bi bi-arrow-repeat"></i> Modificar</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
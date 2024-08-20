let helper_catalogos = '';

$(() => {
    // toolsAdmin.cambioVistasAdmin("cambioTodos");
    toolsAdmin.cambioVistasAdmin("cambioGeneral");

    // peticionesAdmin.myOwnPeticion(rutaPrograma, 'GET', {}, 100); 
});

$(document).on('click', '#AM-Seccion-General', async function() {

    toolsAdmin.cambioVistasAdmin("cambioGeneral");
})

$(document).on('click', '#AM-Seccion-Inicio', async function() {
    peticionesAdmin.msgCarga('Cargando...');
    let response = await peticionesAdmin.myOwnPeticion(rutaInicio, 'GET', {}, 'I-1');
    if (response.code == 200) {
        respuestasAdmin.RespuestaOne_Inicio(response);
        peticionesAdmin.msgClose();
    }
    toolsAdmin.cambioVistasAdmin("cambioInicio");
})

$(document).on('click', '#AM-Seccion-Servicios', function() {
    toolsAdmin.cambioVistasAdmin("cambioServicios");
})

$(document).on('click', '#AM-Seccion-Programas',async function() {
    toolsAdmin.cambioVistasAdmin("cambioProgramas");
})

$(document).on('click', '#AM-Seccion-Contactos', async function() {
    peticionesAdmin.msgCarga('Cargando...');
    let response = await peticionesAdmin.myOwnPeticion(rutaContactos_Info, 'GET', {}, '');
    if (response.code == 200) {
        respuestasAdmin.RespuestaOne_Contactanos(response);
        peticionesAdmin.msgClose();
    }
    toolsAdmin.cambioVistasAdmin("cambioRegenera");
})

// -------------------- SECCION DE INICIO ----------------------- //




// -------------------- SECCION DE SERVICIOS 💡 ----------------------- //

// OPCIONES DE MENU LATERAL - SERVICIOS💡 

$(document).on('click', '.ADSER-Opciones', function() {
    $('.ADSER-Opciones').removeClass('ADSER-Opcionesafter');
    $(this).addClass('ADSER-Opcionesafter');
});

$(document).on('click', '.ADSER-Opciones1', async function(e) {
    let response = await peticionesAdmin.myOwnPeticion(rutaServicios, 'GET', {probando: 'probando'}, 'S-1');
    if (response.code == 200) {
        respuestasAdmin.RespuestaOne_Servicios(response);
    }
});

$(document).on('click', '.ADSER-Opciones2', async function(e) {
    // peticionesAdmin.msgCarga('Cargando...');
    let response = await peticionesAdmin.myOwnPeticion(rutaGet_ContenidoS, 'GET', {}, 'S-4');
    if (response.code == 200) {
        respuestasAdmin.RespuestaCuatro_Servicios(response);
    }
    toolsAdmin.cambioVistasAdmin_Servicios('showContenido');
});

$(document).on('click', '#ADSER-AddPrograma', function() {
    toolsAdmin.cambioVistasAdmin_Servicios('showAddPrograma');
});
// .........................................................

// MANTENIMIENTO DE SERVICIOS 💡 ..............................

$(document).on('click', '#ADSER-AddPrograma-Peticion', async function() {
    let programa = $('#ADSER-nombrePrograma').val();
    if(programa) {
        console.log('#', programa);
        console.log(rutaPrograma_Add);
        let response = await peticionesAdmin.myOwnPeticion(rutaServicios_Add, 'POST', {programa: programa}, 'S-1');
        if (response.code == 200) {
            respuestasAdmin.RespuestaOne_Servicios(response);
        }

        Swal.fire({
            title: "Editado Correctamente!",
            // text: "El programa a sido editado.",
            icon: "success"
          });
    } else {
        alert('Agregue el nombre del Programa');
    }
})

$(document).on('click', '.ADSER-Editar-Programas', function() {
    let programaID = $(this).data("id");
    let nombreID = $(this).data("nombre");
    let estadoID = $(this).data("estado");

    console.log(programaID, nombreID, estadoID)
    $('#ADSER-idProgramaEdit').val(programaID).trigger('change');
    $('#ADSER-nombreProgramaEdit').val(nombreID).trigger('change');
    $('#ADSER-estadoProgramaEdit').val(estadoID).trigger('change');

    toolsAdmin.cambioVistasAdmin_Servicios('showEditPrograma');
});

$(document).on('click', '#ADSER-AddProgramaEdit-Peticion',async function() {
    let mainData = {
        idPrograma: $('#ADSER-idProgramaEdit').val(),
        nombrePrograma: $('#ADSER-nombreProgramaEdit').val(),
        estadoPrograma: $('#ADSER-estadoProgramaEdit').val(),
    }

    console.log(mainData);
    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_Editar, 'POST', mainData, 'S-1');
    if (response.code == 200) {
        respuestasAdmin.RespuestaOne_Servicios(response);
    }
    Swal.fire({
        title: "Editado Correctamente!",
        // text: "El programa a sido editado.",
        icon: "success"
      });
});

$(document).on('click', '.ADSER-Delete-Programas', function() {
    Swal.fire({
        title: "Estas Seguro de Eliminarlo?",
        text: "Una vez realizado no se podra revertir!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Confirmar!"
      }).then(async (result) => {
        if (result.isConfirmed) {
            let programaID = $(this).data("id");
            let response = await peticionesAdmin.myOwnPeticion(rutaServicios_Eliminar, 'POST', {programas: programaID}, 'S-1');
            if (response.code == 200) {
                respuestasAdmin.RespuestaOne_Inicio(response)
            }
            Swal.fire({
                title: "Eliminado!",
                text: "El programa a sido eliminado.",
                icon: "success"
              });
        }
      });
})
// ...........................................................

// SECCION PARA NUEVO CONTENIDO (SERVICIOS) 💡 ...................
$(document).on('click', '.ADSER-AddNewPrograma', async function() {
    toolsAdmin.cambioVistasAdmin_Servicios('showNuevoContenido');
    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_Activo, 'GET', {}, 'S-2');
    if (response.code == 200) {
        respuestasAdmin.RespuestaDos_Servicios(response)
    }
})

$(document).on('click', '.ADSER-Opciones3', async function() {
    toolsAdmin.cambioVistasAdmin_Servicios('showNuevoContenido');
    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_Activo, 'GET', {}, 'S-2');
    if (response.code == 200) {
        respuestasAdmin.RespuestaDos_Servicios(response)
    }
})

$("#nuevoDocumentoForm_Servicios").submit(async function (e) {
    console.log('Hizo el submit');
    e.preventDefault();

    const validarCampos = toolsAdmin.validarInputs("ADSER-Validate-Data");

    if (validarCampos.validatorFails) {
        Swal.fire({
        title: 'NECESITA VALIDAR LOS SIGUIENTES CAMPOS.',
        type: 'warning',
        html: `<ul>${validarCampos.msg}</ul>`,
        });
        return false;
    }
    
    var formData = new FormData(this);

    peticionesAdmin.msgCarga('Cargando...');

    let response = await peticionesAdmin.myOwnPeticionDataFTP(rutaServicios_Guardar, 'POST', formData, 'S-3');
    if (response.code == 200) {
        respuestasAdmin.RespuestaTres_Servicios(response);
    }
});
// ..............................................................



// -------------------- SECCION DE PROGRAMAS ⚙️ ----------------------- //

// OPCIONES DE MENU LATERAL
$(document).on('click', '.ADP-Opciones', function() {
    $('.ADP-Opciones').removeClass('ADP-Opcionesafter');
    $(this).addClass('ADP-Opcionesafter');
});

$(document).on('click', '.ADP-Opciones1', async function(e) {
    let response = await peticionesAdmin.myOwnPeticion(rutaPrograma, 'GET', {probando: 'probando'}, 1);
    if (response.code == 200) {
        respuestasAdmin.RespuestaOne(response)
    }
});

$(document).on('click', '#ADP-AddPrograma', function() {
    toolsAdmin.cambioVistasAdmin_Programas('showAddPrograma');
});

$(document).on('click', '.ADP-Opciones2', async function(e) {
    peticionesAdmin.msgCarga('Cargando...');
    let response = await peticionesAdmin.myOwnPeticion(rutaGet_ContenidoP, 'GET', {}, 4);
    if (response.code == 200) {
        respuestasAdmin.RespuestaFour(response)
    }
    toolsAdmin.cambioVistasAdmin_Programas('showContenido');
});
// .........................................................

// MANTENIMIENTO DE PROGRAMAS ⚙️ ..............................

$(document).on('click', '#ADP-AddPrograma-Peticion', async function() {
    let programa = $('#ADP-nombrePrograma').val();
    if(programa) {
        console.log('#', programa);
        console.log(rutaPrograma_Add);
        let response = await peticionesAdmin.myOwnPeticion(rutaPrograma_Add, 'POST', {programa: programa}, 1);
        if (response.code == 200) {
            respuestasAdmin.RespuestaOne(response)
        }
    } else {
        alert('Agregue el nombre del Programa');
    }
})

$(document).on('click', '.ADP-Editar-Programas', function() {
    let programaID = $(this).data("id");
    let nombreID = $(this).data("nombre");
    let estadoID = $(this).data("estado");

    console.log(programaID, nombreID, estadoID)
    $('#ADP-idProgramaEdit').val(programaID).trigger('change');
    $('#ADP-nombreProgramaEdit').val(nombreID).trigger('change');
    $('#ADP-estadoProgramaEdit').val(estadoID).trigger('change');

    toolsAdmin.cambioVistasAdmin_Programas('showEditPrograma');
});

$(document).on('click', '#ADP-AddProgramaEdit-Peticion', async function() {
    let mainData = {
        idPrograma: $('#ADP-idProgramaEdit').val(),
        nombrePrograma: $('#ADP-nombreProgramaEdit').val(),
        estadoPrograma: $('#ADP-estadoProgramaEdit').val(),
    }

    console.log(mainData);
    let response = await peticionesAdmin.myOwnPeticion(rutaprograma_Editar, 'POST', mainData, 1);
    if (response.code == 200) {
        respuestasAdmin.RespuestaOne(response)
    }
});

$(document).on('click', '.ADP-Delete-Programas', async function() {
    Swal.fire({
        title: "Estas Seguro de Eliminarlo?",
        text: "Una vez realizado no se podra revertir!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Confirmar!"
      }).then(async (result) => {
        if (result.isConfirmed) {
            let programaID = $(this).data("id");
            let response = await peticionesAdmin.myOwnPeticion(rutaPrograma_Eliminar, 'POST', {programas: programaID}, 1);
            if (response.code == 200) {
                respuestasAdmin.RespuestaOne(response)
                Swal.fire({
                    title: "Eliminado!",
                    text: "El programa a sido eliminado.",
                    icon: "success"
                  });
            }
        }
      });
});

// ...........................................................

// SECCION PARA NUEVO CONTENIDO (PROGRAMA) ⚙️ ...................
$(document).on('click', '.ADP-AddNewPrograma', async function() {
    toolsAdmin.cambioVistasAdmin_Programas('showNuevoContenido');
    let response = await peticionesAdmin.myOwnPeticion(rutaPrograma_Activo, 'GET', {}, 100);
    if (response.code == 200) {
        respuestasAdmin.RespuestaCien(response)
    }
})

$(document).on('click', '.ADP-Opciones3', async function() {
    toolsAdmin.cambioVistasAdmin_Programas('showNuevoContenido');
    let response = await peticionesAdmin.myOwnPeticion(rutaPrograma_Activo, 'GET', {}, 100);
    if (response.code == 200) {
        respuestasAdmin.RespuestaCien(response)
    }
})

$("#nuevoDocumentoForm").submit(async function (e) {
    console.log('Hizo el submit');
    e.preventDefault();

    const validarCampos = toolsAdmin.validarInputs("ADP-Validate-Data");

    if (validarCampos.validatorFails) {
        Swal.fire({
        title: 'NECESITA VALIDAR LOS SIGUIENTES CAMPOS.',
        type: 'warning',
        html: `<ul>${validarCampos.msg}</ul>`,
        });
        return false;
    }
    
    var formData = new FormData(this);

    peticionesAdmin.msgCarga('Cargando...');

    let response = await peticionesAdmin.myOwnPeticionDataFTP(rutaPrograma_Guardar, 'POST', formData, 2);
    if (response.code == 200) {
        respuestasAdmin.RespuestaTwo(response);
    }
});
// ..............................................................


// ----------- | Opciones Administrar Servicios | ------------- //

// ................. | Opciones Vista Previa Servicios - Begin | .................. //

$(document).on("click", ".BT_Ser_VistaPrevia", async function() {
    peticionesAdmin.msgCarga("Cargando...");
    let id = $(this).data("id");
    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_vistaPrevia, "GET", {id: id}, 'S-VistaPrevia');
    if (response.code == 200) {
        peticionesAdmin.msgClose();
        respuestasAdmin.RespuestaVistaPrevia_Servicios(response);
    }
});

// ................. | Opciones Vista Previa Servicios - End | .................. //


// ................. | Opciones Modificar Imagenes Servicios - Begin | .................. //
$(document).on("click", ".BT_Ser_ModImagenes",async function() {
    peticionesAdmin.msgCarga("Cargando...");
    let id = $(this).data("id");
    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_modImagen, "GET", {id: id}, 'S-ModificarImg');
    if (response.code == 200) {
        peticionesAdmin.msgClose();
        respuestasAdmin.RespuestaModificarImg_Servicios(response);
    }
});

$(document).on("click",".SerImg_SelectImg", function() {
    $("#SerImg_SelectImg_Op").empty();
    $(".SerImg_SelectImg").removeClass("SerImg_SelectImg-After");
    let id = $(this).data("idimagen");
    let option = `
    <form id="formActualizarImagenes_Servicio" action="{{ route('admin.servicios.updImagen') }}" method="POST" enctype="multipart/form-data">
    <div class="col-md-4">
    <input type="file" id="VistaP_ImgInput" name="archivoPlus" alt="input"><br>
    <span class="VistaP_ImgInput_Span">Solo se aceptan formatos png, jpg y jpeg</span>
        </div>
        <div class="col-md-3">
        <input type="hidden" value="${id}" name="id">
        <button type="submit" class="btn btn-outline-success" data-id="${id}" id="VistaP_ImgInput_Update"><i class="bi bi-arrow-up"></i> Actualizar</button>
        </div>
        </form>`;
        $(this).addClass("SerImg_SelectImg-After");
        $("#SerImg_SelectImg_Op").append(option);
});
    
$(document).on("submit", "#formActualizarImagenes_Servicio", async function(e) {
    peticionesAdmin.msgCarga("Cargando...");
    e.preventDefault();
    
    let validar = $("#VistaP_ImgInput").val();

    if(validar === "") {
        Swal.fire({
            position: "top-end",
            icon: "warning",
            title: "Seleccionar un archivo para Actualizar",
            showConfirmButton: false,
            timer: 1500
        });
        
        return false;
    }
    
    var formData = new FormData(this);
    peticionesAdmin.msgCarga('Cargando...');

    let response = await peticionesAdmin.myOwnPeticionDataFTP(rutaServicios_updImagen, 'POST', formData, 'S-UpdateImg');
    if (response.code == 200) {
        peticionesAdmin.msgClose();
        respuestasAdmin.RespuestaUpdateImg_Servicios(response);
    }
    // peticionesAdmin.myOwnPeticion(rutaServicios_updImagen, "POST", formData, 'S-UpdateImg'); 
});

// ................. | Opciones Modificar Imagenes Servicios - End | .................. //


// ................. | Opciones Modificar Texto Servicios - Begin | .................. //

$(document).on("click", ".BT_Ser_ModTexto",async function() {
    let id = $(this).data("id");
    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_modTexto, "GET", {id: id}, 'S-ModTexto');
    if (response.code == 200) {
        respuestasAdmin.RespuestaModTexto_Servicios(response);
    }
});

$(document).on("click", "#TSC_NewCnt_Btn", async function() {
    let contenido = $("#TSC_NewCnt").val();
    if (!contenido) {
        Swal.fire({
            position: "top-end",
            icon: "warning",
            title: "Para actualizar ingrese la informacion nueva",
            showConfirmButton: false,
            timer: 1500
        });
        
        return false;
    }

    let id = $("#TSC_IDCnt").val();
    let txt = $("#TSC_NewCnt").val();

    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_updTexto, "POST", {id: id, texto: txt}, 'Doesnt Matter');
    if (response.code == 200) {
        peticionesAdmin.msgClose();
        respuestasAdmin.RespuestaUpdateTexto_Servicios(response);
    }
});
// ................. | Opciones Modificar Texto Servicios - End | .................. //

// ----------- | Opciones Administrar Programa | ------------- //

// ................. | Opciones Vista Previa Programa - Begin | .................. //

$(document).on("click", ".BT_PRO_VistaPrevia", async function() {
    peticionesAdmin.msgCarga("Cargando...");
    let id = $(this).data("id");
    let response = await peticionesAdmin.myOwnPeticion(rutaPrograma_vistaPrevia, "GET", {id: id}, 'S-VistaPrevia');
    if (response.code == 200) {
        peticionesAdmin.msgClose();
        respuestasAdmin.RespuestaVistaPrevia_Programas(response);
    }
});

// ................. | Opciones Vista Previa Programa - End | .................. //

// ................. | Opciones Modificar Imagenes Programa - Begin | .................. //
$(document).on("click", ".BT_PRO_ModImagenes",async function() {
    console.log("Si llega");
    peticionesAdmin.msgCarga("Cargando...");
    let id = $(this).data("id");
    let response = await peticionesAdmin.myOwnPeticion(rutaPrograma_modImagen, "GET", {id: id}, 'S-ModificarImg');
    if (response.code == 200) {
        peticionesAdmin.msgClose();
        respuestasAdmin.RespuestaModificarImg_Programas(response);
    }
});

$(document).on("click",".ProImg_SelectImg", function() {
    $("#SerImg_SelectImg_Op").empty();
    $(".ProImg_SelectImg").removeClass("ProImg_SelectImg-After");
    let id = $(this).data("idimagen");
    let option = `
    <form id="formActualizarImagenes_Programas" enctype="multipart/form-data">
    <div class="col-md-4">
    <input type="file" id="VistaP_ImgInput_Programas" name="archivoPlus" alt="input"><br>
    <span class="VistaP_ImgInput_Span_Pro">Solo se aceptan formatos png, jpg y jpeg</span>
        </div>
        <div class="col-md-3">
        <input type="hidden" value="${id}" name="id">
        <button type="submit" class="btn btn-outline-success" data-id="${id}" id="VistaP_ImgInput_Update"><i class="bi bi-arrow-up"></i> Actualizar</button>
        </div>
        </form>`;
        $(this).addClass("ProImg_SelectImg-After");
        $("#ProImg_SelectImg_Op").append(option);
});
    
$(document).on("submit", "#formActualizarImagenes_Programas", async function(e) {
    peticionesAdmin.msgCarga("Cargando...");
    e.preventDefault();
    
    let validar = $("#VistaP_ImgInput_Programas").val();

    if(validar === "") {
        Swal.fire({
            position: "top-end",
            icon: "warning",
            title: "Seleccionar un archivo para Actualizar",
            showConfirmButton: false,
            timer: 1500
        });
        
        return false;
    }
    
    var formData = new FormData(this);
    peticionesAdmin.msgCarga('Cargando...');

    let response = await peticionesAdmin.myOwnPeticionDataFTP(rutaServicios_updImagen, 'POST', formData, 'S-UpdateImg');
    if (response.code == 200) {
        peticionesAdmin.msgClose();
        respuestasAdmin.RespuestaUpdateImg_Servicios(response);
    }
    // peticionesAdmin.myOwnPeticion(rutaServicios_updImagen, "POST", formData, 'S-UpdateImg'); 
});

// ................. | Opciones Modificar Imagenes Programa - End | .................. //

// ................. | Opciones Modificar Texto Programa - Begin | .................. //

$(document).on("click", ".BT_PRO_ModTexto",async function() {
    let id = $(this).data("id");
    let response = await peticionesAdmin.myOwnPeticion(rutaPrograma_modTexto, "GET", {id: id}, 'S-ModTexto');
    if (response.code == 200) {
        respuestasAdmin.RespuestaModTexto_Programas(response);
    }
});

$(document).on("click", "#TSC_NewCnt_Btn_Pro", async function() {
    let contenido = $("#TSC_NewCnt_Pro").val();
    if (!contenido) {
        Swal.fire({
            position: "top-end",
            icon: "warning",
            title: "Para actualizar ingrese la informacion nueva",
            showConfirmButton: false,
            timer: 1500
        });
        
        return false;
    }

    let id = $("#TSC_IDCnt_Pro").val();
    let txt = $("#TSC_NewCnt_Pro").val();

    let response = await peticionesAdmin.myOwnPeticion(rutaPrograma_updTexto, "POST", {id: id, texto: txt}, 'Doesnt Matter');
    if (response.code == 200) {
        peticionesAdmin.msgClose();
        respuestasAdmin.RespuestaUpdateTexto_Servicios(response);
    }
});
// ................. | Opciones Modificar Texto Programa - End | .................. //











$(document).on('click', '.BT_Ser_AgregarContenido', function() {
    console.log('Agregar Contenido')
    $(".ADSER-Opciones3").trigger('click');
})

$(document).on('click', '.BT_Ser_ActivarP', function() {
    console.log('Activar')
    $(".ADSER-Opciones1").trigger('click');
})

$(document).on('click', '.BT_PRO_AgregarContenido', function() {
    console.log('Agregar Contenido')
    $(".ADP-Opciones3").trigger('click');
})

$(document).on('click', '.BT_PRO_ActivarPrograma', function() {
    console.log('Activar')
    $(".ADP-Opciones1").trigger('click');
})



// ................. | Opciones Vista Previa Programas - Begin | .................. //



// ................. | Opciones Vista Previa Programas - End | .................. //




// -----------------------------| SECCION DE INICIO |--------------------------------//

$(document).on("submit", "#ADBE-BtnUp-formImg", async function(e) {
    e.preventDefault();
    let validar = $("#ADBE-BtnUp-Img").val();

    if(validar === "") {
        Swal.fire({
            // position: "top-end",
            icon: "warning",
            title: "Seleccionar un archivo para Actualizar",
            showConfirmButton: false,
            timer: 1500
        });
        return false;
    }
    
    var formData = new FormData(this);
    peticionesAdmin.msgCarga('Cargando...');

    let response = await peticionesAdmin.myOwnPeticionDataFTP(rutaServicios_updImagen, 'POST', formData, 'S-UpdateImg');
    if (response.code == 200) {
        let responseTwo = await peticionesAdmin.myOwnPeticion(rutaInicio, 'GET', {}, 'I-1');
            if (responseTwo.code == 200) {
                respuestasAdmin.RespuestaOne_Inicio(responseTwo);
                peticionesAdmin.msgClose();
            }
    }
});

$(document).on("click", "#ADBE-BtnUp-Mision", async function() {
    peticionesAdmin.msgCarga('Cargando...');

    let contenido = $("#ADBE-BtnUp-Mision-Texto").val();
    if (!contenido) {
        Swal.fire({
            // position: "top-end",
            icon: "warning",
            title: "Para actualizar ingrese la informacion nueva",
            showConfirmButton: false,
            timer: 2000
        });
        
        return false;
    }

    let id = 22;
    let txt = $("#ADBE-BtnUp-Mision-Texto").val();

    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_updTexto, "POST", {id: id, texto: txt}, 'Doesnt Matter');
    if (response.code == 200) {
        let responseTwo = await peticionesAdmin.myOwnPeticion(rutaInicio, 'GET', {}, 'I-1');
            if (responseTwo.code == 200) {
                respuestasAdmin.RespuestaOne_Inicio(responseTwo);
                peticionesAdmin.msgClose();
                setTimeout(() => {
                    peticionesAdmin.msgSuccess("Actualizacion de Texto Completa");
                }, 500)
            }
    }
});

$(document).on("click", "#ADBE-BtnUp-Vision", async function() {
    peticionesAdmin.msgCarga('Cargando...');

    let contenido = $("#ADBE-BtnUp-Vision-Texto").val();
    if (!contenido) {
        Swal.fire({
            // position: "top-end",
            icon: "warning",
            title: "Para actualizar ingrese la informacion nueva",
            showConfirmButton: false,
            timer: 2000
        });
        
        return false;
    }

    let id = 23;
    let txt = $("#ADBE-BtnUp-Vision-Texto").val();

    let response = await peticionesAdmin.myOwnPeticion(rutaServicios_updTexto, "POST", {id: id, texto: txt}, 'Doesnt Matter');
    if (response.code == 200) {
        let responseTwo = await peticionesAdmin.myOwnPeticion(rutaInicio, 'GET', {}, 'I-1');
            if (responseTwo.code == 200) {
                respuestasAdmin.RespuestaOne_Inicio(responseTwo);
                peticionesAdmin.msgClose();
                setTimeout(() => {
                    peticionesAdmin.msgSuccess("Actualizacion de Texto Completa");
                }, 500)
            }
    }
});

//-----------------------------------------------------------------------------------//

// -----------------------------| SECCION DE CONTACTANOS |--------------------------------//



//---------------------------------------------------------------------------------------//

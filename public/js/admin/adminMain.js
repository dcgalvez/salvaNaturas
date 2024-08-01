let helper_catalogos = '';

$(() => {
    toolsAdmin.cambioVistasAdmin("cambioTodos");
    // peticionesAdmin.myOwnPeticion(rutaPrograma, 'GET', {}, 100); 
});

$(document).on('click', '#AM-Seccion-Inicio', function() {
    toolsAdmin.cambioVistasAdmin("cambioInicio");
    peticionesAdmin.myOwnPeticion(rutaInicio, 'GET', {}, 'I-1');
})

$(document).on('click', '#AM-Seccion-Servicios', function() {
    toolsAdmin.cambioVistasAdmin("cambioServicios");
})

$(document).on('click', '#AM-Seccion-Programas',async function() {
    toolsAdmin.cambioVistasAdmin("cambioProgramas");
})

$(document).on('click', '#AM-Seccion-Contactos', function() {
    toolsAdmin.cambioVistasAdmin("cambioRegenera");
})

// -------------------- SECCION DE INICIO ----------------------- //




// -------------------- SECCION DE SERVICIOS ----------------------- //

// OPCIONES DE MENU LATERAL - SERVICIOS

$(document).on('click', '.ADSER-Opciones', function() {
    $('.ADSER-Opciones').removeClass('ADSER-Opcionesafter');
    $(this).addClass('ADSER-Opcionesafter');
});

$(document).on('click', '.ADSER-Opciones1', async function(e) {
    let peticion = await peticionesAdmin.myOwnPeticion(rutaServicios, 'GET', {probando: 'probando'}, 'S-1');
});

$(document).on('click', '.ADSER-Opciones2', async function(e) {
    // peticionesAdmin.msgCarga('Cargando...');
    // let peticion = await peticionesAdmin.myOwnPeticion(rutaGet_Contenido, 'GET', {}, 4);
    toolsAdmin.cambioVistasAdmin_Servicios('showContenido');
});

$(document).on('click', '#ADSER-AddPrograma', function() {
    toolsAdmin.cambioVistasAdmin_Servicios('showAddPrograma');
});
// .........................................................

// MANTENIMIENTO DE SERVICIOS ..............................

$(document).on('click', '#ADSER-AddPrograma-Peticion', async function() {
    let programa = $('#ADSER-nombrePrograma').val();
    if(programa) {
        console.log('#', programa);
        console.log(rutaPrograma_Add);
        let peticion = await peticionesAdmin.myOwnPeticion(rutaServicios_Add, 'POST', {programa: programa}, 'S-1');

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

$(document).on('click', '#ADSER-AddProgramaEdit-Peticion', function() {
    let mainData = {
        idPrograma: $('#ADSER-idProgramaEdit').val(),
        nombrePrograma: $('#ADSER-nombreProgramaEdit').val(),
        estadoPrograma: $('#ADSER-estadoProgramaEdit').val(),
    }

    console.log(mainData);
    peticionesAdmin.myOwnPeticion(rutaServicios_Editar, 'POST', mainData, 'S-1');

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
      }).then((result) => {
        if (result.isConfirmed) {
            let programaID = $(this).data("id");
            peticionesAdmin.myOwnPeticion(rutaServicios_Eliminar, 'POST', {programas: programaID}, 'S-1');
            Swal.fire({
                title: "Eliminado!",
                text: "El programa a sido eliminado.",
                icon: "success"
              });
        }
      });
})
// ...........................................................

// SECCION PARA NUEVO CONTENIDO (SERVICIOS) ...................
$(document).on('click', '.ADSER-AddNewPrograma', function() {
    toolsAdmin.cambioVistasAdmin_Servicios('showNuevoContenido');
    peticionesAdmin.myOwnPeticion(rutaServicios_Activo, 'GET', {}, 'S-2');
})

$(document).on('click', '.ADSER-Opciones3', function() {
    toolsAdmin.cambioVistasAdmin_Servicios('showNuevoContenido');
    peticionesAdmin.myOwnPeticion(rutaServicios_Activo, 'GET', {}, 'S-2');
})

$("#nuevoDocumentoForm_Servicios").submit(function (e) {
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

    peticionesAdmin.myOwnPeticionDataFTP(rutaServicios_Guardar, 'POST', formData, 'S-3');
});
// ..............................................................



// -------------------- SECCION DE PROGRAMAS ----------------------- //

// OPCIONES DE MENU LATERAL
$(document).on('click', '.ADP-Opciones', function() {
    $('.ADP-Opciones').removeClass('ADP-Opcionesafter');
    $(this).addClass('ADP-Opcionesafter');
});

$(document).on('click', '.ADP-Opciones1', async function(e) {
    let peticion = await peticionesAdmin.myOwnPeticion(rutaPrograma, 'GET', {probando: 'probando'}, 1);
});

$(document).on('click', '#ADP-AddPrograma', function() {
    toolsAdmin.cambioVistasAdmin_Programas('showAddPrograma');
});

$(document).on('click', '.ADP-Opciones2', async function(e) {
    peticionesAdmin.msgCarga('Cargando...');
    let peticion = await peticionesAdmin.myOwnPeticion(rutaGet_Contenido, 'GET', {}, 4);
    toolsAdmin.cambioVistasAdmin_Programas('showContenido');
});
// .........................................................

// MANTENIMIENTO DE PROGRAMAS ..............................

$(document).on('click', '#ADP-AddPrograma-Peticion', async function() {
    let programa = $('#ADP-nombrePrograma').val();
    if(programa) {
        console.log('#', programa);
        console.log(rutaPrograma_Add);
        let peticion = await peticionesAdmin.myOwnPeticion(rutaPrograma_Add, 'POST', {programa: programa}, 1);
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

$(document).on('click', '#ADP-AddProgramaEdit-Peticion', function() {
    let mainData = {
        idPrograma: $('#ADP-idProgramaEdit').val(),
        nombrePrograma: $('#ADP-nombreProgramaEdit').val(),
        estadoPrograma: $('#ADP-estadoProgramaEdit').val(),
    }

    console.log(mainData);
    peticionesAdmin.myOwnPeticion(rutaprograma_Editar, 'POST', mainData, 1);
});

$(document).on('click', '.ADP-Delete-Programas', function() {
    let programaID = $(this).data("id");
    peticionesAdmin.myOwnPeticion(rutaPrograma_Eliminar, 'POST', {programas: programaID}, 1);
})

// ...........................................................

// SECCION PARA NUEVO CONTENIDO (PROGRAMA) ...................
$(document).on('click', '.ADP-AddNewPrograma', function() {
    toolsAdmin.cambioVistasAdmin_Programas('showNuevoContenido');
    peticionesAdmin.myOwnPeticion(rutaPrograma_Activo, 'GET', {}, 100);
})

$(document).on('click', '.ADP-Opciones3', function() {
    toolsAdmin.cambioVistasAdmin_Programas('showNuevoContenido');
    peticionesAdmin.myOwnPeticion(rutaPrograma_Activo, 'GET', {}, 100);
})

$("#nuevoDocumentoForm").submit(function (e) {
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

    peticionesAdmin.myOwnPeticionDataFTP(rutaPrograma_Guardar, 'POST', formData, 2);
});
// ..............................................................
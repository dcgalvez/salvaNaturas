let helper_catalogos = '';

$(() => {
    toolsAdmin.cambioVistasAdmin("cambioTodos");
    // peticionesAdmin.myOwnPeticion(rutaPrograma, 'GET', {}, 100); 
});

$(document).on('click', '#AM-Seccion-Inicio', function() {
    toolsAdmin.cambioVistasAdmin("cambioInicio");
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




// -------------------- SECCION DE SERVICIOS ----------------------- //

// OPCIONES DE MENU LATERAL - SERVICIOS

$(document).on('click', '.ADP-Opciones', function() {
    $('.ADP-Opciones').removeClass('ADP-Opcionesafter');
    $(this).addClass('ADP-Opcionesafter');
});

$(document).on('click', '.ADP-Opciones1', async function(e) {
    let peticion = await peticionesAdmin.myOwnPeticion(rutaPrograma, 'GET', {probando: 'probando'}, 1);
});

$(document).on('click', '.ADP-Opciones2', async function(e) {
    peticionesAdmin.msgCarga('Cargando...');
    let peticion = await peticionesAdmin.myOwnPeticion(rutaGet_Contenido, 'GET', {}, 4);
    toolsAdmin.cambioVistasAdmin_Programas('showContenido');
});







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
let xhrPeticion = "";
class adminTools {
    cambioVistasAdmin(signal) {
        switch(signal) {

            case "cambioTodos":
                $(".AI-CC").addClass("d-none");
                break;

            case "cambioGeneral":
                $(".AI-CC").addClass("d-none");
                $("#AI-CC-General").removeClass("d-none")
                break;
                
            case "cambioInicio":
                $(".AI-CC").addClass("d-none");
                $("#AI-CC-Inicio").removeClass("d-none")
                break;

            case "cambioServicios":
                $(".AI-CC").addClass("d-none");
                $("#AI-CC-Servicios").removeClass("d-none")
                $('.ADSER-Opciones').removeClass('ADSER-Opcionesafter');
                $('.ADSER-ManageContenidos').addClass('d-none');
                $('.ADSER-Contenido-Fondo').removeClass('d-none');
                break;
            
            case "cambioProgramas":
                $(".AI-CC").addClass("d-none");
                $("#AI-CC-Programas").removeClass("d-none")
                $('.ADP-Opciones').removeClass('ADP-Opcionesafter');
                $('.ADP-ManageContenidos').addClass('d-none');
                $('.ADP-Contenido-Fondo').removeClass('d-none');
                break;

            case "cambioRegenera":
                $(".AI-CC").addClass("d-none");
                $("#AI-CC-Contactos").removeClass("d-none")
                break;
        }
    }

    cambioVistasAdmin_Programas(signal) {
        switch(signal) {
            case "showAddPrograma":
                $(".ADP-Contenido-Agregar-2").removeClass("d-none");
                break;

            case "hideAddPrograma":
                $(".ADP-Contenido-Agregar-2").addClass("d-none");
                break;

            case "showProgramas":
                $('.ADP-ManageContenidos').addClass('d-none');
                $('.ADP-Contenido-Agregar').removeClass('d-none')
                break;

            case "showEditPrograma":
                $('.ADP-Contenido-Agregar-3').removeClass('d-none')
                break;
            case "hideEditPrograma":
                $('.ADP-Contenido-Agregar-3').removeClass('d-none')
                break;
            
            case "showContenido":
                $('.ADP-ManageContenidos').addClass('d-none');
                $('.ADP-Contenido-Programas').removeClass('d-none')
                break;

            case "showNuevoContenido":
                $('.ADP-ManageContenidos').addClass('d-none');
                $('.ADP-Contenido-NuevoContenido').removeClass('d-none')
                $('.ADP-Menu').addClass('ADP-Menu-NewHeight');
                $('.ADP-Extras').removeClass('d-none');
                break;

            // CASOS SERVICIOS
            case "showServicios":
                $('.ADSER-ManageContenidos').addClass('d-none');
                $('.ADSER-Contenido-Agregar').removeClass('d-none')
                break;
        }
    }

    cambioVistasAdmin_Servicios(signal) {
        switch(signal) {
            case "showServicios":
                $('.ADSER-ManageContenidos').addClass('d-none');
                $('.ADSER-Contenido-Agregar').removeClass('d-none');
                console.log('No funciona')
                break;
            
            case "showAddPrograma":
                $(".ADSER-Contenido-Agregar-2").removeClass("d-none");
                break;

            case "showEditPrograma":
                $('.ADSER-Contenido-Agregar-3').removeClass('d-none')
                break;

            case "showNuevoContenido":
                $('.ADSER-ManageContenidos').addClass('d-none');
                $('.ADSER-Contenido-NuevoContenido').removeClass('d-none')
                $('.ADSER-Menu').addClass('ADP-Menu-NewHeight');
                $('.ADSER-Extras').removeClass('d-none');
                break;

            case "showContenido":
                $('.ADSER-ManageContenidos').addClass('d-none');
                $('.ADSER-Contenido-Programas').removeClass('d-none')
                break;
        }
    }


    validarInputs(className) {
        const requiredElement = $(`.${className}`).length;
        let validElement = 0;
        let errorMsg = '';


        $(`.${className}`).each(function (index) {
            const value = $(this).val();
            const nameSelector = $(this).data('nombrev');
            if (value != '' && value != null) {
                validElement++;
            } else {
                errorMsg += `<li>
                        <b>${nameSelector} es obligatorio</b>
                    </li>`;
            }
        });

        return {
            validatorFails: (requiredElement > validElement) ? true : false,
            msg: errorMsg
        }
    }
    
    loadIntoSelect(className, catalogo) {
        $('#' + className).empty();
        $('#' + className).append(`<option value="">Seleccione un Programa</option>`);
        catalogo.forEach(datos => {
            let option = `<option value="${datos.codID}">${datos.valPRO}</option>`;
            $('#' + className).append(option);
        });
    }
}
const toolsAdmin = new adminTools();
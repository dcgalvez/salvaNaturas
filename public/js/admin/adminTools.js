let xhrPeticion = "";
class adminTools {
    cambioVistasAdmin(signal) {
        switch(signal) {

            case "cambioTodos":
                $(".AI-CC").addClass("d-none");
                break;
            case "cambioInicio":
                $(".AI-CC").addClass("d-none");
                $("#AI-CC-Inicio").removeClass("d-none")
                break;

            case "cambioServicios":
                $(".AI-CC").addClass("d-none");
                $("#AI-CC-Servicios").removeClass("d-none")
                $('.ADS-Opciones').removeClass('ADS-Opcionesafter');
                $('.ADS-ManageContenidos').addClass('d-none');
                $('.ADS-Contenido-Fondo').removeClass('d-none');
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

class adminPeticiones {
    
    async peticionAjax (data, route, method, redirect) {
        try {
            // const url = route;
            // util2.msgCargandoPRO("Cargando...");
            // console.log(route)
            const response = await peticionesAdmin.myOwnPeticion(route, method, data);
            // util2.closeCargando();

            if(response) {
                console.log(response);
                respuestasAdmin.RedirectRespuestas(redirect, response);
                // return response;
            } else {
                console.log('Asaber que perro')
            }
    
            // if (response.code !== 200) {
            //     return util.errorMsg(response.message ?? "Error al buscar la informacion");
            // }
            // util.successMsg(response.message);
            // redirectData({ response }, redirect);
        } catch (e) {
            console.log(e);
        }
    }

    async myOwnPeticion(ruta, metodo, data, redirect) {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        // Configurar las cabeceras de la solicitud AJAX
        let headers = {
            'X-CSRF-TOKEN': csrfToken
        };
        // Realizar la solicitud AJAX con jQuery

        let ajaxSettings = {
            url: ruta,
            type: metodo,
            data: data,
            headers: headers,
            success: function(response) {
                // console.log(response);
                // return response;
                respuestasAdmin.RedirectRespuestas(redirect, response);

                // Manejar la respuesta exitosa aquí
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Manejar errores aquí
            }
        }

        xhrPeticion = $.ajax(ajaxSettings);
        return xhrPeticion;
        // $.ajax({
        //     url: ruta,
        //     type: metodo,
        //     data: data,
        //     headers: headers,
        //     success: function(response) {
        //         // console.log(response);
        //         // return response;
        //         respuestasAdmin.RedirectRespuestas(redirect, response);

        //         // Manejar la respuesta exitosa aquí
        //     },
        //     error: function(xhr, status, error) {
        //         console.error(xhr.responseText);
        //         // Manejar errores aquí
        //     }
        // });
    }

    async myOwnPeticionDataFTP(ruta, metodo, data, redirect) {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        // Configurar las cabeceras de la solicitud AJAX
        let headers = {
            'X-CSRF-TOKEN': csrfToken
        };
        // Realizar la solicitud AJAX con jQuery

        let ajaxSettings = {
            url: ruta,
            type: metodo,
            data: data,
            headers: headers,
            processData: false,
            contentType: false, 
            success: function(response) {
                // console.log(response);
                // return response;
                respuestasAdmin.RedirectRespuestas(redirect, response);

                // Manejar la respuesta exitosa aquí
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Manejar errores aquí
            }
        }

        xhrPeticion = $.ajax(ajaxSettings);
        return xhrPeticion;
        // $.ajax({
        //     url: ruta,
        //     type: metodo,
        //     data: data,
        //     headers: headers,
        //     success: function(response) {
        //         // console.log(response);
        //         // return response;
        //         respuestasAdmin.RedirectRespuestas(redirect, response);

        //         // Manejar la respuesta exitosa aquí
        //     },
        //     error: function(xhr, status, error) {
        //         console.error(xhr.responseText);
        //         // Manejar errores aquí
        //     }
        // });
    }

    msgCarga(mensaje, btnTexto = 'Cancelar', btnClass='') {
        Swal.fire({
            title: mensaje,
            allowEscapeKey: false,
            allowOutsideClick: false,
            showConfirmButton: true,
            confirmButtonColor: '#6D8395',
            confirmButtonText: btnTexto,
            html: `<div class="spinner-border" role="status">
                    <span class="sr-only"></span></div>`
        }).then((result) => {
            if (result.value) {
                this.cancelPeticionAjax();
            }
        });
    }
    
    msgClose() {
        // $.unblockUI();
        Swal.close();
    }

    cancelPeticionAjax() {
        if (xhrPeticion) {
            xhrPeticion.abort();
        }
    }
}

class adminRespuestas {
    RedirectRespuestas(redirect, data) {
        switch(redirect) {
            case 1:
                this.RespuestaOne(data);
                break;

            case 2:
                this.RespuestaTwo(data);
                break;

            case 4:
                this.RespuestaFour(data);
                break;

            case 100:
                this.RespuestaCien(data)
                break;

        }
    }

    RespuestaOne(datos) {
        console.log(datos);
        console.log(datos.data);
        $('#ADP-tablaPrograma-Body').empty();
        datos.data.forEach(data => {
            let badge = '<span class="badge text-bg-warning">Inactivo</span>';
            if(data.Pro_Estado == 1) {
                badge = '<span class="badge text-bg-primary">Activo</span>';
            }
            let row = `<tr>     
                            <td>${data.Pro_Programa}</td>
                            <td>${badge}</td>
                            <td class="">
            <button type="button" class="btn btn-outline-secondary ADP-Editar-Programas" data-id="${data.Pro_ID}" 
            data-nombre="${data.Pro_Programa}" data-estado="${data.Pro_Estado}"> Editar</button>
            <button type="button" class="btn btn-outline-danger ADP-Delete-Programas" data-id="${data.Pro_ID}"> Eliminar</button>
            </td>
            </tr>`;
            
            $('#ADP-tablaPrograma-Body').append(row);
        })
        toolsAdmin.cambioVistasAdmin_Programas("showProgramas")
    }

    RespuestaTwo(datos) {
        peticionesAdmin.msgClose();
        $("#nuevoDocumentoForm")[0].reset();
    }

    RespuestaFour(datos) {

        // console.log(datos);
        // console.log(datos.data);
        $('#ADP-Contenidos-ContMain').empty();
        $.each(datos.data, function(key, value) {
            console.log(key);
            console.log(value);

            let imagenUno = value.Con_ID_Imagen[0];
            // console.log(imagenUno[0]);

            let div = `
                <div class="ADPDC-Main">
                    <div class="ADPDC-Title GBTextCenter">
                    <h1 style="color:#ffcc00;">${value.programa}</h1>
                    </div>
                    <div class="ADPDC-Img ">
                        <div class="ADPDC-I-1 ADPDC-BB">
                            <img src="${value.Con_ImagenServer[0]}" style="width: 100%; height: 58em; border-radius: 0.75em;" alt="">
                        </div>
                        <div class="ADPDC-I-2 ">
                            <div class="ADPDC-I-I-1 ADPDC-BB">
                                <img src="${value.Con_ImagenServer[1]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                            </div>
                            <div class="ADPDC-I-I-2 ADPDC-BB">
                                <img src="${value.Con_ImagenServer[2]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                            </div>
                            <div class="ADPDC-I-I-3 ADPDC-BB">
                            <img src="${value.Con_ImagenServer[3]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                                                        
                            </div>
                        </div>
                    </div>
                    <div class="ADPDC-Text ADPDC-BB p-3 GBborderBlack">
                        <p style="">${value.Con_Texto}</p>
                    </div>
                </div>
            `;
            $('#ADP-Contenidos-ContMain').append(div);
        });

        peticionesAdmin.msgClose();

        // if (datos.code === 200) {
        //     $('#ADP-Contenidos-ContMain').empty();
        //     datos.data.forEach(info => {
        //         console.log(info);
        //         let contain = `<div>
        //             <img src="" alt="">
        //         </div>`;
        //         $('#ADP-Contenidos-ContMain').empty();
                
        //     });
        // }
    }

    RespuestaCien(datos) {
        console.log('Respuesta Cien', datos)
        toolsAdmin.loadIntoSelect('ADP_Programa-Change', datos);
    }
}

const toolsAdmin = new adminTools();
const peticionesAdmin = new adminPeticiones();
const respuestasAdmin = new adminRespuestas();
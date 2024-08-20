class adminPeticiones {

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
                return response;
                // respuestasAdmin.RedirectRespuestas(redirect, response);
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
                return response;
                // respuestasAdmin.RedirectRespuestas(redirect, response);

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

    msgSuccess(mensaje, texto = "") {
        Swal.fire({  
            title: mensaje,
            text: texto,
            icon: "success",
            timer: 2000,
            showConfirmButton: false
        })
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
            // INICIO

            case 'I-1':
                this.RespuestaOne_Inicio(data);
                break;
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

            // ✅
            case 'S-1':
                this.RespuestaOne_Servicios(data);
                break;

            case 'S-2':
                this.RespuestaDos_Servicios(data)
                break;
            
            case 'S-3':
                this.RespuestaTres_Servicios(data);
                break;
            
            // ✅
            case 'S-4':
                this.RespuestaCuatro_Servicios(data);
                break;

            // ✅
            case 'S-VistaPrevia':
                this.RespuestaVistaPrevia_Servicios(data);
                break;
            
            // ✅
            case 'S-ModificarImg':
                this.RespuestaModificarImg_Servicios(data);
                break;
                
            // ✅
            case 'S-UpdateImg':
                this.RespuestaUpdateImg_Servicios(data);
            
        }
    }

    RespuestaOne_Inicio(datos) {
        // $('#ADBE-Col-1').empty();
        console.log('Inicio', datos)
        $.each(datos.data, function(key, info) {
            $(".ADBE-Col-1-Img").prop("src", info.Con_ImagenServer);
            $(".ADBE-Col-1-TxtM").text(info.Con_Texto[0]);
            $(".ADBE-Col-1-TxtV").text(info.Con_Texto[1]);
        //     let bloque = `
        //            <div class="m-3 GBAI-Shadow" style="border-radius: 0.75em;">
        //         <div class="row w-100 m-2">
        //     <div class="GB-Flex mt-3"><img src="${info.Con_ImagenServer}" class="" style="width: 85%; height: auto; border-radius: 0.75em;" alt=""></div>
        // </div>
        // <div class="row mt-4">
        //     <div class="col-6 p-3">
        //         <h3 class="GBTextCenter">MISION</h1>
        //         <p class='p-2'>${info.Con_Texto[0]}</p>
        //     </div>            
        //     <div class="col-6 p-3">
        //         <h3 class="GBTextCenter">VISION</h1>
        //         <p class='p-2'>${info.Con_Texto[1]}</p>
        //     </div>
        // </div>
        //         </div>`;
        
        // $('#ADBE-Col-1').append(bloque);
    });
    }

    RespuestaOne_Contactanos(datos) {
        console.log(datos);
        $(".ADCON_Cards").empty();
        datos.data.forEach(info => {
            let option = `<div class="row m-3">
        <div class="col-10 row" style="gap: 0.5em">
            <div class="alert alert-light col-4" role="alert">
                ${info.nombres + ' ' + info.apellidos}
            </div>
            <div class="alert alert-light col-3" role="alert">
                ${info.telefono}
           </div>
            <div class="alert alert-light col-4" role="alert">
                ${info.mail}
            </div>
            <div class="alert alert-light col-11" role="alert">
                ${info.mensaje}
            </div>
        </div>`;
            if (info.check == 0) {
                option += `<div class="col-2 row">
                    <div class="alert alert-warning col-12" role="alert">
                        Sin Revisar
                    </div>
                </div>`
            } else {
                option += `<div class="col-2 row">
                    <div class="alert alert-success col-12" role="alert">
                        Revisado
                     </div>
                </div>`
            }
        
        option += `</div>
        <hr>`;

        $(".ADCON_Cards").append(option);
        });
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
        console.log(datos);
        // $('#ADSER-ContenidosRow').empty();
        $('#ADPRO-ContenidosRow').empty();
        let mainData = datos.data;

        mainData.forEach(info => {
            console.log(info.Estado_Texto);
            let option = `<div class="col-6">
                        <div class="GCAD_C ">
                            <div class="GCAD_CUno ">
                                <div class=""><p class="TESTING_GB_ForTitle3">${info.Tipo} - ${info.Nombre}</p><hr></div>
                                <div class="row">
                                    <div class="col-5"><p class="TESTING_GB_ForText">Estado: ${info.Estado_Texto}</p></div>
                                    <div class="col-5"><p class="TESTING_GB_ForText">Contenido: ${info.Contenido_Texto}</p></div>
                                    <div class="col-2"></div>
                                </div>
                            </div>
                            <div class="GCAD_CDos ">`;
            
            if (info.Contenido_ID == 1) {
                option += `<input type="button" class="btn btn-outline-primary BT_PRO_ModImagenes" data-id="${info.Tipo_ID}" value="Imagenes" name="" id="">
                 <input type="button" class="btn btn-outline-primary BT_PRO_ModTexto" data-id="${info.Tipo_ID}" value="Texto" name="" id="">
                 <input type="button" class="btn btn-outline-primary BT_PRO_VistaPrevia" data-id="${info.Tipo_ID}" value="Vista Previa" name="" id="">`;
            } else {
                option += `<input type="button" class="btn btn-outline-primary BT_PRO_AgregarContenido" value="Agregar Contenido" name="" id="">`;
            }

            if (info.Estado_ID != 1) {
                option += `<input type="button" class="btn btn-outline-primary BT_PRO_ActivarPrograma" value="Activar" name="" id="">`;
            }
                            
            option += `</div>
                        </div>
                    </div>
            `;

        $('#ADPRO-ContenidosRow').append(option);
        });
        // $.each(datos.data, function(key, value) {
        //     console.log(key);
        //     console.log(value);

        //     let imagenUno = value.Con_ID_Imagen[0];
        //     // console.log(imagenUno[0]);

        //     let div = `
        //         <div class="ADPDC-Main">
        //             <div class="ADPDC-Title GBTextCenter">
        //             <h1 style="color:#ffcc00;">${value.programa}</h1>
        //             </div>
        //             <div class="ADPDC-Img ">
        //                 <div class="ADPDC-I-1 ADPDC-BB">
        //                     <img src="${value.Con_ImagenServer[0]}" style="width: 100%; height: 58em; border-radius: 0.75em;" alt="">
        //                 </div>
        //                 <div class="ADPDC-I-2 ">
        //                     <div class="ADPDC-I-I-1 ADPDC-BB">
        //                         <img src="${value.Con_ImagenServer[1]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
        //                     </div>
        //                     <div class="ADPDC-I-I-2 ADPDC-BB">
        //                         <img src="${value.Con_ImagenServer[2]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
        //                     </div>
        //                     <div class="ADPDC-I-I-3 ADPDC-BB">
        //                     <img src="${value.Con_ImagenServer[3]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                                                        
        //                     </div>
        //                 </div>
        //             </div>
        //             <div class="ADPDC-Text ADPDC-BB p-3 GBborderBlack">
        //                 <p style="">${value.Con_Texto}</p>
        //             </div>
        //         </div>
        //     `;
        //     $('#ADP-Contenidos-ContMain').append(div);
        // });
        peticionesAdmin.msgClose();
    }

    RespuestaCien(datos) {
        console.log('Respuesta Cien', datos);
        toolsAdmin.loadIntoSelect('ADP_Programa-Change', datos.data);
    }

    RespuestaOne_Servicios(datos) {
        console.log(datos);
        console.log(datos.data);
        $('#ADSER-tablaPrograma-Body').empty();
        datos.data.forEach(data => {
            let badge = '<span class="badge text-bg-warning">Inactivo</span>';
            if(data.Ser_Estado == 1) {
                badge = '<span class="badge text-bg-primary">Activo</span>';
            }
            let row = `<tr>     
                            <td>${data.Ser_Programa}</td>
                            <td>${badge}</td>
                            <td class="">
            <button type="button" class="btn btn-outline-secondary ADSER-Editar-Programas" data-id="${data.Ser_ID}" 
            data-nombre="${data.Ser_Programa}" data-estado="${data.Ser_Estado}"> Editar</button>
            <button type="button" class="btn btn-outline-danger ADSER-Delete-Programas" data-id="${data.Ser_ID}"> Eliminar</button>
            </td>
            </tr>`;

            console.log(row);
            
            $('#ADSER-tablaPrograma-Body').append(row);
        })
        toolsAdmin.cambioVistasAdmin_Servicios("showServicios")
    }

    RespuestaDos_Servicios(datos) {
        // console.log(datos);
        // console.log('RespuestaDos_Servicios', datos.data[0])
        toolsAdmin.loadIntoSelect('ADSER_Programa-Change', datos.data);
    }

    RespuestaTres_Servicios(datos) {
        peticionesAdmin.msgClose();
        $("#nuevoDocumentoForm_Servicios")[0].reset();
    }

    RespuestaCuatro_Servicios(datos) {
        console.log(datos);
        // $('#ADSER-ContenidosRow').empty();
        $('#ADSER-ContenidosRow').empty();
        let mainData = datos.data;

        mainData.forEach(info => {

            let badge =  info.Estado_ID == 1 ? "text-bg-primary" : "text-bg-warning";
            let badgeSecondary =  info.Contenido_ID == 1 ? '<span style="color: green"><i class="bi bi-check-circle"></i></span>' : '<span style="color: red"><i class="bi bi-x-circle"></i></span>';

            console.log(info.Estado_Texto);
            let option = `<div class="col-6">
                        <div class="GCAD_C ">
                            <div class="GCAD_CUno ">
                                <div class=""><p class="TESTING_GB_ForTitle3">${info.Tipo} - ${info.Nombre}</p><hr></div>
                                <div class="row">
                                    <div class="col-5"><p class="TESTING_GB_ForText">Estado: <span class="badge ${badge}">${info.Estado_Texto}</span></p></div>
                                    <div class="col-5"><p class="TESTING_GB_ForText">Contenido: ${badgeSecondary}</p></div>
                                    <div class="col-2"></div>
                                </div>
                            </div>
                            <div class="GCAD_CDos ">`;

            if (info.Contenido_ID == 1) {
                option += `<input type="button" class="btn btn-outline-primary BT_Ser_ModImagenes" data-id="${info.Tipo_ID}" value="Imagenes" name="" id="">
                 <input type="button" class="btn btn-outline-primary BT_Ser_ModTexto" data-id="${info.Tipo_ID}" value="Texto" name="" id="">
                 <input type="button" class="btn btn-outline-primary BT_Ser_VistaPrevia" data-id="${info.Tipo_ID}" value="Vista Previa" name="" id="">`;
            } else {
                option += `<input type="button" class="btn btn-outline-primary BT_Ser_AgregarContenido" value="Agregar Contenido" name="" id="">`;
            }
                
            if (info.Estado_ID != 1) {
                option += `<input type="button" class="btn btn-outline-primary BT_Ser_ActivarP" value="Activar" name="" id="">`;
            }
                            
            option += `</div>
                        </div>
                    </div>
            `;

        $('#ADSER-ContenidosRow').append(option);
        }); 
    }

    RespuestaVistaPrevia_Servicios(datos) {
        console.log(datos);
        $(".Modal_Contenidos_C").addClass("d-none");
        $("#VistPreva_Contenido").removeClass("d-none");
        $('#VistPreva_Contenido').empty();
        $.each(datos.data, function(key, value) {
            console.log(key);
            console.log(value);
            let imagenUno = value.Con_ID_Imagen[0];
            let div2 = `
            <div class="mt-5 mb-5 TheSadows">
                <div class="YSBDT"> 
                    <div class="TheSadows2 YSBDT1-1 GB-Flex">
                        <div class="YSBDT-Titulo">${value.Servicios}</div>
                    </div>
                    <div class="TheSadows2 YSBDT1-2">
                        <div class="YSBDT-Texto2">${value.Con_Texto}</div>
                    </div>
                    <div class="TheSadows YSBDT2">
                        <div id="YSBDT2-CarruselID" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                                <div class="carousel-inner">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="${value.Con_ImagenServer[0]}" class="d-block w-100 YSBDT-ImgSize" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="${value.Con_ImagenServer[1]}" class="d-block w-100 YSBDT-ImgSize" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="${value.Con_ImagenServer[2]}" class="d-block w-100 YSBDT-ImgSize" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="${value.Con_ImagenServer[3]}" class="d-block w-100 YSBDT-ImgSize" alt="...">
                                        </div>
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#YSBDT2-CarruselID" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#YSBDT2-CarruselID" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                                </button>
                        </div> 
                    </div>
                </div>
            </div>
            `;
            $('#VistPreva_Contenido').append(div2);
        });
        $("#ADSER_VistaP_Modal").modal("show");
    }

    RespuestaVistaPrevia_Programas(datos) {
        console.log(datos);
        $(".Modal_Contenidos_C").addClass("d-none");
        $("#VistPreva_Contenido").removeClass("d-none");
        $('#VistPreva_Contenido').empty();
        $.each(datos.data, function(key, value) {
            console.log(key);
            console.log(value);
            console.log(value.programa);
            let imagenUno = value.Con_ID_Imagen[0];
            let div2 = `
            <div class="mt-5 mb-5 TheSadows">
                <div class="YSBDT"> 
                    <div class="TheSadows2 YSBDT1-1 GB-Flex">
                        <div class="YSBDT-Titulo">${value.programa}</div>
                    </div>
                    <div class="TheSadows2 YSBDT1-2">
                        <div class="YSBDT-Texto2">${value.Con_Texto}</div>
                    </div>
                    <div class="TheSadows YSBDT2">
                        <div id="YSBDT2-CarruselID" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                                <div class="carousel-inner">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="${value.Con_ImagenServer[0]}" class="d-block w-100 YSBDT-ImgSize" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="${value.Con_ImagenServer[1]}" class="d-block w-100 YSBDT-ImgSize" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="${value.Con_ImagenServer[2]}" class="d-block w-100 YSBDT-ImgSize" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="${value.Con_ImagenServer[3]}" class="d-block w-100 YSBDT-ImgSize" alt="...">
                                        </div>
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#YSBDT2-CarruselID" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#YSBDT2-CarruselID" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                                </button>
                        </div> 
                    </div>
                </div>
            </div>
            `;
            $('#VistPreva_Contenido').append(div2);
        });
        $("#ADSER_VistaP_Modal").modal("show");
    }

    RespuestaModificarImg_Servicios(datos) {
        console.log(datos);
        $(".Modal_Contenidos_C").addClass("d-none");
        $("#ImagenesServicio_Contenido").removeClass("d-none");
        datos.data.forEach(info => {
            let option = `
            <div class="col-md-6 SerImg_SelectImg" data-idimagen="${info.Con_ID_Imagen}">
                <img src="${info.Con_ImagenServer}" style="height: 19em; width: 100%; border-radius: 0.75em;" alt="">
              </div>`;

            $("#ImagenesServicio_Contenido").append(option);
        });
        $("#ImagenesServicio_Contenido").append(`<div class="col-md-12 pl-2 pm-2"><div class="alert alert-info" role="alert">
            Seleccione la Imagen a Actualizar!
       </div></div>
       <div class="col-md-12 row" id="SerImg_SelectImg_Op">

        </div>`);

        $("#ADSER_VistaP_Modal").modal("show");
    }

    RespuestaModificarImg_Programas(datos) {
        console.log(datos);
        $(".Modal_Contenidos_C").addClass("d-none");
        $("#ImagenesPrograma_Contenido").removeClass("d-none");
        datos.data.forEach(info => {
            let option = `
            <div class="col-md-6 ProImg_SelectImg" data-idimagen="${info.Con_ID_Imagen}">
                <img src="${info.Con_ImagenServer}" style="height: 19em; width: 100%; border-radius: 0.75em;" alt="">
              </div>`;

            $("#ImagenesPrograma_Contenido").append(option);
        });
        $("#ImagenesPrograma_Contenido").append(`<div class="col-md-12 pl-2 pm-2"><div class="alert alert-info" role="alert">
            Seleccione la Imagen a Actualizar!
       </div></div>
       <div class="col-md-12 row" id="ProImg_SelectImg_Op">

        </div>`);

        $("#ADSER_VistaP_Modal").modal("show");
    }

    RespuestaUpdateImg_Servicios(datos) {
        $("#ADSER_VistaP_Modal").modal("hide");
        setTimeout(() => {
            peticionesAdmin.msgSuccess("Actualizacion Completa", "Imagen actualizada de manera Exitosa");
        }, 500)
    }

    RespuestaModTexto_Servicios(datos) {
        peticionesAdmin.msgClose();
        $(".Modal_Contenidos_C").addClass("d-none");
        $("#TSC_OldCnt").val(datos.data[0].Con_Texto);
        $("#TSC_IDCnt").val(datos.data[0].Con_ID_Texto);
        $("#TextoServicio_Contenido").removeClass("d-none");
        $("#ADSER_VistaP_Modal").modal("show");
        // peticionesAdmin.msgExito();
    }

    RespuestaModTexto_Programas(datos) {
        peticionesAdmin.msgClose();
        $(".Modal_Contenidos_C").addClass("d-none");
        $("#TSC_OldCnt_Pro").val(datos.data[0].Con_Texto);
        $("#TSC_IDCnt_Pro").val(datos.data[0].Con_ID_Texto);
        $("#TextoProgramas_Contenido").removeClass("d-none");
        $("#ADSER_VistaP_Modal").modal("show");
        // peticionesAdmin.msgExito();
    }

    RespuestaUpdateTexto_Servicios(datos) {
        $("#ADSER_VistaP_Modal").modal("hide");
        setTimeout(() => {
            peticionesAdmin.msgSuccess("Actualizacion de Texto Completa");
        }, 500)

    }
}

const peticionesAdmin = new adminPeticiones();
const respuestasAdmin = new adminRespuestas();
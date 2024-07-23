let xhrPeticion = "";

class ToolsHome {
    async peticionAjax(method, route, data, redirect) {
        try {
            $.ajaxSetup({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });
    
             $.ajax({
                type:method,
                url: route,
                data: data,
                success: function(data) {
                    toolsHome.redirectPeticion(data, redirect);
                },
                error: function (msg) {
                   console.log(msg);
                   var errors = msg.responseJSON;
                }
             });
        } catch(e) {
            console.log(e);
        }
    }

    async myOwnPeticion(ruta, metodo, data, redirect) {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let headers = {
            'X-CSRF-TOKEN': csrfToken
        };
        let ajaxSettings = {
            url: ruta,
            type: metodo,
            data: data,
            headers: headers,
            success: function(response) {
                toolsHome.redirectPeticion(redirect, response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        }

        xhrPeticion = $.ajax(ajaxSettings);
        return xhrPeticion;
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

    async redirectPeticion(redirect, datos) {
        switch (redirect) {
            case "1":
                rutasProyect = datos;
                break;

            case "2":
                console.log("Llego de donde deberia", datos)
                let card = "";
                let num = 1;
                $("#PreC_MainCard").empty();
                    datos.forEach(info => {
                        console.log(info);
                        card = `
                        <div class="GB-Flex PREC-CardPJ" >
                          <div class="PRECCard GBborderWhite">
                            <div class="GBborderWhite PRECView" id="PREC-View${num}"></div>
                            <div class="PRECSteps">
                                <div class="GBborderWhite PRECStepO GBTextCenter"><p>${info.proyecto_nombre}</p></div>
                                <div class="GBborderWhite PRECStepT"><p>${info.texto}</p></div>
                                <div class="GB-Flex PRECStepTh"><button type="button" class="btn btn-primary">CONOCE MAS</button></div>
                            </div>
                          </div>
                        </div>`;
                        document.querySelector(':root').style.setProperty('--global-projecto' + num, 'url(' + info.imagen + ')')
                    // $('html').css("--card-projecto1", "/assets/images/tortuga.jpg");
                    $("#PreC_MainCard").append(card);
                    num++;
                })
                break;

            case "3":
                break;

            case "Programas-1":
                respuestasPeticiones.RespuestaCuarenta(datos)
                break;

            case "Programas-2":
                respuestasPeticiones.RespuestaProgramasOne(datos)
                break;
                
            case "Servicios-1":
                respuestasPeticiones.RespuestaServiciosOne(datos)
                break;

            case "Servicios-2":
                respuestasPeticiones.RespuestaServiciosTwo(datos)
                break;
        }
    }
}

class RespuestasPeticiones {
    RespuestaProgramasOne(datos) {
        $('#TESTSN-CardsMain').empty();
        datos.data.forEach(info => {
            console.log(info)
            let bloque = `
                <div class="TESTSN-Cards TESTSN-Flex TESTSN-CardsPro" data-idprograma="${info.S_IDServicio}">
                    <div class="TESTSN-CardText TESTSN-Flex">${info.S_Servicio}</div>
                </div>
            `;
            $('#TESTSN-CardsMain').append(bloque);
        });
    }

    RespuestaCuarenta(datos) {
        toolsHome.msgClose();

        $('#PPRO-Main').empty();
        $.each(datos.data, function(key, value) {
            console.log(key);
            console.log(value);

            let imagenUno = value.Con_ID_Imagen[0];

            let div = `
                <div class="PSSN-Main ">
                    <div class="PSSN-Title GBTextCenter">
                    <h1 style="color:#ffcc00;">${value.programa}</h1>
                    </div>
                    <div class="PSSN-Img ">
                        <div class="PSSN-I-1 PSSN-BB">
                            <img src="${value.Con_ImagenServer[0]}" style="width: 100%; height: 58em; border-radius: 0.75em;" alt="">
                        </div>
                        <div class="PSSN-I-2 ">
                            <div class="PSSN-I-I-1 PSSN-BB">
                                <img src="${value.Con_ImagenServer[1]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                            </div>
                            <div class="PSSN-I-I-2 PSSN-BB">
                                <img src="${value.Con_ImagenServer[2]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                            </div>
                            <div class="PSSN-I-I-3 PSSN-BB">
                            <img src="${value.Con_ImagenServer[3]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                                                        
                            </div>
                        </div>
                    </div>
                    <div class="PSSN-Text PSSN-BB p-3 GBborderBlack">
                        <p style="">${value.Con_Texto}</p>
                    </div>
                </div>
            `;

            let div2 = `
            <div class="mt-5 mb-5 TheSadows">
                <div class="AHIPMD"> 
                    <div class="TheSadows2 AHIPMD1-1 GB-Flex">
                        <div class="AHIPMD-Titulo">${value.programa}</div>
                    </div>
                    <div class="TheSadows2 AHIPMD1-2">
                        <div class="AHIPMD-Texto2">${value.Con_Texto}</div>
                    </div>
                    <div class="TheSadows AHIPMD2">
                        <div id="AHIPMD2-CarruselID" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        </div>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img src="${value.Con_ImagenServer[0]}" class="d-block w-100 AHIPMD-ImgSize" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="${value.Con_ImagenServer[1]}" class="d-block w-100 AHIPMD-ImgSize" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="${value.Con_ImagenServer[2]}" class="d-block w-100 AHIPMD-ImgSize" alt="...">
                              </div>
                              <div class="carousel-item">
                                <img src="${value.Con_ImagenServer[3]}" class="d-block w-100 AHIPMD-ImgSize" alt="...">
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#AHIPMD2-CarruselID" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#AHIPMD2-CarruselID" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                          </div> 
                    </div>
                </div>
            </div>
            `;
            $('#PPRO-Main').append(div2);
        });
        // peticionesAdmin.msgClose();
    }

    RespuestaServiciosOne(datos) {
        $('#TESTSN-CardsMain').empty();
        datos.data.forEach(info => {
            console.log(info)
            let bloque = `
                <div class="TESTSN-Cards TESTSN-Flex" data-idservicio="${info.S_IDServicio}">
                    <div class="TESTSN-CardText TESTSN-Flex">${info.S_Servicio}</div>
                </div>
            `;
            $('#TESTSN-CardsMain').append(bloque);
        });
    }

    RespuestaServiciosTwo(datos) {
        toolsHome.msgClose();

        $('#PSER-Main').empty();
        $.each(datos.data, function(key, value) {
            console.log(key);
            console.log(value);

            let imagenUno = value.Con_ID_Imagen[0];

            let div = `
                <div class="PSER-Main">
                    <div class="PSER-Title GBTextCenter">
                    <h1 style="color:#ffcc00;">${value.Servicios}</h1>
                    </div>
                    <div class="PSER-Img ">
                        <div class="PSER-I-1 PSER-BB">
                            <img src="${value.Con_ImagenServer[0]}" style="width: 100%; height: 58em; border-radius: 0.75em;" alt="">
                        </div>
                        <div class="PSER-I-2 ">
                            <div class="PSER-I-I-1 PSER-BB">
                                <img src="${value.Con_ImagenServer[1]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                            </div>
                            <div class="PSER-I-I-2 PSER-BB">
                                <img src="${value.Con_ImagenServer[2]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                            </div>
                            <div class="PSER-I-I-3 PSER-BB">
                            <img src="${value.Con_ImagenServer[3]}" style="width: 100%; height: 19em; border-radius: 0.75em; " alt="">
                                                        
                            </div>
                        </div>
                    </div>
                    <div class="PSER-Text PSER-BB p-3 GBborderBlack">
                        <p style="">${value.Con_Texto}</p>
                    </div>
                </div>
            `;

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
            $('#PSER-Main').append(div2);
        });
        // peticionesAdmin.msgClose();
    }
}

const toolsHome = new ToolsHome();
const respuestasPeticiones = new RespuestasPeticiones();
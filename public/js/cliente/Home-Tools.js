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
        $('#PP-Main').empty();
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
            $('#PP-Main').append(div);
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
            $('#PSER-Main').append(div);
        });
        // peticionesAdmin.msgClose();
    }
}

const toolsHome = new ToolsHome();
const respuestasPeticiones = new RespuestasPeticiones();
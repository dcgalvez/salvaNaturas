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

    async redirectPeticion(datos, redirect) {
        switch (redirect) {
            case "1":
                rutasProyect = datos;
                break;

            case "2":
                let card = "";
                $("#PreC_MainCard").empty();
                    datos.forEach(info => {
                        card = `<div class="card borderBlack" id="PreC_card">
                        <div class="card-body borderBlack marginG TheStructure">
                            <div class="imagePSN borderBlack "><img src="${info.imagen}" alt="Imagenes Home"></div>
                            <div class="textoPSN borderBlack ">
                                <div class="borderBlack uncuartos displayFlex" id="mainText">PROYECTO ${info.proyecto_nombre}</div>
                                <div class="borderBlack trescuartos displayFlex" id="middleText">
                                    <p>${info.texto}</p>
                                </div>
                                <div class="borderBlack uncuartos displayFlex_right" id="lastText">
                                    <a href="" class="lastText">🔍 Continuar leyendo del proyecto</a>
                                </div>
                            </div>
                        </div>
                    </div>`

                    $("#PreC_MainCard").append(card);
                })
                break;

            case "3":
                break;
        }
    }
}

const toolsHome = new ToolsHome();
class ToolsHome {
    async peticionAjax(method, route, data, redirect) {
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
                this.redirectPeticion(data, redirect);
            },
            error: function (msg) {
               console.log(msg);
               var errors = msg.responseJSON;
            }
         });
    }

    async redirectPeticion(datos, redirect) {
        switch (redirect) {
            case 1:
                console.log("Los datos que llegan");
                rutasProyect = datos;
                return rutasProyect;
                break;

            case 2:
                console.log(datos);
                let card = "";
                $("#divcard").empty();
                datos.forEach(info => {

                    card = `<div class="card borderBlack" id="PreC_card">
                    <div class="card-body borderBlack marginG TheStructure">
                        <div class="imagePSN borderBlack "><img src="${info.imagen}" alt="Imagen 1">
                        </div>
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

                $("#divcard").append(card);
                })
                break;
        }
    }
}

const toolsHome = new ToolsHome();
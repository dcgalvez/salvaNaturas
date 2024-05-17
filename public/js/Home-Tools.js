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
                let num = 1;
                $("#PreC_MainCard").empty();
                    datos.forEach(info => {
                        console.log(info);
                        card = `
                        <div class="GBDisplayFlex PREC-CardPJ" >
                          <div class="PRECCard GBborderWhite">
                            <div class="GBborderWhite PRECView" id="PRECVIEW${num}"></div>
                            <div class="PRECSteps">
                                <div class="GBborderWhite PRECStepO GBTextCenter"><p>${info.proyecto_nombre}</p></div>
                                <div class="GBborderWhite PRECStepT"><p>${info.texto}</p></div>
                                <div class="GBborderWhite GBDisplayFlex PRECStepTh"><button type="button" class="btn btn-primary"> LOOK MORE OF... </button></div>
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
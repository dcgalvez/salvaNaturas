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
                console.log("Llego de donde deberia", datos)
                let card = "";
                let num = 1;
                $("#PreC_MainCard").empty();
                    datos.forEach(info => {
                        console.log(info);
                        card = `
                        <div class="GBDisplayFlex PREC-CardPJ" >
                          <div class="PRECCard GBborderWhite">
                            <div class="GBborderWhite PRECView" id="PREC-View${num}"></div>
                            <div class="PRECSteps">
                                <div class="GBborderWhite PRECStepO GBTextCenter"><p>${info.proyecto_nombre}</p></div>
                                <div class="GBborderWhite PRECStepT"><p>${info.texto}</p></div>
                                <div class="GBDisplayFlex PRECStepTh"><button type="button" class="btn btn-primary">CONOCE MAS</button></div>
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
        }
    }
}

const toolsHome = new ToolsHome();
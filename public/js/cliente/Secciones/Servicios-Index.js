$(() => {    
    console.log('Index de Servicios', URL_GetContenidoServicios);
    toolsHome.myOwnPeticion(URL_GetContenidoServiciosAll,'GET',{},'Servicios-1');
    // peticionesAdmin.myOwnPeticion(rutaGet_Contenido, 'GET', {}, 40);
});

$(document).on('click', '.TESTSN-Cards', function() {
    let data = $(this).data('idservicio');
    console.log(data)
    toolsHome.msgCarga('Cargando...');
    toolsHome.myOwnPeticion(URL_GetContenidoServicios,'GET',{id: data},'Servicios-2');
})
$(() => {    
    console.log('Index de Programas', URL_GetContenidoProgramas);
    toolsHome.myOwnPeticion(URL_GetContenidoProgramasAll,'GET',{},'Programas-2');
    // peticionesAdmin.myOwnPeticion(rutaGet_Contenido, 'GET', {}, 40);
});

$(document).on('click', '.TESTSN-CardsPro', function() {
    let data = $(this).data('idprograma');
    console.log(data)
    toolsHome.myOwnPeticion(URL_GetContenidoProgramas,'GET',{id: data},'Programas-1');
})
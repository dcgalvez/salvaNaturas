let rutasProyect = "";
const root_theme = document.querySelector(':root');

$(() => {    
    toolsHome.peticionAjax('get', '/rutas', {}, "1");
    toolsHome.peticionAjax('get', '/info', {}, "2");
    // toolsHome.peticionAjax('get', '/noticias', {}, "3"); 
});

$(document).on('click', '#Redirect_Cordillera', function(e) {
    e.preventDefault();
    toolsHome.peticionAjax('get', '/cordilleras_cuencas', {}, "");
});
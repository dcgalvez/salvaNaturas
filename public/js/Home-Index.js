let rutasProyect = "";
$(() => {    
    toolsHome.peticionAjax('get', '/rutas', {}, "1");
    toolsHome.peticionAjax('get', '/info', {}, "2");
    toolsHome.peticionAjax('get', '/noticias', {}, "3");
});
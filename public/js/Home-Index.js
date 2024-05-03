let rutasProyect = ""; 
$(() => {    
    toolsHome.peticionAjax('get', '/rutas', {}, 1);
    toolsHome.peticionAjax('get', '/info', {}, 2);
});
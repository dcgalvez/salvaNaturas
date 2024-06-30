const mix = require('laravel-mix');

let administradorVersion = 'v.1';


mix.scripts([
    //Archivos necesarios
    'public/js/Admin-Main.js'
], 'public/compilacion/seccion-administrador.js')
    .styles([
        //Archivos necesarios
        'public/css/admin.css',
        // 'public/css/navbar.css',
        // 'public/css/p-inicio.css'
    ], 'public/compilacion/seccion-administrador.css')
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    })
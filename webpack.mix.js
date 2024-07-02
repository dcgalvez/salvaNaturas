const mix = require('laravel-mix');

let administradorVersion = 'v.1';


mix.scripts([
    'public/js/Admin-Main.js'
], 'public/compilacion/seccion-administrador.js')
.styles([
    'public/css/admin.css',
], 'public/compilacion/seccion-administrador.css')
.autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
})

mix.scripts([
    'public/js/Home-Index.js',
    'public/js/Home-Tools.js'
], 'public/compilacion/usuario.js')
.styles([
    'public/css/p-inicio.css',
    'public/css/navbar.css'
], 'public/compilacion/usuario.css')
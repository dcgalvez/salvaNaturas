const mix = require('laravel-mix');

let administradorVersion = 'v.1';


mix.scripts([
    'public/js/jquery/jquery-3.7.1.js',
    'public/js/Login.js',
    'public/js/Admin-Main.js'
], 'public/compilacion/seccion-administrador.js')
.styles([
    'public/css/admin.css',
    'public/css/login.css',
], 'public/compilacion/seccion-administrador.css')

mix.scripts([
    'public/js/jquery/jquery-3.7.1.js',
    'public/js/Home-Index.js',
    'public/js/Home-Tools.js'
], 'public/compilacion/usuario.js')
.styles([
    'public/css/p-inicio.css',
    'public/css/navbar.css',
    'public/css/p-contactanos.css'
], 'public/compilacion/usuario.css')
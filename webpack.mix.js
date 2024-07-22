const mix = require('laravel-mix');

let administradorVersion = 'v.1';


mix.scripts([
    'public/js/jquery/jquery-3.7.1.js',
    'public/js/admin/adminMain.js',
    'public/js/admin/adminTools.js'
], 'public/compilacion/seccion-administrador.js')
.styles([
    'public/css/global.css',
    'public/css/admin.css',
], 'public/compilacion/seccion-administrador.css')

mix.scripts([
    'public/js/jquery/jquery-3.7.1.js',
    'public/js/cliente/Home-Index.js',
    'public/js/cliente/Home-Tools.js'
], 'public/compilacion/usuario.js')
.styles([
    'public/css/global.css',
    'public/css/p-inicio.css',
    'public/css/navbar.css'
], 'public/compilacion/usuario.css')

// COMPILACION PROGRAMAS
mix.scripts([
    'public/js/jquery/jquery-3.7.1.js',
    'public/js/cliente/Secciones/Programas-Index.js',
    'public/js/cliente/Home-Tools.js'
], 'public/compilacion/usuario-programas.js')
.styles([
    'public/css/global.css',
    'public/css/p-inicio.css',
    'public/css/navbar.css',
    'public/css/p-programas.css'
], 'public/compilacion/usuario-programas.css')

// COMPILACION SERVICIOS
mix.scripts([
    'public/js/jquery/jquery-3.7.1.js',
    'public/js/cliente/Secciones/Servicios-Index.js',
    'public/js/cliente/Home-Tools.js'
], 'public/compilacion/usuario-servicios.js')
.styles([
    'public/css/global.css',
    'public/css/p-inicio.css',
    'public/css/navbar.css',
    'public/css/p-servicios.css'
], 'public/compilacion/usuario-servicios.css')


mix.scripts([
    'public/js/jquery/jquery-3.7.1.js',
    'public/js/cliente/P-Contactanos.js',
    'public/js/cliente/Home-Tools.js'
], 'public/compilacion/usuario-contactanos.js')
.styles([
    'public/css/global.css',
    'public/css/navbar.css',
    'public/css/p-inicio.css',
    'public/css/p-contactanos.css'
], 'public/compilacion/usuario-contactanos.css')

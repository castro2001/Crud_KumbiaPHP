<?php
/**
 * KumbiaPHP Web Framework
 * Archivo de rutas (Opcional)
 * 
 * Usa este archivo para definir el enrutamiento estatico entre
 * controladores y sus acciones.Un controlador se puede enrutar a 
 * otro controlador utilizando '*' como comodin así:
 * 
 * '/controlador1/accion1/valor_id1'  =>  'controlador2/accion2/valor_id2'
 * 
 * Ej:
 * Enrutar cualquier petición a posts/adicionar a posts/insertar/*
 * '/posts/adicionar/*' => 'posts/insertar/*'
 * 
 * Otros ejemplos:
 * 
 * '/prueba/ruta1/*' => 'prueba/ruta2/*',
 * '/prueba/ruta2/*' => 'prueba/ruta3/*',
 */
return [
    'routes' => [
        /**
         * Muestra la info relacionado con el framework
         */
        '/' => 'index/index',
        '/productos'=>'productos/index',
        '/productos/crear'=>'productos/crear',
        '/productos/editar'=>'productos/editar',


        '/categorias'=>'categorias/index',
        '/categorias/crear'=>'categorias/crear',
        '/categorias/editar'=>'categorias/editar',






        /**
         * Status del config.php/config.ini
         */
        '/status' => 'pages/kumbia/status'
        
        ],
];

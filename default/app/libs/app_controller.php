<?php
/**
 * @see Controller nuevo controller
 */
require_once CORE_PATH . 'kumbia/controller.php';

/**
 * Controlador principal que heredan los controladores
 *
 * Todos las controladores heredan de esta clase en un nivel superior
 * por lo tanto los métodos aquií definidos estan disponibles para
 * cualquier controlador.
 *
 * @category Kumbia
 * @package Controller
 */
abstract class AppController extends Controller
{

    final protected function initialize()
    {
         // Si el usuario no ha iniciado sesión y no está en el controlador 'index', redirigir al login
        if (!Session::has('usuario_id') && Router::get('controller') !== 'index') {
            Flash::info('Debes iniciar sesión para acceder a esta página.');
            Redirect::to('/');
        }

        // Si el usuario ya inició sesión y está en el controlador 'index', redirigir a 'productos'
        if (Session::has('usuario_id') && Router::get('controller') === 'index') {
            Redirect::to('productos');
        }
    }

    final protected function finalize()
    {
        
    }

}

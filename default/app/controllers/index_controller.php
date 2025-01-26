<?php

/**
 * Controller por defecto si no se usa el routes
 *
 */

class IndexController extends AppController
{

    public function index()
    {

    // Redirigir a 'productos' si el usuario ya inició sesión
    if (Session::has('usuario_id')) {
        return Redirect::to('productos');
    }
    }

    public function ingresar()
    {
        Load::models('usuarios');
        
        // Desactivar la vista automática para manejar la respuesta
        View::select(null);
        
        // Verificar si se enviaron datos por POST
        if (Input::hasPost('usuario')) {
            $email = Input::post('usuario.email');
            $password = Input::post('usuario.password');
            
            // Instancia del modelo Usuarios
            $usuarios = new Usuarios();
            
            // Intentar autenticar al usuario
            $usuario = $usuarios->login($email, $password);
            
            if ($usuario) {
                // Usuario autenticado
                // Aquí puedes iniciar la sesión del usuario
                Session::set('usuario_id', $usuario->id);
                Session::set('usuario_nombre', $usuario->nombre);
                Flash::valid("¡Bienvenido, {$usuario->nombre}!");
                return Redirect::to('productos');
                //Router::execute('/');
            
                //return Router::redirect('dashboard'); // Cambia a la ruta protegida
            } else {
                // Credenciales incorrectas
                Flash::error('Email o contraseña incorrectos.');
                //Router::execute('/');
               // return Router::redirect('index'); // Regresar al formulario
            }
        }
    }
    

    public function salir()
    {
        // Cerrar sesión
        Session::delete('usuario_id');
        Session::delete('usuario_nombre');
        Flash::info('Has cerrado sesión.');
        return Redirect::to('/');
    }
    
}

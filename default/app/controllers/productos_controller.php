<?php

/**
 * Controller por defecto si no se usa el routes
 *
 */
class ProductosController extends AppController
{

    public function index()
    {
        $this->productos = Load::model('productos')->find() ;
        $this->campos= [
            'nombre'=>'nombre',
            'descripcion'=>'descripcion',
            'imagen'=>'imagen',
            'precio'=>'precio',
            'fecha_alta'=>'fecha_alta',
            'estado'=>'estado',
            'Acciones'=>'Acciones'
        ];


    }

    public function crear() 
    {
        
        $this->campos= [
            'nombre'=>'nombre',
            'descripcion'=>'descripcion',
            'imagen'=>'imagen',
            'precio'=>'precio',
        ];
    }
    
    public function editar(int $id) 
    {


    }

    public function crearProductos(){
        // Desactivar la vista automática para manejar la respuesta
         View::select(null);
         Load::models('productos');
         if(Input::hasPost('productos')){
            var_dump(Input::post('productos'));
            var_dump(Upload::factory('productos'));
         }
    }
        
}

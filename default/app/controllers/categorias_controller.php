<?php
class CategoriasController extends AppController
{
    public function index() 
    {
        $this->categorias = Load::model('categorias')->find() ;
        $this->campos= [
            'categoria'=>'categoria',
            
        ];
    }

    
    public function crear() 
    {
    
    }
    
    public function editar(int $id) 
    {

        $this->categorias = Load::model('categorias')->find() ;
    }

}
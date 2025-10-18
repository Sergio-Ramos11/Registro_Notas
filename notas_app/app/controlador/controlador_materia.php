<?php
namespace App\Controlador;

require __DIR__ . "/../modelo/estudiante.php";

use App\Modelo\Materia;

class MateriaControlador
{

    public function queryAllMaterias(){
        $materia = new Materia();
        return $materia->all();
    }

    public function saveNewMateria($request)
    {
        if($this->validar($request))
        {
            return false;
        }
        $materia = new Materia();
        $materia->set('codigo', $request['codigo']);
        $materia->set('nombre', $request['nombre']);
        $materia->set('programa', $request['programa']);
        return $materia->insert();
    } 

    public function deleteMateria()
    {
        if(empty($request['codigo']))
        {
            return false;
        }
        $materia = new Materia();
        $materia->set('codigo', $request['codigo']);
        return $materia->delete();
    }

    public function updateMateria($request)
    {
        if($this->validar($request))
        {
            return false;
        }
        $materia = new Materia();
        $materia->set('codigo', $request['codigo']);
        $materia->set('nombre', $request['nombre']);
        $materia->set('programa', $request['programa']);
    }

    private function validar($request){
        return empty($request['codigo'] 
            || empty($request['nombre'])  
            || empty($request['programa']));
    }
}
?>
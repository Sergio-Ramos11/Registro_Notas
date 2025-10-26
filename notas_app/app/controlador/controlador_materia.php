<?php
namespace App\Controlador;

require_once __DIR__ . "/../modelo/materia.php";

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

    public function deleteMateria($codigo)
    {
        if(empty($request['codigo']))
        {
            return false;
        }
        $materia = new Materia();
        $materia->set('codigo', $codigo);
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
        return $materia->update();
    }

    private function validar($request){
        return empty($request['codigo'] 
            || empty($request['nombre'])  
            || empty($request['programa']));
    }
}
?>
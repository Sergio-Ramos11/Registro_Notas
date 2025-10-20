<?php
namespace App\Controlador;

require __DIR__ . "/../modelo/programa.php";

use App\Modelo\Programa;

class ProgramaControlador
{
    public function queryAllProgramas()
    {
        $programa = new Programa();
        return $programa->all();
    }

    public function saveNewPrograma($request)
    {
        if($this->validar($request))
        {
            return false;
        }
        $programa = new Programa();
        $programa->set('codigo', $request['codigo']);
        $programa->set('nombre', $request['nombre']);
        return $programa->insert();
    }

    public function deleteProgrma($request)
    {
        if(empty($request['codigo']))
        {
            return false;
        }
        $programa = new Programa();
        $programa->set('codigo', $request['codigo']);
        return $programa->delete();
    }

    public function updatePrograma($request)
    {
        if($this->validar($request))
        {
            return false;
        }
        $programa = new Programa();
        $programa->set('codigo', $request['codigo']);
        $programa->set('nombre', $request['nombre']);
        return $programa->update();

    }

    private function validar($request){
        return empty($request['codigo'] 
            || empty($request['nombre']));
    }
}
?>
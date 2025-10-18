<?php
namespace App\Controlador;

require __DIR__ . "/../modelo/nota.php";

use App\Modelo\Nota;

class NotaControlador
{
    public function queryAllNota(){
        $nota = new Nota();
        return $nota->all();
    }

    public function saveNewNota($request)
    {
        if($this->validar($request)){
            return false;
        }
        $nota = new Nota();
        $nota->set('materia', $request['materia']);
        $nota->set('estudiante', $request['estudiante']);
        $nota->set('actividad', $request['actividad']);
        $nota->set('nota', $request['nota']);
        return $nota->insert();
    }



    private function validar($request){
        return empty($request['materia'] 
            || empty($request['estudiante']) 
            || empty($request['actividad']) 
            || empty($request['nota']));
    }
}


?>
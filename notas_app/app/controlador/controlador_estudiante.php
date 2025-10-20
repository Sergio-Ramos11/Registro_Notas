<?php
namespace App\Controlador;

require __DIR__ . "/../modelo/estudiante.php";

use App\Modelo\Estudiante;

class EstudiantesControlador
{

    public function queryAllEstudiantes(){
        $estudiante = new Estudiante();
        return $estudiante->all();
    }

    public function saveNewEstudiante($request)
    {
        if($this->validar($request)){
            return false;
        }

        $estudiante = new Estudiante();
        $estudiante->set('codigo', $request['codigo']);
        $estudiante->set('nombre', $request['nombre']);
        $estudiante->set('email', $request['email']);
        $estudiante->set('programa', $request['programa']);
        return $estudiante->insert();
    }

    public function deleteEstudiante($request)
    {
        if(empty($request['codigo']))
        {
            return false;
        }
        $estudiante = new Estudiante();
        $estudiante->set('codigo', $request['codigo']);
        return $estudiante->delete();
    }

    public function updateEstudiante($request)
    {
        if($this->validar($request)){
        }{
            return false;
        }
        $estudiante = new Estudiante();
        $estudiante->set('codigo'. $request['codigo']);
        $estudiante->set('nombre', $request['nombre']);
        $estudiante->set('email', $request['email']);
        $estudiante->set('programa', $request['programa']);
        return $estudiante->update();
    }

    private function validar($request){
        return empty($request['codigo'] 
            || empty($request['nombre']) 
            || empty($request['email']) 
            || empty($request['programa']));
    }
}
?>
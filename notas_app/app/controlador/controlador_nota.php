<?php

namespace App\Controlador;

require_once __DIR__ . "/../modelo/nota.php";

use App\Modelo\Nota;

class NotaControlador
{

    public function queryAllNotas()
    {
        $nota = new Nota();
        return $nota->all();
    }
    

    public function saveNewNota($request)
    {
        if ($this->validar($request)) {
            return false;
        }
        $nota = new Nota(); 
        $nota->set('estudiante', $request['estudiante']);
        $nota->set('materia', $request['materia']);
        $nota->set('actividad', $request['actividad']);
        $nota->set('nota', $request['nota']);
        return $nota->insert();
    }

    public function deleteNota($estudiante, $materia)
    {
        $nota = new Nota();
        $nota->set('estudiante', $estudiante);
        $nota->set('materia', $materia);
        return $nota->delete();
    }


    public function updateNota($request)
    {
        if ($this->validar($request)) {
            return false;
        }
        $nota = new Nota();
        $nota->set('materia', $request['materia']);
        $nota->set('estudiante', $request['estudiante']);
        $nota->set('actividad', $request['actividad']);
        $nota->set('nota', $request['nota']);
        return $nota->update();
    }


    private function validar($request)
    {
        return empty($request['materia']
            || empty($request['estudiante'])
            || empty($request['actividad'])
            || empty($request['nota']));
    }
}

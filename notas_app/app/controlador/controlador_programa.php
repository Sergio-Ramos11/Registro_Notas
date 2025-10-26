<?php

namespace App\Controlador;

require_once __DIR__ . "/../modelo/programa.php";
require_once __DIR__ . "/../modelo/materia.php";
require_once __DIR__ . "/../modelo/estudiante.php";

use App\Modelo\Programa;
use App\Modelo\Materia;
use App\Modelo\Estudiante;

class ProgramaControlador
{
    public function queryAllProgramas()
    {
        $programa = new Programa();
        return $programa->all();
    }

    public function saveNewPrograma($request)
    {
        if (
            empty($request['codigo'])
            || empty($request['nombre'])
        ) {
            return false;
        }
        $programa = new Programa();
        $programa->set('codigo', $request['codigo']);
        $programa->set('nombre', $request['nombre']);
        return $programa->insert();
    }



    public function deletePrograma($codigo)
    {
        /*$materiaModel = new Materia();
        $tieneMaterias = $materiaModel->tieneMaterias($request);
        if ($tieneMaterias) {
            return ["error" => "No se puede eliminar este programa porque tiene materias asociadas."];
        }

        $estudianteModel = new Estudiante();
        $tieneEstudiantes = $estudianteModel->tieneEstudiantes($request);
        if ($tieneEstudiantes) {
            return ["error" => "No se puede eliminar este programa porque tiene estudiantes asociados."];
        }*/

        $programa = new Programa();
        $programa->set('codigo', $codigo);
        return $programa->delete();
    }

    public function updatePrograma($request)
    {
        $codigo = $request['codigo'];

        $materiaModel = new Materia();
        $tieneMaterias = $materiaModel->tieneMaterias($codigo);

        $estudianteModel = new Estudiante();
        $tieneEstudiantes = $estudianteModel->tieneEstudiantes($codigo);

        if ($tieneMaterias || $tieneEstudiantes) {
            return ["error" => "No se puede modificar este programa porque tiene materias o estudiantes asociados."];
        }

        $programa = new Programa();
        $programa->set('codigo', $codigo);
        $programa->set('nombre', $request['nombre']);

        return $programa->update();

    }
}
?>
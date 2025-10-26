<?php

namespace App\Controlador;

require_once __DIR__ . '/../modelo/nota.php';
require_once __DIR__ . '/../modelo/estudiante.php';

use App\Modelo\Estudiante;
use App\Modelo\Nota;
use mysqli_sql_exception;

class EstudiantesControlador
{

    public function queryAllEstudiantes()
    {
        $estudiante = new Estudiante();
        return $estudiante->all();
    }



    public function saveNewEstudiante($request)
    {
        if ($this->validar($request)) {
            return false;
        }

        $estudiante = new Estudiante();
        $estudiante->set('codigo', $request['codigo']);
        $estudiante->set('nombre', $request['nombre']);
        $estudiante->set('email', $request['email']);
        $estudiante->set('programa', $request['programa']);

        try {
            return $estudiante->insert();
        } catch (mysqli_sql_exception $e) {
            $this->mostrarErrorSQL($e);
            return false;
        }
    }

   

    public function updateEstudiante()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo'])) {

            $estudiante = new Estudiante();
            $estudiante->set('codigo', $_POST['codigo']);
            $estudiante->set('nombre', $_POST['nombre']);
            $estudiante->set('email', $_POST['email']);
            $estudiante->set('programa', $_POST['programa']);

            try {
                return $resultado = $estudiante->update();

                if ($resultado) {
                    echo "<script>alert('Estudiante actualizado correctamente'); window.location.href='listar.php';</script>";
                } else {
                    echo "<script>alert('Error al actualizar el estudiante');</script>";
                }

            } catch (mysqli_sql_exception $e) {
                if (str_contains($e->getMessage(), 'foreign key') || str_contains($e->getMessage(), 'a foreign key constraint fails')) {
                    echo "<script>alert('No se puede modificar el estudiante porque el programa asignado no existe o hay materias asociadas.');</script>";
                } else {
                    echo "<script>alert('Error inesperado: " . addslashes($e->getMessage()) . "');</script>";
                }
            }
        }
    }

     public function deleteEstudiante($codigo)
    {
        $estudiante = new Estudiante();
        $estudiante->set('codigo', $codigo);

        try {
            $resultado = $estudiante->delete();

            if ($resultado) {
                echo "<script>alert('Estudiante eliminado correctamente'); window.location.href='listar.php';</script>";
            } else {
                echo "<script>alert('Error al eliminar el estudiante');</script>";
            }

        } catch (mysqli_sql_exception $e) {
            if (str_contains($e->getMessage(), 'foreign key') || str_contains($e->getMessage(), 'a foreign key constraint fails')) {
                echo "<script>alert('No se puede eliminar este estudiante porque tiene materias o notas registradas.'); window.location.href='listar.php';</script>";
            } else {
                echo "<script>alert('Error inesperado: " . addslashes($e->getMessage()) . "');</script>";
            }
        }
    }

    private function validar($request)
    {
        return empty($request['codigo']
            || empty($request['nombre'])
            || empty($request['email'])
            || empty($request['programa']));
    }

    private function mostrarErrorSQL($e)
    {
        if (str_contains($e->getMessage(), 'foreign key') || str_contains($e->getMessage(), 'a foreign key constraint fails')) {
            echo "<script>alert('Error: No se puede completar la operación por relaciones existentes.');</script>";
        } else {
            echo "<script>alert('Error en la base de datos: " . addslashes($e->getMessage()) . "');</script>";
        }
    }
}

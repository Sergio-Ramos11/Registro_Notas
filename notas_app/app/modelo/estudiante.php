<?php
namespace App\Modelo;

require __DIR__ . '/databases/db.php';
require __DIR__ . '/modelo_sql/modelo.php';
require __DIR__ . '/modelo_sql/sql_estudiantes.php';

use App\Modelo\Databases\DB;
use App\Modelo\SQLmodelo\Modelo;
use App\Modelo\SQLmodelo\SQLEstudiante;

class Estudiante extends Modelo
{
    private $codigo = null;
    private $nombre = null;
    private $email = null;
    private $programa = null;

    public function get($prop){
        return $this->{$prop};
    }

    public function set($prop, $value){
        $this->{$prop} = $value;
    }

    public function all(){
        $sql = SQLEstudiante::selectAll();
        $db = new DB();
        $result = $db->execSQL($sql, true);
        $estudiantes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $estudiante = new Estudiante();
                $estudiante->set('codigo', $row["codigo"]);
                $estudiante->set('nombre', $row["nombre"]);
                $estudiante->set('email', $row["email"]);
                $estudiante->set('programa', $row["programa"]);
                array_push($estudiantes, $estudiante);
            }
        }
        $db->close();
        return $estudiantes;
    }

    public function insert()
    {
        $sql = SQLEstudiante::insertInto();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "ssss",
            $this->codigo,
            $this->nombre,
            $this->email,
            $this->programa
        );
        $db->close();
        return $result;
    }

    public function update()
    {
        $sql = SQLEstudiante::update();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "ssss",
            $this->nombre,
            $this->email,
            $this->programa,
            $this->codigo
        );
        $db->close();
        return $result;
    }

    public function delete()
    {
        $sql = SQLEstudiante::delete();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "s",
            $this->codigo
        );
        $db->close();
        return $result;
    }
}
?>
<?php
namespace App\Modelo;

require __DIR__ . '/databases/db.php';
require __DIR__ . '/modelo_sql/modelo.php';
require __DIR__ . '/modelo_sql/sql_notas.php';

use App\Modelo\Databases\DB;;
use App\Modelo\SQLmodelo\Modelo;
use App\Modelo\SQLmodelo\SQLNota;

class Nota extends Modelo
{
    private $materia = null;
    private $estudiante = null;
    private $actividad = null;
    private $nota = null;

    public function get($prop)
    {
        return $this->$prop;
    }

    public function set($prop, $value)
    {
        $this->$prop = $value;
    }

    public function all(){
        $sql = SQLNota::selectAll();
        $db = new DB();
        $result = $db->execSQL($sql, true);
        $notas = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $nota = new Nota();
                $nota->set('materia', $row["materia"]);
                $nota->set('estudiante', $row["estudiante"]);
                $nota->set('actividad', $row["actividad"]);
                $nota->set('nota', $row["nota"]);
                array_push($notas, $nota);
            }
        }
        $db->close();
        return $notas;
    }

    public function insert(){
        $sql = SQLNota::insertInto();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "sssd",
            $this->materia,
            $this->estudiante,
            $this->actividad,
            $this->nota
        );
        $db->close();
        return $result;
    }

    public function update(){
        $sql = SQLNota::update();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "sdss",
            $this->actividad,
            $this->nota,
            $this->materia,
            $this->estudiante
            
        );
        $db->close();
        return $result;
    }

    public function delete(){
        $sql = SQLNota::delete();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "ss",
            $this->materia,
            $this->estudiante
        );
        $db->close();
        return $result;
    }
}
?>
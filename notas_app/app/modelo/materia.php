<?php
namespace App\Modelo;

require __DIR__ . '/databases/db.php';
require __DIR__ . '/modelo_sql/modelo.php';
require __DIR__ . '/modelo_sql/sql_materias.php';

use App\Modelo\Databases\DB;
use App\Modelo\SQLmodelo\Modelo;
use App\Modelo\SQLmodelo\SQLMateria;

class Materia extends Modelo{
    private $codigo = null;
    private $nombre = null;
    private $programa = null;

    public function get($prop){
        return $this->$prop;
    }

    public function set($prop, $value){
        $this->$prop = $value;
    }

    public function all(){
        $sql = SQLMateria::selectAll();
        $db = new DB();
        $result = $db->execSQL($sql, true);
        $materias = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $materia = new Materia();
                $materia->set('codigo', $row["codigo"]);
                $materia->set('nombre', $row["nombre"]);
                $materia->set('programa', $row["programa"]);
                array_push($materias, $materia);
            }
        }
        $db->close();
        return $materias;
    }

    public function insert(){
        $sql = SQLMateria::insertInto();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "sss",
            $this->codigo,
            $this->nombre,
            $this->programa
        );
        $db->close();
        return $result;
    }

    public function update(){
        $sql = SQLMateria::update();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "sss",
            $this->nombre,
            $this->programa,
            $this->codigo
        );
        $db->close();
        return $result;
    }

    public function delete(){
        $sql = SQLMateria::delete();
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
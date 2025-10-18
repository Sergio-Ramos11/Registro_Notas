<?php
namespace App\Modelo;

require __DIR__ . '/databases/db.php';
require __DIR__ . '/modelo_sql/modelo.php';
require __DIR__ . '/modelo_sql/sql_programas.php';

use App\Modelo\Databases\DB;
use App\Modelo\SQLmodelo\Modelo;
use App\Modelo\SQLmodelo\SQLPrograma;

class Programa extends Modelo{
    private $codigo = null;
    private $nombre = null;

    public function get($prop){
        return $this->$prop;
    }

    public function set($prop, $value){
        $this->$prop = $value;
    }

    public function all(){
        $sql = SQLPrograma::selectAll();
        $db = new DB();
        $result = $db->execSQL($sql, true);
        $programas = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $programa = new Programa();
                $programa->set('codigo', $row["codigo"]);
                $programa->set('nombre', $row["nombre"]);
                array_push($programas, $programa);
            }
        }
        $db->close();
        return $programas;
    }

    public function insert(){
        $sql = SQLPrograma::insertInto();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "ss",
            $this->codigo,
            $this->nombre
        );
        $db->close();
        return $result;
    }

    public function update(){
        $sql = SQLPrograma::update();
        $db = new DB();
        $result = $db->execSQL(
            $sql,
            false,
            "ss",
            $this->nombre,
            $this->codigo
        );
        $db->close();
        return $result;
    }

    public function delete(){
        $sql = SQLPrograma::delete();
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
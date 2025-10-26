<?php
namespace App\Modelo\Databases;

use mysqli;

class DB{
    private $hostDb = "localhost";
    private $userDb = "root";
    private $pwdDB = "";
    private $nameDb = "notas_app";
    public $conexDb = null;

    public function __construct(){
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->conexDb = new mysqli(
            $this->hostDb, 
            $this->userDb, 
            $this->pwdDB, 
            $this->nameDb
        );
        if($this->conexDb->connect_error){
            die("Error DB: " . $this->conexDb->connect_error);
        }
    }

    public function close(){
        $this->conexDb->close();
    }

    public function execSQL($sql, $isSelect, ...$bindParam){
        $prepare = $this->conexDb->prepare($sql);
        if(!empty($bindParam)){
            $prepare->bind_param(...$bindParam);
        }
        if($isSelect){
            $prepare->execute();
            return $prepare->get_result();
        } else {
            return $prepare->execute();
        }
    }
}

?>
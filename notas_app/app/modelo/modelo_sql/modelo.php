<?php
namespace App\Modelo\SQLmodelo;

abstract class Modelo{
    abstract public function all();
    abstract public function insert();
    abstract public function update();
    abstract public function delete();
}

?>
<?php
namespace App\Modelo\SQLmodelo;

class SQLNota
{
    public static function selectAll(){
        $sql = "select * from notas";
        return $sql;
    }

    public static function insertInto(){
        $sql = "insert into notas(estudiante, materia, actividad, nota)values";
        $sql .= "(?,?,?,?)";
        return $sql;
    }

    public static function update(){
        $sql = "update notas SET ";
    $sql .= "actividad=?, ";
    $sql .= "nota=? ";
    $sql .= "WHERE estudiante=? AND materia=?";
        return $sql;
    }

    public static function delete(){
        $sql = "delete from notas where estudiante=? and materia=?";
        return $sql;
    }
}
?>
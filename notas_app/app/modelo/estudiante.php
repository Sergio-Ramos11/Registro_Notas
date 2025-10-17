<?php
namespace App\Modelo;

require __DIR__ . '/databases/db.php';
require __DIR__ . '/modelo_sql.php/modelo.php';
require __DIR__ . '/sql_estudiantes.php';

use App\Modelo\Databases\DB;
use App\Modelo\SQLmodelo\Modelo;
use App\Modelo\SQLEstudiantes\SQLEstudiante;

class Estudiantes extends Modelo
?>
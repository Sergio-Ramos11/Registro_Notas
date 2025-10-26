<?php
require_once __DIR__ . '/../../controlador/controlador_nota.php';
require_once __DIR__ . '/../../controlador/controlador_materia.php';
require_once __DIR__ . '/../../controlador/controlador_estudiante.php';

use App\Controlador\NotaControlador;
use App\Controlador\MateriaControlador;
use App\Controlador\EstudiantesControlador;

$notaCtrl = new NotaControlador();
$matCtrl = new MateriaControlador();
$estCtrl = new EstudiantesControlador();

$materias = $matCtrl->queryAllMaterias();
$notas = $notaCtrl->queryAllNotas();
$estudiantes = $estCtrl->queryAllEstudiantes();

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Promedio de Estudiantes por Materia</title>
</head>
<body>
    <h1>Estudiantes y Promedio por Materia</h1>
    <a href="../menu.php">Volver al menú</a><br><br>';

foreach ($materias as $materia) {
    echo '<h2>' . $materia->get("nombre") . '</h2>';

    $notasMateria = array_filter($notas, fn($n) => $n->get("materia") == $materia->get("codigo"));
    $porEstudiante = [];

    foreach ($notasMateria as $nota) {
        $porEstudiante[$nota->get("estudiante")][] = $nota->get("nota");
    }

    if (!empty($porEstudiante)) {
        echo '<table border="1" cellpadding="5">';
        echo '<tr><th>Estudiante</th><th>Promedio</th></tr>';

        foreach ($porEstudiante as $codEst => $valores) {
            $est = array_find($estudiantes, fn($e) => $e->get("codigo") == $codEst);
            $prom = array_sum($valores) / count($valores);
            echo '<tr>';
            echo '<td>' . ($est ? $est->get("nombre") : "Desconocido") . '</td>';
            echo '<td>' . number_format($prom, 2) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>Sin notas registradas.</p>';
    }
}

echo '</body></html>';

function array_find(array $arr, callable $fn)
{
    foreach ($arr as $item) {
        if ($fn($item)) return $item;
    }
    return null;
}

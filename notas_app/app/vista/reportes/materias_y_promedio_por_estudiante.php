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

$notas = $notaCtrl->queryAllNotas();
$materias = $matCtrl->queryAllMaterias();
$estudiantes = $estCtrl->queryAllEstudiantes();

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias y Promedio por Estudiante</title>
</head>
<body>
    <h1>Materias y Promedio por Estudiante</h1>
    <a href="../menu.php">Volver al menú</a><br><br>';

foreach ($estudiantes as $est) {
    echo '<h2>' . $est->get("nombre") . '</h2>';

    $notasEst = array_filter($notas, fn($n) => $n->get("estudiante") == $est->get("codigo"));
    $porMateria = [];

    foreach ($notasEst as $nota) {
        $porMateria[$nota->get("materia")][] = $nota->get("nota");
    }

    if (!empty($porMateria)) {
        echo '<table border="1" cellpadding="5">
                <tr><th>Materia</th><th>Promedio</th></tr>';
        foreach ($porMateria as $codMat => $valores) {
            $mat = array_find($materias, fn($m) => $m->get("codigo") == $codMat);
            $prom = array_sum($valores) / count($valores);
            echo '<tr>
                    <td>' . ($mat ? $mat->get("nombre") : "Desconocida") . '</td>
                    <td>' . number_format($prom, 2) . '</td>
                  </tr>';
        }
        echo '</table>';
    } else {
        echo '<p>Sin notas registradas.</p>';
    }
}

echo '</body></html>';

function array_find(array $arr, callable $fn) {
    foreach ($arr as $item) {
        if ($fn($item)) return $item;
    }
    return null;
}
?>

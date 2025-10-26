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
    <title>Notas por Materia y Estudiante</title>
</head>
<body>
    <h1>Notas por Materia y Estudiante</h1>
    <a href="../menu.php">Volver al menú</a><br><br>';

foreach ($estudiantes as $est) {
    echo '<h2>' . $est->get('nombre') . '</h2>';

    $notasEst = array_filter($notas, fn($n) => $n->get('estudiante') == $est->get('codigo'));

    if (!empty($notasEst)) {
        echo '<table border="1" cellpadding="5">
                <tr><th>Materia</th><th>Nota</th></tr>';
        foreach ($notasEst as $nota) {
            $mat = array_find($materias, fn($m) => $m->get('codigo') == $nota->get('materia'));
            echo '<tr>
                    <td>' . ($mat ? $mat->get('nombre') : 'Desconocida') . '</td>
                    <td>' . $nota->get('nota') . '</td>
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

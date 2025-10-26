<?php
require_once __DIR__ . '/../../controlador/controlador_materia.php';
require_once __DIR__ . '/../../controlador/controlador_programa.php';

use App\Controlador\MateriaControlador;
use App\Controlador\ProgramaControlador;

$materiaCtrl = new MateriaControlador();
$programaCtrl = new ProgramaControlador();

$programas = $programaCtrl->queryAllProgramas();

echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias por Programa</title>
</head>
<body>
    <h1>Materias por Programa de Formación</h1>
    <a href="../menu.php">Volver al menú</a><br><br>';

foreach ($programas as $programa) {
    echo '<h2>' . $programa->get("nombre") . '</h2>';

    $materias = $materiaCtrl->queryAllMaterias();
    $filtradas = array_filter($materias, fn($m) => $m->get("programa") == $programa->get("codigo"));

    if (!empty($filtradas)) {
        echo '<ul>';
        foreach ($filtradas as $materia) {
            echo '<li>' . $materia->get("nombre") . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Sin materias registradas.</p>';
    }
}

echo '</body></html>';
?>


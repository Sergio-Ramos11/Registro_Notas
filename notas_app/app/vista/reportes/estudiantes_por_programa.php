<?php
require_once __DIR__ . '/../../controlador/controlador_estudiante.php';
require_once __DIR__ . '/../../controlador/controlador_programa.php';

use App\Controlador\EstudiantesControlador;
use App\Controlador\ProgramaControlador;

$estCtrl = new EstudiantesControlador();
$progCtrl = new ProgramaControlador();

$programas = $progCtrl->queryAllProgramas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Estudiantes por Programa</title>
</head>

<body>
    <h1>Estudiantes por Programa</h1>
    <a href="../menu.php">Volver al menú</a><br><br>

    <?php
    foreach ($programas as $programa) {
        echo "<h2>" . htmlspecialchars($programa->get('nombre')) . "</h2>";

        $estudiantes = $estCtrl->queryAllEstudiantes();
        $filtrados = array_filter($estudiantes, fn($e) => $e->get('programa') == $programa->get('codigo'));

        if (!empty($filtrados)) {
            echo "<ul>";
            foreach ($filtrados as $est) {
                echo "<li>" . htmlspecialchars($est->get('nombre')) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Sin estudiantes registrados.</p>";
        }
    }
    ?>

</body>

</html>
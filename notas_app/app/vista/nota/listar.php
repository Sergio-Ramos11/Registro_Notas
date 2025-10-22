<?php
require __DIR__ . "/../../controlador/controlador_nota.php";

use App\Controlador\NotaControlador;

$notaControlador = new NotaControlador();
$notas = $notaControlador->queryAllNota();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notas</title>
</head>
<body>
    <a href="crear.php">Agregar Nueva Nota</a><br>
    <a href="editar.php">Actualizar Nota</a>

    <h1>Lista de Notas</h1>

    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Materia</th>
                <th>Actividad</th>
                <th>Nota</th>

            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($notas as $nota) {
                echo '<tr>';
                echo '  <td>' . $nota->get('estudiante') . '</td>';
                echo '  <td>' . $nota->get('materia') . '</td>';
                echo '  <td>' . $nota->get('actividad') . '</td>';
                echo '  <td>' . $nota->get('nota') . '</td>';
                echo '  <td>';
                echo '      <button>';
                echo '          <img src="../../../public/res/borrar.svg">';
                echo '      </button>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="editar.php?id=' . $nota->get('id') . '">';
                echo '          <img src="../../../public/res/editar.svg">';
                echo '      </a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
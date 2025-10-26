<?php
require __DIR__ . "/../../controlador/controlador_nota.php";

use App\Controlador\NotaControlador;

$notaControlador = new NotaControlador();
$notas = $notaControlador->queryAllNotas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../public/css/tablas.css">
    <title>Notas</title>
</head>

<body>
    <a href="../notas_form.php">Agregar Nueva Nota</a><br>

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
                echo '      <form action="eliminar.php" method="POST">';
                echo '          <input type="hidden" name="estudiante" value="' . $nota->get('estudiante') . '">';
                echo '          <input type="hidden" name="materia" value="' . $nota->get('materia') . '">';
                echo '          <button type="submit">';
                echo '              <img src="../../../public/res/borrar.svg" alt="Eliminar">';
                echo '          </button>';
                echo '      </form>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="editar.php?estudiante=' . $nota->get('estudiante') . '&materia=' . $nota->get('materia') . '&actividad=' . $nota->get('actividad') . '">';
                echo '         <img src="../../../public/res/editar.svg">';
                echo '      </a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
            <a href="../menu.php">Menu principal</a>
        </tbody>
    </table>
</body>

</html>
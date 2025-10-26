<?php
require __DIR__ . "/../../controlador/controlador_estudiante.php";

use App\Controlador\EstudiantesControlador;

$estudiantesControlador = new EstudiantesControlador();
$estudiantes = $estudiantesControlador->queryAllEstudiantes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../public/css/tablas.css">
    <title>Estudiantes</title>
</head>
<body>
    <a href="../estudiantes_form.php">Agregar Nuevo Estudiante</a><br>
    <h1>Lista de Estudiantes</h1>

    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Programa</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($estudiantes as $estudiante) {
            echo '<tr>';
                echo '  <td>' . $estudiante->get('codigo') . '</td>';
                echo '  <td>' . $estudiante->get('nombre') . '</td>';
                echo '  <td>' . $estudiante->get('email') . '</td>';
                echo '  <td>' . $estudiante->get('programa') . '</td>';
                echo '  <td>';
                echo '      <form action="eliminar.php" method="POST">';
                echo '          <input type="hidden" name="codigo" value="' . $estudiante->get('codigo') . '">';
                echo '          <button type="submit">';
                echo '              <img src="../../../public/res/borrar.svg" alt="Eliminar">';
                echo '          </button>';
                echo '      </form>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="editar.php?cod=' . $estudiante->get('codigo') . '">';
                echo '          <img src="../../../public/res/editar.svg">';
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
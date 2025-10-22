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
    <title>Estudiantes</title>
</head>
<body>
    <a href="../estudiantes_form.php">Agregar Nuevo Estudiante</a><br>
    <a href="editar.php">Actualizar Estudiante</a>

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
                echo '      <button>';
                echo '          <img src="../../../public/res/borrar.svg">';
                echo '      </button>';
                echo '  </td>';
                echo '  <td>';
                echo '      <button>';
                echo '          <img src="../../../public/res/editar.svg">';
                echo '      </button>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
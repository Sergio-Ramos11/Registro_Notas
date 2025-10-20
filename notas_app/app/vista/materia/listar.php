<?php
require __DIR__ . "/../../controlador/controlador_materia.php";

use App\Controlador\MateriaControlador;

$materiaControlador = new MateriaControlador();
$materias = $materiaControlador->queryAllMaterias();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Materias</title>
</head>
<body>
    <a href="crear.php">Agregar Nueva Materia</a><br>
    <a href="editar.php">Actualizar Materia</a>

    <h1>Lista de Materias</h1>

    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Programa</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($materias as $materia) {
            echo '<tr>';
                echo '  <td>' . $materia->get('codigo') . '</td>';
                echo '  <td>' . $materia->get('nombre') . '</td>';
                echo '  <td>' . $materia->get('programa') . '</td>';
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
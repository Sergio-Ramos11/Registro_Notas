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
    <link rel="stylesheet" href="../../../public/css/tablas.css">
    <title>Materias</title>
</head>
<body>
    <a href="../materias_form.php">Agregar Nueva Materia</a><br>

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
                echo '      <form action="eliminar.php" method="POST">';
                echo '          <input type="hidden" name="codigo" value="' . $materia->get('codigo') . '">';
                echo '          <button type="submit">';
                echo '              <img src="../../../public/res/borrar.svg" alt="Eliminar">';
                echo '          </button>';
                echo '      </form>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="editar.php?cod=' . $materia->get('codigo') . '">';
                echo '         <img src="../../../public/res/editar.svg">';
                echo '      </a>';
                echo '  </td>';
                echo '</tr>';
            }
            ?>

            <a href="../menu.php">Menu</a>  
        </tbody>
    </table>
</body>
</html>
<?php
require __DIR__ . "/../../controlador/controlador_programa.php";

use App\Controlador\ProgramaControlador;

$programaControlador = new ProgramaControlador();
$programas = $programaControlador->queryAllProgramas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../public/css/tablas.css">
    <title>Programas</title>
</head>
<body>
    <a href="../programas_form.php">Agregar Programa Nuevo</a><br>
    <h1>Lista de Programas</h1>

    <table>
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($programas as $programa) {
                echo '<tr>';
                echo '  <td>' . $programa->get('codigo') . '</td>';
                echo '  <td>' . $programa->get('nombre') . '</td>';
                echo '  <td>';
                echo '      <form action="eliminar.php" method="POST">';
                echo '          <input type="hidden" name="codigo" value="' . $programa->get('codigo') . '">';
                echo '          <button type="submit">';
                echo '              <img src="../../../public/res/borrar.svg" alt="Eliminar">';
                echo '          </button>';
                echo '      </form>';
                echo '  </td>';
                echo '  <td>';
                echo '      <a href="editar.php?cod=' . $programa->get('codigo') . '">';
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
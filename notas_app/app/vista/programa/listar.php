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
    <title>Programas</title>
</head>
<body>
    <a href="crear.php">Agregar Programa Nuevo</a><br>
    <a href="editar.php">Actualizar Programa</a>

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
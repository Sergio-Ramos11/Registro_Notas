<?php
require_once __DIR__ . '/../../controlador/controlador_programa.php';

use App\Controlador\ProgramaControlador;

$programaCtrl = new ProgramaControlador();
$programas = $programaCtrl->queryAllProgramas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Programas de Formación</title>

</head>
<body>
    <h1>Programas de Formación Registrados</h1>
    <a href="../menu.php">Volver al menú</a><br><br>

    <?php if (!empty($programas)): ?>
        <table>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
            </tr>
            <?php foreach ($programas as $programa){
                echo '<tr>';
                    echo '<td>' . htmlspecialchars($programa->get('codigo')) . '</td>';
                    echo '<td>' . htmlspecialchars($programa->get('nombre')) . '</td>';
                echo '</tr>';
            }
            ?>
        </table>
    <?php else: ?>
        <p>No hay programas registrados en el sistema.</p>
    <?php endif; ?>
</body>
</html>

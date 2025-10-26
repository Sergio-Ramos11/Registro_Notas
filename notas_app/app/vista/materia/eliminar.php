<?php
require_once __DIR__ . '/../../controlador/controlador_materia.php';
use App\Controlador\MateriaControlador;

$controlador = new MateriaControlador();

if (isset($_POST['codigo']) && !isset($_POST['confirmado'])) {
    $codigo = $_POST['codigo'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Confirmar eliminación</title>
    </head>
    <body>
        <h3>¿Seguro que quieres eliminar al estudiante con código <?= htmlspecialchars($codigo) ?>?</h3>
        <form method="post">
            <input type="hidden" name="codigo" value="<?= htmlspecialchars($codigo) ?>">
            <input type="hidden" name="confirmado" value="1">
            <button type="submit">Sí, eliminar</button>
        </form>
        <form action="listar.php" method="get">
            <button type="submit">Cancelar</button>
        </form>
    </body>
    </html>
    <?php
    exit;
}

if (isset($_POST['codigo']) && isset($_POST['confirmado'])) {
    $codigo = $_POST['codigo'];
    $resultado = $controlador->deleteMateria($codigo);
    header("Location: listar.php");
    exit;
}else {?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>ERROR</title>
    </head>
    <body>
        <h1>Ocurrió un error al eliminar la materia.</h1>
        <br>
        <a href="listar.php">Volver al menú de materias</a>
    </body>
    </html>
    <?php
}
?>


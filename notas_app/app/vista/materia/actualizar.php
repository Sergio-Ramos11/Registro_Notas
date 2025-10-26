<?php
require __DIR__ . "/../../controlador/controlador_materia.php";

use App\Controlador\MateriaControlador;

$materiaControlador = new MateriaControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $materiaControlador->updateMateria($_POST);

    if ($resultado) {
        header("Location: listar.php");
        exit;
    }
}
?>

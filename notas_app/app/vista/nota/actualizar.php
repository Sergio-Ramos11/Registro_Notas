<?php
require_once __DIR__ . '/../../controlador/controlador_nota.php';

use App\Controlador\NotaControlador;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "<script>alert('Acceso no permitido.'); window.location.href='listar.php';</script>";
    exit;
}

$controlador = new NotaControlador();

if (
    empty($_POST['estudiante']) ||
    empty($_POST['materia']) ||
    empty($_POST['actividad']) ||
    !isset($_POST['nota'])
) {
    echo "<script>alert('Todos los campos son obligatorios.'); window.location.href='listar.php';</script>";
    exit;
}

$resultado = $controlador->updateNota($_POST);

if ($resultado) {
    header("Location: listar.php");
    exit;
}
?>

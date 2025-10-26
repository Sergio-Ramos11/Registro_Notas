<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/formularios.css">
    <title>form materia</title>
</head>

<body>
    <h1>Hola form materias</h1>

    <form action="materia/crear.php" method="post">

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="programa">Programa:</label>
        <input type="text" id="programa" name="programa" required><br><br>

        <input type="submit" value="Guardar">
    </form>
    <a href="materia/listar.php">Volver</a>
</body>

</html>
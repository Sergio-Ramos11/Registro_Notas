<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/formularios.css">
    <title>Estudiantes form</title>
</head>

<body>
    <h1>Hola form estudiantes</h1>

    <form action="estudiante/crear.php" method="post">

        <label for="codigo">Código:</label>
        <input type="text" id="codigo" name="codigo" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="programa">Programa:</label>
        <input type="text" id="programa" name="programa" required><br><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="estudiante/listar.php">Volver</a>
</body>

</html>
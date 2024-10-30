<?php
include 'producto_crud.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    crearProducto($_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['categoria']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Crear Producto</title>
</head>
<body>
    <h1>Crear Producto</h1>
    <form method="post">
        Nombre: <input type="text" name="nombre"><br>
        Descripción: <input type="text" name="descripcion"><br>
        Precio: <input type="number" name="precio" step="0.01"><br>
        Categoría: <input type="text" name="categoria"><br>
        <input type="submit" value="Crear Producto">
    </form>
        <a href="index.php" class="btn btn-primary">Regresar a Inicio   </a>
</body>
</html>

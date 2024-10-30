<?php
include 'producto_crud.php';
$id = $_GET['id'];
$producto = obtenerProductos($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    actualizarProducto($id, $_POST['nombre'], $_POST['descripcion'], $_POST['precio'], $_POST['categoria']);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Editar Producto</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form method="post">
        Nombre: <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>
        Descripción: <input type="text" name="descripcion" value="<?php echo $producto['descripcion']; ?>"><br>
        Precio: <input type="number" name="precio" step="0.01" value="<?php echo $producto['precio']; ?>"><br>
        Categoría: <input type="text" name="categoria" value="<?php echo $producto['categoria']; ?>"><br>
        <input type="submit" value="Actualizar Producto">
    </form>
</body>
</html>
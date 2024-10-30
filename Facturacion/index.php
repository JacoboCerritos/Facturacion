<?php
include 'producto_crud.php';
$productos = obtenerProductos();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <title>Overview de Productos y Facturacion</title>
</head>
<body>
<h1>Productos</h1>
<a href="crear_producto.php">Crear Producto</a>
<table border="1">
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Precio</th>
    <th>Categoria</th>
    <th>Acciones</th>
</tr>
<?php foreach ($productos as $producto): ?>
<tr>
    <td><?php echo $producto['id_producto']; ?></td>
    <td><?php echo $producto['nombre']; ?></td>
    <td><?php echo $producto['descripcion']; ?></td>
    <td><?php echo $producto['precio']; ?></td>
    <td><?php echo $producto['categoria']; ?></td>
    <td>
        <a href="editar_producto.php?id=<?php echo $producto['id_producto']; ?>">Editar</a> |
        <a href="eliminar_producto.php?id=<?php echo $producto['id_producto']; ?>">Eliminar</a> |
        <a href="eliminar_producto.php?id=<?php echo $producto['id_producto']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');">Eliminar</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<h1>Facturacion</h1>
<a href="crear_factura.php">Crear Factura</a>
</body>
</html>
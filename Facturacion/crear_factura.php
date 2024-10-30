<?php
include 'db.php';

// Procesar la factura si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['producto']) && isset($_POST['cantidad'])) {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    // Obtener el precio y el id del producto desde la base de datos
    $query_precio = "SELECT id_producto, precio FROM productos WHERE nombre = ?";
    $stmt_precio = $conn->prepare($query_precio);
    $stmt_precio->bind_param("s", $producto);
    $stmt_precio->execute();
    $stmt_precio->bind_result($id_producto, $precio);
    $stmt_precio->fetch();
    $stmt_precio->close();

    // Verificar si se encontró el producto
    if ($precio !== null) {
        // Calcular el total
        $total = $precio * $cantidad;

        // Aquí asumo que ya tienes una tabla 'facturas', primero debes guardar la factura antes de los detalles
        $query_factura = "INSERT INTO facturacion () VALUES ()"; // Asegúrate de agregar los campos necesarios
        $stmt_factura = $conn->prepare($query_factura);
        
        if ($stmt_factura->execute()) {
            $id_factura = $conn->insert_id; // Obtiene el ID de la factura recién insertada

            // Guardar los detalles de la factura en la base de datos
            $query_detalle_factura = "INSERT INTO detalles_factura (id_producto, id_factura, cantidad, subtotal, precio) VALUES (?, ?, ?, ?, ?)";
            $stmt_detalle_factura = $conn->prepare($query_detalle_factura);
            $stmt_detalle_factura->bind_param("iiddd", $id_producto, $id_factura, $cantidad, $subtotal, $precio);
            
            if ($stmt_detalle_factura->execute()) {
                echo "<div class='resultado'>Factura guardada con éxito. El total a pagar por el producto '{$producto}' es: " . number_format($total, 2) . "</div>";
            } else {
                echo "<div class='error'>Error al guardar los detalles de la factura. Inténtalo de nuevo.</div>";
            }

            $stmt_detalle_factura->close();
        } else {
            echo "<div class='error'>Error al guardar la factura. Inténtalo de nuevo.</div>";
        }

        $stmt_factura->close();
    } else {
        echo "<div class='error'>Producto no encontrado. Verifica el nombre e intenta nuevamente.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Factura</title>
    <link rel="stylesheet" href="styles.css"> <!-- Enlaza tu archivo CSS -->
</head>
<body>
    <h1>Crear Factura</h1>
    <!-- Formulario para crear la factura -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="producto">Producto:</label>
        <input type="text" id="producto" name="producto" required>

        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" min="1" required>

        <button type="submit">Calcular y Guardar Factura</button>
    </form>
    <a href="index.php" class="btn btn-primary">Regresar a Productos</a>

</body>
</html>


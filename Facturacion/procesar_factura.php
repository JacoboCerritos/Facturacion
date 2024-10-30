<?php
include 'db.php';

if (isset($_POST['producto']) && isset($_POST['cantidad']) && isset($_POST['total'])) {
    $id_producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $total = $_POST['total'];

    // Insertar en la tabla de facturas
    $query_factura = "INSERT INTO facturacion (cantidad, total) VALUES (NOW(), ?)";
    $stmt_factura = $conn->prepare($query_factura);
    $stmt_factura->bind_param("d", $total);
    $stmt_factura->execute();

    $id_factura = $conn->insert_id;

    // Insertar en la tabla detalles_factura
    $query_detalle = "INSERT INTO detalles_factura (id_factura, id_producto, cantidad, total) VALUES (?, ?, ?, ?)";
    $stmt_detalle = $conn->prepare($query_detalle);
    $stmt_detalle->bind_param("iiid", $id_factura, $id_producto, $cantidad, $total);
    $stmt_detalle->execute();

    // Actualizar la tabla de inventarios
    $query_actualizar_inventario = "UPDATE inventario SET cantidad_disponible = cantidad_disponible - ? WHERE id_producto = ?";
    $stmt_actualizar = $conn->prepare($query_actualizar_inventario);
    $stmt_actualizar->bind_param("ii", $cantidad, $id_producto);
    $stmt_actualizar->execute();

    echo "Factura creada exitosamente.";
} else {
    echo "Por favor, complete todos los campos.";
}
?>

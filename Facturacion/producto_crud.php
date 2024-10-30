<?php
include 'db.php';

//Funciones CRUD
function crearProducto($nombre , $descripcion, $precio, $categoria) {
    global $conn;
    $sql = "INSERT INTO productos (nombre, descripcion, precio, categoria) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $categoria);
    return $stmt->execute();
}

function obtenerProductos() {
global $conn;
$sql = "SELECT * FROM productos";
return $conn->query($sql);
}

function ObtenerProducto($id) {
global $conn;
$sql = "SELECT * FROM productos WHERE id_producto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); 
$stmt->execute();
return $stmt->get_result()->fetch_assoc(); 
}

function actualizarProducto($id, $nombre, $descripcion, $precio, $categoria){
global $conn;
$sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, categoria=? WHERE id_producto=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdsi", $nombre, $descripcion, $precio, $categoria, $id);
return $stmt->execute();
}

function eliminarProducto($id){
    global $conn;
    $sql= "DELETE FROM productos WHERE id_producto=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

//funcion de facturacion
function crearfactura($total) {
    global $conn;
    $sql = "INSERT INTO facturacion (total) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("d", $total);
    return $stmt->execute() ? $conn->insert_id : false;
}


function agregarDetalleFactura($id_factura , $id_producto, $cantidad, $precio,) {
    global $conn;
    $subtotal = $cantidad * $precio;
    $sql = "INSERT INTO detalles_factura (id_factura, id_factura, cantidad, precio, subtotal) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiidd", $id_factura, $id_producto, $cantidad, $precio, $subtotal);
    return $stmt->execute();
}

function obtenerDetallesFactura($id_factura) {
    global $conn;
    $sql = "SELECT p.nombre, df.cantidad, df.precio, df.subtotal 
    FROM detalles_factura df
    JOIN productos p ON df.id_producto = p.id_producto
    WHERE df.id_factura = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_factura);
    $stmt->execute();
    return $stmt->get_result();
}
?>
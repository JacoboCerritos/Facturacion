<?php
include 'producto_crud.php';

$id = $_GET['id'];
eliminarProducto($id);
header("Location: index.php");
?>
<?php
$host ='localhost';
$db = 'sistema_facturacion';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("error en la conexion" . $conn->connect_error);
}
?>
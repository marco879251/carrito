<?php
session_start();
include('db.php');

$id = $_GET['id'];
$cantidad = 1;

$sql = "SELECT * FROM carrito WHERE producto_id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cantidad = $row['cantidad'] + 1;
    $sql = "UPDATE carrito SET cantidad = $cantidad WHERE producto_id = $id";
} else {
    $sql = "INSERT INTO carrito (producto_id, cantidad) VALUES ($id, $cantidad)";
}

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

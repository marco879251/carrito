<?php
session_start();
include('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM carrito WHERE producto_id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: cart.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

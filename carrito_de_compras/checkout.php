<?php
session_start();
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vaciar el carrito
    $sql = "DELETE FROM carrito";
    if ($conn->query($sql) === TRUE) {
        $message = "¡Gracias por su compra! Su pedido ha sido procesado.";
    } else {
        $message = "Error al procesar su pedido: " . $conn->error;
    }
    $conn->close();
} else {
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación de Compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container mt-5">
        <div class="alert alert-success" role="alert">
            <?php echo $message; ?>
        </div>
        <a href="index.php" class="btn btn-primary">Volver a la Tienda</a>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
``

<?php
session_start();
include('db.php');

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
                <div class="card">
                    <img src="<?php echo $row['imagen']; ?>" class="card-img-top" alt="<?php echo $row['nombre']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                        <p class="card-text">$<?php echo $row['precio']; ?></p>
                        <a href="add_to_cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Añadir al Carrito</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
<?php $conn->close(); ?>

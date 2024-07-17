<?php
session_start();
include('db.php');

$sql = "SELECT carrito.*, productos.nombre, productos.precio, productos.imagen FROM carrito 
        JOIN productos ON carrito.producto_id = productos.id";
$result = $conn->query($sql);
$total = 0;
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
        <h2>Carrito de Compras</h2>
        <?php if ($result->num_rows > 0): ?>
        <form action="checkout.php" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): 
                        $subtotal = $row['precio'] * $row['cantidad'];
                        $total += $subtotal;
                    ?>
                    <tr>
                        <td>
                            <img src="<?php echo $row['imagen']; ?>" alt="<?php echo $row['nombre']; ?>" class="img-thumbnail" style="width: 50px;">
                            <?php echo $row['nombre']; ?>
                        </td>
                        <td><?php echo $row['cantidad']; ?></td>
                        <td>$<?php echo $row['precio']; ?></td>
                        <td>$<?php echo $subtotal; ?></td>
                        <td>
                            <a href="remove_from_cart.php?id=<?php echo $row['producto_id']; ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="text-right">
                <h3>Total: $<?php echo $total; ?></h3>
                <button type="submit" class="btn btn-success">Pagar</button>
            </div>
        </form>
        <?php else: ?>
        <p>No hay productos en el carrito.</p>
        <?php endif; ?>
    </div>
    <?php include('includes/footer.php'); ?>
</body>
</html>
<?php $conn->close(); ?>

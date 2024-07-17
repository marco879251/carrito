<!-- header.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Tienda</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cart.php">Carrito <span class="badge badge-secondary">
                <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                </span></a>
            </li>
        </ul>
    </div>
</nav>

<!-- footer.php -->
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Tienda &copy; 2024</span>
    </div>
</footer>

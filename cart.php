<?php
session_start();

// Check if cart is initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add products to the cart when the product parameter is set in the URL
if (isset($_GET['product'])) {
    $product = $_GET['product'];
    if ($product == 'premium') {
        $_SESSION['cart'][] = ['name' => 'Premium Desi Mirchi Powder', 'price' => 350];
    } elseif ($product == 'regular') {
        $_SESSION['cart'][] = ['name' => 'Regular Desi Mirchi Powder', 'price' => 200];
    }
}

// Calculate total price
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Desi Mirchi Powder Store</h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
            <a href="checkout.php">Checkout</a>
        </nav>
    </header>

    <div class="cart">
        <h2>Your Cart</h2>
        <?php if (count($_SESSION['cart']) > 0): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <p><?php echo $item['name']; ?> - ₹<?php echo $item['price']; ?></p>
            <?php endforeach; ?>
            <hr>
            <p>Total: ₹<?php echo $total; ?></p>
            <a href="checkout.php" class="btn">Proceed to Checkout</a>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Desi Mirchi Store</p>
    </footer>
</body>
</html>

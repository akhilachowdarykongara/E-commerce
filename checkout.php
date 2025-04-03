<?php
session_start();

// Check if cart is empty
if (empty($_SESSION['cart'])) {
    header("Location: cart.php"); // Redirect to cart if it's empty
    exit();
}

// Calculate the total amount
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
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Desi Mirchi Powder Store</h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>

    <div class="checkout">
        <h2>Checkout</h2>
        <h3>Your Order Summary</h3>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <p><?php echo $item['name']; ?> - ₹<?php echo $item['price']; ?></p>
        <?php endforeach; ?>
        <hr>
        <p>Total: ₹<?php echo $total; ?></p>

        <!-- Checkout form for user details -->
        <form action="payment.php" method="POST">
            <input type="hidden" name="total_amount" value="<?php echo $total; ?>">

            <label for="name">Full Name:</label>
            <input type="text" name="name" required>

            <label for="address">Shipping Address:</label>
            <textarea name="address" required></textarea>

            <label for="email">Email Address:</label>
            <input type="email" name="email" required>

            <button type="submit">Proceed to Payment</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Desi Mirchi Store</p>
    </footer>
</body>
</html>

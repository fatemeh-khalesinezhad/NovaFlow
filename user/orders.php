<?php
// Standalone page – no header/footer to avoid router conflict
session_start();
require_once __DIR__ . '/../config/database.php';
if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/login.php";</script>';
    exit();
}

$product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;
$product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE id = $product_id"));
if (!$product) {
    echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/index.php";</script>';
    exit();
}

$user = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM users WHERE id = {$_SESSION['user_id']}"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Place Order</title>
    <link rel="stylesheet" href="../assets/css/tailwind.min.css">
    <style>
        /* same basic dark design */
        body { background:#0a0a0f; color:white; font-family:sans-serif; }
        input, textarea { background:#1a1a2e; border:1px solid rgba(255,255,255,0.1); color:white; border-radius:12px; padding:12px; margin:5px; width:calc(100% - 20px); }
        button { background:linear-gradient(135deg,#7c3aed,#00d4ff); border:none; color:white; border-radius:12px; padding:12px 24px; font-weight:bold; cursor:pointer; }
    </style>
</head>
<body>
    <div style="max-width:600px; margin:50px auto; padding:20px;">
        <h1>Place Order</h1>
        <p>Product: <b><?= htmlspecialchars($product['name']) ?></b></p>
        <p>Price: $<?= $product['price'] ?> | Stock: <?= $product['stock'] ?></p>
        <form action="action/order_action.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <label>Quantity:</label>
            <input type="number" name="quantity" min="1" max="<?= $product['stock'] ?>" required>
            <label>Mobile:</label>
            <input type="text" name="mobile" required>
            <label>Address:</label>
            <textarea name="address" rows="3" required></textarea>
            <button type="submit">Confirm Order</button>
        </form>
        <a href="/NovaFlow-Store-v5.0.0/public/index.php" style="color:#00d4ff;">Back to Shop</a>
    </div>
</body>
</html>
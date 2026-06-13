<?php
session_start();
require_once __DIR__ . '/../config/database.php';

// Must be logged in
if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href="login.php";</script>';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['cart'])) {
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

$user_id = $_SESSION['user_id'];
$cart = json_decode($_POST['cart'], true);

if (empty($cart)) {
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

// Process each item in the cart
$total_order = 0;
$order_items = [];

foreach ($cart as $item) {
    $product_id = (int)$item['id'];
    $quantity   = (int)$item['qty'];

    // Fetch product from database
    $product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE id = $product_id"));
    if (!$product || $quantity > $product['stock']) {
        // Skip or error – we'll just skip for now
        continue;
    }

    $price = $product['price'];
    $subtotal = $price * $quantity;
    $total_order += $subtotal;

    $order_items[] = [
        'product_id' => $product_id,
        'product_name' => $product['name'],
        'quantity'   => $quantity,
        'price'      => $price,
        'subtotal'   => $subtotal
    ];

    // Update stock
    mysqli_query($link, "UPDATE products SET stock = stock - $quantity WHERE id = $product_id");
}

if (empty($order_items)) {
    echo '<script>alert("No valid items in cart."); window.location.href="index.php";</script>';
    exit();
}

// Insert main order
mysqli_query($link, "INSERT INTO orders (user_id, total, status) VALUES ($user_id, $total_order, 'pending')");
$order_id = mysqli_insert_id($link);

// Insert order items
foreach ($order_items as $oi) {
    mysqli_query($link, "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id, {$oi['product_id']}, {$oi['quantity']}, {$oi['price']})");
}

// Get user info
$user = mysqli_fetch_assoc(mysqli_query($link, "SELECT full_name, email FROM users WHERE id = $user_id"));

// Build success data for the success page (now includes multiple items)
$items_text = '';
foreach ($order_items as $oi) {
    $items_text .= htmlspecialchars($oi['product_name']) . " (×{$oi['quantity']})<br>";
}

$_SESSION['order_success'] = [
    'order_id'     => $order_id,
    'product_name' => $items_text,        // a combined string of product names
    'product_code' => $order_id,          // using order ID as the code
    'quantity'     => count($order_items), // number of distinct items
    'unit_price'   => '-',                // not applicable for multiple items
    'total_price'  => $total_order,
    'full_name'    => $user['full_name'],
    'email'        => $user['email'],
    'mobile'       => $_POST['mobile'] ?? '',
    'address'      => $_POST['address'] ?? ''
];

// Clear cart on client side (we'll do it via a small script on success page, or ignore)
echo '<script>window.location.href="order_success.php";</script>';
exit();
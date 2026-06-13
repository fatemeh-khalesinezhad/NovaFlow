<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/login.php";</script>';
    exit();
}

$user_id    = $_SESSION['user_id'];
$product_id = (int)$_POST['product_id'];
$quantity   = (int)$_POST['quantity'];
$mobile     = mysqli_real_escape_string($link, $_POST['mobile']);
$address    = mysqli_real_escape_string($link, $_POST['address']);

// Fetch product
$product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE id = $product_id"));
if (!$product || $quantity > $product['stock']) {
    echo '<script>alert("Invalid order!"); window.location.href="../orders.php?product_id='.$product_id.'";</script>';
    exit();
}

$price = $product['price'];
$total = $price * $quantity;

// Insert order
mysqli_query($link, "INSERT INTO orders (user_id, total, status) VALUES ($user_id, $total, 'pending')");
$order_id = mysqli_insert_id($link);

// Insert order item
mysqli_query($link, "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id, $product_id, $quantity, $price)");

// Update stock
mysqli_query($link, "UPDATE products SET stock = stock - $quantity WHERE id = $product_id");

// Fetch user info
$user = mysqli_fetch_assoc(mysqli_query($link, "SELECT full_name, email FROM users WHERE id = $user_id"));

// Store order info in session for the success page
$_SESSION['order_success'] = [
    'order_id'     => $order_id,
    'product_name' => $product['name'],
    'product_code' => $product_id,
    'quantity'     => $quantity,
    'unit_price'   => $price,
    'total_price'  => $total,
    'full_name'    => $user['full_name'],
    'email'        => $user['email'],
    'mobile'       => $mobile,
    'address'      => $address
];

// Redirect to order success page
echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/order_success.php";</script>';
exit();
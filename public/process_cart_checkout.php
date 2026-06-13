<?php
session_start();
require_once __DIR__ . '/../config/database.php';

if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href="login.php";</script>';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['cart'])) {
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

$user_id   = $_SESSION['user_id'];
$cart      = json_decode($_POST['cart'], true);
$full_name = trim($_POST['full_name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$address   = trim($_POST['address'] ?? '');
$mobile    = trim($_POST['mobile'] ?? 'Not provided');

if (empty($cart)) {
    echo '<script>window.location.href="index.php";</script>';
    exit();
}

$total_order = 0;
$order_items = [];

foreach ($cart as $item) {
    $product_id = (int)$item['id'];
    $quantity   = (int)$item['qty'];

    $product = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM products WHERE id = $product_id"));
    if (!$product || $quantity > $product['stock']) {
        continue;
    }

    $price    = $product['price'];
    $subtotal = $price * $quantity;
    $total_order += $subtotal;

    $order_items[] = [
        'product_id'   => $product_id,
        'product_name' => $product['name'],
        'quantity'     => $quantity,
        'price'        => $price,
        'subtotal'     => $subtotal
    ];

    // Update stock
    mysqli_query($link, "UPDATE products SET stock = stock - $quantity WHERE id = $product_id");
}

if (empty($order_items)) {
    echo '<script>alert("No valid items or insufficient stock."); window.location.href="index.php";</script>';
    exit();
}

// Insert main order
mysqli_query($link, "INSERT INTO orders (user_id, total, status) VALUES ($user_id, $total_order, 'pending')");
$order_id = mysqli_insert_id($link);

// Insert order items
foreach ($order_items as $oi) {
    mysqli_query($link, "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ($order_id, {$oi['product_id']}, {$oi['quantity']}, {$oi['price']})");
}

// Build item description for success page
$items_text = '';
foreach ($order_items as $oi) {
    $items_text .= htmlspecialchars($oi['product_name']) . " (×{$oi['quantity']})<br>";
}

// Store order info in session
$_SESSION['order_success'] = [
    'order_id'     => $order_id,
    'product_name' => $items_text,
    'product_code' => $order_id,
    'quantity'     => count($order_items),
    'unit_price'   => '-',
    'total_price'  => $total_order,
    'full_name'    => $full_name,
    'email'        => $email,
    'mobile'       => $mobile,
    'address'      => $address
];

echo '<script>window.location.href="order_success.php";</script>';
exit();
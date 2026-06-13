<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/login.php";</script>';
    exit();
}

$order_id = (int)$_POST['order_id'];
$status   = mysqli_real_escape_string($link, $_POST['status']);

mysqli_query($link, "UPDATE orders SET status = '$status' WHERE id = $order_id");

echo '<script>window.location.href="../orders.php";</script>';
exit();
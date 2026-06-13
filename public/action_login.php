<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    $_SESSION['error'] = 'Fill all fields.';
    echo "<script>window.location.href='login.php';</script>";
    exit();
}

$email = mysqli_real_escape_string($link, $email);
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);

if ($user && hash('sha256', $password) === $user['password']) {
    $_SESSION['user_id']   = $user['id'];
    $_SESSION['full_name'] = $user['full_name'];
    $_SESSION['email']     = $user['email'];
    $_SESSION['role']      = $user['role'];

    // Set the success message and where to go next
    $_SESSION['success_msg'] = 'Welcome back, ' . $user['full_name'] . '!';
    $_SESSION['success_redirect'] = ($user['role'] === 'admin')
        ? '../admin/products.php'
        : 'index.php';

    // Go to the beautiful success page
    echo "<script>window.location.href='success.php';</script>";
    exit();
} else {
    $_SESSION['error'] = 'Invalid email or password.';
    echo "<script>window.location.href='login.php';</script>";
    exit();
}
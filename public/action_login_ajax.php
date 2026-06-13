<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    echo json_encode(['success' => false, 'message' => 'Please fill in all fields.']);
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

    $_SESSION['success_msg'] = 'Welcome back, ' . $user['full_name'] . '!';
    $_SESSION['success_redirect'] = ($user['role'] === 'admin')
        ? '../admin/products.php'
        : 'index.php';

    echo json_encode(['success' => true, 'redirect' => 'success.php']);
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid email or password.']);
    exit();
}
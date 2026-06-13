<?php
session_start();
require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo '<script>window.location.href="register.php";</script>';
    exit();
}

$full_name       = trim($_POST['full_name'] ?? '');
$email           = trim($_POST['email'] ?? '');
$password        = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if ($full_name === '' || $email === '' || $password === '') {
    $_SESSION['error'] = 'Please fill all required fields.';
    echo '<script>window.location.href="register.php";</script>';
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = 'Invalid email format.';
    echo '<script>window.location.href="register.php";</script>';
    exit();
}
if ($password !== $confirm_password) {
    $_SESSION['error'] = 'Passwords do not match.';
    echo '<script>window.location.href="register.php";</script>';
    exit();
}

$email = mysqli_real_escape_string($link, $email);
$check = mysqli_query($link, "SELECT id FROM users WHERE email = '$email'");
if (mysqli_fetch_assoc($check)) {
    $_SESSION['error'] = 'Email already registered.';
    echo '<script>window.location.href="register.php";</script>';
    exit();
}

$full_name = mysqli_real_escape_string($link, $full_name);
$hashed = hash('sha256', $password);

$query = "INSERT INTO users (full_name, email, password, role) VALUES ('$full_name', '$email', '$hashed', 'user')";
if (mysqli_query($link, $query)) {
    // Set success message and redirect
    $_SESSION['success_msg'] = 'Registration successful! Please login.';
    $_SESSION['success_redirect'] = 'login.php';

    echo '<script>window.location.href="success.php";</script>';
    exit();
} else {
    $_SESSION['error'] = 'Registration failed. Please try again.';
    echo '<script>window.location.href="register.php";</script>';
    exit();
}
?>
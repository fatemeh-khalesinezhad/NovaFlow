<?php
session_start();
require_once __DIR__ . '/../config/database.php';

$full_name       = trim($_POST['full_name'] ?? '');
$email           = trim($_POST['email'] ?? '');
$password        = $_POST['password'] ?? '';
$confirm         = $_POST['confirm_password'] ?? '';

if ($full_name === '' || $email === '' || $password === '') {
    echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
    exit();
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
    exit();
}
if ($password !== $confirm) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match.']);
    exit();
}

$email = mysqli_real_escape_string($link, $email);
$check = mysqli_query($link, "SELECT id FROM users WHERE email = '$email'");
if (mysqli_fetch_assoc($check)) {
    echo json_encode(['success' => false, 'message' => 'Email already registered.']);
    exit();
}

$full_name = mysqli_real_escape_string($link, $full_name);
$hashed = hash('sha256', $password);

$query = "INSERT INTO users (full_name, email, password, role) VALUES ('$full_name', '$email', '$hashed', 'user')";
if (mysqli_query($link, $query)) {
    $_SESSION['success_msg'] = 'Registration successful! Please login.';
    $_SESSION['success_redirect'] = 'login.php';
    echo json_encode(['success' => true, 'redirect' => 'success.php']);
    exit();
} else {
    echo json_encode(['success' => false, 'message' => 'Registration failed.']);
    exit();
}
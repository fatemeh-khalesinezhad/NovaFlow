<?php
session_start();
require_once __DIR__ . '/../config/database.php';

// Must be logged in
if (!isset($_SESSION['user_id'])) {
    if (($_POST['ajax'] ?? '') === '1') {
        echo json_encode(['success' => false, 'message' => 'You must be logged in.']);
        exit();
    }
    echo '<script>window.location.href="login.php";</script>';
    exit();
}

$subject = mysqli_real_escape_string($link, $_POST['subject'] ?? '');
$message = mysqli_real_escape_string($link, $_POST['message'] ?? '');
$user_id = $_SESSION['user_id'];

// Insert the contact message
$result = mysqli_query($link, "INSERT INTO contact_messages (name, email, subject, message) 
    SELECT full_name, email, '$subject', '$message' FROM users WHERE id = $user_id");

if (($_POST['ajax'] ?? '') === '1') {
    if ($result) {
        $_SESSION['success_msg'] = 'Thank you for your message! We will reply within 24 hours.';
        $_SESSION['success_redirect'] = 'index.php';
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save your message.']);
    }
    exit();
}

// Fallback for non‑AJAX requests (preserves old behaviour)
$_SESSION['success_msg'] = 'Thank you for your message! We will reply within 24 hours.';
$_SESSION['success_redirect'] = 'index.php';
echo '<script>window.location.href="success.php";</script>';
exit();
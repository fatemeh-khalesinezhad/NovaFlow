<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to leave a review.']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    exit();
}

$product_id = (int)($_POST['product_id'] ?? 0);
$rating     = (int)($_POST['rating'] ?? 0);
$comment    = trim($_POST['comment'] ?? '');
$user_id    = (int)$_SESSION['user_id'];

if ($product_id <= 0 || $rating < 1 || $rating > 5 || strlen($comment) < 3) {
    echo json_encode(['success' => false, 'message' => 'Please provide a valid rating and comment.']);
    exit();
}

$comment_escaped = mysqli_real_escape_string($link, $comment);

// Check if user already reviewed this product
$check = mysqli_query($link, "SELECT id FROM reviews WHERE product_id = $product_id AND user_id = $user_id");
if (mysqli_num_rows($check) > 0) {
    echo json_encode(['success' => false, 'message' => 'You have already reviewed this product.']);
    exit();
}

// Insert review
mysqli_query($link, "INSERT INTO reviews (product_id, user_id, rating, comment) 
                     VALUES ($product_id, $user_id, $rating, '$comment_escaped')");

// Recalculate average rating and review count, update products table
$avg_result = mysqli_fetch_assoc(mysqli_query($link, 
    "SELECT COUNT(*) as cnt, AVG(rating) as avg_rating FROM reviews WHERE product_id = $product_id"
));
$new_avg    = round((float)$avg_result['avg_rating'], 1);
$new_count  = (int)$avg_result['cnt'];

mysqli_query($link, "UPDATE products SET rating = $new_avg, reviews = $new_count WHERE id = $product_id");

// Return the new review data to display immediately
$user_name = mysqli_fetch_assoc(mysqli_query($link, 
    "SELECT full_name FROM users WHERE id = $user_id"
))['full_name'];

echo json_encode([
    'success'    => true,
    'message'    => 'Review submitted!',
    'review'     => [
        'name'    => htmlspecialchars($user_name),
        'rating'  => $rating,
        'comment' => htmlspecialchars($comment),
        'date'    => 'Just now'
    ],
    'new_avg'   => $new_avg,
    'new_count' => $new_count
]);
exit();
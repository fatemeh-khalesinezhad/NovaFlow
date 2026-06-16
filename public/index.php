<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/header.php';

// Fetch all products from the database – MUST alias category AS cat
$query = "SELECT 
            id, name, category AS cat, price, rating, reviews, 
            emoji, description, specs, image, stock, featured 
          FROM products ORDER BY id ASC";
$result = mysqli_query($link, $query);

$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $row['id'] = (int) $row['id'];           // ensure numeric ID
    $row['specs'] = json_decode($row['specs'], true);
    if (!is_array($row['specs'])) {
        $row['specs'] = []; // fallback for compare
    }
    $products[] = $row;
}

// Fetch reviews grouped by product_id
$reviewsQuery = "SELECT r.product_id, r.rating, r.comment, r.created_at, u.full_name 
                 FROM reviews r 
                 JOIN users u ON r.user_id = u.id 
                 ORDER BY r.created_at DESC";
$reviewsResult = mysqli_query($link, $reviewsQuery);

$reviewsByProduct = [];
while ($rev = mysqli_fetch_assoc($reviewsResult)) {
    $pid = $rev['product_id'];
    if (!isset($reviewsByProduct[$pid])) {
        $reviewsByProduct[$pid] = [];
    }
    $reviewsByProduct[$pid][] = [
        'name' => $rev['full_name'],
        'rating' => (int)$rev['rating'],
        'text' => $rev['comment'],
        'date' => date('M d, Y', strtotime($rev['created_at']))
    ];
}
?>

<!-- Pass the products from PHP to JavaScript -->
<script>
    const productsFromDB = <?= json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>;
    const loggedInUserId   = <?= isset($_SESSION['user_id']) ? json_encode($_SESSION['user_id']) : 'null' ?>;
    const loggedInUserName = <?= isset($_SESSION['full_name']) ? json_encode($_SESSION['full_name']) : 'null' ?>;
    const reviewsByProduct = <?= json_encode($reviewsByProduct, JSON_UNESCAPED_UNICODE) ?>;
    console.log('Products loaded:', productsFromDB.length, productsFromDB[0]?.name);
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
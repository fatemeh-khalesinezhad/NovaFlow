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
?>

<!-- Pass the products from PHP to JavaScript -->
<script>
    const productsFromDB = <?= json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) ?>;
    console.log('Products loaded:', productsFromDB.length, productsFromDB[0]?.name);
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
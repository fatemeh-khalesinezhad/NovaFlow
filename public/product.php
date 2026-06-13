<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/header.php';

// Get product id from URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = mysqli_query($link, "SELECT * FROM products WHERE id = $id");
$product = mysqli_fetch_assoc($stmt);

if (!$product) {
    echo '<p class="text-center text-gray-500 py-20">Product not found.</p>';
    require_once __DIR__ . '/../includes/footer.php';
    exit();
}
?>

<div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">
    <a href="index.php" class="flex items-center gap-2 text-sm text-gray-400 hover:text-white mb-6">
        <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Products
    </a>
    <div class="grid md:grid-cols-2 gap-12">
        <!-- Product image / emoji -->
        <div class="glass rounded-3xl p-8 sm:p-12 aspect-square flex items-center justify-center">
            <span class="text-[120px]"><?= htmlspecialchars($product['emoji']) ?></span>
        </div>

        <!-- Product details -->
        <div>
            <span class="text-xs uppercase tracking-widest text-neon-blue font-medium">
                <?= htmlspecialchars($product['category']) ?>
            </span>
            <h1 class="font-display text-3xl sm:text-4xl font-bold mt-2 mb-4">
                <?= htmlspecialchars($product['name']) ?>
            </h1>
            <p class="text-gray-400 mb-6"><?= nl2br(htmlspecialchars($product['description'])) ?></p>
            <div class="text-4xl font-display font-black gradient-text mb-8">
                $<?= number_format($product['price']) ?>
            </div>
            <p class="text-sm text-gray-500 mb-4">In stock: <?= $product['stock'] ?></p>

            <?php if (isset($_SESSION['user_id'])): ?>
                <?php if ($product['stock'] > 0): ?>
                    <a href="../user/orders.php?product_id=<?= $product['id'] ?>"
                       class="btn-glow inline-block px-8 py-4 bg-gradient-to-r from-neon-purple to-neon-blue rounded-2xl font-semibold hover:opacity-90 transition">
                        Order Now
                    </a>
                <?php else: ?>
                    <span class="text-red-400 font-semibold">Out of stock</span>
                <?php endif; ?>
            <?php else: ?>
                <a href="login.php" class="text-neon-blue hover:underline">Login to order</a>
            <?php endif; ?>

            <!-- Specs -->
            <?php if (!empty($product['specs'])): ?>
                <div class="mt-8">
                    <h3 class="font-display font-semibold mb-3">Specifications</h3>
                    <?php $specs = json_decode($product['specs'], true); ?>
                    <?php if ($specs): ?>
                        <div class="glass rounded-xl p-4 space-y-2">
                            <?php foreach ($specs as $key => $val): ?>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400"><?= htmlspecialchars($key) ?></span>
                                    <span class="font-medium"><?= htmlspecialchars($val) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
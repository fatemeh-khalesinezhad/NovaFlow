<?php
session_start();
if (!isset($_SESSION['order_success'])) {
    header('Location: index.php');
    exit();
}
$_SESSION['skip_router'] = true;
$order = $_SESSION['order_success'];
unset($_SESSION['order_success']);

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/header.php';
?>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 612 792' fill='white'><polyline points='241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03'/><polygon points='131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97'/><polygon points='232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58'/><polyline points='232.31 373.55 232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83'/><polygon points='394.52 420.69 492.73 370.17 495 480.3 394.52 420.69'/><polygon points='495 480.3 394.52 528.56 394.52 420.69 495 480.3'/></svg>">

<!-- Override header to be fixed only on this page -->
<style>
    /* Make header fixed at top */
    header#header {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        z-index: 1000 !important;
        background: rgba(18, 18, 26, 0.8) !important;
        backdrop-filter: blur(20px) !important;
    }
    /* Push main content down so it's not hidden behind the fixed header */
    #main-app {
        padding-top: 70px !important;  /* adjust if your header height is different */
    }
    /* Keep the animated background behind everything */
    #bg-layer {
        pointer-events: none;
    }
</style>

<div class="max-w-2xl mx-auto pt-10 pb-10 px-4 animate-fade-up">
    <div class="text-center mb-8">
        <div class="text-6xl mb-4">🎉</div>
        <h1 class="font-display text-4xl font-black gradient-text mb-2">Order Placed Successfully!</h1>
        <p class="text-gray-400">Thank you for your purchase.</p>
    </div>

    <!-- Order Details Card -->
    <div class="glass rounded-3xl p-8 space-y-6 mb-6">
        <h2 class="font-display font-semibold text-lg gradient-text">Order Summary</h2>
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div><span class="text-gray-500">Order ID:</span> <span class="font-medium">#<?= $order['order_id'] ?></span></div>
            <div><span class="text-gray-500">Product Code:</span> <span class="font-medium"><?= $order['product_code'] ?></span></div>
            <div><span class="text-gray-500">Product(s):</span> <span class="font-medium"><?= $order['product_name'] ?></span></div>
            <div><span class="text-gray-500">Quantity:</span> <span class="font-medium"><?= $order['quantity'] ?></span></div>
            <div><span class="text-gray-500">Unit Price:</span> <span class="font-medium"><?= is_numeric($order['unit_price']) ? '$' . number_format($order['unit_price']) : $order['unit_price'] ?></span></div>
            <div><span class="text-gray-500">Total Price:</span> <span class="font-bold gradient-text">$<?= number_format($order['total_price']) ?></span></div>
        </div>
    </div>

    <!-- Customer & Shipping Details -->
    <div class="glass rounded-3xl p-8 space-y-6 mb-6">
        <h2 class="font-display font-semibold text-lg gradient-text">Customer & Shipping Details</h2>
        <div class="grid grid-cols-2 gap-4 text-sm">
            <div><span class="text-gray-500">Name:</span> <span class="font-medium"><?= htmlspecialchars($order['full_name']) ?></span></div>
            <div><span class="text-gray-500">Email:</span> <span class="font-medium"><?= htmlspecialchars($order['email']) ?></span></div>
            <div><span class="text-gray-500">Mobile:</span> <span class="font-medium"><?= htmlspecialchars($order['mobile']) ?></span></div>
            <div class="col-span-2"><span class="text-gray-500">Address:</span> <span class="font-medium"><?= nl2br(htmlspecialchars($order['address'])) ?></span></div>
        </div>
    </div>

    <!-- Information Panel -->
    <div class="glass rounded-3xl p-8 space-y-4 text-sm text-gray-300">
        <p class="text-neon-blue font-medium">📦 What happens next?</p>
        <p>Your order will be reviewed by our team. Once approved, we'll contact you via the provided mobile number or email.</p>
        <p>The package will be shipped to the address you provided. Please ensure someone is available to receive it.</p>
        <p class="text-yellow-400">⚠️ Inspect the product upon delivery before making the payment to the courier.</p>
    </div>

    <div class="text-center mt-8">
        <a href="index.php" class="btn-glow inline-block px-8 py-4 bg-gradient-to-r from-neon-purple to-neon-blue rounded-2xl font-display font-semibold text-lg hover:opacity-90 transition relative">
            <span class="relative z-10">Back to Shop</span>
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof lucide !== 'undefined') {
        lucide.createIcons({nameAttr:'data-lucide'});
    }
    if (typeof navigateTo === 'function') {
        window.navigateTo = function() {};
    }
});
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
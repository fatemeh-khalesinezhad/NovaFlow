  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 612 792' fill='white'><polyline points='241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03'/><polygon points='131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97'/><polygon points='232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58'/><polyline points='232.31 373.55 232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83'/><polygon points='394.52 420.69 492.73 370.17 495 480.3 394.52 420.69'/><polygon points='495 480.3 394.52 528.56 394.52 420.69 495 480.3'/></svg>">
<?php
session_start();
require_once __DIR__ . '/../../config/database.php';

if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/index.php";</script>';
    exit();
}

$user_id = (int)$_SESSION['user_id'];

// Fetch all orders for this user
$orders_result = mysqli_query($link, 
    "SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC"
);

// Fetch all order items with product names
$items_result = mysqli_query($link,
    "SELECT oi.order_id, oi.quantity, oi.price, 
            COALESCE(p.name, 'Product Removed') AS product_name,
            p.image, p.emoji
     FROM order_items oi
     LEFT JOIN products p ON oi.product_id = p.id
     WHERE oi.order_id IN (
         SELECT id FROM orders WHERE user_id = $user_id
     )"
);

// Group items by order_id
$items_by_order = [];
while ($item = mysqli_fetch_assoc($items_result)) {
    $items_by_order[$item['order_id']][] = $item;
}
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Orders – NovaFlow</title>
  <link rel="stylesheet" href="/NovaFlow-Store-v5.0.0/assets/css/tailwind.min.css">
  <script src="/NovaFlow-Store-v5.0.0/assets/js/tailwind.min.js"></script>
  <script src="/NovaFlow-Store-v5.0.0/assets/js/lucide.min.js"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: { extend: { colors: {
        neon: { blue:'#00d4ff', purple:'#7c3aed', pink:'#ec4899' },
        dark: { 900:'#0a0a0f', 800:'#12121a', 700:'#1a1a2e', 600:'#252540' }
      }}}
    }
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
  <style>
    body { background: #0a0a0f; color: white; font-family: 'DM Sans', sans-serif; }
    .glass { background: rgba(255,255,255,0.03); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.08); }
    .gradient-text { background: linear-gradient(135deg, #7c3aed, #00d4ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .status-pending   { background: rgba(234,179,8,0.1);  color: #eab308; border: 1px solid rgba(234,179,8,0.2); }
    .status-shipped   { background: rgba(59,130,246,0.1); color: #60a5fa; border: 1px solid rgba(59,130,246,0.2); }
    .status-delivered { background: rgba(34,197,94,0.1);  color: #4ade80; border: 1px solid rgba(34,197,94,0.2); }
    .track-step { display: flex; flex-direction: column; align-items: center; gap: 6px; flex: 1; }
    .track-dot  { width: 14px; height: 14px; border-radius: 50%; border: 2px solid rgba(255,255,255,0.2); background: #1a1a2e; }
    .track-dot.active  { background: #7c3aed; border-color: #7c3aed; box-shadow: 0 0 8px rgba(124,58,237,0.6); }
    .track-dot.done    { background: #4ade80; border-color: #4ade80; }
    .track-line { height: 2px; flex: 1; background: rgba(255,255,255,0.1); margin-top: -20px; }
    .track-line.done   { background: linear-gradient(90deg, #4ade80, #7c3aed); }
    .btn-glow { position: relative; }
    .btn-glow::before { content:''; position:absolute; inset:-1px; border-radius: inherit; background: linear-gradient(135deg,#7c3aed,#00d4ff); opacity:0; transition: opacity .3s; z-index:0; }
    .btn-glow:hover::before { opacity: 0.4; }
  </style>
</head>
<body>

  <!-- Header -->
  <header style="border-bottom:1px solid rgba(255,255,255,0.05); background:rgba(10,10,15,0.8); backdrop-filter:blur(20px);" class="sticky top-0 z-40">
    <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between">
      <a href="/NovaFlow-Store-v5.0.0/public/index.php" class="flex items-center gap-2">
        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-neon-purple to-neon-blue flex items-center justify-center">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 792" class="w-5 h-5" fill="white">
            <polyline points="241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03"/>
            <polygon points="131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97"/>
            <polygon points="232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58"/>
            <polyline points="232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83"/>
            <polygon points="394.52 420.69 492.73 370.17 495 480.3 394.52 420.69"/>
            <polygon points="495 480.3 394.52 528.56 394.52 420.69 495 480.3"/>
          </svg>
        </div>
        <span class="font-display font-bold text-lg gradient-text" style="font-family:Outfit,sans-serif">NovaFlow</span>
      </a>
      <nav class="flex items-center gap-4 text-sm">
        <a href="/NovaFlow-Store-v5.0.0/public/index.php" 
           class="text-gray-400 hover:text-white transition flex items-center gap-1">
          <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Shop
        </a>
        <a href="/NovaFlow-Store-v5.0.0/public/logout.php" 
           class="text-gray-400 hover:text-white transition">Logout</a>
      </nav>
    </div>
  </header>

  <main class="max-w-5xl mx-auto px-4 py-10">

    <!-- Page Title -->
    <div class="mb-8">
      <h1 class="font-display text-3xl font-bold gradient-text mb-1" style="font-family:Outfit,sans-serif">
        My Orders
      </h1>
      <p class="text-gray-500 text-sm">
        Welcome back, <span class="text-white"><?= htmlspecialchars($_SESSION['full_name'] ?? 'there') ?></span>
        — here are all your orders.
      </p>
    </div>

    <?php if (mysqli_num_rows($orders_result) === 0): ?>
      <!-- Empty state -->
      <div class="glass rounded-2xl p-16 text-center">
        <div class="text-6xl mb-4">📦</div>
        <h2 class="font-display text-xl font-semibold mb-2" style="font-family:Outfit,sans-serif">No orders yet</h2>
        <p class="text-gray-500 text-sm mb-6">Looks like you haven't placed any orders.</p>
        <a href="/NovaFlow-Store-v5.0.0/public/index.php"
           class="btn-glow inline-block px-6 py-3 bg-gradient-to-r from-neon-purple to-neon-blue 
                  rounded-xl font-semibold text-sm hover:opacity-90 transition relative">
          <span class="relative z-10">Start Shopping</span>
        </a>
      </div>

    <?php else: ?>
      <div class="space-y-6">
      <?php while ($order = mysqli_fetch_assoc($orders_result)):
        $oid    = $order['id'];
        $status = $order['status'];
        $items  = $items_by_order[$oid] ?? [];
        $date   = date('M j, Y', strtotime($order['created_at']));

        // Tracking step: 1=pending, 2=shipped, 3=delivered
        $step = match($status) { 'shipped' => 2, 'delivered' => 3, default => 1 };
      ?>
        <div class="glass rounded-2xl overflow-hidden">

          <!-- Order Header -->
          <div class="flex flex-wrap items-center justify-between gap-3 px-6 py-4"
               style="border-bottom:1px solid rgba(255,255,255,0.06)">
            <div class="flex items-center gap-4">
              <div>
                <span class="text-xs text-gray-500">Order</span>
                <span class="ml-1 font-display font-bold text-neon-blue" style="font-family:Outfit,sans-serif">
                  #<?= str_pad($oid, 5, '0', STR_PAD_LEFT) ?>
                </span>
              </div>
              <div class="text-xs text-gray-500"><?= $date ?></div>
            </div>
            <div class="flex items-center gap-3">
              <span class="text-sm font-bold">$<?= number_format($order['total'], 2) ?></span>
              <span class="px-3 py-1 rounded-full text-xs font-medium status-<?= $status ?>">
                <?= ucfirst($status) ?>
              </span>
            </div>
          </div>

          <!-- Order Items -->
          <div class="px-6 py-4 space-y-3">
            <?php foreach ($items as $item): ?>
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-xl flex-shrink-0 overflow-hidden"
                   style="background:rgba(124,58,237,0.1)">
                <?php if (!empty($item['image'])): ?>
                  <img src="/NovaFlow-Store-v5.0.0/uploads/products/<?= htmlspecialchars($item['image']) ?>"
                       alt="<?= htmlspecialchars($item['product_name']) ?>"
                       class="w-full h-full object-cover">
                <?php else: ?>
                  <div class="w-full h-full flex items-center justify-center text-2xl">
                    <?= $item['emoji'] ?? '📦' ?>
                  </div>
                <?php endif; ?>
              </div>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-medium truncate">
                  <?= htmlspecialchars($item['product_name']) ?>
                </div>
                <div class="text-xs text-gray-500">
                  Qty: <?= $item['quantity'] ?> &nbsp;·&nbsp; 
                  $<?= number_format($item['price'], 2) ?> each
                </div>
              </div>
              <div class="text-sm font-bold text-right flex-shrink-0">
                $<?= number_format($item['price'] * $item['quantity'], 2) ?>
              </div>
            </div>
            <?php endforeach; ?>
          </div>

          <!-- Track Order Timeline -->
          <div class="px-6 pb-6">
            <p class="text-xs text-gray-500 mb-3 uppercase tracking-widest">Order Progress</p>
            <div class="flex items-start gap-0">

              <!-- Step 1: Order Placed -->
              <div class="track-step">
                <div class="track-dot <?= $step >= 1 ? 'done' : '' ?>"></div>
                <span class="text-xs text-center <?= $step >= 1 ? 'text-green-400' : 'text-gray-600' ?>">
                  Placed
                </span>
              </div>

              <!-- Line 1→2 -->
              <div class="track-line <?= $step >= 2 ? 'done' : '' ?>" style="margin-top:7px"></div>

              <!-- Step 2: Shipped -->
              <div class="track-step">
                <div class="track-dot <?= $step >= 3 ? 'done' : ($step === 2 ? 'active' : '') ?>"></div>
                <span class="text-xs text-center 
                  <?= $step >= 3 ? 'text-green-400' : ($step === 2 ? 'text-neon-purple' : 'text-gray-600') ?>">
                  Shipped
                </span>
              </div>

              <!-- Line 2→3 -->
              <div class="track-line <?= $step >= 3 ? 'done' : '' ?>" style="margin-top:7px"></div>

              <!-- Step 3: Delivered -->
              <div class="track-step">
                <div class="track-dot <?= $step >= 3 ? 'done' : '' ?>"></div>
                <span class="text-xs text-center <?= $step >= 3 ? 'text-green-400' : 'text-gray-600' ?>">
                  Delivered
                </span>
              </div>

            </div>
          </div>

        </div>
      <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </main>

  <script>lucide.createIcons({nameAttr:'data-lucide'});</script>
</body>
</html>
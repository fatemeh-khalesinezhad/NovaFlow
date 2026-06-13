<?php
session_start();
require_once __DIR__ . '/../config/database.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/login.php";</script>';
    exit();
}

// Fetch orders with user info and item count
$result = mysqli_query($link, 
    "SELECT o.*, u.full_name, u.email,
            COUNT(oi.id) AS item_count
     FROM orders o
     JOIN users u ON o.user_id = u.id
     LEFT JOIN order_items oi ON oi.order_id = o.id
     GROUP BY o.id
     ORDER BY o.id DESC"
);

// Status filter
$filter = $_GET['status'] ?? 'all';
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 612 792' fill='white'><polyline points='241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03'/><polygon points='131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97'/><polygon points='232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58'/><polyline points='232.31 373.55 232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83'/><polygon points='394.52 420.69 492.73 370.17 495 480.3 394.52 420.69'/><polygon points='495 480.3 394.52 528.56 394.52 420.69 495 480.3'/></svg>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Orders – NovaFlow</title>
  <script src="../assets/js/tailwind.min.js"></script>
  <script src="../assets/js/lucide.min.js"></script>
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
    body { background:#0a0a0f; color:white; font-family:'DM Sans',sans-serif; }
    .glass { background:rgba(255,255,255,0.03); backdrop-filter:blur(20px); border:1px solid rgba(255,255,255,0.08); }
    .gradient-text { background:linear-gradient(135deg,#7c3aed,#00d4ff); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
    .status-pending   { background:rgba(234,179,8,0.1);  color:#eab308; border:1px solid rgba(234,179,8,0.25); }
    .status-shipped   { background:rgba(59,130,246,0.1); color:#60a5fa; border:1px solid rgba(59,130,246,0.25); }
    .status-delivered { background:rgba(34,197,94,0.1);  color:#4ade80; border:1px solid rgba(34,197,94,0.25); }
    .row-hover:hover { background:rgba(255,255,255,0.02); }
    .btn-glow { position:relative; overflow:hidden; transition:all .3s; }
    .btn-glow::before { content:''; position:absolute; inset:-1px; border-radius:inherit; background:linear-gradient(135deg,#7c3aed,#00d4ff); opacity:0; transition:opacity .3s; z-index:0; }
    .btn-glow:hover::before { opacity:0.4; }
    select option { background:#1a1a2e; color:white; }
    .stat-card { transition: transform .3s; }
    .stat-card:hover { transform: translateY(-4px); }
  </style>
</head>
<body>

<!-- Header -->
<header style="border-bottom:1px solid rgba(255,255,255,0.05);background:rgba(10,10,15,0.9);backdrop-filter:blur(20px);" class="sticky top-0 z-40">
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between">
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
      <span class="font-bold text-lg gradient-text" style="font-family:Outfit,sans-serif">NovaFlow</span>
    </a>
    <nav class="flex items-center gap-1 text-sm">
      <a href="/NovaFlow-Store-v5.0.0/public/index.php"
         class="px-3 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition">
        Shop
      </a>
      <a href="/NovaFlow-Store-v5.0.0/admin/products.php"
         class="px-3 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition flex items-center gap-1.5">
        <i data-lucide="package" class="w-4 h-4"></i> Products
      </a>
      <a href="/NovaFlow-Store-v5.0.0/admin/orders.php"
         class="px-3 py-2 rounded-lg text-neon-blue bg-white/5 transition flex items-center gap-1.5">
        <i data-lucide="shopping-bag" class="w-4 h-4"></i> Orders
      </a>
      <a href="/NovaFlow-Store-v5.0.0/public/logout.php"
         class="px-3 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-white/5 transition">
        Logout
      </a>
    </nav>
  </div>
</header>

<main class="max-w-7xl mx-auto px-4 py-10">

  <!-- Page Title -->
  <div class="mb-8">
    <h1 class="text-3xl font-bold gradient-text mb-1" style="font-family:Outfit,sans-serif">
      Manage Orders
    </h1>
    <p class="text-gray-500 text-sm">View and update customer order statuses.</p>
  </div>

  <?php
  // Calculate stats from result
  $all_orders = [];
  while ($row = mysqli_fetch_assoc($result)) {
      $all_orders[] = $row;
  }
  $total     = count($all_orders);
  $pending   = count(array_filter($all_orders, fn($o) => $o['status'] === 'pending'));
  $shipped   = count(array_filter($all_orders, fn($o) => $o['status'] === 'shipped'));
  $delivered = count(array_filter($all_orders, fn($o) => $o['status'] === 'delivered'));
  $revenue   = array_sum(array_column($all_orders, 'total'));

  // Apply filter
  $filtered_orders = $filter === 'all' 
      ? $all_orders 
      : array_filter($all_orders, fn($o) => $o['status'] === $filter);
  ?>

  <!-- Stats Row -->
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <?php foreach ([
      ['label'=>'Total Orders',   'value'=>$total,              'icon'=>'shopping-bag', 'color'=>'text-neon-blue'],
      ['label'=>'Pending',        'value'=>$pending,            'icon'=>'clock',        'color'=>'text-yellow-400'],
      ['label'=>'Shipped',        'value'=>$shipped,            'icon'=>'truck',        'color'=>'text-blue-400'],
      ['label'=>'Revenue',        'value'=>'$'.number_format($revenue,2), 'icon'=>'dollar-sign','color'=>'text-neon-blue'],
    ] as $stat): ?>
    <div class="glass rounded-2xl p-5 stat-card">
      <div class="flex items-center justify-between mb-3">
        <span class="text-xs text-gray-500 uppercase tracking-widest"><?= $stat['label'] ?></span>
        <i data-lucide="<?= $stat['icon'] ?>" class="w-4 h-4 <?= $stat['color'] ?>"></i>
      </div>
      <div class="text-2xl font-bold <?= $stat['color'] ?>" style="font-family:Outfit,sans-serif">
        <?= $stat['value'] ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- Filter Tabs -->
  <div class="flex gap-2 mb-6">
    <?php foreach (['all','pending','shipped','delivered'] as $tab): ?>
    <a href="?status=<?= $tab ?>"
       class="px-4 py-2 rounded-xl text-sm font-medium transition
              <?= $filter === $tab 
                  ? 'bg-gradient-to-r from-neon-purple to-neon-blue text-white' 
                  : 'glass text-gray-400 hover:text-white' ?>">
      <?= ucfirst($tab) ?>
      <?php if ($tab !== 'all'): ?>
        <span class="ml-1 opacity-60">(<?= $$tab ?>)</span>
      <?php endif; ?>
    </a>
    <?php endforeach; ?>
  </div>

  <!-- Orders Table -->
  <div class="glass rounded-2xl overflow-hidden">
    <table class="w-full text-sm">
      <thead>
        <tr style="border-bottom:1px solid rgba(255,255,255,0.06);background:rgba(255,255,255,0.02)">
          <th class="px-6 py-4 text-left text-xs text-gray-500 uppercase tracking-widest">Order</th>
          <th class="px-6 py-4 text-left text-xs text-gray-500 uppercase tracking-widest">Customer</th>
          <th class="px-6 py-4 text-left text-xs text-gray-500 uppercase tracking-widest">Items</th>
          <th class="px-6 py-4 text-left text-xs text-gray-500 uppercase tracking-widest">Total</th>
          <th class="px-6 py-4 text-left text-xs text-gray-500 uppercase tracking-widest">Status</th>
          <th class="px-6 py-4 text-left text-xs text-gray-500 uppercase tracking-widest">Date</th>
          <th class="px-6 py-4 text-left text-xs text-gray-500 uppercase tracking-widest">Update</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($filtered_orders)): ?>
        <tr>
          <td colspan="7" class="px-6 py-16 text-center text-gray-500">
            <div class="text-4xl mb-3">📭</div>
            No <?= $filter !== 'all' ? $filter : '' ?> orders found.
          </td>
        </tr>
        <?php else: ?>
        <?php foreach ($filtered_orders as $order): ?>
        <tr class="row-hover" style="border-bottom:1px solid rgba(255,255,255,0.04)">

          <!-- Order ID -->
          <td class="px-6 py-4">
            <span class="font-bold text-neon-blue" style="font-family:Outfit,sans-serif">
              #<?= str_pad($order['id'], 5, '0', STR_PAD_LEFT) ?>
            </span>
          </td>

          <!-- Customer -->
          <td class="px-6 py-4">
            <div class="font-medium"><?= htmlspecialchars($order['full_name']) ?></div>
            <div class="text-xs text-gray-500"><?= htmlspecialchars($order['email']) ?></div>
          </td>

          <!-- Items count -->
          <td class="px-6 py-4">
            <span class="px-2.5 py-1 bg-white/5 rounded-lg text-xs">
              <?= $order['item_count'] ?> item<?= $order['item_count'] != 1 ? 's' : '' ?>
            </span>
          </td>

          <!-- Total -->
          <td class="px-6 py-4 font-bold">
            $<?= number_format($order['total'], 2) ?>
          </td>

          <!-- Status Badge -->
          <td class="px-6 py-4">
            <span class="px-3 py-1 rounded-full text-xs font-medium status-<?= $order['status'] ?>">
              <?= ucfirst($order['status']) ?>
            </span>
          </td>

          <!-- Date -->
          <td class="px-6 py-4 text-gray-500 text-xs">
            <?= date('M j, Y', strtotime($order['created_at'])) ?><br>
            <?= date('g:i A', strtotime($order['created_at'])) ?>
          </td>

          <!-- Update Status -->
          <td class="px-6 py-4">
            <form action="action/order_action.php" method="POST" class="flex items-center gap-2">
              <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
              <select name="status"
                class="px-3 py-1.5 bg-dark-700 border border-white/10 rounded-lg text-sm 
                       text-white focus:border-neon-blue focus:outline-none transition">
                <option value="pending"   <?= $order['status']==='pending'   ? 'selected':'' ?>>Pending</option>
                <option value="shipped"   <?= $order['status']==='shipped'   ? 'selected':'' ?>>Shipped</option>
                <option value="delivered" <?= $order['status']==='delivered' ? 'selected':'' ?>>Delivered</option>
              </select>
              <button type="submit"
                class="btn-glow px-3 py-1.5 bg-gradient-to-r from-neon-purple to-neon-blue 
                       rounded-lg text-xs font-semibold hover:opacity-90 transition relative">
                <span class="relative z-10">Save</span>
              </button>
            </form>
          </td>

        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

</main>

<script>lucide.createIcons({nameAttr:'data-lucide'});</script>
</body>
</html>
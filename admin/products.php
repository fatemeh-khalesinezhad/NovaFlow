<?php
session_start();
require_once __DIR__ . '/../config/database.php';
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    echo '<script>window.location.href="/NovaFlow-Store-v5.0.0/public/login.php";</script>';
    exit();
}

// -------- Handle EDIT mode --------
$edit_mode = false;
$pro = ['id'=>'','name'=>'','category'=>'laptops','price'=>'','stock'=>'','emoji'=>'','rating'=>'','reviews'=>'','description'=>''];

if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $id = (int)$_GET['edit'];
    $res = mysqli_query($link, "SELECT * FROM products WHERE id = $id");
    if ($row = mysqli_fetch_assoc($res)) {
        $pro = $row;
        $edit_mode = true;
    }
}

// -------- Fetch all products for the table --------
$result = mysqli_query($link, "SELECT * FROM products ORDER BY id ASC");
?>
<!doctype html>
<html lang="en" class="h-full dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Products – NovaFlow</title>
  <link rel="stylesheet" href="../assets/css/tailwind.min.css">
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 612 792' fill='white'><polyline points='241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03'/><polygon points='131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97'/><polygon points='232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58'/><polyline points='232.31 373.55 232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83'/><polygon points='394.52 420.69 492.73 370.17 495 480.3 394.52 420.69'/><polygon points='495 480.3 394.52 528.56 394.52 420.69 495 480.3'/></svg>">
  <script src="../assets/js/tailwind.min.js"></script>
  <script src="../assets/js/lucide.min.js"></script>
  <script>tailwind.config={darkMode:'class',theme:{extend:{colors:{neon:{blue:'#00d4ff',purple:'#7c3aed',pink:'#ec4899'},dark:{900:'#0a0a0f',800:'#12121a',700:'#1a1a2e',600:'#252540'}},fontFamily:{display:['Outfit','sans-serif'],body:['DM Sans','sans-serif']}}}}</script>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    /* ===== YOUR FULL CUSTOM CSS (from 5.0v) ===== */
    *{margin:0;padding:0;box-sizing:border-box}
    /* ... paste every line of your original <style> block here ... */
  </style>
</head>
<body class="h-full bg-dark-900 text-white overflow-auto" id="app-body">

  <!-- Animated Background -->
  <div id="bg-layer" class="fixed inset-0 bg-animated-gradient z-0">
    <div class="orb orb-1"></div><div class="orb orb-2"></div><div class="orb orb-3"></div>
    <div class="grid-overlay"></div><canvas id="particles" class="absolute inset-0 pointer-events-none"></canvas>
  </div>
  <div id="cursor"></div>

  <div id="main-app" class="w-full h-full flex flex-col relative z-10">
    <header class="sticky top-0 z-40 glass border-b border-white/5">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between">
        <a href="/NovaFlow-Store-v5.0.0/public/index.php" class="flex items-center gap-2">
          <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-neon-purple to-neon-blue flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 792" class="w-5 h-5" fill="white"><polyline points="241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03"/><polygon points="131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97"/><polygon points="232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58"/><polyline points="232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83"/><polygon points="394.52 420.69 492.73 370.17 495 480.3 394.52 420.69"/><polygon points="495 480.3 394.52 528.56 394.52 420.69 495 480.3"/></svg>
          </div>
          <span class="font-display font-bold text-xl gradient-text">NovaFlow</span>
        </a>
        <nav class="hidden md:flex gap-1">
          <a href="/NovaFlow-Store-v5.0.0/public/index.php" class="px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white">Shop</a>
          <a href="/NovaFlow-Store-v5.0.0/admin/orders.php" class="px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white">Orders</a>
          <a href="/NovaFlow-Store-v5.0.0/public/logout.php" class="px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white">Logout</a>
        </nav>
      </div>
    </header>

    <main class="flex-1 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
        <h1 class="font-display text-3xl font-bold gradient-text mb-6">
          <?= $edit_mode ? 'Edit Product' : 'Manage Products' ?>
        </h1>

     <!-- Add / Edit Form -->
<form action="action/product_action.php" method="POST" enctype="multipart/form-data" class="glass rounded-2xl p-6 mb-8">
  <input type="hidden" name="action" value="<?= $edit_mode ? 'update' : 'add' ?>">
  <?php if ($edit_mode): ?>
    <input type="hidden" name="id" value="<?= $pro['id'] ?>">
  <?php endif; ?>
  <h2 class="font-display font-semibold mb-4"><?= $edit_mode ? 'Edit' : 'Add New' ?> Product</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <input type="text" name="name" placeholder="Product Name" required value="<?= htmlspecialchars($pro['name']) ?>" class="px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
    <select name="category" required class="px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
      <?php foreach (['laptops','smartphones','headphones','accessories'] as $cat): ?>
        <option value="<?= $cat ?>" <?= $pro['category'] == $cat ? 'selected' : '' ?>><?= ucfirst($cat) ?></option>
      <?php endforeach; ?>
    </select>
    <input type="number" step="0.01" name="price" placeholder="Price" required value="<?= $pro['price'] ?>" class="px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
    <input type="number" name="stock" placeholder="Stock" required value="<?= $pro['stock'] ?>" class="px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
    <input type="text" name="emoji" placeholder="Emoji (e.g. 💻)" value="<?= htmlspecialchars($pro['emoji']) ?>" class="px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
    <input type="text" name="rating" placeholder="Rating (e.g. 4.5)" value="<?= $pro['rating'] ?>" class="px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
    <input type="number" name="reviews" placeholder="Reviews count" value="<?= $pro['reviews'] ?>" class="px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
    <textarea name="description" placeholder="Description" class="col-span-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none"><?= htmlspecialchars($pro['description']) ?></textarea>

    <!-- Featured checkbox -->
    <div class="flex items-center gap-2 col-span-full">
      <input type="checkbox" id="featured" name="featured" value="1" <?= (!empty($pro['featured'])) ? 'checked' : '' ?>>
      <label for="featured" class="text-sm text-gray-400">Featured Product</label>
    </div>

    <input type="file" name="image" class="px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white">
    <?php if ($edit_mode && !empty($pro['image'])): ?>
      <p class="text-xs text-gray-400">Current: <?= $pro['image'] ?></p>
    <?php endif; ?>
  </div>
  <button type="submit" class="mt-4 btn-glow px-6 py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-semibold">
    <?= $edit_mode ? 'Update Product' : 'Add Product' ?>
  </button>
  <?php if ($edit_mode): ?>
    <a href="products.php" class="ml-4 text-gray-400 hover:text-white">Cancel</a>
  <?php endif; ?>
</form>

        <!-- Product Table -->
        <div class="glass rounded-2xl overflow-hidden">
          <table class="w-full text-sm">
            <thead class="bg-dark-700"><tr><th class="p-3 text-left">ID</th><th class="p-3 text-left">Name</th><th class="p-3">Price</th><th class="p-3">Stock</th><th class="p-3">Actions</th></tr></thead>
            <tbody>
              <?php while ($p = mysqli_fetch_assoc($result)): ?>
              <tr class="border-t border-white/5">
                <td class="p-3"><?= $p['id'] ?></td>
                <td class="p-3"><?= htmlspecialchars($p['name']) ?></td>
                <td class="p-3">$<?= number_format($p['price']) ?></td>
                <td class="p-3"><?= $p['stock'] ?></td>
                <td class="p-3">
                  <a href="?edit=<?= $p['id'] ?>" class="text-neon-blue mr-2">Edit</a>
                  <a href="action/product_action.php?delete=<?= $p['id'] ?>" class="text-red-400" onclick="return confirm('Delete?')">Delete</a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <script>
    document.addEventListener('mousemove', (e) => {
      const cursor = document.getElementById('cursor');
      if (!cursor) return;
      cursor.style.left = e.clientX + 'px';
      cursor.style.top = e.clientY + 'px';
    });
    if (typeof lucide !== 'undefined') lucide.createIcons({nameAttr:'data-lucide'});
  </script>
</body>
</html>
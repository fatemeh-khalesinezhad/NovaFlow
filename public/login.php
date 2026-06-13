<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="max-w-md mx-auto py-16 px-4">
    <h1 class="font-display text-3xl font-bold gradient-text mb-6 text-center">Login</h1>
    <!--new --><?php if (isset($_SESSION['error'])): ?>
    <div class="bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl px-4 py-3 text-sm text-center mb-4">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>
<?php if (isset($_SESSION['success'])): ?>
    <div class="bg-green-500/10 border border-green-500/30 text-green-400 rounded-xl px-4 py-3 text-sm text-center mb-4">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>
<!-- end-->
    <?php if (isset($_SESSION['error'])): ?>
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl px-4 py-3 text-sm text-center mb-4">
            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])): ?>
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 rounded-xl px-4 py-3 text-sm text-center mb-4">
            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php endif; ?>

    <form action="action_login.php" method="POST" class="glass rounded-2xl p-6 space-y-4">
        <div>
            <label class="text-sm text-gray-400">Email</label>
            <input type="email" name="email" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
        </div>
        <div>
            <label class="text-sm text-gray-400">Password</label>
            <input type="password" name="password" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
        </div>
        <button type="submit" class="btn-glow w-full py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-semibold">Sign In</button>
        <p class="text-center text-sm text-gray-500">No account? <a href="register.php" class="text-neon-blue">Register</a></p>
    </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
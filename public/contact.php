<?php
session_start();
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/header.php';

if (!isset($_SESSION['user_id'])) {
    echo '<script>window.location.href="login.php";</script>';
    exit();
}
?>
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

<div class="max-w-4xl mx-auto py-16 px-4">
    <h1 class="font-display text-4xl font-bold gradient-text mb-6">Contact Us</h1>
    <form action="action_contact.php" method="POST" class="glass rounded-2xl p-6 space-y-4">
        <div>
            <label class="text-sm text-gray-400">Subject <span style="color:red;">*</span></label>
            <input type="text" name="subject" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none">
        </div>
        <div>
            <label class="text-sm text-gray-400">Message <span style="color:red;">*</span></label>
            <textarea name="message" rows="5" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none"></textarea>
        </div>
        <button type="submit" class="btn-glow px-6 py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-semibold">Send Message</button>
    </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
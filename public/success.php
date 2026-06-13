<?php
session_start();
$message   = $_SESSION['success_msg'] ?? 'Success!';
$redirect  = $_SESSION['success_redirect'] ?? 'index.php';
unset($_SESSION['success_msg'], $_SESSION['success_redirect']);
?>
<!doctype html>
<html lang="en" class="h-full dark">
<head>
    <meta charset="UTF-8">
    <title>Success – NovaFlow</title>
    <link rel="stylesheet" href="../assets/css/tailwind.min.css">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 612 792' fill='white'><polyline points='241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03'/><polygon points='131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97'/><polygon points='232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58'/><polyline points='232.31 373.55 232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83'/><polygon points='394.52 420.69 492.73 370.17 495 480.3 394.52 420.69'/><polygon points='495 480.3 394.52 528.56 394.52 420.69 495 480.3'/></svg>">
    <script src="../assets/js/lucide.min.js"></script>
    <script>tailwind.config={darkMode:'class',theme:{extend:{colors:{neon:{blue:'#00d4ff',purple:'#7c3aed',pink:'#ec4899'},dark:{900:'#0a0a0f',800:'#12121a',700:'#1a1a2e',600:'#252540'}},fontFamily:{display:['Outfit','sans-serif'],body:['DM Sans','sans-serif']}}}}</script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box}
        html,body{height:100%;font-family:'DM Sans',sans-serif}
        .bg-animated-gradient { background: linear-gradient(270deg, #0a0a2e, #1a0033, #0d001a, #001a2e); background-size: 400% 400%; animation: gradient-shift 30s ease infinite; }
        @keyframes gradient-shift { 0%,100%{ background-position: 0% 50%; } 50%{ background-position: 100% 50%; } }
        .gradient-text{background:linear-gradient(135deg,#00d4ff,#7c3aed,#ec4899);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
        .glass{background:rgba(18,18,26,.6);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.06)}
        @keyframes fadeUp { from { opacity:0; transform:translateY(30px); } to { opacity:1; transform:translateY(0); } }
        .animate-fade-up { animation: fadeUp 0.6s ease forwards; }
        .btn-home { display:inline-block; margin-top:20px; padding:10px 24px; background:linear-gradient(135deg,#7c3aed,#00d4ff); color:white; border-radius:12px; text-decoration:none; font-weight:600; }
    </style>
</head>
<body class="h-full bg-dark-900 text-white flex items-center justify-center">
    <div id="bg-layer" class="fixed inset-0 bg-animated-gradient z-0"></div>
    <div class="relative z-10 text-center glass rounded-3xl p-10 max-w-md mx-4 animate-fade-up">
        <div class="text-6xl mb-4">✅</div>
        <h1 class="font-display text-3xl font-bold gradient-text mb-4"><?= htmlspecialchars($message) ?></h1>
        <p class="text-gray-400">Redirecting in <span id="countdown">2</span> seconds...</p>
        <a href="<?= $redirect ?>" class="btn-home">Continue now</a>
    </div>
    <script>
        let seconds = 2;
        const countdown = document.getElementById('countdown');
        const interval = setInterval(() => {
            seconds--;
            countdown.textContent = seconds;
            if (seconds <= 0) {
                clearInterval(interval);
                window.location.href = '<?= $redirect ?>';
            }
        }, 1000);
    </script>
</body>
</html>
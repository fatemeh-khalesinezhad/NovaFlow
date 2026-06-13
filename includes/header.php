<?php
session_start();
require_once __DIR__ . '/../config/database.php';
?>
<!doctype html>
<html lang="en" class="h-full dark">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NovaFlow Store</title>
  <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 612 792' fill='white'><polyline points='241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03'/><polygon points='131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97'/><polygon points='232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58'/><polyline points='232.31 373.55 232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83'/><polygon points='394.52 420.69 492.73 370.17 495 480.3 394.52 420.69'/><polygon points='495 480.3 394.52 528.56 394.52 420.69 495 480.3'/></svg>">
<script src='../assets/js/tailwind.min.js'></script> 
 <!-- <link rel="stylesheet" href="../assets/css/tailwind.min.css"> -->
<script src="../assets/js/lucide.min.js"></script> 
 <script>
tailwind.config={darkMode:'class',theme:{extend:{colors:{neon:{blue:'#00d4ff',purple:'#7c3aed',pink:'#ec4899'},dark:{900:'#0a0a0f',800:'#12121a',700:'#1a1a2e',600:'#252540'}},fontFamily:{display:['Outfit','sans-serif'],body:['DM Sans','sans-serif']}}}}
</script>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;family=DM+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
  <style>
*{margin:0;padding:0;box-sizing:border-box}
html,body{height:100%;font-family:'DM Sans',sans-serif;scroll-behavior:smooth}
::-webkit-scrollbar{width:6px}
::-webkit-scrollbar-track{background:#0a0a0f}
::-webkit-scrollbar-thumb{background:linear-gradient(#7c3aed,#00d4ff);border-radius:3px}
.gradient-text{background:linear-gradient(135deg,#00d4ff,#7c3aed,#ec4899);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.glow-blue{box-shadow:0 0 20px 

rgba(0,212,255,.15),0 0 40px rgba(0,212,255,.05)}
.glow-purple{box-shadow:0 0 20px rgba(124,58,237,.2),0 0 40px rgba(124,58,237,.05)}
.card-hover{transition:all .4s cubic-bezier(.4,0,.2,1)}
.card-hover:hover{transform:translateY(-8px);box-shadow:0 20px 60px rgba(0,212,255,.12)}
.btn-glow{position:relative;overflow:hidden;transition:all .3s}
.btn-glow::before{content:'';position:absolute;top:-50%;left:-50%;width:200%;height:200%;background:conic-gradient(from 0deg,transparent,rgba(0,212,255,.3),transparent,rgba(124,58,237,.3),transparent);animation:spin 3s linear infinite;opacity:0;transition:opacity .3s}
.btn-glow:hover::before{opacity:1}
@keyframes spin{to{transform:rotate(360deg)}}
@keyframes fadeUp{from{opacity:0;transform:translateY(30px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeIn{from{opacity:0}to{opacity:1}}
@keyframes slideIn{from{transform:translateX(100%)}to{transform:translateX(0)}}
@keyframes slideOut{from{transform:translateX(0)}to{transform:translateX(100%)}}
@keyframes pulse-glow{0%,100%{box-shadow:0 0 5px rgba(0,212,255,.3)}50%{box-shadow:0 0 20px rgba(0,212,255,.6)}}
.animate-fade-up{animation:fadeUp .6s ease forwards}
.animate-fade-in{animation:fadeIn .4s ease forwards}
.stagger-1{animation-delay:.1s;opacity:0}
.stagger-2{animation-delay:.2s;opacity:0}
.stagger-3{animation-delay:.3s;opacity:0}
.stagger-4{animation-delay:.4s;opacity:0}
.hero-bg{background:radial-gradient(ellipse at 30% 20%,rgba(124,58,237,.15) 0%,transparent 50%),radial-gradient(ellipse at 70% 80%,rgba(0,212,255,.1) 0%,transparent 50%),radial-gradient(ellipse at 50% 50%,rgba(236,72,153,.05) 0%,transparent 70%)}
.glass{background:rgba(18,18,26,.6);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.06)}
.grid-bg{background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:60px 60px}
.toast-enter{animation:slideIn .3s ease forwards}
.toast-exit{animation:slideOut .3s ease forwards}
.skeleton{background:linear-gradient(90deg,rgba(255,255,255,.04) 25%,rgba(255,255,255,.08) 50%,rgba(255,255,255,.04) 75%);background-size:200% 100%;animation:shimmer 1.5s infinite}
@keyframes shimmer{0%{background-position:200% 0}100%{background-position:-200% 0}}
.light-mode{--bg-primary:#f8fafc;--bg-secondary:#ffffff;--bg-tertiary:#f1f5f9;--text-primary:#0f172a;--text-secondary:#475569;--border-color:rgba(0,0,0,.08)}
.light-mode .glass { background: rgba(255,255,255,.8); border-color: rgba(0,0,0,.08); color: #111827; }
.light-mode .nav-link { color: #374151; } /* gray-700 */
.light-mode .nav-link:hover { color: #111827; background: rgba(0,0,0,.05); }
.light-mode #logo-text { -webkit-text-fill-color: #111827; }
.accordion-content{max-height:0;overflow:hidden;transition:max-height .3s ease}
.accordion-content.open{max-height:500px}
/* Cursor Effects */
#cursor{position:fixed;width:20px;height:20px;border:2px solid #00d4ff;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%);mix-blend-mode:lighten;box-shadow:0 0 10px rgba(0,212,255,.5)}
#cursor.active{width:40px;height:40px;border-color:#7c3aed;box-shadow:0 0 20px rgba(124,58,237,.8),inset 0 0 10px rgba(124,58,237,.3);background:rgba(124,58,237,.1)}
#cursor-trail{position:fixed;width:8px;height:8px;background:#00d4ff;border-radius:50%;pointer-events:none;z-index:9998;opacity:.6}
/* Animated Background */
.bg-animated{position:fixed;top:0;left:0;width:100%;height:100%;z-index:-1;pointer-events:none}
.bg-orb{position:absolute;border-radius:50%;mix-blend-mode:screen;filter:blur(60px);opacity:.1}
/* OLDv .orb-1{width:300px;height:300px;background:linear-gradient(135deg,#7c3aed,#00d4ff);animation:float1 20s ease-in-out infinite}
.orb-2{width:250px;height:250px;background:linear-gradient(135deg,#ec4899,#7c3aed);animation:float2 25s ease-in-out infinite;right:10%;top:20%}
.orb-3{width:200px;height:200px;background:linear-gradient(135deg,#00d4ff,#ec4899);animation:float3 30s ease-in-out infinite;bottom:10%;left:10%}*/
.orb { position:fixed; border-radius:50%; filter:blur(80px); opacity:0.2; animation: float 6s ease-in-out infinite; }

/*OLDv @keyframes float1{0%,100%{transform:translate(0,0)}25%{transform:translate(50px,-50px)}50%{transform:translate(100px,0)}75%{transform:translate(50px,50px)}}
@keyframes float2{0%,100%{transform:translate(0,0)}25%{transform:translate(-50px,50px)}50%{transform:translate(-100px,0)}75%{transform:translate(-50px,-50px)}}
@keyframes float3{0%,100%{transform:translate(0,0)}25%{transform:translate(30px,30px)}50%{transform:translate(0,100px)}75%{transform:translate(-30px,30px)}}*/
        @keyframes float1 { 0%,100%{ transform: translate(0,0); } 50%{ transform: translate(30px,-20px); } }
        @keyframes float2 { 0%,100%{ transform: translate(0,0); } 50%{ transform: translate(-20px,30px); } }
        @keyframes float3 { 0%,100%{ transform: translate(0,0); } 50%{ transform: translate(15px,25px); } }
/*new*/
.bg-animated-gradient {
    background: linear-gradient(270deg, #0a0a2e, #1a0033, #0d001a, #001a2e);
    background-size: 400% 400%;
    animation: gradient-shift 30s ease infinite;
}
@keyframes gradient-shift { 0%,100%{ background-position: 0% 50%; } 50%{ background-position: 100% 50%; } }
.grid-overlay {
    position: absolute; inset: 0; pointer-events: none;
    background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 60px 60px;
    animation: grid-move 20s linear infinite;
}
@keyframes grid-move { 0%{ transform: translateY(0); } 100%{ transform: translateY(40px); } }

.light .bg-animated-gradient {
    background: linear-gradient(270deg, #f0f4ff, #fdf2f8, #eff6ff, #faf5ff);
    background-size: 400% 400%;
}
.light .orb {
    mix-blend-mode: multiply;
    opacity: 0.15 !important;
}
.light .grid-overlay {
    display: none;
}
/*end new*/
/* Chatbot */

#chatbot-btn{position:fixed;bottom:6rem;right:1.5rem;z-index:40;width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#00d4ff);border:none;cursor:pointer;box-shadow:0 10px 40px rgba(0,212,255,.2);display:flex;align-items:center;justify-content:center;transition:all .3s;font-size:1.5rem}
#chatbot-btn:hover{transform:scale(1.1);box-shadow:0 15px 50px rgba(0,212,255,.4)}
#chatbot-btn.active{width:420px;height:32px;border-radius:1rem;justify-content:space-between;padding:0 1rem}
#chatbot-window{position:fixed;bottom:5.5rem;right:1.5rem;z-index:40;width:420px;height:500px;glass rounded-2xl;display:flex;flex-direction:column;opacity:0;pointer-events:none;transform:scale(.95) translateY(20px);transition:all .3s}
#chatbot-window.open{opacity:1;pointer-events:auto;transform:scale(1) translateY(0)}
#chatbot-messages{flex:1;overflow-y:auto;padding:1rem;display:flex;flex-direction:column;gap:.75rem}
#chatbot-input{border-top:1px solid rgba(255,255,255,.1);padding:.75rem;display:flex;gap:.5rem}
#chatbot-input input{flex:1;bg:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:.5rem;padding:.5rem;color:white}
.chat-msg{padding:.75rem 1rem;border-radius:1rem;font-size:.875rem;animation:slideIn .3s ease}
.chat-user{background:linear-gradient(135deg,#7c3aed,#00d4ff);color:white;align-self:flex-end;max-width:80%}
.chat-bot{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.1);align-self:flex-start;max-width:80%}

.compare-bar{transform:translateY(100%);transition:transform .3s ease}
.compare-bar.visible{transform:translateY(0)}
input[type="range"]{-webkit-appearance:none;height:4px;background:linear-gradient(90deg,#7c3aed,#00d4ff);border-radius:2px}
input[type="range"]::-webkit-slider-thumb{-webkit-appearance:none;width:16px;height:16px;background:#00d4ff;border-radius:50%;cursor:pointer}
</style>
  <style>body { box-sizing: border-box; }</style>
 <!-- <script src="/_sdk/data_sdk.js" type="text/javascript"></script>  -->
 </head>
 <body class="h-full bg-dark-900 text-white overflow-auto" id="app-body">
  <!--  Loading 
   <div id="page-loader" class="loader" style="position:fixed;inset:0;z-index:99999;display:flex;align-items:center;justify-content:center;background:#0a0a0f;font-size:3rem;font-weight:bold;">
  Loading      
</div>
<script>
/*window.addEventListener('load', function() {
  const loader = document.getElementById('page-loader');
  if (loader) loader.style.display = 'none';
});*/
</script>
<style>
  
/*.loader {
  font-size: 48px;
  letter-spacing: 2px;
  font-family: Arial, Helvetica, sans-serif;
  color: #FFF;
  -webkit-animation: animloader 3s ease-in infinite alternate;
          animation: animloader 3s ease-in infinite alternate;
}
@-webkit-keyframes animloader {
  0% {
    filter: blur(0px);
    transform: skew(0deg);
  }
  100% {
    filter: blur(3px);
    transform: skew(-4deg);
  }
}
@keyframes animloader {
  0% {
    filter: blur(0px);
    transform: skew(0deg);
  }
  100% {
    filter: blur(3px);
    transform: skew(-4deg);
  }
}*/
</style> -->

  <!-- Animated Background -->
  <!--OLDv 
  <div class="bg-animated hero-bg" id="bg-animated">
    
   <div class="bg-orb orb-1"></div>
   <div class="bg-orb orb-2"></div>
   <div class="bg-orb orb-3"></div>
  </div>-->
  <div id="bg-layer" class="fixed inset-0 bg-animated-gradient z-0">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="grid-overlay"></div>
    <canvas id="particles" class="absolute inset-0 pointer-events-none"></canvas>
</div>
  <!-- Custom Cursor -->
  <div id="cursor"></div><!-- Toast Container -->
  <div id="toast-container" class="fixed top-20 right-4 z-[100] flex flex-col gap-2"></div><!-- Notification for Compare -->
  <div id="compare-bar" class="compare-bar fixed bottom-0 left-0 right-0 z-50 glass border-t border-white/10 p-4">
   <div class="max-w-7xl mx-auto flex items-center justify-between">
    <div class="flex items-center gap-4">
     <span class="text-sm text-gray-400">Comparing:</span>
     <div id="compare-items" class="flex gap-2"></div>
    </div>
    <div class="flex gap-2">
     <button onclick="showCompare()" class="px-4 py-2 bg-gradient-to-r from-neon-purple to-neon-blue rounded-lg text-sm font-medium hover:opacity-90 transition">Compare Now</button> <button onclick="clearCompare()" class="px-4 py-2 border border-white/10 rounded-lg text-sm text-gray-400 hover:text-white transition">Clear</button>
    </div>
   </div>
  </div><!-- Mobile Menu Overlay -->
  <div id="mobile-menu" class="fixed inset-0 z-50 hidden">
   <div class="absolute inset-0 bg-black/80" onclick="toggleMobile()"></div>
   <div class="absolute right-0 top-0 bottom-0 w-72 bg-dark-800 border-l border-white/5 p-6 flex flex-col gap-6" style="animation:slideIn .3s ease">
    <button onclick="toggleMobile()" class="self-end"><i data-lucide="x" class="w-6 h-6"></i></button>
    <nav class="flex flex-col gap-4" id="mobile-nav"></nav>

   </div>
  </div>
  <!-- Auth Modal -->
<div id="auth-modal" class="fixed inset-0 z-50 hidden items-center justify-center" style="display:none">
   <div class="absolute inset-0 bg-black/70" onclick="closeAuth()"></div>
   <div class="relative glass rounded-2xl p-8 w-full max-w-md mx-4 animate-fade-up">
    <button onclick="closeAuth()" class="absolute top-4 right-4 text-gray-400 hover:text-white"><i data-lucide="x" class="w-5 h-5"></i></button>
    <h2 class="text-2xl font-display font-bold gradient-text mb-6" id="auth-title">Sign In</h2>
    <div id="auth-error" class="hidden bg-red-500/10 border border-red-500/30 text-red-400 rounded-xl px-4 py-3 text-sm text-center mb-4"></div>
    <div id="auth-tabs" class="flex gap-4 mb-6">
     <button onclick="switchAuth('login')" class="auth-tab text-sm font-medium pb-2 border-b-2 border-neon-blue text-white" data-tab="login">Login</button>
     <button onclick="switchAuth('register')" class="auth-tab text-sm font-medium pb-2 border-b-2 border-transparent text-gray-400" data-tab="register">Register</button>
    </div>
    <form onsubmit="handleAuth(event)" class="flex flex-col gap-4">
     <div id="register-name" class="hidden">
       <input type="text" name="full_name" placeholder="Full Name" class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:border-neon-blue focus:outline-none transition">
     </div>
     <input type="email" name="email" placeholder="Email Address" class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:border-neon-blue focus:outline-none transition">
     <input type="password" name="password" placeholder="Password" class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:border-neon-blue focus:outline-none transition">
     <div id="register-confirm" class="hidden">
       <input type="password" name="confirm_password" placeholder="Confirm Password" class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:border-neon-blue focus:outline-none transition">
     </div>
     <button type="submit" class="w-full py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-semibold hover:opacity-90 transition">Continue</button>
    </form>
   </div>
</div>
  <!-- Compare Modal -->
  <div id="compare-modal" class="fixed inset-0 z-50 hidden items-center justify-center" style="display:none">
   <div class="absolute inset-0 bg-black/70" onclick="closeCompareModal()"></div>
   <div class="relative glass rounded-2xl p-8 w-full max-w-4xl mx-4 max-h-[80%] overflow-auto animate-fade-up">
    <div class="flex justify-between items-center mb-6">
     <h2 class="text-2xl font-display font-bold gradient-text">Product Comparison</h2><button onclick="closeCompareModal()" class="text-gray-400 hover:text-white"><i data-lucide="x" class="w-5 h-5"></i></button>
    </div>
    <div id="compare-content"></div>
   </div>
  </div>
  <!-- Main App Container -->
  <div id="main-app" class="w-full h-full flex flex-col">
   <!-- Header -->
   <header id="header" class="sticky top-0 z-40 glass border-b border-white/5 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3 flex items-center justify-between">
     <a href="#" id="easter-logo" class="flex items-center gap-2">
      <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-neon-purple to-neon-blue flex items-center justify-center">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 792" class="w-5 h-5" fill="white" stroke="white" stroke-miterlimit="10">
    <polyline points="241.71 327.03 329.52 275.37 492.73 370.17 394.52 420.69 241.71 327.03"/>
    <polygon points="131.82 313.97 230.03 263.44 232.3 373.58 131.82 313.97"/>
    <polygon points="232.3 373.58 131.82 421.83 131.82 313.97 232.3 373.58"/>
    <polyline points="232.31 373.55 232.31 373.55 351.61 448.52 246.02 511.92 131.82 421.83"/>
    <polygon points="394.52 420.69 492.73 370.17 495 480.3 394.52 420.69"/>
    <polygon points="495 480.3 394.52 528.56 394.52 420.69 495 480.3"/>
  </svg>
</div>
      <span id="logo-text" class="font-display font-bold text-xl gradient-text">NovaFlow</span> </a>
     <nav class="hidden md:flex items-center gap-1" id="desktop-nav">
      <a href="#" onclick="navigateTo('home');return false" class="nav-link px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white hover:bg-white/5 transition" data-page="home">Home</a> 
      <a href="#" onclick="navigateTo('products');return false" class="nav-link px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white hover:bg-white/5 transition" data-page="products">Products</a> 
      <a href="#" onclick="navigateTo('blog');return false" class="nav-link px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white hover:bg-white/5 transition" data-page="blog">Blog</a> 
      <a href="#" onclick="navigateTo('about');return false" class="nav-link px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white hover:bg-white/5 transition" data-page="about">About</a> 
      <a href="#" onclick="navigateTo('contact');return false" class="nav-link px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white hover:bg-white/5 transition" data-page="contact">Contact</a> 
      <a href="#" onclick="navigateTo('faq');return false" class="nav-link px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white hover:bg-white/5 transition" data-page="faq">FAQ</a>
     </nav>
     <div class="flex items-center gap-2">
      <button onclick="toggleSearch()" class="p-2 rounded-lg hover:bg-white/5 transition text-gray-400 hover:text-white"><i data-lucide="search" class="w-5 h-5"></i></button> <button onclick="toggleTheme()" id="theme-toggle" class="p-2 rounded-lg hover:bg-white/5 transition text-gray-400 hover:text-white"><i data-lucide="moon" class="w-5 h-5"></i></button> <button onclick="navigateTo('wishlist')" class="p-2 rounded-lg hover:bg-white/5 transition text-gray-400 hover:text-white relative"> <i data-lucide="heart" class="w-5 h-5"></i> <span id="wishlist-count" class="absolute -top-1 -right-1 w-4 h-4 bg-neon-pink rounded-full text-[10px] flex items-center justify-center font-bold hidden">0</span> </button> <button onclick="navigateTo('cart')" class="p-2 rounded-lg hover:bg-white/5 transition text-gray-400 hover:text-white relative"> <i data-lucide="shopping-cart" class="w-5 h-5"></i> <span id="cart-count" class="absolute -top-1 -right-1 w-4 h-4 bg-neon-blue rounded-full text-[10px] flex items-center justify-center font-bold hidden">0</span> </button> 

      <!-- Login/Logout dynamic block (added without removing anything else) -->
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="/NovaFlow-Store-v5.0.0/public/logout.php" class="p-2 rounded-lg hover:bg-white/5 transition text-gray-400 hover:text-white" title="Logout">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
            <polyline points="16 17 21 12 16 7"/>
            <line x1="21" y1="12" x2="9" y2="12"/>
          </svg>
        </a>
        <?php if ($_SESSION['role'] === 'admin'): ?>
          <a href="/NovaFlow-Store-v5.0.0/admin/products.php" class="p-2 rounded-lg hover:bg-white/5 transition text-neon-blue hover:text-white" title="Admin Panel">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
          </a>
        <?php endif; ?>
      <?php else: ?>
     <a href="#" onclick="openAuth();return false;" class="p-2 rounded-lg hover:bg-white/5 transition text-gray-400 hover:text-white">          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        </a>
      <?php endif; ?>
<?php if (isset($_SESSION['user_id']) && $_SESSION['role'] !== 'admin'): ?>
  <a href="/NovaFlow-Store-v5.0.0/public/user/orders.php"
     class="px-3 py-2 rounded-lg text-sm text-gray-300 hover:text-white transition flex items-center gap-1.5">
    <i data-lucide="package" class="w-4 h-4"></i> My Orders
  </a>
<?php endif; ?>

      <button onclick="toggleMobile()" class="md:hidden p-2 rounded-lg hover:bg-white/5 transition text-gray-400 hover:text-white"><i data-lucide="menu" class="w-5 h-5"></i></button>
     </div>
    </div><!-- Search Bar -->
        <div id="search-bar" class="hidden border-t border-white/5">
     <div class="max-w-7xl mx-auto px-4 sm:px-6 py-3">
      <div class="relative">
       <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-500"></i> <input id="search-input" type="text" placeholder="Search products..." oninput="handleSearch(this.value)" class="w-full pl-12 pr-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white placeholder-gray-500 focus:border-neon-blue focus:outline-none transition">
       <div id="search-results" class="absolute top-full left-0 right-0 mt-2 glass rounded-xl overflow-hidden hidden max-h-80 overflow-y-auto"></div>
      </div>
     </div>
    </div>
   </header><!-- Page Content -->
   <main id="page-content" class="flex-1 w-full"></main>
   <!-- Footer will be loaded by footer.php -->
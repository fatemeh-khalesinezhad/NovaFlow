<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 – Page Not Found | NovaFlow</title>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;800;900&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: #0a0a0f;
      color: #fff;
      overflow: hidden;
      height: 100vh;
      width: 100vw;
    }

    /* ── Animated background (matches NovaFlow) ── */
    .bg-layer {
      position: fixed; inset: 0; z-index: 0;
      background: linear-gradient(270deg, #0a0a2e, #1a0033, #0d001a, #001a2e);
      background-size: 400% 400%;
      animation: gradient-shift 30s ease infinite;
    }
    @keyframes gradient-shift { 0%,100%{ background-position:0% 50%; } 50%{ background-position:100% 50%; } }

    .grid-overlay {
      position: absolute; inset: 0; pointer-events: none;
      background-image:
        linear-gradient(rgba(255,255,255,0.025) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.025) 1px, transparent 1px);
      background-size: 60px 60px;
      animation: grid-move 20s linear infinite;
    }
    @keyframes grid-move { 0%{ transform:translateY(0); } 100%{ transform:translateY(60px); } }

    .orb {
      position: absolute; border-radius: 50%;
      filter: blur(80px); opacity: 0.18; pointer-events: none;
    }
    .orb-1 { width:400px; height:400px; background:#7c3aed; top:-100px; left:-100px; animation: float1 18s ease-in-out infinite; }
    .orb-2 { width:300px; height:300px; background:#00d4ff; bottom:-80px; right:-80px; animation: float2 22s ease-in-out infinite; }
    .orb-3 { width:250px; height:250px; background:#ec4899; top:40%; left:40%; animation: float3 26s ease-in-out infinite; }
    @keyframes float1 { 0%,100%{ transform:translate(0,0); } 50%{ transform:translate(40px,-30px); } }
    @keyframes float2 { 0%,100%{ transform:translate(0,0); } 50%{ transform:translate(-30px,40px); } }
    @keyframes float3 { 0%,100%{ transform:translate(0,0); } 50%{ transform:translate(20px,30px); } }

    /* ── Main frame ── */
    .container {
      position: relative; z-index: 1;
      width: 100%; height: 100vh;
      display: flex; align-items: center; justify-content: center;
    }

    .main-frame {
      position: relative;
      width: 62%; height: 78%;
      border: 1px solid rgba(0,212,255,0.35);
      border-radius: 8px;
      background: rgba(18,18,26,0.55);
      backdrop-filter: blur(24px);
      overflow: hidden;
    }

    /* header bar */
    .header-bar {
      position: absolute; top: 0; left: 0; right: 0; height: 50px;
      border-bottom: 1px solid rgba(0,212,255,0.25);
      background: rgba(255,255,255,0.015);
      display: flex; align-items: center; padding: 0 20px; gap: 10px;
    }
    .nav-dot { width:13px; height:13px; border-radius:50%; }
    .dot-red   { background: rgba(236,72,153,0.7); }
    .dot-yellow{ background: rgba(234,179,8,0.5); }
    .dot-green { background: rgba(0,212,255,0.7); box-shadow: 0 0 8px rgba(0,212,255,0.6); }

    /* logo strip top-right */
    .frame-logo {
      position: absolute; top: 12px; right: 20px;
      font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 15px;
      background: linear-gradient(135deg,#00d4ff,#7c3aed);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text; letter-spacing: 1px;
    }

    /* ── Big 404 ── */
    .main-title {
      position: absolute; left: 48px; top: 80px;
      font-family: 'Outfit', sans-serif;
      font-size: 72px; font-weight: 900; line-height: 88px;
      background: linear-gradient(135deg, #00d4ff, #7c3aed, #ec4899);
      -webkit-background-clip: text; -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -2px;
    }

    /* outline ghost number top-right */
    .ghost-number {
      position: absolute; right: 44px; top: 88px;
      font-family: 'Outfit', sans-serif;
      font-size: 72px; font-weight: 68px;
      color: transparent;
      -webkit-text-stroke: 1px rgba(0,212,255,0.3);
      line-height: 100px; letter-spacing: -2px;
      pointer-events: none;
    }

    .subtitle {
      position: absolute; right: 48px; top: 84px;
      font-size: 13px; font-weight: 500;
      color: rgba(255,255,255,0.4);
      text-align: right; letter-spacing: 2px; text-transform: uppercase;
    }

    /* description bottom-left */
    .description {
      position: absolute; left: 50px; bottom: 80px;
      font-size: 15px; line-height: 28px;
      color: rgba(255,255,255,0.5);
    }
    .description strong { color: rgba(0,212,255,0.9); font-weight: 500; }

    /* back button */
    .back-btn {
      position: absolute; left: 50px; bottom: 30px;
      display: inline-flex; align-items: center; gap: 8px;
      padding: 10px 24px;
      background: linear-gradient(135deg, #7c3aed, #00d4ff);
      border: none; border-radius: 12px;
      font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 14px;
      color: white; cursor: pointer; text-decoration: none;
      transition: opacity .3s, transform .2s;
      position: absolute;
    }
    .back-btn:hover { opacity: 0.88; transform: translateY(-2px); }
    .back-btn svg { width:16px; height:16px; }

    /* error code badge bottom-right */
    .error-badge {
      position: absolute; right: 48px; bottom: 30px;
      font-size: 11px; letter-spacing: 3px; text-transform: uppercase;
      color: rgba(124,58,237,0.6);
      border: 1px solid rgba(124,58,237,0.25);
      padding: 6px 14px; border-radius: 6px;
    }

    /* ── Orbiting ellipses (right side) ── */
    .center-animation {
      position: absolute; right: 80px; top: 50%;
      width: 260px; height: 260px;
      transform: translateY(-50%);
    }

    .ellipse-container { position:absolute; width:100%; height:100%; }

    .ellipse {
      position: absolute; border-radius: 50%; border: 1px solid;
      animation-fill-mode: forwards;
    }
    .e1 { width:260px;height:260px; border-color:rgba(0,212,255,0.12);  left:-7px; top:0; animation:re1 20s linear infinite; }
    .e2 { width:220px;height:260px; border-color:rgba(0,212,255,0.55);  left: 13px; top:0; animation:re2 17s linear infinite reverse; }
    .e3 { width:260px;height:210px; border-color:rgba(124,58,237,0.5);  left:-7px; top:25px; animation:re3 23s linear infinite; }
    .e4 { width:260px;height:170px; border-color:rgba(124,58,237,0.45); left:-7px; top:45px; animation:re4 15s linear infinite reverse; }
    .e5 { width:170px;height:260px; border-color:rgba(236,72,153,0.25); left: 38px; top:0; animation:re5 25s linear infinite; }

    @keyframes re1 { from{transform:rotate(0deg)}   to{transform:rotate(360deg)} }
    @keyframes re2 { from{transform:rotate(0deg)}   to{transform:rotate(-360deg)} }
    @keyframes re3 { from{transform:rotate(0deg)}   to{transform:rotate(360deg)} }
    @keyframes re4 { from{transform:rotate(0deg)}   to{transform:rotate(-360deg)} }
    @keyframes re5 { from{transform:rotate(0deg)}   to{transform:rotate(360deg)} }

    /* glowing center dot */
    .center-dot {
      position: absolute; left:50%; top:50%;
      width: 14px; height: 14px; border-radius:50%;
      transform: translate(-50%,-50%);
      background: #00d4ff;
      box-shadow: 0 0 20px rgba(0,212,255,0.9), 0 0 40px rgba(0,212,255,0.4);
      animation: pulse-dot 2s ease-in-out infinite;
    }
    @keyframes pulse-dot {
      0%,100%{ box-shadow: 0 0 20px rgba(0,212,255,0.9), 0 0 40px rgba(0,212,255,0.4); }
      50%{ box-shadow: 0 0 30px rgba(124,58,237,1), 0 0 60px rgba(124,58,237,0.5); }
    }

    /* scan line effect */
    .scanline {
      position: absolute; inset: 0; pointer-events: none; z-index: 2;
      background: repeating-linear-gradient(
        0deg,
        transparent,
        transparent 2px,
        rgba(0,212,255,0.012) 2px,
        rgba(0,212,255,0.012) 4px
      );
    }

    /* corner accents */
    .corner { position:absolute; width:18px; height:18px; }
    .corner-tl { top:50px; left:0;  border-top:1px solid rgba(0,212,255,0.6); border-left:1px solid rgba(0,212,255,0.6); }
    .corner-tr { top:50px; right:0; border-top:1px solid rgba(0,212,255,0.6); border-right:1px solid rgba(0,212,255,0.6); }
    .corner-bl { bottom:0; left:0;  border-bottom:1px solid rgba(0,212,255,0.6); border-left:1px solid rgba(0,212,255,0.6); }
    .corner-br { bottom:0; right:0; border-bottom:1px solid rgba(0,212,255,0.6); border-right:1px solid rgba(0,212,255,0.6); }

    /* cursor */
    #cursor {
      position:fixed; width:18px; height:18px;
      border:2px solid #00d4ff; border-radius:50%;
      pointer-events:none; z-index:9999;
      transform:translate(-50%,-50%);
      mix-blend-mode:lighten;
      box-shadow:0 0 10px rgba(0,212,255,.5);
      transition: width .15s, height .15s;
    }

    /* responsive */
    @media (max-width: 1100px) {
      .main-frame { width:80%; }
      .main-title { font-size:76px; line-height:72px; }
      .ghost-number { font-size:76px; line-height:72px; }
      .center-animation { width:200px; height:200px; right:50px; }
      .e1,.e2,.e3,.e4,.e5 { width:200px!important; height:200px!important; }
    }
    @media (max-width: 768px) {
      .main-frame { width:92%; height:85%; }
      .main-title { font-size:54px; line-height:52px; left:24px; top:70px; }
      .ghost-number { display:none; }
      .center-animation { display:none; }
      .description { left:24px; bottom:90px; font-size:13px; }
      .back-btn { left:24px; }
      .error-badge { right:24px; }
    }
  </style>
</head>
<body>

  <!-- Cursor -->
  <div id="cursor"></div>

  <!-- Background -->
  <div class="bg-layer">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
    <div class="orb orb-3"></div>
    <div class="grid-overlay"></div>
  </div>

  <div class="container">
    <div class="main-frame">

      <!-- Scanlines overlay -->
      <div class="scanline"></div>

      <!-- Corner accents -->
      <div class="corner corner-tl"></div>
      <div class="corner corner-tr"></div>
      <div class="corner corner-bl"></div>
      <div class="corner corner-br"></div>

      <!-- Header bar -->
      <div class="header-bar">
        <div class="nav-dot dot-red"></div>
        <div class="nav-dot dot-yellow"></div>
        <div class="nav-dot dot-green"></div>
        <span class="frame-logo" style="margin-left:auto">NovaFlow</span>
      </div>

      <!-- Big 404 -->
      <h1 class="main-title">404<br>NOT<br>FOUND</h1>

      <!-- Ghost outline number -->
      <div class="ghost-number">404</div>

      <!-- Subtitle top-right -->
      <div class="subtitle">Error<br>Page</div>

      <!-- Description -->
      <div class="description">
        Looks like this page drifted into deep space.<br>
        <strong>The link may be broken</strong> or the page was removed.<br>
        Let's get you back to the store.
      </div>

      <!-- Back button -->
      <a href="/NovaFlow-Store-v5.0.0/public/index.php" class="back-btn" style="position:absolute; left:50px; bottom:30px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M19 12H5M12 5l-7 7 7 7"/>
        </svg>
        Back to NovaFlow
      </a>

      <!-- Error badge bottom-right -->
      <div class="error-badge">HTTP 404</div>

      <!-- Orbiting ellipses -->
      <div class="center-animation">
        <div class="ellipse-container">
          <div class="ellipse e1"></div>
          <div class="ellipse e2"></div>
          <div class="ellipse e3"></div>
          <div class="ellipse e4"></div>
          <div class="ellipse e5"></div>
        </div>
        <div class="center-dot"></div>
      </div>

    </div>
  </div>

  <script>
    document.addEventListener('mousemove', e => {
      const c = document.getElementById('cursor');
      c.style.left = e.clientX + 'px';
      c.style.top  = e.clientY + 'px';
    });
  </script>
</body>
</html>

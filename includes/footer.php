</main><!-- Footer -->
   <footer class="w-full border-t border-white/5 bg-dark-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">
     <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
      <div>
       <div class="flex items-center gap-2 mb-4">
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
<span class="font-display font-bold text-lg gradient-text" id="footer-logo">NovaFlow</span>
       </div>

       <p class="text-sm text-gray-500 leading-relaxed">Premium tech products curated for the modern digital lifestyle.</p>
       <div class="flex gap-3 mt-4">
        <a href="#" class="w-9 h-9 rounded-lg bg-white/5 flex items-center justify-center text-gray-400 hover:text-neon-blue hover:bg-white/10 transition"><i data-lucide="twitter" class="w-4 h-4"></i></a> <a href="#" class="w-9 h-9 rounded-lg bg-white/5 flex items-center justify-center text-gray-400 hover:text-neon-blue hover:bg-white/10 transition"><i data-lucide="instagram" class="w-4 h-4"></i></a> <a href="#" class="w-9 h-9 rounded-lg bg-white/5 flex items-center justify-center text-gray-400 hover:text-neon-blue hover:bg-white/10 transition"><i data-lucide="github" class="w-4 h-4"></i></a>
       </div>
      </div>
      <div>
       <h4 class="font-display font-semibold text-sm mb-4">Shop</h4>

       <div class="flex flex-col gap-2">
        <a href="#" onclick="filterByCategory('laptops');return false" class="text-sm text-gray-500 hover:text-neon-blue transition">Laptops</a> <a href="#" onclick="filterByCategory('Smartphones');return false" class="text-sm text-gray-500 hover:text-neon-blue transition">Smartphones</a> <a href="#" onclick="filterByCategory('Headphones');return false" class="text-sm text-gray-500 hover:text-neon-blue transition">Headphones</a> <a href="#" onclick="filterByCategory('Accessories');return false" class="text-sm text-gray-500 hover:text-neon-blue transition">Accessories</a>
       </div>
      </div>
      <div>
       <h4 class="font-display font-semibold text-sm mb-4">Company</h4>

       <div class="flex flex-col gap-2">
        <a href="#" onclick="navigateTo('about');return false" class="text-sm text-gray-500 hover:text-neon-blue transition">About</a> <a href="#" onclick="navigateTo('blog');return false" class="text-sm text-gray-500 hover:text-neon-blue transition">Blog</a> <a href="#" onclick="navigateTo('contact');return false" class="text-sm text-gray-500 hover:text-neon-blue transition">Contact</a> <a href="#" onclick="navigateTo('faq');return false" class="text-sm text-gray-500 hover:text-neon-blue transition">FAQ</a>
       </div>
      </div>
      <div>
       <h4 class="font-display font-semibold text-sm mb-4">Newsletter</h4>
       <p class="text-sm text-gray-500 mb-3">Get the latest drops and deals.</p>
       <form onsubmit="handleNewsletter(event)" class="flex gap-2">
        <input type="email" placeholder="your@email.com" class="flex-1 px-3 py-2 bg-dark-700 border border-white/10 rounded-lg text-sm text-white placeholder-gray-500 focus:border-neon-blue focus:outline-none transition"> <button type="submit" class="px-4 py-2 bg-gradient-to-r from-neon-purple to-neon-blue rounded-lg text-sm font-medium hover:opacity-90 transition">Join</button>
       </form>
      </div>
     </div>
     <div class="border-t border-white/5 pt-6 text-center text-xs text-gray-600">
      © 2026 NovaFlow. All rights reserved. Demo store — no real transactions.
     </div>
    </div>
   </footer>
  </div>
  <!-- Chatbot --> 
  <button id="chatbot-btn" onclick="toggleChatbot()"><i data-lucide="message-circle" class="w-6 h-6"></i></button>
  <div id="chatbot-window" class="glass">
   <div style="display:flex;justify-content:space-between;align-items:center;padding:1rem;border-bottom:1px solid rgba(255,255,255,.1)"><span class="font-display font-semibold">NovaFlow Assistant</span> <button onclick="toggleChatbot()" style="background:none;border:none;color:#666;cursor:pointer"><i data-lucide="x" class="w-4 h-4"></i></button>
   </div>
   <div id="chatbot-messages"></div>
   <div id="chatbot-input" style="border-top:1px solid rgba(255,255,255,.1);padding:.75rem"><input type="text" id="chatbot-input-field" placeholder="Ask me anything..." style="flex:1;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.1);border-radius:.5rem;padding:.5rem;color:white" onkeypress="if(event.key==='Enter')sendChatMessage()"> <button onclick="sendChatMessage()" style="background:linear-gradient(135deg,#7c3aed,#00d4ff);border:none;color:white;padding:.5rem .75rem;border-radius:.5rem;cursor:pointer"><i data-lucide="send" class="w-4 h-4"></i></button>
   </div>
  </div>
  <script>
    //=========Auto fills (<email> after logging in contact section)=======
    const userSessionEmail = <?php echo isset($_SESSION['email']) ? json_encode($_SESSION['email']) : "''"; ?>;

// ========== DATA ==========
//========== PRODUCTS ==========
/*const products = [
  { id:1,  name:'Nova Pro 16"',       cat:'Laptops', price:2499, rating:4.9, reviews:342,  emoji:'💻', image:'nova-pro-16.png', desc:'Ultimate performance laptop with M3 chip', specs:{CPU:'M3 Ultra',RAM:'64GB',Storage:'2TB SSD',Display:'16" Retina XDR'} },
  { id:2,  name:'Nova Air 14"',       cat:'Laptops', price:1599, rating:4.7, reviews:521,  emoji:'💻', image:'nova-air-14.png', desc:'Thin & light with all-day battery', specs:{CPU:'M3 Pro',RAM:'32GB',Storage:'1TB SSD',Display:'14" Liquid Retina'} },
  { id:3,  name:'Nova Book 13"',      cat:'Laptops', price:999,  rating:4.5, reviews:892,  emoji:'💻', image:'nova-book-13.png', desc:'Perfect everyday laptop', specs:{CPU:'M3',RAM:'16GB',Storage:'512GB SSD',Display:'13.6" Retina'} },
  { id:4,  name:'Nova Studio 15"',    cat:'Laptops', price:3299, rating:4.8, reviews:156,  emoji:'💻', image:'nova-studio-15.png', desc:'Creative workstation powerhouse', specs:{CPU:'M3 Max',RAM:'128GB',Storage:'4TB SSD',Display:'15.3" XDR'} },
  { id:5,  name:'Nova Flex 360',      cat:'Laptops', price:1299, rating:4.4, reviews:267,  emoji:'💻', image:'nova-flex-360.png', desc:'Convertible 2-in-1 laptop', specs:{CPU:'Intel i7',RAM:'16GB',Storage:'512GB',Display:'14" Touch OLED'} },
  { id:6,  name:'Nova Edge',          cat:'Laptops', price:1899, rating:4.6, reviews:178,  emoji:'💻', image:'nova-edge.png', desc:'Gaming-ready thin laptop', specs:{CPU:'AMD R9',RAM:'32GB',Storage:'1TB',Display:'15.6" 240Hz'} },
  { id:7,  name:'Nova Chromebook',    cat:'Laptops', price:449,  rating:4.2, reviews:1205, emoji:'💻', image:'nova-chromebook.png', desc:'Cloud-first lightweight laptop', specs:{CPU:'MediaTek',RAM:'8GB',Storage:'128GB',Display:'14" FHD'} },
  { id:8,  name:'Nova Ultra 17"',     cat:'Laptops', price:3999, rating:5.0, reviews:89,   emoji:'💻', image:'nova-ultra-17.png', desc:'No-compromise desktop replacement', specs:{CPU:'M3 Ultra',RAM:'192GB',Storage:'8TB SSD',Display:'17" XDR'} },
  { id:9,  name:'Pulse X Pro',        cat:'Smartphones', price:1199, rating:4.8, reviews:2341, emoji:'📱', image:'pulse-x-pro.png', desc:'Flagship with revolutionary camera', specs:{Chip:'A18 Pro',RAM:'12GB',Storage:'256GB',Camera:'48MP Triple'} },
  { id:10, name:'Pulse X',            cat:'Smartphones', price:999,  rating:4.7, reviews:3102, emoji:'📱', image:'pulse-x.png', desc:'Premium experience for everyone', specs:{Chip:'A18',RAM:'8GB',Storage:'128GB',Camera:'48MP Dual'} },
  { id:11, name:'Pulse Lite',         cat:'Smartphones', price:599,  rating:4.5, reviews:4521, emoji:'📱', image:'pulse-lite.png', desc:'Essential features, amazing value', specs:{Chip:'A17',RAM:'6GB',Storage:'128GB',Camera:'12MP Dual'} },
  { id:12, name:'Pulse Ultra',        cat:'Smartphones', price:1499, rating:4.9, reviews:876,  emoji:'📱', image:'pulse-ultra.png', desc:'Titanium build, AI-powered', specs:{Chip:'A18 Ultra',RAM:'16GB',Storage:'1TB',Camera:'200MP Quad'} },
  { id:13, name:'Pulse Fold',         cat:'Smartphones', price:1799, rating:4.6, reviews:423,  emoji:'📱', image:'pulse-fold.png', desc:'Foldable future in your pocket', specs:{Chip:'A18 Pro',RAM:'12GB',Storage:'512GB',Display:'7.6" Fold'} },
  { id:14, name:'Pulse Mini',         cat:'Smartphones', price:799,  rating:4.4, reviews:1876, emoji:'📱', image:'pulse-mini.png', desc:'Compact powerhouse', specs:{Chip:'A18',RAM:'8GB',Storage:'256GB',Display:'5.4" OLED'} },
  { id:15, name:'Pulse SE',           cat:'Smartphones', price:429,  rating:4.3, reviews:5621, emoji:'📱', image:'pulse-se.png', desc:'Affordable flagship experience', specs:{Chip:'A16',RAM:'6GB',Storage:'64GB',Camera:'12MP'} },
  { id:16, name:'Pulse Gaming',       cat:'Smartphones', price:899,  rating:4.5, reviews:982,  emoji:'📱', image:'pulse-gaming.png', desc:'Built for mobile gaming', specs:{Chip:'SD 8 Gen 3',RAM:'16GB',Storage:'512GB',Display:'6.8" 165Hz'} },
  { id:17, name:'AeroBeats Pro',      cat:'Headphones', price:349, rating:4.8, reviews:4231, emoji:'🎧', image:'aerobeats-pro.png', desc:'Studio-quality noise cancellation', specs:{Driver:'40mm',ANC:'Adaptive',Battery:'30hrs',Connectivity:'BT 5.3'} },
  { id:18, name:'AeroBeats Max',      cat:'Headphones', price:549, rating:4.9, reviews:1234, emoji:'🎧', image:'aerobeats-max.png', desc:'Premium over-ear audiophile grade', specs:{Driver:'50mm Planar',ANC:'Ultra',Battery:'40hrs',Material:'Titanium'} },
  { id:19, name:'AeroBuds Pro',       cat:'Headphones', price:249, rating:4.7, reviews:6789, emoji:'🎧', image:'aerobuds-pro.png', desc:'Perfect fit wireless earbuds', specs:{Driver:'11mm',ANC:'Active',Battery:'8hrs+24',Water:'IPX5'} },
  { id:20, name:'AeroBuds Lite',      cat:'Headphones', price:129, rating:4.4, reviews:9821, emoji:'🎧', image:'aerobuds-lite.png', desc:'Essential wireless audio', specs:{Driver:'8mm',ANC:'None',Battery:'6hrs+18',Water:'IPX4'} },
  { id:21, name:'AeroBeats Sport',    cat:'Headphones', price:199, rating:4.5, reviews:3421, emoji:'🎧', image:'aerobeats-sport.png', desc:'Workout-ready secure fit', specs:{Driver:'12mm',ANC:'Transparency',Battery:'10hrs',Water:'IP68'} },
  { id:22, name:'AeroBeats Studio',   cat:'Headphones', price:449, rating:4.8, reviews:876,  emoji:'🎧', image:'aerobeats-studio.png', desc:'Reference monitor headphones', specs:{Driver:'45mm',Response:'5Hz-50kHz',Impedance:'64Ω',Cable:'Detachable'} },
  { id:23, name:'AeroBuds Sleep',     cat:'Headphones', price:179, rating:4.3, reviews:2345, emoji:'🎧', image:'aerobuds-sleep.png', desc:'Designed for sleep comfort', specs:{Driver:'6mm',Profile:'Ultra-low',Battery:'10hrs',Features:'White noise'} },
  { id:24, name:'AeroBeats Kids',     cat:'Headphones', price:79,  rating:4.6, reviews:4567, emoji:'🎧', image:'aerobeats-kids.png', desc:'Volume-limited for young ears', specs:{Driver:'30mm',Limit:'85dB',Battery:'20hrs',Material:'BPA-free'} },
  { id:25, name:'MagCharge Pad',      cat:'Accessories', price:49,  rating:4.5, reviews:3456, emoji:'🔌', image:'magcharge-pad.png', desc:'15W fast wireless charger', specs:{Power:'15W',Coil:'Triple',Material:'Aluminum',LED:'Status ring'} },
  { id:26, name:'PowerVault 20K',     cat:'Accessories', price:89,  rating:4.7, reviews:2341, emoji:'🔋', image:'powervault-20k.png', desc:'20000mAh portable power', specs:{Capacity:'20000mAh',Output:'100W PD',Ports:'USB-C x2',Weight:'350g'} },
  { id:27, name:'NovaWatch Ultra',    cat:'Accessories', price:799, rating:4.8, reviews:1234, emoji:'⌚', image:'novawatch-ultra.png', desc:'Titanium smartwatch', specs:{Display:'49mm OLED',Battery:'72hrs',Water:'100m',Sensors:'SpO2, ECG'} },
  { id:28, name:'NovaWatch SE',       cat:'Accessories', price:249, rating:4.4, reviews:5678, emoji:'⌚', image:'novawatch-se.png', desc:'Essential health tracking', specs:{Display:'41mm LCD',Battery:'18hrs',Water:'50m',Sensors:'Heart rate'} },
  { id:29, name:'ProStand Desk',      cat:'Accessories', price:179, rating:4.6, reviews:892,  emoji:'🖥️', image:'prostand-desk.png', desc:'Adjustable laptop stand', specs:{Material:'Aluminum',Adjust:'5 angles',Weight:'1.2kg',Fits:'up to 17"'} },
  { id:30, name:'NovaPen Pro',        cat:'Accessories', price:129, rating:4.7, reviews:2341, emoji:'✏️', image:'novapen-pro.png', desc:'Precision stylus with pressure', specs:{Levels:'4096',Latency:'9ms',Battery:'12hrs',Tips:'Replaceable'} },
  { id:31, name:'AirTag Ultra',       cat:'Accessories', price:39,  rating:4.3, reviews:8901, emoji:'📍', image:'airtag-ultra.png', desc:'Precision item finder', specs:{Range:'120m',Battery:'2yr',Water:'IP67',Network:'UWB + BT'} },
  { id:32, name:'NovaHub 7-in-1',     cat:'Accessories', price:69,  rating:4.5, reviews:3421, emoji:'🔗', image:'novahub-7-in-1.png', desc:'USB-C multiport hub', specs:{Ports:'HDMI,SD,USB-A x3,USB-C',Power:'100W pass',Speed:'10Gbps',Build:'Aluminum'} },
  { id:33, name:'ClearCase Pro',      cat:'Accessories', price:59,  rating:4.4, reviews:6543, emoji:'📱', image:'clearcase-pro.png', desc:'MagSafe clear armor case', specs:{Material:'Polycarbonate',Drop:'3m rated',MagSafe:'Yes',Weight:'28g'} },
  { id:34, name:'NovaKeys Mech',      cat:'Accessories', price:199, rating:4.8, reviews:1567, emoji:'⌨️', image:'novakeys-mech.png', desc:'Wireless mechanical keyboard', specs:{Switches:'Gateron Pro',Layout:'75%',Battery:'200hrs',Backlight:'RGB'} },
  { id:35, name:'NovaMouse Pro',      cat:'Accessories', price:99,  rating:4.6, reviews:2890, emoji:'🖱️', image:'novamouse-pro.png', desc:'Ergonomic precision mouse', specs:{DPI:'25600',Buttons:8,Battery:'70hrs',Weight:'63g'} },
  { id:36, name:'NovaScreen 4K',      cat:'Accessories', price:599, rating:4.7, reviews:734,  emoji:'🖥️', image:'novascreen-4k.png', desc:'27" 4K USB-C monitor', specs:{Panel:'IPS',Resolution:'3840x2160',Refresh:'144Hz',HDR:'HDR600'} },
  { id:37, name:'PowerVault Mini',    cat:'Accessories', price:39,  rating:4.3, reviews:7654, emoji:'🔋', image:'powervault-mini.png', desc:'5000mAh pocket charger', specs:{Capacity:'5000mAh',Output:'20W PD',Ports:'USB-C',Weight:'110g'} },
  { id:38, name:'NovaCam 360',        cat:'Accessories', price:349, rating:4.5, reviews:567,  emoji:'📷', image:'novacam-360.png', desc:'360° action camera', specs:{Resolution:'5.7K',Stabilization:'FlowState',Water:'10m',Weight:'180g'} },
  { id:39, name:'SoundBar Nova',      cat:'Accessories', price:299, rating:4.6, reviews:1234, emoji:'🔊', image:'soundbar-nova.png', desc:'Spatial audio soundbar', specs:{Drivers:'9-speaker',Dolby:'Atmos',Power:'250W',Sub:'Wireless'} },
  { id:40, name:'NovaTag Wallet',     cat:'Accessories', price:29,  rating:4.2, reviews:4321, emoji:'💳', image:'novatag-wallet.png', desc:'Card-thin tracker', specs:{Thickness:'1.8mm',Battery:'3yr',Speaker:'Built-in',Find:'Precision'} },
  { id:41, name:'Nova Dock Pro',      cat:'Accessories', price:249, rating:4.7, reviews:456,  emoji:'🔌', image:'nova-dock-pro.png', desc:'Thunderbolt 4 dock station', specs:{Ports:'12 total',Display:'Dual 4K',Power:'96W PD',Speed:'40Gbps'} },
  { id:42, name:'AeroBeats Open',     cat:'Headphones',  price:299, rating:4.6, reviews:1023, emoji:'🎧', image:'aerobeats-open.png', desc:'Open-ear spatial audio', specs:{Driver:'14mm',Design:'Open',Battery:'8hrs',Audio:'Spatial'} }
];*/

const blogPosts = [

  {
    id: 1,
    title: 'The Rise of AI in Consumer Tech',
    excerpt: 'How artificial intelligence is reshaping the devices we use every day.',
    date: 'Dec 15, 2024',
    tag: 'AI',
    icon: '🤖',
    url: 'https://www.theverge.com/ai-artificial-intelligence'
  },
  {
    id: 2,
    title: 'Best Laptops for Developers in 2025',
    excerpt: 'Our picks for the ultimate coding machines this year.',
    date: 'Dec 10, 2024',
    tag: 'Reviews',
    icon: '💻',
    url: 'https://www.techradar.com/best/best-laptops-for-programming'
  },
  {
    id: 3,
    title: "Wireless Audio: What's Next?",
    excerpt: 'Spatial audio and lossless streaming are changing how we listen.',
    date: 'Dec 5, 2024',
    tag: 'Audio',
    icon: '🎵',
    url: 'https://www.whathifi.com/advice/spatial-audio-explained'
  },
  {
    id: 4,
    title: 'Sustainable Tech: The Green Revolution',
    excerpt: 'Companies leading the charge in eco-friendly electronics.',
    date: 'Nov 28, 2024',
    tag: 'Sustainability',
    icon: '🌱',
    url: 'https://www.greenpeace.org/international/story/11698/how-green-are-your-electronics/'
  }
];


const faqs = [
  {q:'What payment methods do you accept?',a:'We accept all major credit cards, PayPal, Apple Pay, and Google Pay. All transactions are secured with 256-bit encryption.'},
  {q:'How long does shipping take?',a:'Standard shipping takes 3-5 business days. Express shipping delivers within 1-2 business days. Free shipping on orders over $100.'},
  {q:'What is your return policy?',a:'We offer a 30-day hassle-free return policy. Items must be in original condition with packaging. Refunds are processed within 5 business days.'},
  {q:'Do products come with warranty?',a:'All products include a minimum 1-year manufacturer warranty. Extended warranty options are available at checkout.'},
  {q:'Can I track my order?',a:'Yes! Once your order ships, you\'ll receive a tracking number via email. You can track your package in real-time through our order tracking page.'},
  {q:'Do you ship internationally?',a:'Yes, we ship to over 50 countries worldwide. International shipping rates and delivery times vary by destination.'}
];


// ========== STATE ==========

// Products are now loaded from the database via PHP
const products = typeof productsFromDB !== 'undefined' ? productsFromDB : [];

let cart = JSON.parse(localStorage.getItem('nt_cart')||'[]');
let wishlist = JSON.parse(localStorage.getItem('nt_wish')||'[]');
let compareList = [];
let currentPage = 'home';
let isDark = true;
let currentProduct = null;
/*OLDv let filters = {category:'All',minPrice:0,maxPrice:3000,sort:'featured',minRating:0};*/
let filters = {category:'All',minPrice:0,maxPrice:3000,sort:'featured',minRating:0,search:''};

function saveCart(){localStorage.setItem('nt_cart',JSON.stringify(cart));updateBadges()}
function saveWishlist(){localStorage.setItem('nt_wish',JSON.stringify(wishlist));updateBadges()}
function updateBadges(){

  const cc=document.getElementById('cart-count'),wc=document.getElementById('wishlist-count');
  const ct=cart.reduce((s,i)=>s+i.qty,0);
  cc.textContent=ct;cc.classList.toggle('hidden',ct===0);
  wc.textContent=wishlist.length;wc.classList.toggle('hidden',wishlist.length===0);

  
// ========== EASTER EGG: SPIDER (triple‑click logo) ==========
let logoClickCount = 0;
let logoClickTimer = null;

const logoEl = document.getElementById('easter-logo');
if (logoEl) {
    logoEl.addEventListener('click', function(e) {
        e.preventDefault();

        logoClickCount++;
        clearTimeout(logoClickTimer);

        if (logoClickCount === 3) {
            // Triple click – open the spider in a new tab
            window.open('easter-egg/neon-spider/index.html', '_blank');
            logoClickCount = 0;
            return;
        }

        // Wait 600ms – if no more clicks, treat as a single click → go home
        logoClickTimer = setTimeout(function() {
            navigateTo('home');
            logoClickCount = 0;
        }, 600);
    });
}
}
//temp
// ========== BIND CARD BUTTONS (wishlist + compare) ==========
function bindCardButtons() {
    document.removeEventListener('click', cardClickHandler);
    document.addEventListener('click', cardClickHandler);
}

function cardClickHandler(e) {
    // CART button
    const cartBtn = e.target.closest('[data-cart]');
    if (cartBtn) {
        e.stopPropagation();
        e.preventDefault();
        const id = parseInt(cartBtn.getAttribute('data-cart'));
        if (!isNaN(id)) addToCart(id);
        return;
    }

    // WISHLIST (heart) button
    const wishBtn = e.target.closest('[data-wish]');
    if (wishBtn) {
        e.stopPropagation();
        e.preventDefault();
        const id = parseInt(wishBtn.getAttribute('data-wish'));
        if (!isNaN(id)) toggleWishlist(id);
        return;
    }

    // COMPARE button
    const compBtn = e.target.closest('[data-compare]');
    if (compBtn) {
        e.stopPropagation();
        e.preventDefault();
        const id = parseInt(compBtn.getAttribute('data-compare'));
        if (!isNaN(id)) toggleCompare(id);
        return;
    }
}
// ========== TOAST ==========
function toast(msg,type='success'){
  const t=document.createElement('div');
  t.className=`toast-enter glass rounded-xl px-4 py-3 flex items-center gap-3 text-sm ${type==='success'?'border-neon-blue/30':'border-neon-pink/30'} border`;
  const icon=type==='success'?'check-circle':'heart';
  t.innerHTML=`<i data-lucide="${icon}" class="w-4 h-4 ${type==='success'?'text-neon-blue':'text-neon-pink'}"></i><span>${msg}</span>`;
  document.getElementById('toast-container').appendChild(t);
  lucide.createIcons({nameAttr:'data-lucide'});
  setTimeout(()=>{t.classList.replace('toast-enter','toast-exit');setTimeout(()=>t.remove(),300)},2500);
}

// ========== CART ==========
function addToCart(id){
  const p=products.find(x=>x.id===id);if(!p)return;
  const existing=cart.find(x=>x.id===id);
  if(existing)existing.qty++;
  else cart.push({id:p.id, name:p.name, price:p.price, image: p.image || p.emoji, qty:1});
  saveCart();toast(`${p.name} added to cart`);
  if(currentPage==='cart')navigateTo('cart');
}
function removeFromCart(id){cart=cart.filter(x=>x.id!==id);saveCart();if(currentPage==='cart')navigateTo('cart')}

function updateQty(id,delta){
  const item=cart.find(x=>x.id===id);if(!item)return;
  item.qty+=delta;if(item.qty<=0)cart=cart.filter(x=>x.id!==id);
  saveCart();if(currentPage==='cart')navigateTo('cart');
}

// ========== WISHLIST ==========
function toggleWishlist(id) {
    event.stopPropagation();           // just in case
    const idx = wishlist.indexOf(id);
    if (idx > -1) {
        wishlist.splice(idx, 1);
        toast('Removed from wishlist', 'info');
    } else {
        wishlist.push(id);
        toast('Added to wishlist ♥', 'wishlist');
    }
    saveWishlist();
    updateWishlistIcons();               // immediate colour change
    setTimeout(() => updateWishlistIcons(), 100);  // after SPA re‑render
    if (currentPage === 'wishlist') navigateTo('wishlist');
}

function updateWishlistIcons(){
  document.querySelectorAll('[data-wish]').forEach(el=>{
    const id=parseInt(el.dataset.wish);
    el.classList.toggle('text-neon-pink',wishlist.includes(id));
    el.classList.toggle('text-gray-500',!wishlist.includes(id));
  });
}

// ========== COMPARE ==========
function toggleCompare(id) {
    const idx = compareList.indexOf(id);
    if (idx > -1) {
        compareList.splice(idx, 1);
    } else {
        if (compareList.length >= 3) {
            toast('Max 3 products to compare', 'info');
            return;
        }
        // Only add if the product exists in the database
        if (products.find(p => p.id == id)) {
            compareList.push(id);
        }
    }
    updateCompareBar();
}
function updateCompareBar() {
    const bar = document.getElementById('compare-bar');
    const container = document.getElementById('compare-items');
    if (!bar || !container) return;

    if (compareList.length === 0) {
        bar.classList.remove('visible');
        return;
    }
    bar.classList.add('visible');

    container.innerHTML = compareList.map(id => {
        const p = products.find(x => x.id == id);
        if (!p) return '';  // product not found – skip
        return `<span class="px-3 py-1 bg-white/5 rounded-full text-xs">${p.emoji} ${p.name} <button onclick="toggleCompare(${id})" class="text-red-400 ml-1">×</button></span>`;
    }).join('');

    // Highlight compare buttons on product cards
    document.querySelectorAll('[data-compare]').forEach(el => {
        const pid = parseInt(el.dataset.compare);
        el.classList.toggle('bg-neon-purple/20', compareList.includes(pid));
        el.classList.toggle('border-neon-purple', compareList.includes(pid));
    });
}

function clearCompare()

{compareList=[];updateCompareBar()}

function showCompare() {
    if (compareList.length < 2) {
        toast('Select at least 2 products', 'info');
        return;
    }

    const ps = compareList.map(id => products.find(x => x.id == id)).filter(Boolean);
    if (ps.length < 2) return;

    const specs = (ps[0].specs && typeof ps[0].specs === 'object') ? Object.keys(ps[0].specs) : [];

    let html = `<div class="overflow-x-auto"><table class="w-full text-sm"><thead><tr>
        <th class="text-left p-3 text-gray-500">Feature</th>
        ${ps.map(p => `<th class="p-3 text-center"><div class="text-3xl mb-2">${p.emoji}</div><div class="font-semibold">${p.name}</div><div class="text-neon-blue font-bold">$${p.price.toLocaleString()}</div></th>`).join('')}
    </tr></thead><tbody>`;

    html += `<tr class="border-t border-white/5"><td class="p-3 text-gray-400">Rating</td>${ps.map(p => `<td class="p-3 text-center">${renderStarsText(p.rating)}</td>`).join('')}</tr>`;

    if (specs.length > 0) {
        specs.forEach(s => {
            html += `<tr class="border-t border-white/5"><td class="p-3 text-gray-400">${s}</td>${ps.map(p => `<td class="p-3 text-center">${p.specs[s] ?? '-'}</td>`).join('')}</tr>`;
        });
    }

    html += '</tbody></table></div>';
    document.getElementById('compare-content').innerHTML = html;
    const m = document.getElementById('compare-modal');
    m.style.display = 'flex';
    m.classList.remove('hidden');
}

function closeCompareModal(){const m=document.getElementById('compare-modal');m.style.display='none';m.classList.add('hidden')}
function renderStarsText(r){return '★'.repeat(Math.floor(r))+(r%1>=.5?'½':'')+'☆'.repeat(5-Math.ceil(r))+` ${r}`}

// ========== SEARCH ==========
function toggleSearch(){
  const sb=document.getElementById('search-bar');sb.classList.toggle('hidden');
  if(!sb.classList.contains('hidden'))document.getElementById('search-input').focus();
}
function handleSearch(q){
  const r=document.getElementById('search-results');
  if(!q.trim()){r.classList.add('hidden');return}
  const matches=products.filter(p=>p.name.toLowerCase().includes(q.toLowerCase())||p.cat.toLowerCase().includes(q.toLowerCase()));
  if(!matches.length){r.innerHTML='<div class="p-4 text-gray-500 text-sm">No products found</div>';r.classList.remove('hidden');return}
  r.innerHTML=matches.slice(0,5).map(p=>`<a href="#" onclick="navigateTo('detail',${p.id});toggleSearch();return false" class="flex items-center gap-3 p-3 hover:bg-white/5 transition"><span class="text-2xl">${p.emoji}</span><div><div class="text-sm font-medium">${p.name}</div><div class="text-xs text-gray-500">$${p.price} · ${p.cat}</div></div></a>`).join('');
  r.classList.remove('hidden');
}

// ========== THEME ==========
function toggleTheme(){
  isDark=!isDark;
  document.documentElement.classList.toggle('dark',isDark);
  document.getElementById('app-body').classList.toggle('bg-dark-900',isDark);
  document.getElementById('app-body').classList.toggle('bg-gray-50',!isDark);
  document.getElementById('app-body').classList.toggle('text-white',isDark);
  document.getElementById('app-body').classList.toggle('text-gray-900',!isDark);
  document.getElementById('app-body').classList.toggle('light-mode',!isDark);
  //new one line
  document.body.classList.toggle('light', !isDark);
  //end new
  lucide.createIcons();
}

// ========== AUTH (Modal) ==========
function openAuth() {
    const m = document.getElementById('auth-modal');
    m.style.display = 'flex';
    m.classList.remove('hidden');
    switchAuth('login');
}

function closeAuth() {
    const m = document.getElementById('auth-modal');
    m.style.display = 'none';
    m.classList.add('hidden');
    document.getElementById('auth-error').classList.add('hidden');
}

function switchAuth(tab) {
    document.querySelectorAll('.auth-tab').forEach(t => {
        t.classList.toggle('border-neon-blue', t.dataset.tab === tab);
        t.classList.toggle('text-white', t.dataset.tab === tab);
        t.classList.toggle('border-transparent', t.dataset.tab !== tab);
        t.classList.toggle('text-gray-400', t.dataset.tab !== tab);
    });

    document.getElementById('auth-title').textContent = (tab === 'login') ? 'Sign In' : 'Create Account';
    const isLogin = (tab === 'login');
    document.getElementById('register-name').classList.toggle('hidden', isLogin);
    document.getElementById('register-confirm').classList.toggle('hidden', isLogin);
    document.getElementById('auth-error').classList.add('hidden');
}

function handleAuth(e) {
    e.preventDefault();
    const isLogin = document.getElementById('register-name').classList.contains('hidden');
    const form = e.target;
    const formData = new FormData(form);
    const action = isLogin ? 'action_login_ajax.php' : 'action_register_ajax.php';

    fetch(action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect;
        } else {
            const errorDiv = document.getElementById('auth-error');
            errorDiv.textContent = data.message;
            errorDiv.classList.remove('hidden');
        }
    })
    .catch(() => {
        document.getElementById('auth-error').textContent = 'A network error occurred.';
        document.getElementById('auth-error').classList.remove('hidden');
    });
}
// ========== REVIEWS ==========
function setReviewStar(n) {
  document.getElementById('review-rating').value = n;
  document.querySelectorAll('#star-picker button').forEach(btn => {
    const s = parseInt(btn.dataset.star);
    btn.classList.toggle('text-yellow-400', s <= n);
    btn.classList.toggle('text-gray-600',   s >  n);
  });
}

function submitReview(productId) {
  const rating  = parseInt(document.getElementById('review-rating').value);
  const comment = document.getElementById('review-comment').value.trim();
  const msg     = document.getElementById('review-msg');

  if (rating < 1) { msg.textContent = 'Please select a star rating.'; return; }
  if (comment.length < 3) { msg.textContent = 'Please write a short comment.'; return; }

  msg.textContent = 'Submitting…';

  const fd = new FormData();
  fd.append('product_id', productId);
  fd.append('rating', rating);
  fd.append('comment', comment);

  fetch('action/submit_review.php', { method: 'POST', body: fd })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        // Hide the form
        document.getElementById('review-form-box').innerHTML =
          `<div class="text-neon-blue text-sm py-2">✓ Thank you for your review!</div>`;

        // Prepend new review card to the list
        const list = document.getElementById('reviews-list-' + productId);
        const r = data.review;
        const card = document.createElement('div');
        card.className = 'glass rounded-2xl p-6';
        card.innerHTML = `
          <div class="flex items-center justify-between mb-3">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-full bg-gradient-to-br from-neon-purple to-neon-blue 
                          flex items-center justify-center font-bold text-sm">
                ${r.name[0].toUpperCase()}
              </div>
              <div>
                <div class="font-medium text-sm">${r.name}</div>
                <div class="flex mt-0.5">${stars(r.rating)}</div>
              </div>
            </div>
            <span class="text-xs text-gray-500">${r.date}</span>
          </div>
          <p class="text-sm text-gray-400">${r.comment}</p>`;
        list.insertBefore(card, list.firstChild);
        lucide.createIcons({nameAttr:'data-lucide'});

        // Update rating counter display
        const counter = document.getElementById('review-counter-' + productId);
        if (counter) counter.textContent = `${data.new_avg} (${data.new_count} reviews)`;

        // Update local products array so it reflects on cards
        const prod = products.find(x => x.id === productId);
        if (prod) { prod.rating = data.new_avg; prod.reviews = data.new_count; }

      } else {
        msg.textContent = data.message;
      }
    })
    .catch(() => { msg.textContent = 'Network error, please try again.'; });
}

// Close modal on outside click
document.getElementById('auth-modal').addEventListener('click', function(e) {
    if (e.target === this) closeAuth();
});
// ========== MOBILE ==========
function toggleMobile(){document.getElementById('mobile-menu').classList.toggle('hidden')}

// ========== NAVIGATION ==========
function navigateTo(page,data){
  currentPage=page;currentProduct=data||null;
  window.scrollTo(0,0);
  document.querySelectorAll('.nav-link').forEach(l=>{l.classList.toggle('text-white',l.dataset.page===page);l.classList.toggle('bg-white/5',l.dataset.page===page)});

  renderPage();
}

function filterByCategory(cat){
  filters.category=cat;navigateTo('products');
}

// ========== RENDER STARS ==========
function stars(r){
  let h='';for(let i=1;i<=5;i++)h+=`<i data-lucide="star" class="w-3.5 h-3.5 ${i<=Math.floor(r)?'text-yellow-400 fill-yellow-400':'text-gray-600'}"></i>`;
  return h;
}

// ========== PRODUCT CARD ==========
function productCard(p, i) {
  i = i || 0;
  var inWish = wishlist.includes(p.id);
  var inCompare = compareList.includes(p.id);

  var imgHtml;
  if (p.image) {
    imgHtml = '<img src="../uploads/products/' + p.image + '" alt="' + p.name + '" class="w-full aspect-square rounded-xl object-cover mb-3 group-hover:scale-105 transition-transform duration-500">';
  } else {
    imgHtml = '<div class="w-full aspect-square rounded-xl bg-gradient-to-br ' + getProductColor(p) + ' flex items-center justify-center text-6xl mb-3 group-hover:scale-105 transition-transform duration-500">' + p.emoji + '</div>';
  }

  return '<div class="card-hover group glass rounded-2xl overflow-hidden animate-fade-up stagger-' + ((i % 4) + 1) + '">' +
    '<div class="relative p-6 pb-3">' +
      '<div class="absolute top-3 right-3 flex flex-col gap-1.5 z-10">' +
        '<button onclick="event.stopPropagation(); toggleWishlist(' + p.id + ')" data-wish="' + p.id + '" class="w-8 h-8 rounded-lg bg-black/30 backdrop-blur flex items-center justify-center ' + (inWish ? 'text-neon-pink' : 'text-gray-500') + ' hover:scale-110 transition-all"><i data-lucide="heart" class="w-4 h-4" style="pointer-events:none;"></i></button>' +
        '<button onclick="event.stopPropagation(); toggleCompare(' + p.id + ')" data-compare="' + p.id + '" class="w-8 h-8 rounded-lg ' + (inCompare ? 'bg-neon-purple/20 border-neon-purple' : 'bg-black/30') + ' backdrop-blur border border-transparent flex items-center justify-center text-gray-400 hover:scale-110 transition-all"><i data-lucide="git-compare" class="w-4 h-4" style="pointer-events:none;"></i></button>' +
      '</div>' +
      '<a href="#" onclick="navigateTo(\'detail\',' + p.id + ');return false" class="block">' +
        imgHtml +
      '</a>' +
    '</div>' +
    '<div class="px-6 pb-6">' +
      '<span class="text-[10px] uppercase tracking-widest text-gray-500 font-medium">' + p.cat + '</span>' +
      '<a href="#" onclick="navigateTo(\'detail\',' + p.id + ');return false"><h3 class="font-display font-semibold mt-1 group-hover:text-neon-blue transition">' + p.name + '</h3></a>' +
      '<div class="flex items-center gap-1 mt-2">' + stars(p.rating) + '<span class="text-xs text-gray-500 ml-1">(' + p.reviews + ')</span></div>' +
      '<div class="flex items-center justify-between mt-4">' +
        '<span class="text-xl font-display font-bold gradient-text">$' + p.price.toLocaleString() + '</span>' +
        '<button data-cart="' + p.id + '" class="btn-glow px-4 py-2 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl text-sm font-medium hover:opacity-90 transition relative z-10">' +          '<span class="relative z-10 flex items-center gap-1.5"><i data-lucide="shopping-cart" class="w-3.5 h-3.5"></i>Add</span>' +
        '</button>' +
      '</div>' +
    '</div>' +
  '</div>';
}

//new
function getProductColor(p){
  const colors = {
    laptops: 'from-blue-600 to-purple-600',
    smartphones: 'from-cyan-500 to-blue-600',
    headphones: 'from-purple-600 to-pink-500',
    accessories: 'from-yellow-500 to-orange-500'
  };
  return colors[p.cat] || 'from-neon-purple to-neon-blue';
}
//end new

// ========== PAGES ==========
function renderPage(){
  const c=document.getElementById('page-content');
  switch(currentPage){
    case'home':c.innerHTML=renderHome();break;
    case'products':c.innerHTML=renderProducts();break;
    case'detail':c.innerHTML=renderDetail();break;
    case'cart':c.innerHTML=renderCart();break;
    case'checkout':c.innerHTML=renderCheckout();break;
    case'wishlist':c.innerHTML=renderWishlistPage();break;
    case'about':c.innerHTML=renderAbout();break;
    case'contact':c.innerHTML=renderContact();break;
    case'blog':c.innerHTML=renderBlog();break;
    case'faq':c.innerHTML=renderFAQ();break;
  }
  lucide.createIcons({nameAttr:'data-lucide'});
  updateCompareBar();
setTimeout(bindCardButtons, 20); 
}

// HOME
function renderHome(){
let featured = products.filter(p => p.featured).slice(0,4);
if (featured.length === 0) {
    featured = products.slice(0,4);  
}
const cats=[
  {name:'laptops',icon:'💻',count:products.filter(p=>p.cat==='laptops').length},
  {name:'smartphones',icon:'📱',count:products.filter(p=>p.cat==='smartphones').length},
  {name:'headphones',icon:'🎧',count:products.filter(p=>p.cat==='headphones').length},
  {name:'accessories',icon:'⌨️',count:products.filter(p=>p.cat==='accessories').length}
];
  return `
  <section class="hero-bg grid-bg relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-20 sm:py-32 text-center relative z-10">
      <div class="animate-fade-up">
        <h1 id="hero-h1" class="font-display text-5xl sm:text-7xl lg:text-8xl font-black leading-none mb-6"><span class="gradient-text">Future of Tech</span></h1>
<p id="hero-sub" class="text-lg sm:text-xl text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">Premium devices curated for the modern digital <a href="easter-egg/3Droom/index.html" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-neon-blue" style="text-decoration:none;">lifestyle</a>. Experience innovation at its finest.</p>        <div class="flex flex-col sm:flex-row gap-4 justify-center">
          <button onclick="navigateTo('products')" class="btn-glow px-8 py-4 bg-gradient-to-r from-neon-purple to-neon-blue rounded-2xl font-display font-semibold text-lg hover:opacity-90 transition relative"><span class="relative z-10">Shop Now</span></button>
          <button onclick="navigateTo('about')" class="px-8 py-4 glass rounded-2xl font-display font-semibold text-lg hover:bg-white/10 transition">Learn More</button>
        </div>
      </div>
      <div class="flex justify-center gap-8 sm:gap-16 mt-16 text-center animate-fade-up stagger-2">
        <div><div class="text-2xl sm:text-3xl font-display font-bold gradient-text">12K+</div><div class="text-xs text-gray-500 mt-1">Happy Customers</div></div>
        <div><div class="text-2xl sm:text-3xl font-display font-bold gradient-text">40+</div><div class="text-xs text-gray-500 mt-1">Products</div></div>
        <div><div class="text-2xl sm:text-3xl font-display font-bold gradient-text">4.9★</div><div class="text-xs text-gray-500 mt-1">Average Rating</div></div>
      </div>
    </div>
  </section>
  <section class="max-w-7xl mx-auto px-4 sm:px-6 py-16">
    <div class="flex items-center justify-between mb-8"><h2 class="font-display text-2xl sm:text-3xl font-bold">Categories</h2></div>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">${cats.map((c,i)=>`<a href="#" onclick="filterByCategory('${c.name}');return false" class="card-hover glass rounded-2xl p-6 text-center group animate-fade-up stagger-${i+1}"><div class="text-4xl mb-3 group-hover:scale-110 transition-transform">${c.icon}</div><h3 class="font-display font-semibold">${c.name}</h3><p class="text-xs text-gray-500 mt-1">${c.count} products</p></a>`).join('')}</div>
  </section>
  <section class="max-w-7xl mx-auto px-4 sm:px-6 py-16">
    <div class="flex items-center justify-between mb-8"><h2 class="font-display text-2xl sm:text-3xl font-bold">Featured Products</h2><a href="#" onclick="navigateTo('products');return false" class="text-sm text-neon-blue hover:underline">View All →</a></div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">${featured.map((p,i)=>productCard(p,i)).join('')}</div>
  </section>
  <section class="max-w-7xl mx-auto px-4 sm:px-6 py-16">
    <div class="glass rounded-3xl p-8 sm:p-12 text-center hero-bg">
      <h2 class="font-display text-3xl sm:text-4xl font-bold mb-4 gradient-text">Ready to Upgrade?</h2>
      <p class="text-gray-400 mb-8 max-w-xl mx-auto">Join thousands of tech enthusiasts who trust NovaFlow for premium products and exceptional service.</p>
      <button onclick="navigateTo('products')" class="btn-glow px-8 py-4 bg-gradient-to-r from-neon-purple to-neon-blue rounded-2xl font-display font-semibold hover:opacity-90 transition relative"><span class="relative z-10">Explore Collection</span></button>
    </div>
  </section>`;
}

// PRODUCTS
function renderProducts(){
  let filtered=[...products];
  if(filters.category!=='All')filtered=filtered.filter(p=>p.cat===filters.category);
  filtered=filtered.filter(p=>p.price>=filters.minPrice&&p.price<=filters.maxPrice&&p.rating>=filters.minRating);
  //new
  if(filters.search) filtered=filtered.filter(p=>p.name.toLowerCase().includes(filters.search.toLowerCase()));
  //end new
  if(filters.sort==='price-asc')filtered.sort((a,b)=>a.price-b.price);
  else if(filters.sort==='price-desc')filtered.sort((a,b)=>b.price-a.price);
  else if(filters.sort==='rating')filtered.sort((a,b)=>b.rating-a.rating);
  //new
  else if(filters.sort==='name') filtered.sort((a,b)=>a.name.localeCompare(b.name));
  //end new
  else 

if(filters.sort==='name')filtered.sort((a,b)=>a.name.localeCompare(b.name));
  const categories=['All','laptops','smartphones','headphones','accessories'];
  return `<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
    <h1 class="font-display text-3xl sm:text-4xl font-bold mb-8">All Products</h1>
    <div class="flex flex-col lg:flex-row gap-8">
      <aside class="lg:w-64 flex-shrink-0">
        <div class="glass rounded-2xl p-6 space-y-6 lg:sticky lg:top-24">
          <div><h3 class="font-display font-semibold text-sm mb-3">Category</h3><div class="flex flex-wrap gap-2">${categories.map(c=>`<button onclick="filters.category='${c}';navigateTo('products')" class="px-3 py-1.5 rounded-lg text-xs font-medium transition ${filters.category===c?'bg-gradient-to-r from-neon-purple to-neon-blue text-white':'bg-white/5 text-gray-400 hover:bg-white/10'}">${c}</button>`).join('')}</div></div>
          <div><h3 class="font-display font-semibold text-sm mb-3">Price: $${filters.minPrice} - $${filters.maxPrice}</h3><input type="range" min="0" max="3000" step="50" value="${filters.maxPrice}" oninput="filters.maxPrice=parseInt(this.value);navigateTo('products')" class="w-full"></div>
          <div><h3 class="font-display font-semibold text-sm mb-3">Min Rating</h3><div class="flex gap-1">${[0,3,3.5,4,4.5].map(r=>`<button onclick="filters.minRating=${r};navigateTo('products')" class="px-2.5 py-1 rounded-lg text-xs ${filters.minRating===r?'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30':'bg-white/5 text-gray-400'} transition">${r===0?'All':r+'★'}</button>`).join('')}</div></div>

          <div><h3 class="font-display font-semibold text-sm mb-3">Sort By</h3><select onchange="filters.sort=this.value;navigateTo('products')" class="w-full px-3 py-2 bg-dark-700 border border-white/10 rounded-lg text-sm text-white focus:outline-none">${[['featured','Featured'],['price-asc','Price: Low to High'],['price-desc','Price: High to Low'],['rating','Top Rated'],['name','Name A-Z']].map(([v,l])=>`<option value="${v}" ${filters.sort===v?'selected':''}>${l}</option>`).join('')}</select></div>
        </div>
      </aside>
      <div class="flex-1">
        <p class="text-sm text-gray-500 mb-4">${filtered.length} products found</p>
        ${filtered.length?`<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">${filtered.map((p,i)=>productCard(p,i)).join('')}</div>`:'<div class="text-center py-20 text-gray-500"><div class="text-5xl mb-4">🔍</div><p class="font-display text-lg">No products match your filters</p><button onclick="filters={category:\'All\',minPrice:0,maxPrice:3000,sort:\'featured\',minRating:0};search:\'\'};navigateTo(\'products\')" class="mt-4 text-neon-blue hover:underline text-sm">Reset Filters</button></div>'}
      </div>
    </div>
  </div>`;
}

// DETAIL
function renderDetail(){
  const p = products.find(x => x.id === currentProduct);
  if (!p) return '<div class="max-w-7xl mx-auto px-4 py-20 text-center text-gray-500">Product not found</div>';

  const related = products.filter(x => x.cat === p.cat && x.id !== p.id).slice(0, 3);
  const specEntries = Object.entries(p.specs || {});

  // Get real reviews from DB (passed from PHP)
  const reviews = (typeof reviewsByProduct !== 'undefined' && reviewsByProduct[p.id]) 
                  ? reviewsByProduct[p.id] 
                  : [];

  // Review form — only show if logged in and hasn't reviewed yet
  const userAlreadyReviewed = reviews.some(r => r.name === loggedInUserName);
  const reviewFormHtml = loggedInUserId
    ? (userAlreadyReviewed
        ? `<div class="glass rounded-2xl p-6 text-center text-gray-400 text-sm">You've already reviewed this product. ✓</div>`
        : `<div class="glass rounded-2xl p-6 mb-4" id="review-form-box">
            <h3 class="font-display font-semibold mb-4">Write a Review</h3>
            <div class="flex gap-2 mb-4" id="star-picker">
              ${[1,2,3,4,5].map(n => 
                `<button onclick="setReviewStar(${n})" data-star="${n}" class="text-3xl transition hover:scale-110 text-gray-600">★</button>`
              ).join('')}
            </div>
            <input type="hidden" id="review-rating" value="0">
            <textarea id="review-comment" rows="3" placeholder="Share your experience..." 
              class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white 
                     focus:border-neon-blue focus:outline-none transition resize-none mb-3"></textarea>
            <button onclick="submitReview(${p.id})" 
              class="btn-glow px-6 py-2.5 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl 
                     font-semibold text-sm hover:opacity-90 transition relative">
              <span class="relative z-10">Submit Review</span>
            </button>
            <span id="review-msg" class="ml-3 text-sm text-gray-400"></span>
           </div>`)
    : `<div class="glass rounded-2xl p-5 text-sm text-gray-400">
         <a href="#" onclick="openAuth();return false" class="text-neon-blue hover:underline">Sign in</a> to leave a review.
       </div>`;

  const reviewsHtml = reviews.length
    ? reviews.map(r => `
        <div class="glass rounded-2xl p-6">
          <div class="flex items-center justify-between mb-3">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-full bg-gradient-to-br from-neon-purple to-neon-blue 
                          flex items-center justify-center font-bold text-sm">
                ${r.name ? r.name[0].toUpperCase() : '?'}
              </div>
              <div>
                <div class="font-medium text-sm">${r.name}</div>
                <div class="flex mt-0.5">${stars(r.rating)}</div>
              </div>
            </div>
            <span class="text-xs text-gray-500">${r.date}</span>
          </div>
          <p class="text-sm text-gray-400">${r.text}</p>
        </div>`).join('')
    : `<div class="glass rounded-2xl p-6 text-gray-500 text-sm text-center">
         No reviews yet. Be the first!
       </div>`;

  return `<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">
    <button onclick="navigateTo('products')" 
      class="flex items-center gap-2 text-sm text-gray-400 hover:text-white mb-6 transition">
      <i data-lucide="arrow-left" class="w-4 h-4"></i>Back to Products
    </button>
    <div class="grid lg:grid-cols-2 gap-12">
      <div class="space-y-4 animate-fade-up">
        <div class="glass rounded-3xl p-8 sm:p-12 aspect-square flex items-center justify-center">
          ${p.image
            ? `<img src="../uploads/products/${p.image}" alt="${p.name}" 
                    class="w-full h-full object-contain hover:scale-110 transition-transform duration-500" 
                    style="cursor:pointer" onclick="openLightbox('../uploads/products/${p.image}')">`
            : `<div class="text-[120px] sm:text-[160px] hover:scale-110 transition-transform duration-500 
                          bg-gradient-to-br ${getProductColor(p)} w-full h-full rounded-2xl 
                          flex items-center justify-center">${p.emoji}</div>`
          }
        </div>
      </div>
      <div class="animate-fade-up stagger-1">
        <span class="text-xs uppercase tracking-widest text-neon-blue font-medium">${p.cat}</span>
        <h1 class="font-display text-3xl sm:text-4xl font-bold mt-2 mb-4">${p.name}</h1>
        <div class="flex items-center gap-3 mb-6">
          <div class="flex">${stars(p.rating)}</div>
          <span class="text-sm text-gray-400" id="review-counter-${p.id}">
            ${p.rating} (${p.reviews} reviews)
          </span>
        </div>
        <p class="text-gray-400 leading-relaxed mb-6">${p.desc || p.description || ''}</p>
        <div class="text-4xl font-display font-black gradient-text mb-8">$${p.price.toLocaleString()}</div>
        <div class="flex gap-3 mb-8">
          <button data-cart="${p.id}" 
  class="btn-glow flex-1 py-4 bg-gradient-to-r from-neon-purple to-neon-blue rounded-2xl 
         font-display font-semibold text-lg hover:opacity-90 transition relative">
            <span class="relative z-10 flex items-center justify-center gap-2">
              <i data-lucide="shopping-cart" class="w-5 h-5"></i>Add to Cart
            </span>
          </button>
          <button onclick="toggleWishlist(${p.id})" 
            class="w-14 h-14 glass rounded-2xl flex items-center justify-center 
                   ${wishlist.includes(p.id) ? 'text-neon-pink' : 'text-gray-400'} 
                   hover:scale-105 transition-all">
            <i data-lucide="heart" class="w-6 h-6"></i>
          </button>
        </div>
        <div class="glass rounded-2xl p-6">
          <h3 class="font-display font-semibold mb-4">Specifications</h3>
          <div class="space-y-3">
            ${specEntries.map(([k,v]) => 
              `<div class="flex justify-between text-sm">
                 <span class="text-gray-500">${k}</span>
                 <span class="font-medium">${v}</span>
               </div>`).join('')}
          </div>
        </div>
      </div>
    </div>
    <section class="mt-16">
      <h2 class="font-display text-2xl font-bold mb-6">
        Customer Reviews 
        <span class="text-gray-500 text-lg font-normal">(${reviews.length})</span>
      </h2>
      ${reviewFormHtml}
      <div class="space-y-4 mt-6" id="reviews-list-${p.id}">
        ${reviewsHtml}
      </div>
    </section>
    ${related.length 
      ? `<section class="mt-16">
           <h2 class="font-display text-2xl font-bold mb-6">You Might Also Like</h2>
           <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
             ${related.map((p,i) => productCard(p,i)).join('')}
           </div>
         </section>` 
      : ''}
  </div>`;
}
// CART
function renderCart(){

  const total=cart.reduce((s,i)=>s+i.price*i.qty,0);
  if(!cart.length)return `<div class="max-w-7xl mx-auto px-4 py-20 text-center"><div class="text-6xl mb-4">🛒</div><h2 class="font-display text-2xl font-bold mb-2">Your Cart is Empty</h2><p class="text-gray-500 mb-6">Looks like you haven't added any items yet.</p><button onclick="navigateTo('products')" class="px-6 py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-medium hover:opacity-90 transition">Browse Products</button></div>`;
  return `<div class="max-w-4xl mx-auto px-4 sm:px-6 py-8">
    <h1 class="font-display text-3xl font-bold mb-8">Shopping Cart <span class="text-gray-500 text-lg font-normal">(${cart.reduce((s,i)=>s+i.qty,0)} items)</span></h1>
    <div class="space-y-4 mb-8">${cart.map(item=>`<div class="glass rounded-2xl p-4 sm:p-6 flex items-center gap-4">
      <div class="w-16 h-16 rounded-xl flex-shrink-0">
        ${item.image && item.image.includes('.')
          ? `<img src="../uploads/products/${item.image}" alt="${item.name}" class="w-full h-full object-cover rounded-xl">`
          : `<div class="w-full h-full rounded-xl bg-gradient-to-br from-neon-purple/20 to-neon-blue/20 flex items-center justify-center text-3xl">${item.image}</div>`
        }
      </div>
      <div class="flex-1 min-w-0"><h3 class="font-display font-semibold truncate">${item.name}</h3><p class="text-sm text-gray-500">$${item.price.toLocaleString()}</p></div>
      <div class="flex items-center gap-2"><button onclick="updateQty(${item.id},-1)" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center hover:bg-white/10 transition"><i data-lucide="minus" class="w-3 h-3"></i></button><span class="w-8 text-center text-sm font-medium">${item.qty}</span><button onclick="updateQty(${item.id},1)" class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center hover:bg-white/10 transition"><i data-lucide="plus" class="w-3 h-3"></i></button></div>
      <div class="text-right w-20 flex-shrink-0"><div class="font-display font-bold">$${(item.price*item.qty).toLocaleString()}</div></div>
      <button onclick="removeFromCart(${item.id})" class="text-gray-500 hover:text-red-400 transition flex-shrink-0"><i data-lucide="trash-2" class="w-4 h-4"></i></button>
    </div>`).join('')}</div>
    <div class="glass rounded-2xl p-6">
      <div class="space-y-3 mb-6">
        <div class="flex justify-between text-sm"><span class="text-gray-400">Subtotal</span><span>$${total.toLocaleString()}</span></div>
        <div class="flex justify-between text-sm"><span class="text-gray-400">Shipping</span><span class="text-neon-blue">Free</span></div>
        <div class="border-t border-white/10 pt-3 flex justify-between"><span class="font-display font-semibold">Total</span><span class="text-2xl font-display font-bold gradient-text">$${total.toLocaleString()}</span></div>

      </div>
      <button onclick="navigateTo('checkout')" class="btn-glow w-full py-4 bg-gradient-to-r from-neon-purple to-neon-blue rounded-2xl font-display font-semibold text-lg hover:opacity-90 transition relative"><span class="relative z-10">Proceed to Checkout</span></button>
    </div>
  </div>`;
}
// CHECKOUT
function renderCheckout(){
  // If not logged in, show a friendly login prompt
  if (!loggedInUserId) {
    return `<div class="max-w-4xl mx-auto px-4 sm:px-6 py-8 text-center">
      <div class="glass rounded-2xl p-10">
        <h2 class="font-display text-2xl font-bold mb-4 gradient-text">Login Required</h2>
        <p class="text-gray-400 mb-6">You must be logged in to place an order.</p>
        <button onclick="openAuth()" class="btn-glow px-6 py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-semibold">
          Sign In / Register
        </button>
      </div>
    </div>`;
  }

  // Normal checkout form for logged‑in users
  const total = cart.reduce((s,i) => s + i.price * i.qty, 0);
  return `<div class="max-w-4xl mx-auto px-4 sm:px-6 py-8">
    <button onclick="navigateTo('cart')" class="flex items-center gap-2 text-sm text-gray-400 hover:text-white mb-6 transition"><i data-lucide="arrow-left" class="w-4 h-4"></i>Back to Cart</button>
    <h1 class="font-display text-3xl font-bold mb-8">Checkout</h1>
    <div class="inline-block px-3 py-1.5 bg-yellow-500/10 border border-yellow-500/20 rounded-lg text-xs text-yellow-400 mb-6">⚠️ Demo — no real payment is processed</div>
    <form onsubmit="handleCheckout(event)" class="space-y-8">
      <div class="glass rounded-2xl p-6"><h2 class="font-display font-semibold text-lg mb-4">Shipping Info</h2><div class="grid sm:grid-cols-2 gap-4">
        <div><label class="text-xs text-gray-500 mb-1 block" for="co-fn">First Name</label><input id="co-fn" type="text" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition"></div>
        <div><label class="text-xs text-gray-500 mb-1 block" for="co-ln">Last Name</label><input id="co-ln" type="text" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition"></div>
        <div class="sm:col-span-2"><label class="text-xs text-gray-500 mb-1 block" for="co-em">Email</label><input id="co-em" type="email" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition"></div>
        <div class="sm:col-span-2"><label class="text-xs text-gray-500 mb-1 block" for="co-ad">Address</label><input id="co-ad" type="text" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition"></div>
        <div><label class="text-xs text-gray-500 mb-1 block" for="co-mobile">Mobile Number</label><input id="co-mobile" type="text" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition"></div>
      </div></div>
      <div class="glass rounded-2xl p-6"><h2 class="font-display font-semibold text-lg mb-4">Order Summary</h2>
        <div class="space-y-3">${cart.map(i => `<div class="flex justify-between text-sm"><span class="text-gray-400">${i.name} × ${i.qty}</span><span>$${(i.price * i.qty).toLocaleString()}</span></div>`).join('')}
          <div class="border-t border-white/10 pt-3 flex justify-between"><span class="font-semibold">Total</span><span class="font-display font-bold gradient-text text-xl">$${total.toLocaleString()}</span></div>
        </div>
      </div>
      <button type="submit" class="btn-glow w-full py-4 bg-gradient-to-r from-neon-purple to-neon-blue rounded-2xl font-display font-semibold text-lg hover:opacity-90 transition relative"><span class="relative z-10">Place Order (Demo)</span></button>
    </form>
  </div>`;
}
//function handleCheckout(e)
//{e.preventDefault();cart=[];saveCart();toast('Order placed successfully! 🎉');navigateTo('home')}
//hope
function handleCheckout(e) {
    e.preventDefault();

    if (cart.length === 0) {
        toast('Your cart is empty!', 'error');
        return;
    }

    const firstName = document.getElementById('co-fn')?.value.trim();
    const lastName  = document.getElementById('co-ln')?.value.trim();
    const email     = document.getElementById('co-em')?.value.trim();
    const address   = document.getElementById('co-ad')?.value.trim();
    const mobile    = document.getElementById('co-mobile')?.value.trim();

    if (!firstName || !lastName || !email || !address || !mobile) {
        toast('Please fill in all shipping details.', 'error');
        return;
    }

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/NovaFlow-Store-v5.0.0/public/process_cart_checkout.php';

    const cartInput = document.createElement('input');
    cartInput.type = 'hidden';
    cartInput.name = 'cart';
    cartInput.value = JSON.stringify(cart);
    form.appendChild(cartInput);

    const nameInput = document.createElement('input');
    nameInput.type = 'hidden';
    nameInput.name = 'full_name';
    nameInput.value = firstName + ' ' + lastName;
    form.appendChild(nameInput);

    const emailInput = document.createElement('input');
    emailInput.type = 'hidden';
    emailInput.name = 'email';
    emailInput.value = email;
    form.appendChild(emailInput);

    const addressInput = document.createElement('input');
    addressInput.type = 'hidden';
    addressInput.name = 'address';
    addressInput.value = address;
    form.appendChild(addressInput);

    const mobileInput = document.createElement('input');
    mobileInput.type = 'hidden';
    mobileInput.name = 'mobile';
    mobileInput.value = mobile;
    form.appendChild(mobileInput);

    document.body.appendChild(form);
    form.submit();
}
//hope end

// WISHLIST
function renderWishlistPage(){
  const items=products.filter(p=>wishlist.includes(p.id));
  if(!items.length)return `<div class="max-w-7xl mx-auto px-4 py-20 text-center"><div class="text-6xl mb-4">💜</div><h2 class="font-display text-2xl font-bold mb-2">Your Wishlist is Empty</h2><p class="text-gray-500 mb-6">Save items you love to find them later.</p><button onclick="navigateTo('products')" class="px-6 py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-medium hover:opacity-90 transition">Browse Products</button></div>`;
  return `<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8"><h1 class="font-display text-3xl font-bold mb-8">Wishlist <span class="text-gray-500 text-lg font-normal">(${items.length})</span></h1><div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">${items.map((p,i)=>productCard(p,i)).join('')}</div></div>`;
}

// ABOUT
function renderAbout(){
  return `<div class="max-w-4xl mx-auto px-4 sm:px-6 py-16 text-center">
    <div class="animate-fade-up">
      <span class="inline-block px-4 py-1.5 glass rounded-full text-xs font-medium text-neon-blue mb-6">Our Story</span>
      <h1 class="font-display text-4xl sm:text-5xl font-bold gradient-text mb-6">About NovaFlow</h1>
      <p class="text-lg text-gray-400 leading-relaxed max-w-2xl mx-auto mb-12">
        Founded in 2026 by <span class="text-neon-blue font-medium">Nazanin</span>,
        NovaFlow was born from a simple belief: that beautiful, high‑quality technology
        shouldn’t be reserved for the few. Every product we feature is hand‑picked,
        tested, and delivered with the same care I’d want for myself.
      </p>
      <blockquote class="mt-6 mb-12 text-neon-blue italic text-sm max-w-md mx-auto border-l-2 border-neon-blue pl-4">
        “I build things that make people feel something – and a great store should feel like home.”
        <br><span class="text-gray-500 text-xs">— Nazanin</span>
      </blockquote>
    </div>
    <div class="grid sm:grid-cols-3 gap-6 mb-16">
      ${[
        {n:'Innovation First',d:'We partner with brands pushing boundaries.',i:'🚀'},
        {n:'Quality Assured',d:'Every product is tested and certified.',i:'✅'},
        {n:'24/7 Support',d:'Our team is always here for you.',i:'💬'}
      ].map((v,i)=>`
        <div class="glass rounded-2xl p-8 card-hover animate-fade-up stagger-${i+1}">
          <div class="text-4xl mb-4">${v.i}</div>
          <h3 class="font-display font-semibold text-lg mb-2">${v.n}</h3>
          <p class="text-sm text-gray-500">${v.d}</p>
        </div>
      `).join('')}
    </div>

    <!-- Solo Developer Card -->
    <div class="glass rounded-3xl p-10 sm:p-12 hero-bg max-w-sm mx-auto text-center">
      <h2 class="font-display text-2xl font-bold mb-6 gradient-text">The Mind Behind NovaFlow</h2>
      <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-neon-purple to-neon-blue flex items-center justify-center text-4xl mb-4 shadow-lg">🚀</div>
      <h3 class="font-display font-semibold text-xl text-white mb-1">Nazanin</h3>
      <p class="text-sm text-neon-blue font-medium mb-4">Founder, Designer & Developer</p>
      <p class="text-gray-400 text-sm leading-relaxed mb-6">
        One person. One vision. Every pixel, every line of code, every Easter egg — built with obsession and love.
      </p>
      <a href="https://your-portfolio-link.com" target="_blank" rel="noopener noreferrer"
         class="btn-glow inline-block px-6 py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-semibold text-sm hover:opacity-90 transition relative">
        <span class="relative z-10">Visit My Portfolio</span>
      </a>
    </div>
  </div>`;
}

// CONTACT
function renderContact(){
  return `<div class="max-w-5xl mx-auto px-4 sm:px-6 py-16">
    <div class="text-center mb-12 animate-fade-up"><h1 class="font-display text-4xl sm:text-5xl font-bold gradient-text mb-4">Get in Touch</h1><p class="text-gray-400">We'd <a href="easter-egg/bongo-cat/index.html" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-neon-pink" style="text-decoration:none;">love</a> to hear from you. Send us a message!</p></div>
    <div class="grid lg:grid-cols-3 gap-8">

      <div class="space-y-4">${[{i:'mail',t:'Email',v:'khalesinazanin2009@gmail.com'},{i:'phone',t:'Phone',v:'+98 9224346816'},{i:'map-pin',t:'Address',v:'123 Tech Blvd, SF, CA'}].map(c=>`<div class="glass rounded-2xl p-6 flex items-start gap-4"><div class="w-10 h-10 rounded-xl bg-gradient-to-br from-neon-purple/20 to-neon-blue/20 flex items-center justify-center flex-shrink-0"><i data-lucide="${c.i}" class="w-5 h-5 text-neon-blue"></i></div><div><div class="text-xs text-gray-500 mb-1">${c.t}</div><div class="text-sm font-medium">${c.v}</div></div></div>`).join('')}</div>
      <form onsubmit="handleContact(event)" class="lg:col-span-2 glass rounded-2xl p-6 sm:p-8 space-y-4 animate-fade-up stagger-1">
        <div class="grid sm:grid-cols-2 gap-4"><div><label class="text-xs text-gray-500 mb-1 block" for="ct-n">Name</label><input id="ct-n" type="text" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition"></div><div><label class="text-xs text-gray-500 mb-1 block" for="ct-e">Email</label><input id="ct-e" type="email" required value="${userSessionEmail}" class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition"></div></div>
        <div><label class="text-xs text-gray-500 mb-1 block" for="ct-s">Subject</label><input id="ct-s" type="text" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition"></div>
        <div><label class="text-xs text-gray-500 mb-1 block" for="ct-m">Message</label><textarea id="ct-m" rows="5" required class="w-full px-4 py-3 bg-dark-700 border border-white/10 rounded-xl text-white focus:border-neon-blue focus:outline-none transition resize-none"></textarea></div>

        <button type="submit" class="btn-glow w-full py-3 bg-gradient-to-r from-neon-purple to-neon-blue rounded-xl font-semibold hover:opacity-90 transition relative"><span class="relative z-10">Send Message</span></button>
      </form>
    </div>
  </div>`;
}
function handleContact(e) {
    e.preventDefault();
    const form = e.target;
    const formData = new FormData(form);
    formData.append('ajax', '1');   // tell the server this is AJAX

    fetch('action_contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = 'success.php';
        } else {
            toast(data.message, 'error');
        }
    })
    .catch(() => {
        toast('A network error occurred.', 'error');
    });
}

// BLOG
function renderBlog(){
  return `<div class="max-w-7xl mx-auto px-4 sm:px-6 py-16">
    <div class="text-center mb-12 animate-fade-up"><h1 class="font-display text-4xl sm:text-5xl font-bold gradient-text mb-4">Tech Blog</h1><p class="text-gray-400">Insights, reviews, and the latest in tech.</p></div>
    <div class="grid sm:grid-cols-2 gap-6">${blogPosts.map((b,i)=>`<article class="glass rounded-2xl overflow-hidden card-hover animate-fade-up stagger-${i+1}"><div class="h-40 bg-gradient-to-br from-neon-purple/20 to-neon-blue/20 flex items-center justify-center text-5xl">${b.icon}</div><div class="p-6"><div class="flex items-center gap-3 mb-3"><span class="px-2.5 py-1 bg-neon-blue/10 text-neon-blue rounded-full text-xs font-medium">${b.tag}</span><span class="text-xs text-gray-500">${b.date}</span></div><h2 class="font-display font-bold text-lg mb-2 hover:text-neon-blue transition cursor-pointer">${b.title}</h2><p class="text-sm text-gray-400 leading-relaxed">${b.excerpt}</p><a href="${b.url}" target="_blank" rel="noopener noreferrer" class="mt-4 text-sm text-neon-blue hover:underline flex items-center gap-1">Read More <i data-lucide="arrow-right" class="w-3 h-3"></i></a></div></article>`).join('')}</div>

  </div>`;
}

// FAQ
function renderFAQ(){
  return `<div class="max-w-3xl mx-auto px-4 sm:px-6 py-16">
    <div class="text-center mb-12 animate-fade-up"><h1 class="font-display text-4xl sm:text-5xl font-bold gradient-text mb-4">FAQ</h1><p class="text-gray-400">Common questions answered.</p></div>
    <div class="space-y-3">${faqs.map((f,i)=>`<div class="glass rounded-2xl overflow-hidden animate-fade-up stagger-${(i%4)+1}"><button onclick="toggleAccordion(${i})" class="w-full px-6 py-5 flex items-center justify-between text-left"><span class="font-display font-medium pr-4">${f.q}</span><i data-lucide="chevron-down" class="w-5 h-5 text-gray-500 flex-shrink-0 transition-transform" id="faq-icon-${i}"></i></button><div class="accordion-content px-6 pb-5" id="faq-${i}"><p class="text-sm text-gray-400 leading-relaxed">${f.a}</p></div></div>`).join('')}</div>
  </div>`;
}
function toggleAccordion(i){
  const el=document.getElementById('faq-'+i),icon=document.getElementById('faq-icon-'+i);
  el.classList.toggle('open');
  icon.style.transform=el.classList.contains('open')?'rotate(180deg)':'';
}

// NEWSLETTER
function handleNewsletter(e){e.preventDefault();toast('Subscribed! Welcome aboard 🚀');e.target.reset()}

// ========== CURSOR & EFFECTS ==========

document.addEventListener('mousemove',(e)=>{
  const cursor=document.getElementById('cursor');
  cursor.style.left=e.clientX+'px';
  cursor.style.top=e.clientY+'px';
  // Check if hovering over interactive element
  const el=document.elementFromPoint(e.clientX,e.clientY);
  const isInteractive=el&&(el.tagName==='BUTTON'||el.tagName==='A'||el.classList.contains('hover:scale-110'));
  cursor.classList.toggle('active',isInteractive);
});
document.addEventListener('mousedown',()=>{document.getElementById('cursor').style.transform='translate(-50%,-50%) scale(.8)'});
document.addEventListener('mouseup',()=>{document.getElementById('cursor').style.transform='translate(-50%,-50%) scale(1)'});

// ========== CHATBOT ==========
const chatbotResponses={
  shipping:'We offer free shipping on orders over $100! Standard shipping takes 3-5 business days. Express shipping is 1-2 days.',
  returns:'Our 30-day hassle-free return policy covers all items in original condition. Refunds process within 5 business days.',
  warranty:'All products include a minimum 1-year manufacturer warranty with extended options at checkout.',
  payment:'We accept all major credit cards, PayPal, Apple Pay, and Google Pay. All transactions are 256-bit encrypted.',
  tracking:'Order tracking info is emailed to you once your package ships. Track in real-time on our tracking page.',
  products:'We sell premium laptops, smartphones, headphones, and tech accessories. Check out our full catalog!',
  price:'Prices range from $89 for accessories to $2,499 for our flagship laptops. Use filters to find your budget!',
  default:'Hey! I\'m the NovaFlow Assistant. I can help with shipping, returns, warranty, payment, tracking, and product questions. What can I help?'
};

let chatHistory=[];
let chatbotOpen=false;

function toggleChatbot(){
  const btn=document.getElementById('chatbot-btn'),win=document.getElementById('chatbot-window');
  chatbotOpen=!chatbotOpen;
  btn.classList.toggle('active',chatbotOpen);
  win.classList.toggle('open',chatbotOpen);
  // Refresh icons after making the window visible
  lucide.createIcons({nameAttr:'data-lucide'});
  if(chatbotOpen && chatHistory.length===0){
    addChatMessage('bot','👋 Hi! I\'m NovaFlow\'s AI assistant. Ask me about shipping, returns, warranty, or anything else!');
  }
}


function addChatMessage(sender,text){
  const msgs=document.getElementById('chatbot-messages');
  const msg=document.createElement('div');
  msg.className=`chat-msg chat-${sender}`;
  msg.textContent=text;
  msgs.appendChild(msg);
  msgs.scrollTop=msgs.scrollHeight;
  chatHistory.push({sender,text});
}

function sendChatMessage(){
  const inp=document.getElementById('chatbot-input-field');
  const text=inp.value.trim();
  if(!text)return;
  
  addChatMessage('user',text);
  inp.value='';
  

  // Simple keyword matching
  const q=text.toLowerCase();
  let response=chatbotResponses.default;
  if(q.includes('ship')||q.includes('deliver')||q.includes('how long'))response=chatbotResponses.shipping;
  else if(q.includes('return')||q.includes('refund')||q.includes('exchange'))response=chatbotResponses.returns;
  else if(q.includes('warrant')||q.includes('guarantee'))response=chatbotResponses.warranty;
  else if(q.includes('pay')||q.includes('card')||q.includes('payment'))response=chatbotResponses.payment;
  else if(q.includes('track')||q.includes('order')||q.includes('status'))response=chatbotResponses.tracking;
  else if(q.includes('product')||q.includes('what do')||q.includes('sell'))response=chatbotResponses.products;
  else if(q.includes('price')||q.includes('cost')||q.includes('expensive'))response=chatbotResponses.price;
  
  setTimeout(()=>addChatMessage('bot',response),300);
}

// ========== INIT ==========
const defaultConfig={
  store_name:'NovaFlow',
  hero_headline:'Future of Tech',
  hero_subtext:'Premium devices curated for the modern digital lifestyle. Experience innovation at its finest.',
  background_color:'#0a0a0f',
  surface_color:'#12121a',
  text_color:'#ffffff',
  primary_action_color:'#7c3aed',
  secondary_action_color:'#00d4ff',
  font_family:'Outfit',
  font_size:16

};

function applyConfig(config){
  const c=config||defaultConfig;
  // Text
  document.getElementById('logo-text').textContent=c.store_name||defaultConfig.store_name;
  document.getElementById('footer-logo').textContent=c.store_name||defaultConfig.store_name;
  const h1=document.getElementById('hero-h1');if(h1)h1.innerHTML=`<span class="gradient-text">${c.hero_headline||defaultConfig.hero_headline}</span>`;
  const sub=document.getElementById('hero-sub');if(sub)sub.textContent=c.hero_subtext||defaultConfig.hero_subtext;
  // Colors
  const bg=c.background_color||defaultConfig.background_color;
  const surf=c.surface_color||defaultConfig.surface_color;

  const txt=c.text_color||defaultConfig.text_color;
  const prim=c.primary_action_color||defaultConfig.primary_action_color;
  const sec=c.secondary_action_color||defaultConfig.secondary_action_color;
  document.documentElement.style.setProperty('--tw-bg',bg);
  document.getElementById('app-body').style.backgroundColor=bg;
  document.getElementById('app-body').style.color=txt;
  // Font
  const font=c.font_family||defaultConfig.font_family;
  const size=c.font_size||defaultConfig.font_size;
  document.querySelectorAll('.font-display').forEach(el=>{el.style.fontFamily=`${font}, Outfit, sans-serif`});
  document.getElementById('app-body').style.fontFamily=`DM Sans, ${font}, sans-serif`;

  document.getElementById('app-body').style.fontSize=size+'px';
  document.querySelectorAll('h1').forEach(el=>el.style.fontSize=(size*3)+'px');
  document.querySelectorAll('h2').forEach(el=>el.style.fontSize=(size*1.75)+'px');
}

/*window.elementSdk.init({
  defaultConfig,
  onConfigChange:async(config)=>{applyConfig(config)},
  mapToCapabilities:(config)=>({
    recolorables:[
      {get:()=>config.background_color||defaultConfig.background_color,set:v=>{config.background_color=v;window.elementSdk.setConfig({background_color:v})}},
      {get:()=>config.surface_color||defaultConfig.surface_color,set:v=>{config.surface_color=v;window.elementSdk.setConfig({surface_color:v})}},
      {get:()=>config.text_color||defaultConfig.text_color,set:v=>{config.text_color=v;window.elementSdk.setConfig({text_color:v})}},
      {get:()=>config.primary_action_color||defaultConfig.primary_action_color,set:v=>{config.primary_action_color=v;window.elementSdk.setConfig({primary_action_color:v})}},
      {get:()=>config.secondary_action_color||defaultConfig.secondary_action_color,set:v=>{config.secondary_action_color=v;window.elementSdk.setConfig({secondary_action_color:v})}}
    ],
    borderables:[],
    fontEditable:{get:()=>config.font_family||defaultConfig.font_family,set:v=>{config.font_family=v;window.elementSdk.setConfig({font_family:v})}},
    fontSizeable:{get:()=>config.font_size||defaultConfig.font_size,set:v=>{config.font_size=v;window.elementSdk.setConfig({font_size:v})}}
  }),
  mapToEditPanelValues:(config)=>new Map([
    ['store_name',config.store_name||defaultConfig.store_name],
    ['hero_headline',config.hero_headline||defaultConfig.hero_headline],
    ['hero_subtext',config.hero_subtext||defaultConfig.hero_subtext]
  ])
});*/

// Build mobile nav
document.getElementById('mobile-nav').innerHTML=['home','products','blog','about','contact','faq'].map(p=>`<a href="#" onclick="navigateTo('${p}');toggleMobile();return false" class="text-lg font-display font-medium capitalize hover:text-neon-blue transition">${p}</a>`).join('');

updateBadges();
bindCardButtons();
//navigateTo('home');
<?php if (isset($_SESSION['skip_router'])): ?>
    // Skip auto‑navigation on success page
    <?php unset($_SESSION['skip_router']); ?>
<?php else: ?>
    navigateTo('home');
<?php endif; ?>


lucide.createIcons({nameAttr:'data-lucide'});
</script>
 <script>
 /*(function(){function c(){var b=a.contentDocument||a.contentWindow.document;
  if(b)
  {var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9f5a655da4f166a2',t:'MTc3Nzc2MDI0NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}
  if(document.body)
  {var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);
  if('loading'!==document.readyState)c();
  else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);
else
{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();*/

// Lightbox for product detail images
function openLightbox(src) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('image-lightbox').style.display = 'flex';
}
function closeLightbox() {
    document.getElementById('image-lightbox').style.display = 'none';
}
</script>
<!-- Lightbox overlay for product images -->
<div id="image-lightbox" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.95); z-index:10000; align-items:center; justify-content:center;" onclick="closeLightbox()">
  <span style="position:absolute; top:20px; right:30px; color:white; font-size:3rem; cursor:pointer; z-index:10001;" onclick="closeLightbox()">&times;</span>
  <img id="lightbox-img" src="" style="max-width:90%; max-height:90%; object-fit:contain; cursor:default;" onclick="event.stopPropagation()">
</div>

</body>
</html>
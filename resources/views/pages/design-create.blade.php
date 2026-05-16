@extends('layouts.app')

<style>
    :root {
        /* Colors from Design System 1 */
        --primary: #1f0a34;
        --primary-container: #35204a;
        --on-primary-container: #a087b8;
        --secondary: #984800;
        --background: #fdf8fd;
        --surface: #fdf8fd;
        --surface-container: #f1ecf2;
        --surface-container-high: #ebe7ec;
        --surface-container-low: #f7f2f8;
        --on-surface: #1c1b1f;
        --on-surface-variant: #4a454d;
        --outline: #7b757e;
        --outline-variant: #ccc4ce;

        /* Border Radius from Design System 1 */
        --radius-default: 0.125rem;
        --radius-lg: 0.25rem;
        --radius-xl: 0.5rem;
        --radius-full: 0.75rem;
        /* Following the theme's "full" which is 0.75rem */
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--background);
        color: var(--on-surface);
        overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h4,
    .font-headline {
        font-family: 'Manrope', sans-serif;
        font-weight: 800;
    }

    /* Navbar Styling */
    .navbar-freedom {
        background: rgba(253, 248, 253, 0.8);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid var(--outline-variant);
        height: 80px;
        z-index: 1050;
    }

    .navbar-brand {
        font-family: 'Manrope', sans-serif;
        font-weight: 900;
        letter-spacing: -1px;
        color: var(--primary) !important;
        text-transform: uppercase;
    }

    .nav-link {
        font-weight: 600;
        color: var(--on-surface-variant) !important;
        margin: 0 1rem;
        transition: color 0.3s ease;
        font-size: 0.9rem;
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--primary) !important;
    }

    .nav-link.active {
        border-bottom: 2px solid var(--secondary);
    }

    .search-container {
        background: var(--surface-container-high);
        border-radius: 50px;
        padding: 5px 15px;
        display: flex;
        align-items: center;
    }

    .search-container input {
        border: none;
        background: transparent;
        font-size: 0.85rem;
        outline: none;
        width: 140px;
        color: var(--on-surface);
    }

    /* Hero Mini */
    .hero-mini {
        padding: 40px 0 20px;
    }

    /* Step Indicators */
    .step-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 24px;
        height: 24px;
        background: var(--primary);
        color: white;
        border-radius: 4px;
        font-size: 0.75rem;
        margin-right: 8px;
        vertical-align: middle;
    }

    .tool-label {
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: var(--primary);
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
    }

    /* Product Cards */
    .product-card {
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        background: white;
        border: 2px solid transparent;
    }

    .product-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .product-card.active {
        border-color: var(--primary);
        background: var(--surface-container-low);
    }

    /* Color Swatches */
    .color-swatch {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 2px solid transparent;
        cursor: pointer;
        transition: transform 0.2s;
        position: relative;
    }

    .color-swatch:hover {
        transform: scale(1.1);
    }

    .color-swatch.active::after {
        content: "\f00c";
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 0.7rem;
        text-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
    }

    /* Visualizer */
    .visualizer-main {
        background: #e5e1e7;
        border-radius: 32px;
        position: relative;
        min-height: 700px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.02);
    }

    .visualizer-main img {
        max-width: 90%;
        max-height: 90%;
        object-fit: contain;
    }

    .design-area-indicator {
        position: absolute;
        width: 180px;
        height: 180px;
        border: 2px dashed rgba(152, 72, 0, 0.3);
        background: rgba(152, 72, 0, 0.03);
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        top: 40%;
    }

    .visualizer-controls {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border-radius: 50px;
        padding: 10px 25px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        display: flex;
        gap: 20px;
    }

    .visualizer-controls button {
        color: var(--primary);
        font-size: 1.1rem;
        transition: opacity 0.2s;
    }

    .visualizer-controls button:hover {
        opacity: 0.7;
    }

    /* Summary Panel */
    .summary-card {
        background: var(--primary);
        color: white;
        border-radius: 24px;
        padding: 2rem;
        position: sticky;
        top: 100px;
        box-shadow: 0 25px 50px -12px rgba(31, 10, 52, 0.25);
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        font-size: 0.85rem;
        margin-bottom: 0.75rem;
        opacity: 0.9;
    }

    .summary-total {
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        padding-top: 1.5rem;
        margin-top: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }

    .btn-add-cart-1 {
        background-color: var(--secondary) !important;
        color: white !important;
        border: none !important;
        padding: 1.15rem !important;
        border-radius: 8px !important;
        font-weight: 700 !important;
        width: 100% !important;
        margin-top: 2rem !important;
        transition: all 0.3s !important;
        text-transform: uppercase !important;
        letter-spacing: 1px !important;
    }

    .btn-add-cart-1:hover {
        background-color: #7a3a00 !important;
        transform: translateY(-2px) !important;
    }

    /* Upload Zone */
    .upload-zone {
        border: 2px dashed var(--outline-variant);
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        background: white;
    }

    .upload-zone:hover {
        border-color: var(--secondary);
        background: var(--surface-container-low);
    }

    /* Custom Scrollbar for tools */
    .tools-scroll {
        max-height: calc(100vh - 250px);
        overflow-y: auto;
        padding-right: 10px;
    }

    .tools-scroll::-webkit-scrollbar {
        width: 4px;
    }

    .tools-scroll::-webkit-scrollbar-track {
        background: transparent;
    }

    .tools-scroll::-webkit-scrollbar-thumb {
        background: var(--outline-variant);
        border-radius: 10px;
    }

    footer {
        background-color: var(--surface-container);
        padding: 80px 0 40px;
        margin-top: 100px;
    }

    .footer-logo {
        font-family: 'Manrope', sans-serif;
        font-weight: 900;
        font-size: 1.5rem;
        color: var(--primary);
    }

    /* Responsive wider container */
    @media (min-width: 1400px) {
        .container-custom {
            max-width: 1600px;
        }
    }
</style>

@section('content')
<!-- <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
<script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                "colors": {
                    "on-surface": "#1c1b1b",
                    "secondary-fixed-dim": "#c5c7c8",
                    "surface-tint": "#6c5582",
                    "tertiary-container": "#b5ac73",
                    "error-container": "#ffdad6",
                    "surface-dim": "#dcd9d9",
                    "outline-variant": "#ccc4ce",
                    "surface-bright": "#fcf9f8",
                    "secondary-fixed": "#e1e3e4",
                    "on-primary-container": "#a087b8",
                    "on-error-container": "#93000a",
                    "surface-container-highest": "#e5e2e1",
                    "surface": "#fcf9f8",
                    "on-tertiary-fixed-variant": "#4e4719",
                    "tertiary-fixed-dim": "#d1c88c",
                    "primary-fixed-dim": "#d8bcf0",
                    "inverse-on-surface": "#f3f0ef",
                    "primary": "#1f0a34",
                    "tertiary-fixed": "#eee4a6",
                    "on-error": "#ffffff",
                    "on-secondary": "#ffffff",
                    "error": "#ba1a1a",
                    "surface-container-high": "#eae7e7",
                    "on-primary": "#ffffff",
                    "secondary": "#5c5f60",
                    "on-secondary-fixed": "#191c1d",
                    "primary-fixed": "#f0dbff",
                    "on-tertiary-fixed": "#201c00",
                    "inverse-surface": "#313030",
                    "surface-container": "#f0eded",
                    "inverse-primary": "#d8bcf0",
                    "surface-container-low": "#f6f3f2",
                    "on-tertiary": "#ffffff",
                    "on-tertiary-container": "#464012",
                    "surface-container-lowest": "#ffffff",
                    "on-primary-fixed-variant": "#533d69",
                    "on-secondary-fixed-variant": "#454748",
                    "on-primary-fixed": "#26113b",
                    "on-secondary-container": "#626566",
                    "tertiary": "#665f2e",
                    "primary-container": "#35204a",
                    "on-background": "#1c1b1b",
                    "secondary-container": "#e1e3e4",
                    "on-surface-variant": "#4a454d",
                    "outline": "#7b757e",
                    "background": "#fcf9f8",
                    "surface-variant": "#e5e2e1"
                },
                "borderRadius": {
                    "DEFAULT": "1rem",
                    "lg": "2rem",
                    "xl": "3rem",
                    "full": "9999px"
                },
                "fontFamily": {
                    "headline": ["Plus Jakarta Sans"],
                    "body": ["Inter"],
                    "label": ["Inter"]
                }
            },
        },
    }
</script>


<main class="pt-28 min-h-screen px-4 md:px-8 max-w-[1600px] mx-auto pb-20">
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
     
        <aside class="lg:col-span-3 space-y-6">
            <div class="bg-surface-container-low p-6 rounded-lg shadow-sm">
                <h2 class="text-sm font-bold uppercase tracking-widest text-primary mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">tune</span> Herramientas de Diseño
                </h2>
              
                <div class="space-y-4 mb-8">
                    <label class="text-xs font-semibold uppercase text-on-surface-variant">Tipo de Prenda</label>
                    <div class="grid grid-cols-2 gap-3">
                        <button class="flex flex-col items-center justify-center p-4 bg-surface-container-lowest border-2 border-primary rounded-lg transition-all">
                            <span class="material-symbols-outlined text-3xl mb-2">apparel</span>
                            <span class="text-xs font-medium">Polo Premium</span>
                        </button>
                        <button class="flex flex-col items-center justify-center p-4 bg-surface-container-lowest border-2 border-transparent hover:border-outline-variant rounded-lg transition-all opacity-60">
                            <span class="material-symbols-outlined text-3xl mb-2">dry_cleaning</span>
                            <span class="text-xs font-medium">Polera / Hoodie</span>
                        </button>
                    </div>
                </div>
            
                <div class="space-y-4 mb-8">
                    <label class="text-xs font-semibold uppercase text-on-surface-variant">Color de Base</label>
                    <div class="flex flex-wrap gap-3">
                        <button class="w-8 h-8 rounded-full bg-white border border-outline-variant ring-2 ring-primary ring-offset-2"></button>
                        <button class="w-8 h-8 rounded-full bg-slate-900"></button>
                        <button class="w-8 h-8 rounded-full bg-blue-900"></button>
                        <button class="w-8 h-8 rounded-full bg-red-800"></button>
                        <button class="w-8 h-8 rounded-full bg-emerald-900"></button>
                        <button class="w-8 h-8 rounded-full bg-amber-400"></button>
                    </div>
                </div>
             
                <div class="space-y-4 mb-8">
                    <label class="text-xs font-semibold uppercase text-on-surface-variant">Arte &amp; Logotipos</label>
                    <div class="border-2 border-dashed border-outline-variant rounded-lg p-6 text-center hover:border-primary transition-colors cursor-pointer bg-surface-container-highest/30">
                        <span class="material-symbols-outlined text-4xl text-outline mb-2">upload_file</span>
                        <p class="text-xs text-on-surface-variant">Sube tu archivo PNG o JPG (Max 10MB)</p>
                    </div>
                </div>
               
                <div class="space-y-4">
                    <label class="text-xs font-semibold uppercase text-on-surface-variant">Añadir Texto</label>
                    <input class="w-full bg-surface-container-highest border-none rounded-md px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 transition-all outline-none" placeholder="Escribe aquí..." type="text" />
                    <div class="grid grid-cols-2 gap-2">
                        <select class="bg-surface-container-highest border-none rounded-md px-2 py-2 text-xs focus:ring-0">
                            <option>Plus Jakarta</option>
                            <option>Inter Bold</option>
                            <option>Serif Vintage</option>
                        </select>
                        <select class="bg-surface-container-highest border-none rounded-md px-2 py-2 text-xs focus:ring-0">
                            <option>24px</option>
                            <option>32px</option>
                            <option>48px</option>
                        </select>
                    </div>
                </div>
            </div>
           
            <div class="bg-primary-container text-on-primary rounded-lg p-6 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-sm font-bold mb-2">Sugerencia Pro</h3>
                    <p class="text-xs opacity-80 leading-relaxed">Usa imágenes con fondo transparente para un acabado profesional tipo serigrafía.</p>
                </div>
                <div class="absolute -right-4 -bottom-4 opacity-10">
                    <span class="material-symbols-outlined text-8xl" style="font-variation-settings: 'FILL' 1;">lightbulb</span>
                </div>
            </div>
        </aside>
      
        <main class="lg:col-span-6 flex flex-col gap-6">
            <div class="bg-surface-container-low rounded-lg p-8 relative flex flex-col items-center justify-center min-h-[600px] shadow-sm">
             
                <div class="absolute top-6 left-6 flex gap-2">
                    <button class="bg-surface-container-lowest px-4 py-2 rounded-full text-xs font-bold shadow-sm flex items-center gap-2 border border-primary/10">
                        <span class="material-symbols-outlined text-sm">front_hand</span> Frente
                    </button>
                    <button class="bg-white/50 px-4 py-2 rounded-full text-xs font-bold hover:bg-white transition-all flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">back_hand</span> Espalda
                    </button>
                </div>
             
                <div class="absolute top-6 right-6 flex flex-col gap-2">
                    <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-lg">zoom_in</span>
                    </button>
                    <button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-lg">restart_alt</span>
                    </button>
                </div>
             
                <div class="relative w-full max-w-md aspect-square bg-white rounded-xl shadow-2xl overflow-hidden group mt-5">

                    <div class="design-canvas-wrapper m-auto w-full">
                        <canvas id="canvas" width="400" height="450" class="w-full h-full"></canvas>
                    </div>
                
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-48 h-48 border-2 border-dashed border-primary/20 flex flex-col items-center justify-center text-primary/30">
                            <span class="material-symbols-outlined text-5xl mb-2">add_photo_alternate</span>
                            <span class="text-[10px] uppercase font-bold tracking-widest">Área de Diseño</span>
                        </div>
                    </div>
                </div>
              
                <div class="mt-8 flex items-center gap-4 bg-white/40 px-6 py-3 rounded-full backdrop-blur-sm">
                    <div class="flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant">Calidad de Impresión: Alta</span>
                    </div>
                    <div class="w-px h-4 bg-outline-variant"></div>
                    <span class="text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant">300 DPI</span>
                </div>
            </div>
   
            <div class="grid grid-cols-4 gap-4">
                <div class="aspect-square bg-surface-container-high rounded-lg overflow-hidden group cursor-pointer">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="urban style graphic t-shirt with aesthetic print on a model in a minimal studio setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrpG2FLujOEbP_SgzfdkdJRhzuNf6Baxm10o9dfIc5hMQXPUrIPWNIq9SMPZkHefdQuloiapVbALFM0SOefHgpF4Xn0j1JysyCSYhF-jLtNizAJa76VTC3P-bU2PYybvR60RTv196clYAuiWoa9dQDliAK-jaBsDNgX-DxHg5HkMdtrKbP9StfowEXcy0QuYijR7gAg-sY5nDjGoJ7WfPn97pexNynw20EkW2-O9VUx-28Xg4Ju2H0RCAh79nwbkLRd6_s0jtikfU" />
                </div>
                <div class="aspect-square bg-surface-container-high rounded-lg overflow-hidden group cursor-pointer">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="high fashion minimalist white t-shirt design mockup on a textured grey background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvTUss1IFXeAeJSsp8pBGtAZRzga7cD5rJpOQBhDm5xPw2uVg4ez5niPFoyU8BeAqwLNIJnFWbDmKgVbs9XJtSC3FiXJHuFYwTae_S4UJLdjEwwgcc2X95XU5Jun1fQm94fVsRyZzT7KI4bDkSv8Rz3nSUkH9wdO46KXEDBVSa1ARDroX9kL_gxrBExGnkyalKrt8euzV1dos3Owc1qJ22pHITjjieZuGc6tlFiuSMObRvKKPplpcqP3F6ySuCyiF5S1LtxnrxA2A" />
                </div>
                <div class="aspect-square bg-surface-container-high rounded-lg overflow-hidden group cursor-pointer">
                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="black premium cotton shirt with embroidered detail in soft dramatic lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuATOtpW3DVeNDpprihoVqUuH4iP2jmG0a4OCFDU10OrRyAImH6iFMw_3c-cmtMB5q7i5NpZYkXlZM_hQOv9N2WVXFjf22qclR5YI6XuLtolrPffzZLCMqrVKlxQsTa05KKsfP8w59BhZu5WiBUvRuEIglTs-lX-OakHu36zp0TcbsrxtzyFlKITLzoGPFPf6UANpPXDwBqt8N3zbSuQYdqag-7ecOtDA5LSJcKfkwZ1d2YRzpZqS5DRxHfaxPI69rasmmWmNl7Nu9I" />
                </div>
                <div class="aspect-square bg-surface-container-high rounded-lg flex items-center justify-center border-2 border-dashed border-outline-variant hover:border-primary transition-all cursor-pointer">
                    <span class="material-symbols-outlined text-outline">add</span>
                </div>
            </div>
        </main>
   
        <aside class="lg:col-span-3 space-y-6">
            <div class="bg-surface-container-low p-6 rounded-lg shadow-sm border border-transparent">
                <h2 class="text-sm font-bold uppercase tracking-widest text-primary mb-6 flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">shopping_basket</span> Finalizar Pedido
                </h2>
             
                <div class="space-y-4 mb-8">
                    <div class="flex justify-between items-center">
                        <label class="text-xs font-semibold uppercase text-on-surface-variant">Talla</label>
                        <button class="text-[10px] uppercase font-bold text-primary underline underline-offset-4">Guía de tallas</button>
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        <button class="h-10 flex items-center justify-center rounded-md bg-white border border-outline-variant text-xs font-bold hover:bg-primary hover:text-white transition-all">S</button>
                        <button class="h-10 flex items-center justify-center rounded-md bg-primary text-white text-xs font-bold ring-2 ring-primary ring-offset-2">M</button>
                        <button class="h-10 flex items-center justify-center rounded-md bg-white border border-outline-variant text-xs font-bold hover:bg-primary hover:text-white transition-all">L</button>
                        <button class="h-10 flex items-center justify-center rounded-md bg-white border border-outline-variant text-xs font-bold hover:bg-primary hover:text-white transition-all">XL</button>
                    </div>
                </div>
              
                <div class="space-y-4 mb-8">
                    <label class="text-xs font-semibold uppercase text-on-surface-variant">Cantidad</label>
                    <div class="flex items-center justify-between bg-surface-container-highest rounded-md p-1">
                        <button class="w-10 h-10 flex items-center justify-center hover:bg-white rounded-md transition-all">
                            <span class="material-symbols-outlined">remove</span>
                        </button>
                        <span class="font-bold text-sm">1</span>
                        <button class="w-10 h-10 flex items-center justify-center hover:bg-white rounded-md transition-all">
                            <span class="material-symbols-outlined">add</span>
                        </button>
                    </div>
                </div>
            
                <div class="border-t border-outline-variant pt-6 space-y-3 mb-8">
                    <div class="flex justify-between items-center text-on-surface-variant">
                        <span class="text-sm">Prenda base</span>
                        <span class="text-sm font-medium">S/ 45.00</span>
                    </div>
                    <div class="flex justify-between items-center text-on-surface-variant">
                        <span class="text-sm">Personalización</span>
                        <span class="text-sm font-medium">S/ 15.00</span>
                    </div>
                    <div class="flex justify-between items-center pt-3">
                        <span class="text-base font-bold text-primary">Total Estimado</span>
                        <span class="text-xl font-black text-primary">S/ 60.00</span>
                    </div>
                </div>
          
                <button class="w-full bg-primary-container text-white py-3 rounded-xl font-bold uppercase tracking-widest flex items-center justify-center gap-3 shadow-lg hover:shadow-primary/20 transition-all scale-100 active:scale-95 group">
                    <span>Añadir al Carrito</span>
                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
                <p class="text-[10px] text-center text-on-surface-variant mt-4 leading-relaxed px-4">
                    Envío estimado en <span class="font-bold">3 a 5 días hábiles</span> dentro de Lima Metropolitana.
                </p>
            </div>
       
            <div class="space-y-4">
                <div class="flex items-start gap-4 p-4 bg-emerald-50 rounded-lg">
                    <span class="material-symbols-outlined text-emerald-600">verified</span>
                    <div>
                        <h4 class="text-xs font-bold text-emerald-900 mb-1">Garantía de Satisfacción</h4>
                        <p class="text-[10px] text-emerald-700">Revisamos manualmente cada diseño antes de imprimir para asegurar la mejor calidad.</p>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main> -->

<!-- <div class="design-page" style="padding-top: 100px;">

    <div class="container">

        <div class="design-grid">


            <div class="design-sidebar">

                <h3 class="sidebar-title">Personaliza tu Polo</h3>

              
                <div class="tool-group">
                    <label>Vista</label>
                    <div class="view-selector">
                        <button class="view-btn active" data-view="frontal">Frontal</button>
                        <button class="view-btn" data-view="trasera">Trasera</button>
                        <button class="view-btn" data-view="manga_izquierda">Manga Izq.</button>
                        <button class="view-btn" data-view="manga_derecha">Manga Der.</button>
                    </div>
                </div>

                
                <div class="tool-group">
                    <label>Color del Polo</label>
                    <input type="color" id="colorPicker" value="#ffffff">
                </div>

               
                <div class="tool-group">
                    <label>Agregar Texto</label>
                    <button id="addText" class="btn-tool">Agregar Texto</button>
                </div>

             
                <div class="tool-group">
                    <label>Subir Imagen</label>
                    <input type="file" id="uploadImage" class="file-input">
                </div>

                <button id="saveDesign" class="btn-save">Guardar Diseño</button>

            </div>

          
            <div class="design-canvas-wrapper m-auto">
                    <canvas id="designCanvas" width="450" height="550"></canvas>
            </div>

        </div>

    </div>

</div> -->




<!-- Page Header -->
<section class="hero-mini">
    <div class="container-fluid px-lg-5 container-custom">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <p class="text-secondary fw-bold text-uppercase small mb-2 ls-2">El Atelier Digital</p>
                <h1 class="display-5 text-primary mb-0">Diseña tu Libertad</h1>
            </div>
            <div class="col-lg-6 text-lg-end d-none d-lg-block">
                <p class="text-muted mb-0 small">Configuración profesional / Visualización en tiempo real</p>
            </div>
        </div>
        <hr class="mt-4 mb-0 opacity-10" />
    </div>
</section>
<!-- Customizer Workspace -->
<section class="container-fluid px-lg-5 py-4 container-custom">
    <div class="row g-4">
        <!-- 1. LEFT PANEL: TOOLS (STEPS) -->
        <div class="col-xl-3 col-lg-4">
            <div class="">
                <!-- STEP 1: PRENDA -->
                <div class="mb-5">
                    <label class="tool-label"><span class="step-number">1</span> Selección de Prenda</label>
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="product-card active p-3 text-center rounded-3 border-2">
                                <i class="fa-solid fa-shirt fs-4 mb-2 text-primary"></i>
                                <p class="small fw-bold mb-0 text-primary">Polo Premium</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="product-card p-3 text-center rounded-3 border-2">
                                <i class="fa-solid fa-vest fs-4 mb-2 text-muted"></i>
                                <p class="small fw-bold mb-0 text-muted">Hoodie Pro</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="product-card p-3 text-center rounded-3 border-2">
                                <i class="fa-solid fa-hat-cowboy fs-4 mb-2 text-muted"></i>
                                <p class="small fw-bold mb-0 text-muted">Gorra (Cap)</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="product-card p-3 text-center rounded-3 border-2">
                                <i class="fa-solid fa-bottle-water fs-4 mb-2 text-muted"></i>
                                <p class="small fw-bold mb-0 text-muted">Thermo</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- STEP 2: COLOR -->
                <div class="mb-5">
                    <label class="tool-label"><span class="step-number">2</span> Color de Base</label>
                    <div class="d-flex flex-wrap gap-3 p-3 bg-white rounded-3 shadow-sm border border-light">
                        <div class="color-swatch active" style="background: #1f0a34;" title="Night Purple"></div>
                        <div class="color-swatch" style="background: #ffffff; border: 1px solid #ddd;" title="Clean White"></div>
                        <div class="color-swatch" style="background: #1c1b1f;" title="Carbon Black"></div>
                        <div class="color-swatch" style="background: #665f2e;" title="Olive Drab"></div>
                        <div class="color-swatch" style="background: #984800;" title="Amber Sunset"></div>
                        <div class="color-swatch" style="background: #ebe7ec;" title="Stone Grey"></div>
                    </div>
                </div>
                <!-- STEP 3: DISEÑO -->
                <div class="mb-5">
                    <label class="tool-label"><span class="step-number">3</span> Diseño Personalizado</label>
                    <div class="mb-3">
                        <p class="small fw-bold text-muted mb-2">Imagen / Logo</p>
                        <div class="upload-zone shadow-sm">
                            <i class="fa-solid fa-cloud-arrow-up fs-4 text-muted mb-2"></i>
                            <p class="small text-muted mb-0 fw-medium">Arrastra o sube tu archivo (.PNG, .AI)</p>
                        </div>
                    </div>
                    <div>
                        <p class="small fw-bold text-muted mb-2">Texto del Bordado</p>
                        <input class="form-control border-light-subtle bg-white p-3 rounded-2 shadow-sm mb-2" placeholder="Escribe aquí tu texto..." type="text" />
                        <div class="row g-2">
                            <div class="col-7">
                                <select class="form-select border-light-subtle bg-white shadow-sm font-label">
                                    <option>Manrope Bold</option>
                                    <option>Inter Regular</option>
                                    <option>Modern Serif</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <select class="form-select border-light-subtle bg-white shadow-sm font-label">
                                    <option>24px</option>
                                    <option>32px</option>
                                    <option>48px</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- STEP 4: TALLA Y CANTIDAD -->
                <div class="mb-5">
                    <label class="tool-label"><span class="step-number">4</span> Talla y Cantidad</label>
                    <div class="row g-3">
                        <div class="col-7">
                            <select class="form-select border-light-subtle p-2 px-3 fw-bold">
                                <option>Talla Media (M)</option>
                                <option>Talla Grande (L)</option>
                                <option>Extra Grande (XL)</option>
                                <option>Pequeña (S)</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <div class="input-group">
                                <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                <input class="form-control text-center p-2 fw-bold" type="text" value="1" />
                                <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 2. CENTER PANEL: VISUALIZER -->
        <div class="col-xl-6 col-lg-8">
            <div class="visualizer-main shadow-lg position-relative overflow-hidden">

                <!-- BOTONES VISTA -->
                <div class="position-absolute top-0 start-0 p-3 z-3 d-flex gap-2">

                    <button class="btn btn-light rounded-pill shadow-sm px-3 py-2 fw-bold btn-view active"
                        data-view="frontal">
                        <i class="fa-solid fa-shirt me-1"></i> Frente
                    </button>

                    <button class="btn btn-light rounded-pill shadow-sm px-3 py-2 fw-bold btn-view"
                        data-view="trasera">
                        <i class="fa-solid fa-rotate me-1"></i> Espalda
                    </button>

                </div>

                <!-- CONTROLES -->
                <div class="visualizer-controls z-3">

                    <button class="btn btn-link p-0 btn-zoom-in">
                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                    </button>

                    <button class="btn btn-link p-0 btn-reset">
                        <i class="fa-solid fa-arrows-rotate"></i>
                    </button>

                </div>

                <!-- CANVAS -->
                <div class="canvas-container-custom">

                    <canvas id="canvas" width="500" height="600"></canvas>

                    <!-- GUIA -->
                    <div class="design-guide">
                        <span>Área de Impresión</span>
                    </div>

                </div>

            </div>
            <!-- Thumbnails -->
            <div class="row mt-4 g-3 justify-content-center">
                <div class="col-2">
                    <img alt="Front" class="img-fluid rounded-3 border border-secondary shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAFhay53JEA-FZgagSUgYkAtveg1-g1AATTvHpDOkwbh4-MdTKmGWN5bOcR6_vZiYh5RTQ7NRzkow7Lyh3L7JxurDJ7pIYEUkv9UzfzX-OmnAw2cfrUqlc369QonV-Z-5zERxD69sOkaSSXXhEMbq1fP2FdpTIVGthgxaeYpDuI_c4DTLLmCwi_pyysvfoHogjVfIeyFaY0jU5Tsyg_6S3iR1T5R6qeJyd8PIJ6MZacqLW8R7MkuhERQENIkchFKpcqCWHOOyTcEg" />
                </div>
                <div class="col-2 opacity-50">
                    <img alt="Back" class="img-fluid rounded-3 shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAXaLerMBsgqp_eY0wqWqSPeqg7nlR4u6ZpbkgH69MT5YBOroNTmNPV94R_ka48AtGxHViPH3t9lIVeE2Moyenqt15vHOzyIkXzm1SfCciZp4d3ODl1EaoqT_gpqSm2WB1qW4A0hHDqleCJ1f7Adq2HNZi4f1d0oiIw5QYdvjn13k0Ozc1ScB9FNBAHtdqL5DHs01hPoWDE5KCDtwea1joRGs-9ayZufPDlfUM8alE3E2gqSTeppZXA2-lalUBkZcItGcZ5HaNGRA" />
                </div>
                <div class="col-2 opacity-50">
                    <img alt="Detail" class="img-fluid rounded-3 shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAmgf2Cmr14JMtgl1ALPmv9_eXzhyQRK7GISM3RaitCrErvtQdHSG3hc8PZ6vg6lvJelg-ybIAtz28oWL2WE3mg_i1hbRUYJ4Rnl-aPn_tEmHQYsCPIVMytJHCPD4IlckI0zfj7kaCIsHT3DCBW45azwa1r7iaA1lPfXqFrS3-ztHRkfjLKBcdJB90lVYHbSovkivjFNScSp9NUBhKRZ6PJvd_pxpDPq7kxEjklHlruTZZygSpIxIe9tnl3ro9gITr5G9qVmCjfTw" />
                </div>
                <div class="col-2 opacity-50">
                    <img alt="Texture" class="img-fluid rounded-3 shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2wfwrzXrv-hD38oHWc-QmewY0JMLgOYCk8mGhU4pPY6AyKMP1ap08YRBsllVxyHWTUPGdEQceAU6h6POZ9yX2GixR1LL2G9LSD_gcUeBvIaKdmHIEGe8SKM1BLj9wiB63l2tdWzt575ScEhzBR4W8irCl0BXQRm_j7JVPawOpwlUV156F7g7JhonQwPYT_nR-mh6Fs0g3wL3Z0hiH06zIvkiWp9XRLI-kz_zEzmXvDhWTYTzq-h4NpFk6aD1C0a98Fu6RSqhq7A" />
                </div>
            </div>
        </div>
        <!-- 3. RIGHT PANEL: SUMMARY -->
        <div class="col-xl-3 col-lg-12">
            <div class="summary-card">
                <h4 class="h5 mb-4 text-white">Resumen de Configuración</h4>
                <div class="summary-item">
                    <span>Prenda:</span>
                    <span class="fw-bold">Polo Premium Bespoke</span>
                </div>
                <div class="summary-item">
                    <span>Color:</span>
                    <span class="fw-bold">Night Purple</span>
                </div>
                <div class="summary-item">
                    <span>Talla:</span>
                    <span class="fw-bold">Media (M)</span>
                </div>
                <div class="summary-item">
                    <span>Cantidad:</span>
                    <span class="fw-bold">1 unidad</span>
                </div>
                <div class="summary-item">
                    <span>Personalización:</span>
                    <span class="fw-bold">Logo Frontal</span>
                </div>
                <div class="summary-total">
                    <div class="d-flex flex-column">
                        <span class="small text-uppercase fw-bold ls-1 opacity-70">Total Estimado</span>
                        <span class="h2 mb-0 font-headline">$124.00</span>
                    </div>
                </div>
                <button class="btn btn-add-cart-1">
                    <i class="fa-solid fa-cart-plus me-2"></i> AGREGAR AL CARRITO
                </button>
                <p class="text-center small mt-4 opacity-50" style="font-size: 0.75rem;">
                    Entrega estimada: 5-7 días hábiles. Incluye certificado de autenticidad.
                </p>
                <div class="mt-5 pt-4 border-top border-white border-opacity-10">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-shield-halved text-secondary me-3 fs-5"></i>
                        <div>
                            <p class="small fw-bold mb-0 text-uppercase">Garantía Freedom</p>
                            <p class="small mb-0 opacity-70">Algodón Pima 100% Certificado</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-truck-fast text-secondary me-3 fs-5"></i>
                        <div>
                            <p class="small fw-bold mb-0 text-uppercase">Envío Premium</p>
                            <p class="small mb-0 opacity-70">Seguimiento global en tiempo real</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const canvas = new fabric.Canvas('canvas', {
            preserveObjectStacking: true
        });

        let currentView = 'frontal';
        let currentShirt = null;
        let currentColor = '#1f0a34';

        let zoom = 1;

        let designs = {
            frontal: null,
            trasera: null
        };

        /*
        |--------------------------------------------------------------------------
        | CARGAR MOCKUP
        |--------------------------------------------------------------------------
        */

        function loadShirt(view) {

            canvas.clear();

            const imagePath = "{{ asset('images') }}/polo_base_" + view + ".png";

            fabric.Image.fromURL(imagePath, function(img) {

                img.set({
                    left: 0,
                    top: 0,
                    selectable: false,
                    evented: false,
                    excludeFromExport: true
                });

                img.scaleToWidth(500);

                if (currentColor) {

                    img.filters = [
                        new fabric.Image.filters.BlendColor({
                            color: currentColor,
                            mode: 'multiply',
                            alpha: 1
                        })
                    ];

                    img.applyFilters();
                }

                canvas.add(img);

                canvas.sendToBack(img);

                currentShirt = img;

                if (designs[view]) {

                    canvas.loadFromJSON(designs[view], () => {

                        canvas.renderAll();

                        canvas.sendToBack(currentShirt);

                    });

                } else {

                    canvas.renderAll();

                }

            });

        }

        loadShirt(currentView);

        /*
        |--------------------------------------------------------------------------
        | CAMBIO VISTAS
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll('.btn-view').forEach(btn => {

            btn.addEventListener('click', function() {

                document.querySelectorAll('.btn-view')
                    .forEach(b => b.classList.remove('active'));

                this.classList.add('active');

                designs[currentView] = canvas.toJSON();

                currentView = this.dataset.view;

                loadShirt(currentView);

            });

        });

        /*
        |--------------------------------------------------------------------------
        | CAMBIO COLOR
        |--------------------------------------------------------------------------
        */

        document.querySelectorAll('.color-swatch').forEach(btn => {

            btn.addEventListener('click', function() {

                document.querySelectorAll('.color-swatch')
                    .forEach(b => b.classList.remove('active'));

                this.classList.add('active');

                currentColor = window.getComputedStyle(this)
                    .backgroundColor;

                if (!currentShirt) return;

                currentShirt.filters = [
                    new fabric.Image.filters.BlendColor({
                        color: currentColor,
                        mode: 'multiply',
                        alpha: 1
                    })
                ];

                currentShirt.applyFilters();

                canvas.renderAll();

            });

        });

        /*
        |--------------------------------------------------------------------------
        | SUBIR IMAGEN
        |--------------------------------------------------------------------------
        */

        const uploadZone = document.querySelector('.upload-zone');

        const inputFile = document.createElement('input');

        inputFile.type = 'file';
        inputFile.hidden = true;

        uploadZone.appendChild(inputFile);

        uploadZone.addEventListener('click', () => {

            inputFile.click();

        });

        inputFile.addEventListener('change', function(e) {

            const file = e.target.files[0];

            if (!file) return;

            const reader = new FileReader();

            reader.onload = function(event) {

                fabric.Image.fromURL(event.target.result, function(img) {

                    img.scaleToWidth(180);

                    canvas.add(img);

                    canvas.centerObject(img);

                    canvas.setActiveObject(img);

                });

            };

            reader.readAsDataURL(file);

        });

        /*
        |--------------------------------------------------------------------------
        | TEXTO
        |--------------------------------------------------------------------------
        */

        const textInput = document.querySelector(
            'input[placeholder="Escribe aquí tu texto..."]'
        );

        textInput.addEventListener('keydown', function(e) {

            if (e.key === 'Enter') {

                const textbox = new fabric.IText(this.value || 'Texto', {
                    left: 150,
                    top: 180,
                    fontSize: 32,
                    fill: '#000'
                });

                canvas.add(textbox);

                canvas.setActiveObject(textbox);

                canvas.renderAll();

                this.value = '';

            }

        });

        /*
        |--------------------------------------------------------------------------
        | FUENTE Y TAMAÑO
        |--------------------------------------------------------------------------
        */

        const selects = document.querySelectorAll('.font-label');

        selects[0].addEventListener('change', function() {

            const active = canvas.getActiveObject();

            if (active && active.type === 'i-text') {

                active.fontFamily = this.value;

                canvas.renderAll();

            }

        });

        selects[1].addEventListener('change', function() {

            const active = canvas.getActiveObject();

            if (active && active.type === 'i-text') {

                active.fontSize = parseInt(this.value);

                canvas.renderAll();

            }

        });

        /*
        |--------------------------------------------------------------------------
        | ZOOM
        |--------------------------------------------------------------------------
        */

        document.querySelector('.btn-zoom-in')
            .addEventListener('click', () => {

                zoom += 0.1;

                canvas.setZoom(zoom);

            });

        document.querySelector('.btn-reset')
            .addEventListener('click', () => {

                zoom = 1;

                canvas.setZoom(1);

                canvas.renderAll();

            });

        /*
        

        /*
        |--------------------------------------------------------------------------
        | DELETE OBJECT
        |--------------------------------------------------------------------------
        */

        document.addEventListener('keydown', function(e) {

            if (e.key === 'Delete') {

                const active = canvas.getActiveObject();

                if (active) {

                    canvas.remove(active);

                }

            }

        });

    });
</script>


@endpush

@endsection
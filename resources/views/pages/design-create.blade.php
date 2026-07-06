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
        /* padding: 80px 0 40px; */
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

    .design-item{

        position:relative;

        border-radius:12px;

        overflow:hidden;

        cursor:pointer;

        transition:.3s;

    }

    .design-item:hover{

        transform:translateY(-3px);

    }

    .design-item img{

        width:100%;

        /* height:90px; */

        object-fit:cover;

    }

    .remove-design{

        position:absolute;

        top:6px;

        right:6px;

        width:28px;

        height:28px;

        border-radius:50%;

        border:none;

        background:#dc3545;

        color:#fff;

    }

    #summaryTotal{

        color:#ffc107;

        font-size:2rem;

        font-weight:800;

    }


    .price-badge{

        position:absolute;

        background:#1f0a34;

        color:white;

        padding:8px 12px;

        border-radius:10px;

        box-shadow:0 8px 20px rgba(0,0,0,.25);

        pointer-events:none;

        z-index:999;

        min-width:120px;

        text-align:center;

        transition:.15s;

    }

    .price-badge small{

        color:#ffc107;

        font-weight:bold;

        display:block;

    }

    .price-badge.d-none{

        display:none;

    }
</style>

@section('content')

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
                            <div class="product-card active p-3 text-center rounded-3 border-2" data-garment="polo">
                                <i class="fa-solid fa-shirt fs-4 mb-2 text-primary"></i>
                                <p class="small fw-bold mb-0 text-primary">Polo</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="product-card p-3 text-center rounded-3 border-2" data-garment="polera">
                                <i class="fa-solid fa-vest fs-4 mb-2 text-muted"></i>
                                <p class="small fw-bold mb-0 text-muted">Polera</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="product-card p-3 text-center rounded-3 border-2">
                                <i class="fa-solid fa-hat-cowboy fs-4 mb-2 text-muted"></i>
                                <p class="small fw-bold mb-0 text-muted">Gorra</p>
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
                        @foreach($colors as $key => $color)
                            <div class="color-swatch {{ $key == 0 ? 'active' : '' }}" style="background: {{ $color->hex_code }}; border: 1px solid #ddd;" title="{{ $color->name }}" data-color-id="{{ $color->id }}" data-color-hex="{{ $color->hex_code }}"></div>
                        @endforeach
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
                            <div class="row g-2 mt-2">
                                <div class="col-12">
                                    <label class="small fw-bold text-muted mb-1">
                                        Color del texto
                                    </label>

                                    <input type="color"
                                        id="textColor"
                                        class="form-control form-control-color w-100"
                                        value="#000000"
                                        title="Color del texto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- STEP 4: TALLA Y CANTIDAD -->
                <div class="mb-5">
                    <label class="tool-label"><span class="step-number">4</span> Talla y Cantidad</label>
                    <div class="row g-3">
                        <div class="col-7">
                            <select
                                id="size"
                                class="form-select border-light-subtle p-2 px-3 fw-bold">

                                <option value="S">Pequeña (S)</option>
                                <option value="M" selected>Media (M)</option>
                                <option value="L">Grande (L)</option>
                                <option value="XL">Extra Grande (XL)</option>

                            </select>
                        </div>
                        <div class="col-5">
                            <div class="input-group">
                                <button
                                    id="btnMinus"
                                    class="btn btn-outline-secondary btn-sm"
                                    type="button">
                                    -
                                </button>

                                <input
                                    id="quantity"
                                    class="form-control text-center p-2 fw-bold"
                                    type="number"
                                    min="1"
                                    value="1">

                                <button
                                    id="btnPlus"
                                    class="btn btn-outline-secondary btn-sm"
                                    type="button">
                                    +
                                </button>
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
                 <div class="position-absolute top-0 start-0 p-3 z-3 d-flex flex-wrap gap-2">

                    <button class="btn btn-light rounded-pill shadow-sm px-3 py-2 fw-bold btn-view active"
                        data-view="frontal">
                        <i class="fa-solid fa-shirt me-1"></i>
                        Frente
                    </button>

                    <button class="btn btn-light rounded-pill shadow-sm px-3 py-2 fw-bold btn-view"
                        data-view="trasera">
                        <i class="fa-solid fa-rotate me-1"></i>
                        Espalda
                    </button>

                    <button class="btn btn-light rounded-pill shadow-sm px-3 py-2 fw-bold btn-view"
                        data-view="manga_derecha">
                        <i class="fa-solid fa-arrow-right me-1"></i>
                        Manga Der.
                    </button>

                    <button class="btn btn-light rounded-pill shadow-sm px-3 py-2 fw-bold btn-view"
                        data-view="manga_izquierda">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Manga Izq.
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
                <div class="canvas-container-custom position-absolute">

                    <canvas id="canvas" width="500" height="600" class="pt-5"></canvas>

                    <div id="priceBadge" class="price-badge d-none">
                        <div class="fw-bold"></div>
                        <small></small>
                    </div>

                    <!-- GUIA -->
                    <div class="design-guide">
                        <span>Área de Impresión</span>
                    </div>

                </div>

            </div>
            <!-- Thumbnails -->
             <div class="mt-4">
                <h6 class="fw-bold mb-3">
                    Elementos del diseño
                </h6>

                <div id="designGallery" class="row g-3">

                </div>
            </div>
        </div>
        <!-- 3. RIGHT PANEL: SUMMARY -->
        <div class="col-xl-3 col-lg-12">
            <div class="summary-card">
                <h4 class="h5 mb-4 text-white">Resumen de Configuración</h4>
                <div class="summary-item">
                    <span>Prenda base</span>
                    <span class="fw-bold" id="summaryGarment">
                        Polo
                    </span>
                </div>
                <div id="summaryDetails" class="mb-4">

                </div>

                <div class="summary-total">
                    <div class="d-flex flex-column">
                        <span class="small text-uppercase fw-bold ls-1 opacity-70">Total Estimado</span>
                        <span class="h2 mb-0 font-headline" id="summaryTotal">
                            S/25.00
                        </span>
                    </div>
                </div>
                <button id="btnAddCart" class="btn btn-add-cart-1">
                    <i class="fa-solid fa-cart-plus me-2"></i>
                    AGREGAR AL CARRITO
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const canvas = new fabric.Canvas('canvas', {
            preserveObjectStacking: true
        });

        const PRICE_RULES = {

            garments: {

                polo: 25,

                polera: 75

            },

            front_back: {

                text: 4,

                small: 3.5,

                medium: 6,

                large: 10

            },

            sleeve: {

                text: 4,

                small: 2,

                large: 4

            }

        };

        const PRINT_AREAS = {

            frontal: {
                width: 220,
                height: 260
            },

            trasera: {
                width: 220,
                height: 260
            },

            manga_derecha: {
                width: 100,
                height: 120
            },

            manga_izquierda: {
                width: 100,
                height: 120
            }

        };

        canvas.on('object:added', autoSave);

        canvas.on('object:modified', autoSave);

        canvas.on('object:removed', autoSave);

        canvas.on('text:changed', autoSave);



        canvas.on('selection:created', updatePriceBadge);

        canvas.on('selection:updated', updatePriceBadge);

        canvas.on('selection:cleared', function(){

            document.getElementById('priceBadge')
                .classList.add('d-none');

        });

        canvas.on('object:modified', updatePriceBadge);

        canvas.on('object:scaling', updatePriceBadge);

        canvas.on('object:moving', updatePriceBadge);

        const project = {

            currentGarment: 'polo',

            currentView: 'frontal',

            currentColor: null,

            currentColorId: null,

            zoom: 1,

            mockup: null,

            views:{

                frontal:{
                    json:null,
                    preview:null,
                    gallery:[],

                    images:[],     // Información de cada imagen para calcular precios
                    hasText:false  // ¿Existe al menos un texto?
                },

                trasera:{
                    json:null,
                    preview:null,
                    gallery:[],

                    images:[],
                    hasText:false
                },

                manga_derecha:{
                    json:null,
                    preview:null,
                    gallery:[],

                    images:[],
                    hasText:false
                },

                manga_izquierda:{
                    json:null,
                    preview:null,
                    gallery:[],

                    images:[],
                    hasText:false
                }

            }

        };

        const firstColor = document.querySelector('.color-swatch.active');

        project.currentColor = firstColor.dataset.colorHex;

        project.currentColorId = parseInt(firstColor.dataset.colorId);

        let loadingCanvas = false;

        function saveCurrentDesign() {

            project.views[project.currentView].json =
                canvas.toJSON([
                    'customId'
                ]);

            
        }

        function getProject() {

            return {

                garment: project.currentGarment,

                color: project.currentColor,

                frontal: project.views.frontal.json,

                trasera: project.views.trasera.json,

                manga_derecha: project.views.manga_derecha.json,

                manga_izquierda: project.views.manga_izquierda.json

            };

        }

        function getPreview() {

            return canvas.toDataURL({

                format:'png',

                multiplier:2

            });

        }

        function autoSave() {

            if (loadingCanvas) return;

            updateViewInfo();

            actualizarResumen();

            project.views[project.currentView].json = canvas.toJSON(['customId']);

            project.views[project.currentView].preview = canvas.toDataURL({
                format: 'png',
                multiplier: 2
            });

        }

        
        function renderGallery() {

            const gallery = document.getElementById('designGallery');

            gallery.innerHTML = '';

            canvas.getObjects().forEach(obj => {

                if (obj.excludeFromExport) return;

                const col = document.createElement('div');

                col.className = 'col-3';

                let preview = '';

                if (obj.type === 'image') {

                    preview = obj._element.src;

                } else {

                    preview = null;

                }

                col.innerHTML = `
                    <div class="design-item bg-white border">

                        <button class="remove-design">

                            <i class="fa fa-times"></i>

                        </button>

                        ${
                            preview
                            ? `<img src="${preview}">`
                            : `<div class="p-3 fw-bold text-center">${obj.text}</div>`
                        }

                    </div>
                `;

                gallery.appendChild(col);

                // seleccionar

                col.onclick = function () {

                    canvas.setActiveObject(obj);

                    canvas.renderAll();

                };

                // eliminar

                col.querySelector('.remove-design').onclick = function(e){

                    e.stopPropagation();

                    canvas.remove(obj);

                    renderGallery();

                    saveCurrentDesign();

                    canvas.renderAll();

                };

            });

        }

        function updateViewInfo() {

            const view = project.views[project.currentView];

            // Reiniciar información
            view.images = [];
            view.hasText = false;

            canvas.getObjects().forEach(obj => {

                // Ignorar el mockup
                if (obj.excludeFromExport) return;

                /*
                |--------------------------------------------------------------------------
                | IMÁGENES
                |--------------------------------------------------------------------------
                */
                if (obj.type === 'image') {

                    const percentage = getImagePercentage(obj);

                    let size = '';

                    if (
                        project.currentView === 'manga_derecha' ||
                        project.currentView === 'manga_izquierda'
                    ) {

                        size = percentage <= 35
                            ? 'small'
                            : 'large';

                    } else {

                        if (percentage <= 20) {

                            size = 'small';

                        } else if (percentage <= 50) {

                            size = 'medium';

                        } else {

                            size = 'large';

                        }

                    }

                    view.images.push({

                        id: obj.customId,

                        size: size

                    });

                }

                /*
                |--------------------------------------------------------------------------
                | TEXTO
                |--------------------------------------------------------------------------
                */
                if (obj.type === 'i-text') {

                    view.hasText = true;

                }

            });

            console.log(project.views[project.currentView]);

        }

        function calcularPrecioVista(viewName) {

            const view = project.views[viewName];

            const isSleeve =
                viewName === 'manga_derecha' ||
                viewName === 'manga_izquierda';

            let subtotal = 0;

            const detalle = [];

            /*
            |--------------------------------------------------------------------------
            | IMÁGENES
            |--------------------------------------------------------------------------
            */

            view.images.forEach(img => {

                let precio = 0;

                if (isSleeve) {

                    precio = PRICE_RULES.sleeve[img.size];

                } else {

                    precio = PRICE_RULES.front_back[img.size];

                }

                subtotal += precio;

                detalle.push({

                    tipo: 'Imagen',

                    tamaño: img.size,

                    precio: precio

                });

            });

            /*
            |--------------------------------------------------------------------------
            | TEXTO
            |--------------------------------------------------------------------------
            */

            if (view.hasText) {

                if (view.images.length > 0) {

                    detalle.push({

                        tipo: 'Texto',

                        precio: 0,

                        gratis: true

                    });

                } else {

                    const precio = isSleeve
                        ? PRICE_RULES.sleeve.text
                        : PRICE_RULES.front_back.text;

                    subtotal += precio;

                    detalle.push({

                        tipo: 'Texto',

                        precio: precio,

                        gratis: false

                    });

                }

            }

            return {

                subtotal,

                detalle

            };

        }

        function getImagePrice(size, isSleeve){

            if(isSleeve){

                return PRICE_RULES.sleeve[size];

            }

            return PRICE_RULES.front_back[size];

        }

        function updatePriceBadge(){

            const badge = document.getElementById('priceBadge');

            const active = canvas.getActiveObject();

            if(!active || active.type !== 'image'){

                badge.classList.add('d-none');

                return;

            }

            const percentage = getImagePercentage(active);

            let size='';

            let isSleeve =
                project.currentView==='manga_derecha' ||
                project.currentView==='manga_izquierda';

            if(isSleeve){

                size = percentage<=35
                    ? 'small'
                    : 'large';

            }else{

                if(percentage<=20){

                    size='small';

                }else if(percentage<=50){

                    size='medium';

                }else{

                    size='large';

                }

            }

            const names={

                small:'Pequeña',

                medium:'Mediana',

                large:'Grande'

            };

            const price=getImagePrice(size,isSleeve);

            badge.querySelector('.fw-bold').innerHTML=
                '🖼 Imagen '+names[size];

            badge.querySelector('small').innerHTML=
                '+ S/'+price.toFixed(2);

            badge.style.left=(active.left+active.getScaledWidth()+20)+'px';

            badge.style.top=(active.top)+'px';

            badge.classList.remove('d-none');

        }

        function calcularPrecioProyecto() {

            const frontal = calcularPrecioVista('frontal');

            const trasera = calcularPrecioVista('trasera');

            const mangaDerecha = calcularPrecioVista('manga_derecha');

            const mangaIzquierda = calcularPrecioVista('manga_izquierda');

            const base = PRICE_RULES.garments[project.currentGarment];

            return {

                base,

                frontal,

                trasera,

                manga_derecha: mangaDerecha,

                manga_izquierda: mangaIzquierda,

                total:
                    base +
                    frontal.subtotal +
                    trasera.subtotal +
                    mangaDerecha.subtotal +
                    mangaIzquierda.subtotal

            };

        }

        function prepararProyectoParaGuardar() {

            const proyecto = {

                garment: project.currentGarment,

                color: project.currentColor,

                views: {}

            };

            Object.keys(project.views).forEach(view => {

                proyecto.views[view] = {

                    json: project.views[view].json

                };

            });

            return proyecto;

        }

        function validarProyecto() {

            let tienePersonalizacion = false;

            Object.values(project.views).forEach(view => {

                if (view.images.length > 0 || view.hasText) {

                    tienePersonalizacion = true;

                }

            });

            if (!tienePersonalizacion) {

                Swal.fire({
                    icon:'warning',
                    title:'Personalización incompleta',
                    text:'Debe agregar al menos una imagen o un texto.'
                });

                return false;

            }

            if (!document.getElementById('size').value) {

                Swal.fire({
                    icon:'warning',
                    title:'Talla no seleccionada',
                    text:'Seleccione una talla.'
                });

                return false;

            }

            if (parseInt(document.getElementById('quantity').value) < 1) {

                Swal.fire({
                    icon:'warning',
                    title:'Cantidad inválida',
                    text:'Ingrese una cantidad válida.'
                });

                return false;

            }

            return true;

        }

        function obtenerDatosCarrito() {

            return {

                garment: project.currentGarment,

                color_id: project.currentColorId,

                size: document.getElementById('size').value,

                quantity: parseInt(document.getElementById('quantity').value),

                pricing: calcularPrecioProyecto(),

                project: prepararProyectoParaGuardar()

            };

        }

        function enviarCarrito() {

            if (!validarProyecto()) {
                return;
            }

            const datos = obtenerDatosCarrito();

            fetch("{{ route('cart.addCustomized') }}", {

                method: "POST",

                headers: {

                    "Content-Type": "application/json",

                    "X-CSRF-TOKEN": "{{ csrf_token() }}"

                },

                body: JSON.stringify(datos)

            })

            .then(response => response.json())

            .then(data => {

                console.log(data);


                if(data.success){

                    Swal.fire({

                        icon:'success',

                        title:'Agregado al carrito',

                        text:'Tu diseño personalizado fue agregado correctamente.',

                        timer:1500,

                        showConfirmButton:false

                    });


                    // actualizar contador carrito

                    document.querySelectorAll('.cart-count')
                        .forEach(el => {

                            el.innerHTML = data.count;

                        });


                    // actualizar offcanvas carrito si existe

                    if(document.getElementById('cartItems')){

                        document.getElementById('cartItems').innerHTML =
                            data.html;

                    }


                }


            })

            .catch(error=>{

                console.error(error);

                Swal.fire({

                    icon:'error',

                    title:'Error',

                    text:'No se pudo agregar el diseño al carrito.'

                });

            });

        }

        function actualizarResumen() {

            const resumen = calcularPrecioProyecto();

            document.getElementById('summaryGarment').innerHTML =
                project.currentGarment === 'polo'
                    ? 'Polo'
                    : 'Polera';

            document.getElementById('summaryTotal').innerHTML =
                'S/' + resumen.total.toFixed(2);

            let html = '';

            html += `
                <div class="summary-item">
                    <span>Precio base (${project.currentGarment === 'polo' ? 'Polo' : 'Polera'})</span>
                    <span>S/${resumen.base.toFixed(2)}</span>
                </div>
            `;

            const vistas = [

                {
                    nombre:'Frontal',
                    data:resumen.frontal
                },

                {
                    nombre:'Espalda',
                    data:resumen.trasera
                },

                {
                    nombre:'Manga Der.',
                    data:resumen.manga_derecha
                },

                {
                    nombre:'Manga Izq.',
                    data:resumen.manga_izquierda
                }

            ];

            vistas.forEach(v=>{

                html += `
                    <hr class="border-secondary border-opacity-25">
                    <div class="fw-bold mb-2">${v.nombre}</div>
                `;

                if(v.data.detalle.length===0){

                    html += `
                        <div class="summary-item">
                            <span class="text-muted">
                                <i class="fa-regular fa-circle me-1"></i>
                                Sin personalización
                            </span>
                            <span>S/0.00</span>
                        </div>
                    `;

                }else{

                    v.data.detalle.forEach(item=>{

                        let descripcion='';

                        if (item.tipo === 'Imagen') {

                                const tamanos = {
                                    small: 'Pequeña',
                                medium: 'Mediana',
                                large: 'Grande'
                            };

                            descripcion = `<i class="fa-regular fa-image me-1 text-info"></i> Imagen ${tamanos[item.tamaño]}`;

                        } else {

                            descripcion = `<i class="fa-solid fa-font me-1 text-warning"></i> Texto`;

                        }

                        html+=`
                            <div class="summary-item">
                                <span>${descripcion}</span>
                                <span class="${
                                    item.gratis
                                        ? 'text-success fw-bold'
                                        : 'fw-bold'
                                }">
                                    ${
                                        item.gratis
                                            ? 'Gratis'
                                            : '+ S/' + item.precio.toFixed(2)
                                    }
                                </span>
                            </div>
                        `;

                    });

                    html += `
                        <div class="summary-item border-top pt-2 mt-2">
                            <span class="fw-bold">Subtotal</span>
                            <span class="fw-bold text-info">
                                S/${v.data.subtotal.toFixed(2)}
                            </span>
                        </div>
                    `;

                }

            });

            document.getElementById('summaryDetails').innerHTML=html;

        }

        function getImagePercentage(obj) {

            const area = PRINT_AREAS[project.currentView];

            const printableArea = area.width * area.height;

            const imageArea =
                obj.getScaledWidth() *
                obj.getScaledHeight();

            return (imageArea / printableArea) * 100;

        }

        /*
        |--------------------------------------------------------------------------
        | CARGAR MOCKUP
        |--------------------------------------------------------------------------
        */
        
        function loadShirt() {

            loadingCanvas = true;

            canvas.clear();

            const json = project.views[project.currentView].json;

            // Primero restaurar el diseño
            const restoreCanvas = function(callback) {

                if (json) {

                    canvas.loadFromJSON(json, function() {

                        canvas.renderAll();

                        callback();

                    });

                } else {

                    callback();

                }

            };

            restoreCanvas(function() {

                const imagePath =
                    "{{ asset('images') }}/" +
                    project.currentGarment +
                    "_base_" +
                    project.currentView +
                    ".png";

                fabric.Image.fromURL(imagePath, function(img) {

                    img.set({

                        left: 0,
                        top: 0,
                        selectable: false,
                        evented: false,
                        excludeFromExport: true

                    });

                    img.scaleToWidth(500);

                    img.filters = [

                        new fabric.Image.filters.BlendColor({

                            color: project.currentColor,
                            mode: 'multiply',
                            alpha: 1

                        })

                    ];

                    img.applyFilters();

                    canvas.add(img);

                    canvas.sendToBack(img);

                    project.mockup = img;

                    canvas.renderAll();

                    renderGallery();

                    updateViewInfo();

                    actualizarResumen();

                    loadingCanvas = false;

                    saveCurrentDesign();

                });

            });

        }

        loadShirt();

        document.querySelectorAll('.btn-view').forEach(btn=>{

            btn.onclick=function(){

                document.querySelectorAll('.btn-view')
                    .forEach(b=>b.classList.remove('active'));

                this.classList.add('active');

                saveCurrentDesign();

                project.currentView=this.dataset.view;

                loadShirt();

            }

        });

        document.querySelectorAll('.product-card').forEach(card => {

            card.addEventListener('click', function () {

                document.querySelectorAll('.product-card')
                    .forEach(c => c.classList.remove('active'));

                this.classList.add('active');

                project.currentGarment = this.dataset.garment;

                loadShirt();

                actualizarResumen();

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

                project.currentColor = this.dataset.colorHex;

                project.currentColorId = parseInt(this.dataset.colorId);

                if (!project.mockup) return;

                project.mockup.filters = [
                    new fabric.Image.filters.BlendColor({
                        color: project.currentColor,
                        mode: 'multiply',
                        alpha: 1
                    })
                ];

                project.mockup.applyFilters();

                canvas.renderAll();

            });

        });


        /*
        |--------------------------------------------------------------------------
        | CANTIDAD
        |--------------------------------------------------------------------------
        */

        const quantityInput = document.getElementById('quantity');

        document.getElementById('btnPlus').addEventListener('click', function () {

            quantityInput.value = parseInt(quantityInput.value) + 1;

        });

        document.getElementById('btnMinus').addEventListener('click', function () {

            let cantidad = parseInt(quantityInput.value);

            if (cantidad > 1) {

                quantityInput.value = cantidad - 1;

            }

        });

        quantityInput.addEventListener('input', function () {

            let valor = parseInt(this.value);

            if (isNaN(valor) || valor < 1) {

                this.value = 1;

            }

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

                    img.customId = crypto.randomUUID();

                    img.scaleToWidth(180);                    

                    canvas.add(img);

                    // addThumbnail(img,file.name,event.target.result);

                    canvas.centerObject(img);

                    canvas.setActiveObject(img);

                    renderGallery();

                    saveCurrentDesign();

                    canvas.renderAll();

                });

                inputFile.value='';

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
                    fill: document.getElementById('textColor').value
                });

                textbox.customId = crypto.randomUUID();

                canvas.add(textbox);

                // addTextThumbnail(textbox,textbox.text);

                canvas.setActiveObject(textbox);

                renderGallery();

                saveCurrentDesign();

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

        const colorPicker = document.getElementById('textColor');

        colorPicker.addEventListener('input', function () {

            const active = canvas.getActiveObject();

            if (active && active.type === 'i-text') {

                active.set('fill', this.value);

                canvas.renderAll();

                saveCurrentDesign();

            }

        });

        canvas.on('selection:created', updateTextControls);
        canvas.on('selection:updated', updateTextControls);

        function updateTextControls() {

            const active = canvas.getActiveObject();

            if (active && active.type === 'i-text') {

                document.getElementById('textColor').value = active.fill;

            }

        }

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
                    
                    renderGallery();

                    saveCurrentDesign();

                    canvas.renderAll();

                }

            }

        });

        document.getElementById('btnAddCart')
            .addEventListener('click', enviarCarrito);

    });
</script>


@endpush

@endsection
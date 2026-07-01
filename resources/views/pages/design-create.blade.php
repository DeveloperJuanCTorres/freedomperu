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
                            <div class="product-card active p-3 text-center rounded-3 border-2">
                                <i class="fa-solid fa-shirt fs-4 mb-2 text-primary"></i>
                                <p class="small fw-bold mb-0 text-primary">Polo</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="product-card p-3 text-center rounded-3 border-2">
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
                <div class="canvas-container-custom position-absolute">

                    <canvas id="canvas" width="500" height="600"></canvas>

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
            <!-- <div class="row mt-4 g-3 justify-content-center">
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
            </div> -->
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

        canvas.on('object:added', autoSave);

        canvas.on('object:modified', autoSave);

        canvas.on('object:removed', autoSave);

        canvas.on('text:changed', autoSave);

        // let currentView = 'frontal';
        // let currentShirt = null;
        // let currentColor = '#1f0a34';

        // let zoom = 1;

        // let designs = {
        //     frontal: null,
        //     trasera: null
        // };

        const project = {

            currentView: 'frontal',

            currentColor: '#1f0a34',

            zoom: 1,

            mockup: null,

            views:{

                frontal:{

                    json:null,

                    preview:null,

                    gallery:[]

                },

                trasera:{

                    json:null,

                    preview:null,

                    gallery:[]

                }

            }

        };

        let loadingCanvas = false;

        function saveCurrentDesign() {

            project.views[project.currentView].json =
                canvas.toJSON([
                    'customId'
                ]);

            
        }

        function getProject() {

            return {

                color: project.currentColor,

                frontal: project.views.frontal.json,

                trasera: project.views.trasera.json

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

            project.views[project.currentView].json = canvas.toJSON(['customId']);

            project.views[project.currentView].preview = canvas.toDataURL({
                format: 'png',
                multiplier: 2
            });

            console.log("Guardado:", project.currentView);
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

        /*
        |--------------------------------------------------------------------------
        | CARGAR MOCKUP
        |--------------------------------------------------------------------------
        */

        // function loadShirt(view) {

        //     canvas.clear();

        //     const imagePath = "{{ asset('images') }}/polo_base_" + view + ".png";

        //     fabric.Image.fromURL(imagePath, function(img) {

        //         img.set({
        //             left: 0,
        //             top: 0,
        //             selectable: false,
        //             evented: false,
        //             excludeFromExport: true
        //         });

        //         img.scaleToWidth(500);

        //         if (currentColor) {

        //             img.filters = [
        //                 new fabric.Image.filters.BlendColor({
        //                     color: currentColor,
        //                     mode: 'multiply',
        //                     alpha: 1
        //                 })
        //             ];

        //             img.applyFilters();
        //         }

        //         canvas.add(img);

        //         // addThumbnail(img,file.name,event.target.result);

        //         canvas.sendToBack(img);

        //         currentShirt = img;

        //         if (designs[view]) {

        //             canvas.loadFromJSON(designs[view], () => {

        //                 canvas.renderAll();

        //                 canvas.sendToBack(currentShirt);

        //             });

        //         } else {

        //             canvas.renderAll();

        //         }

        //     });

        // }

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
                    "{{ asset('images') }}/polo_base_" +
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

                    loadingCanvas = false;

                    saveCurrentDesign();

                });

            });

        }

        loadShirt();

        /*
        |--------------------------------------------------------------------------
        | CAMBIO VISTAS
        |--------------------------------------------------------------------------
        */

        // document.querySelectorAll('.btn-view').forEach(btn => {

        //     btn.addEventListener('click', function() {

        //         document.querySelectorAll('.btn-view')
        //             .forEach(b => b.classList.remove('active'));

        //         this.classList.add('active');

        //         designs[currentView] = canvas.toJSON();

        //         currentView = this.dataset.view;

        //         loadShirt(currentView);

        //     });

        // });

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

                project.currentColor = window.getComputedStyle(this)
                    .backgroundColor;

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

        // function addThumbnail(object, name, preview) {

        //     const gallery = document.getElementById('designGallery');

        //     const col = document.createElement('div');

        //     col.className = 'col-3';

        //     col.dataset.id = object.customId;

        //     col.innerHTML = `
        //         <div class="design-item">

        //             <button class="remove-design">
        //                 <i class="fa fa-times"></i>
        //             </button>

        //             <img src="${preview}">

        //         </div>
        //     `;

        //     gallery.appendChild(col);

        //     // Seleccionar objeto
        //     col.querySelector('img').onclick = function () {

        //         const obj = canvas.getObjects().find(o => o.customId === object.customId);

        //         if (obj) {

        //             canvas.setActiveObject(obj);

        //             canvas.renderAll();

        //         }

        //     };

        //     // Eliminar
        //     col.querySelector('.remove-design').onclick = function (e) {

        //         e.stopPropagation();

        //         const obj = canvas.getObjects().find(o => o.customId === object.customId);

        //         if (obj) {

        //             canvas.remove(obj);

        //             canvas.renderAll();

        //         }

        //         col.remove();

        //         // Permite volver a subir el mismo archivo
        //         inputFile.value = "";

        //     };

        // }

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

        // function addTextThumbnail(object, text) {

        //     const gallery = document.getElementById('designGallery');

        //     const col = document.createElement('div');

        //     col.className = 'col-3';

        //     col.dataset.id = object.customId;

        //     col.innerHTML = `
        //         <div class="design-item bg-white border p-2 text-center">

        //             <button class="remove-design">
        //                 <i class="fa fa-times"></i>
        //             </button>

        //             <div class="small fw-bold">
        //                 ${text}
        //             </div>

        //         </div>
        //     `;

        //     gallery.appendChild(col);

        //     col.onclick = function () {

        //         const obj = canvas.getObjects().find(o => o.customId === object.customId);

        //         if (obj) {

        //             canvas.setActiveObject(obj);

        //             canvas.renderAll();

        //         }

        //     };

        //     col.querySelector('.remove-design').onclick = function (e) {

        //         e.stopPropagation();

        //         const obj = canvas.getObjects().find(o => o.customId === object.customId);

        //         if (obj) {

        //             canvas.remove(obj);

        //             canvas.renderAll();

        //         }

        //         col.remove();

        //     };

        // }

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
                    
                    renderGallery();

                    saveCurrentDesign();

                    canvas.renderAll();

                }

            }

        });

    });
</script>


@endpush

@endsection
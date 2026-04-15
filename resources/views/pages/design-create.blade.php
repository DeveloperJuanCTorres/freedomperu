@extends('layouts.app')

@section('content')
     <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
<!-- Customizer Studio Container -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
<!-- Panel Izquierdo: Herramientas -->
<aside class="lg:col-span-3 space-y-6">
<div class="bg-surface-container-low p-6 rounded-lg shadow-sm">
<h2 class="text-sm font-bold uppercase tracking-widest text-primary mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-lg">tune</span> Herramientas de Diseño
                    </h2>
<!-- Selector de Producto -->
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
<!-- Paleta de Colores -->
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
<!-- Subir Imagen -->
<div class="space-y-4 mb-8">
<label class="text-xs font-semibold uppercase text-on-surface-variant">Arte &amp; Logotipos</label>
<div class="border-2 border-dashed border-outline-variant rounded-lg p-6 text-center hover:border-primary transition-colors cursor-pointer bg-surface-container-highest/30">
<span class="material-symbols-outlined text-4xl text-outline mb-2">upload_file</span>
<p class="text-xs text-on-surface-variant">Sube tu archivo PNG o JPG (Max 10MB)</p>
</div>
</div>
<!-- Texto -->
<div class="space-y-4">
<label class="text-xs font-semibold uppercase text-on-surface-variant">Añadir Texto</label>
<input class="w-full bg-surface-container-highest border-none rounded-md px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 transition-all outline-none" placeholder="Escribe aquí..." type="text"/>
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
<!-- Tips / Tutorial -->
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
<!-- Panel Central: Vista Previa -->
<main class="lg:col-span-6 flex flex-col gap-6">
<div class="bg-surface-container-low rounded-lg p-8 relative flex flex-col items-center justify-center min-h-[600px] shadow-sm">
<!-- View Toggles -->
<div class="absolute top-6 left-6 flex gap-2">
<button class="bg-surface-container-lowest px-4 py-2 rounded-full text-xs font-bold shadow-sm flex items-center gap-2 border border-primary/10">
<span class="material-symbols-outlined text-sm">front_hand</span> Frente
                        </button>
<button class="bg-white/50 px-4 py-2 rounded-full text-xs font-bold hover:bg-white transition-all flex items-center gap-2">
<span class="material-symbols-outlined text-sm">back_hand</span> Espalda
                        </button>
</div>
<!-- Zoom / Reset Controls -->
<div class="absolute top-6 right-6 flex flex-col gap-2">
<button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-lg">zoom_in</span>
</button>
<button class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-lg">restart_alt</span>
</button>
</div>
<!-- Mockup Canvas -->
<div class="relative w-full max-w-md aspect-square bg-white rounded-xl shadow-2xl overflow-hidden group mt-5">

        <div class="design-canvas-wrapper m-auto w-full">
                <canvas id="canvas" width="400" height="450" class="w-full h-full"></canvas>
        </div>
<!-- <img alt="White Premium T-Shirt" class="w-full h-full object-cover" data-alt="Studio shot of a minimalist high-quality white cotton t-shirt on a clean white background with soft shadows" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPcwnXk_Y38Sh-I6e7m2ZyRJRKhcsj8CCdz__1oWcEVp4ADxwKFzaQoEd30s5yx5DDXML2UZRaPepDYp0v-d3gmAjA6amMkZi1XVZvPTZxqaP_ed5w34Adk_jAkysJfwcH_FOji_Vz1AwkgCZ1u2CyrG3KZJ-SEBsilA3DyZR-AgubZye-xRnIwWjmuWWkAXzaNyK00cL1No2sxlqwU2Ynn5Kdb1WtI9Ed5zddtrOHhRdiCUTjcaGjyaZDf65_OxqVdzkiFes9i2o"/> -->
<!-- Design Overlay Placeholder -->
<div class="absolute inset-0 flex items-center justify-center pointer-events-none">
<div class="w-48 h-48 border-2 border-dashed border-primary/20 flex flex-col items-center justify-center text-primary/30">
<span class="material-symbols-outlined text-5xl mb-2">add_photo_alternate</span>
<span class="text-[10px] uppercase font-bold tracking-widest">Área de Diseño</span>
</div>
</div>
</div>
<!-- Quality Indicator -->
<div class="mt-8 flex items-center gap-4 bg-white/40 px-6 py-3 rounded-full backdrop-blur-sm">
<div class="flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
<span class="text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant">Calidad de Impresión: Alta</span>
</div>
<div class="w-px h-4 bg-outline-variant"></div>
<span class="text-[10px] font-bold uppercase tracking-tighter text-on-surface-variant">300 DPI</span>
</div>
</div>
<!-- Visual Gallery / Recent Ideas -->
<div class="grid grid-cols-4 gap-4">
<div class="aspect-square bg-surface-container-high rounded-lg overflow-hidden group cursor-pointer">
<img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="urban style graphic t-shirt with aesthetic print on a model in a minimal studio setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDrpG2FLujOEbP_SgzfdkdJRhzuNf6Baxm10o9dfIc5hMQXPUrIPWNIq9SMPZkHefdQuloiapVbALFM0SOefHgpF4Xn0j1JysyCSYhF-jLtNizAJa76VTC3P-bU2PYybvR60RTv196clYAuiWoa9dQDliAK-jaBsDNgX-DxHg5HkMdtrKbP9StfowEXcy0QuYijR7gAg-sY5nDjGoJ7WfPn97pexNynw20EkW2-O9VUx-28Xg4Ju2H0RCAh79nwbkLRd6_s0jtikfU"/>
</div>
<div class="aspect-square bg-surface-container-high rounded-lg overflow-hidden group cursor-pointer">
<img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="high fashion minimalist white t-shirt design mockup on a textured grey background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDvTUss1IFXeAeJSsp8pBGtAZRzga7cD5rJpOQBhDm5xPw2uVg4ez5niPFoyU8BeAqwLNIJnFWbDmKgVbs9XJtSC3FiXJHuFYwTae_S4UJLdjEwwgcc2X95XU5Jun1fQm94fVsRyZzT7KI4bDkSv8Rz3nSUkH9wdO46KXEDBVSa1ARDroX9kL_gxrBExGnkyalKrt8euzV1dos3Owc1qJ22pHITjjieZuGc6tlFiuSMObRvKKPplpcqP3F6ySuCyiF5S1LtxnrxA2A"/>
</div>
<div class="aspect-square bg-surface-container-high rounded-lg overflow-hidden group cursor-pointer">
<img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="black premium cotton shirt with embroidered detail in soft dramatic lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuATOtpW3DVeNDpprihoVqUuH4iP2jmG0a4OCFDU10OrRyAImH6iFMw_3c-cmtMB5q7i5NpZYkXlZM_hQOv9N2WVXFjf22qclR5YI6XuLtolrPffzZLCMqrVKlxQsTa05KKsfP8w59BhZu5WiBUvRuEIglTs-lX-OakHu36zp0TcbsrxtzyFlKITLzoGPFPf6UANpPXDwBqt8N3zbSuQYdqag-7ecOtDA5LSJcKfkwZ1d2YRzpZqS5DRxHfaxPI69rasmmWmNl7Nu9I"/>
</div>
<div class="aspect-square bg-surface-container-high rounded-lg flex items-center justify-center border-2 border-dashed border-outline-variant hover:border-primary transition-all cursor-pointer">
<span class="material-symbols-outlined text-outline">add</span>
</div>
</div>
</main>
<!-- Panel Derecho: Ajustes de Compra -->
<aside class="lg:col-span-3 space-y-6">
<div class="bg-surface-container-low p-6 rounded-lg shadow-sm border border-transparent">
<h2 class="text-sm font-bold uppercase tracking-widest text-primary mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-lg">shopping_basket</span> Finalizar Pedido
                    </h2>
<!-- Tallas -->
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
<!-- Cantidad -->
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
<!-- Precio Dinámico -->
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
<!-- CTA -->
<button class="w-full bg-primary-container text-white py-3 rounded-xl font-bold uppercase tracking-widest flex items-center justify-center gap-3 shadow-lg hover:shadow-primary/20 transition-all scale-100 active:scale-95 group">
<span>Añadir al Carrito</span>
<span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
</button>
<p class="text-[10px] text-center text-on-surface-variant mt-4 leading-relaxed px-4">
                        Envío estimado en <span class="font-bold">3 a 5 días hábiles</span> dentro de Lima Metropolitana.
                    </p>
</div>
<!-- Confianza -->
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
</main>

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

@push('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.0/fabric.min.js"></script>

<!-- <script>
   
    document.addEventListener('DOMContentLoaded', function () {
        let canvas = new fabric.Canvas('designCanvas', {
            preserveObjectStacking: true
        });

    

        let currentView = 'frontal';
        let currentShirt = null;

        let designs = {
            frontal: null,
            trasera: null,
            manga_izquierda: null,
            manga_derecha: null
        };

        function loadShirt(view) {

            canvas.clear();

            const imagePath = "{{ asset('images') }}/polo_base_" + view + ".png";

            console.log(imagePath);

            fabric.Image.fromURL(imagePath, function(img) {

                img.set({
                    left: 0,
                    top: 0,
                    selectable: false,
                    evented: false
                });

                img.scaleToWidth(canvas.getWidth());
    
                canvas.add(img);
                canvas.sendToBack(img);

                currentShirt = img;

                canvas.renderAll();

            });
        }

        loadShirt('frontal');

        /* CAMBIAR VISTAS */
        document.querySelectorAll('.view-btn').forEach(btn => {

            btn.addEventListener('click', function() {

                document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // guardar diseño actual
                designs[currentView] = canvas.toJSON();

                // cambiar vista
                currentView = this.dataset.view;

                loadShirt(currentView);

            });

        });

        /* CAMBIAR COLOR */
        document.getElementById('colorPicker').addEventListener('input', function() {

            if (!currentShirt) return;

            currentShirt.filters = [
                new fabric.Image.filters.BlendColor({
                    color: this.value,
                    mode: 'multiply',
                    alpha: 1
                })
            ];

            currentShirt.applyFilters();
            canvas.renderAll();
        });

        /* AGREGAR TEXTO */
        document.getElementById('addText').addEventListener('click', function() {

            const text = new fabric.IText('Tu texto aquí', {
                left: 150,
                top: 200,
                fontSize: 30,
                fill: '#000000'
            });

            canvas.add(text);
            canvas.setActiveObject(text);
            canvas.renderAll();
        });

        /* SUBIR IMAGEN */
        document.getElementById('uploadImage').addEventListener('change', function(e) {

            const reader = new FileReader();

            reader.onload = function(event) {

                fabric.Image.fromURL(event.target.result, function(img) {

                    img.scaleToWidth(120);
                    img.set({
                        left: 150,
                        top: 200
                    });

                    canvas.add(img);
                    canvas.setActiveObject(img);
                });
            };

            reader.readAsDataURL(e.target.files[0]);
        });

        /* GUARDAR */
        document.getElementById('saveDesign').addEventListener('click', function() {

            designs[currentView] = canvas.toJSON();

            fetch('/design/save', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(designs)
            });

            alert('Diseño guardado correctamente');
        });
    });

</script> -->

<script>
document.addEventListener('DOMContentLoaded', function () {

    const canvas = new fabric.Canvas('canvas', {
        preserveObjectStacking: true
    });

    let currentView = 'frontal';
    let currentShirt = null;
    let currentColor = '#ffffff';

    let designs = {
        frontal: null,
        trasera: null,
        manga_izquierda: null,
        manga_derecha: null
    };

    // 🔥 CARGAR POLO
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

            img.scaleToWidth(canvas.getWidth());

            // aplicar color si ya existe
            if(currentColor){
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

            // 🔥 restaurar diseño si existe
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

    // 🔄 CAMBIO DE VISTAS (usa tus botones actuales)
    const viewButtons = document.querySelectorAll('.top-6.left-6 button');

    viewButtons.forEach((btn, index) => {

        btn.addEventListener('click', function(){

            viewButtons.forEach(b => b.classList.remove('bg-surface-container-lowest'));
            this.classList.add('bg-surface-container-lowest');

            // guardar diseño actual
            designs[currentView] = canvas.toJSON();

            const views = ['frontal', 'trasera'];
            currentView = views[index];

            loadShirt(currentView);
        });

    });

    // 🎨 COLORES (usa tu paleta actual)
    document.querySelectorAll('.flex.flex-wrap button').forEach(btn => {

        btn.addEventListener('click', function(){

            const color = window.getComputedStyle(this).backgroundColor;

            currentColor = color;

            if (!currentShirt) return;

            currentShirt.filters = [
                new fabric.Image.filters.BlendColor({
                    color: color,
                    mode: 'multiply',
                    alpha: 1
                })
            ];

            currentShirt.applyFilters();
            canvas.renderAll();
        });

    });

    // 🖼️ SUBIR IMAGEN (tu caja drag)
    const uploadBox = document.querySelector('.border-dashed');

    const inputFile = document.createElement('input');
    inputFile.type = 'file';
    inputFile.hidden = true;
    uploadBox.appendChild(inputFile);

    uploadBox.addEventListener('click', () => inputFile.click());

    inputFile.addEventListener('change', function(e){

        const file = e.target.files[0];
        if(!file) return;

        const reader = new FileReader();

        reader.onload = function(event){

            fabric.Image.fromURL(event.target.result, function(img){

                img.scaleToWidth(200);

                canvas.add(img);
                canvas.centerObject(img);
                canvas.setActiveObject(img);

            });

        };

        reader.readAsDataURL(file);
    });

    // 🔤 TEXTO (input nuevo)
    const textInput = document.querySelector('input[placeholder="Escribe aquí..."]');

    textInput.addEventListener('keydown', function(e){

        if(e.key === 'Enter'){

            const textbox = new fabric.IText(this.value || 'Texto', {
                left: 150,
                top: 200,
                fontSize: 32,
                fill: '#000'
            });

            canvas.add(textbox);
            canvas.setActiveObject(textbox);

            this.value = '';
        }

    });

    // 🔠 FUENTE Y TAMAÑO
    const selects = document.querySelectorAll('select');

    selects[0].addEventListener('change', function(){
        const active = canvas.getActiveObject();
        if(active && active.type === 'i-text'){
            active.fontFamily = this.value;
            canvas.renderAll();
        }
    });

    selects[1].addEventListener('change', function(){
        const active = canvas.getActiveObject();
        if(active && active.type === 'i-text'){
            active.fontSize = parseInt(this.value);
            canvas.renderAll();
        }
    });

    // 🔍 ZOOM BOTONES
    // const zoomButtons = document.querySelectorAll('.top-6.right-6 button');

    // let zoom = 1;

    // zoomButtons[0].addEventListener('click', () => {
    //     zoom += 0.1;
    //     canvas.setZoom(zoom);
    // });

    // zoomButtons[1].addEventListener('click', () => {
    //     zoom = 1;
    //     canvas.setZoom(1);
    // });

    // // 🖱️ ZOOM SCROLL
    // canvas.on('mouse:wheel', function(opt) {
    //     let delta = opt.e.deltaY;
    //     let zoom = canvas.getZoom();

    //     zoom *= 0.999 ** delta;

    //     if (zoom > 3) zoom = 3;
    //     if (zoom < 0.5) zoom = 0.5;

    //     canvas.zoomToPoint({ x: opt.e.offsetX, y: opt.e.offsetY }, zoom);

    //     opt.e.preventDefault();
    //     opt.e.stopPropagation();
    // });

    // 💾 GUARDAR (igual que el tuyo)
    document.querySelector('[id="saveDesign"]')?.addEventListener('click', function(){

        designs[currentView] = canvas.toJSON();

        fetch('/design/save', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(designs)
        });

        alert('Diseño guardado correctamente');
    });

});
</script>


@endpush

@endsection





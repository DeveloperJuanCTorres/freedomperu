@extends('layouts.app')

@section('title', 'Tienda')

@section('content')

<!-- FILTERS TOP -->
<!-- =========================================
OFFCANVAS FILTERS
========================================= -->

<div class="offcanvas offcanvas-top filters-offcanvas"
     tabindex="-1"
     id="filtersOffcanvasTop">

    <div class="offcanvas-body px-lg-5 px-4">

        <!-- CATEGORÍAS -->

        <div class="mb-5">

            <!-- <h4 class="filters-title1 mb-4">
                Categorías
            </h4> -->

            <div class="filters-centered-wrapper">

                <div class="categories-scroll1">

                    @foreach($taxonomies as $taxonomy)

                    <a href="#"
                        class="category-card1 category-filter {{ request('taxonomy') == $taxonomy->id ? 'active' : '' }}"
                        data-id="{{ $taxonomy->id }}">

                        <div class="category-img1">
                            <img src="{{ asset('storage/'.$taxonomy->image) }}">
                        </div>

                        <span>{{ $taxonomy->name }}</span>

                    </a>


                    @endforeach

                </div>

            </div>

        </div>

        <!-- ESTILOS -->

        <div>

            <!-- <h4 class="filters-title1 mb-4">
                Estilos
            </h4> -->

            <div class="filters-centered-wrapper">

                <div class="styles-scroll">

                    @foreach($designs as $design)

                    <button
                        class="style-tag design-filter"
                        data-id="{{ $design->id }}">

                        {{ $design->name }}

                    </button>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>



<!-- Main Content -->
<div class="py-5 container-fluid">
    <!-- Using align-items-flex-start on the row to allow sidebar sticky to work correctly -->
    <div class="row align-items-start">
        
        <!-- Product Grid Column -->
        <div class="col-lg-12">

            <!--==========================
            BANNER TIENDA
            ===========================-->

            <div class="shop-hero-banner mb-5">

                <div class="hero-overlay"></div>

                <div class="row align-items-center h-100 position-relative">

                    <div class="col-lg-7 px-lg-5 px-4">

                        <span class="hero-tag">
                            ✦ NUEVA COLECCIÓN 2026
                        </span>

                        <h1 class="hero-title mt-3">
                            Diseña el Polo
                            <br>
                            que te representa
                        </h1>

                        <p class="hero-description mt-3">

                            Personaliza colores, estampados y estilos únicos
                            con calidad premium y envíos a todo el Perú.

                        </p>

                        <a href="#productsGrid" class="btn btn-light hero-btn">

                            Explorar colección

                            <i class="fa-solid fa-arrow-right ms-2"></i>

                        </a>

                    </div>

                    <div class="col-lg-5 text-center d-none d-lg-block">

                        <img
                            src="{{ asset('images/banner-shirt.png') }}"
                            class="hero-image">

                    </div>

                </div>

            </div>

            <!-- Grid Header -->
            <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <span class="small text-muted">Mostrando <span class="fw-bold text-dark">24</span> productos</span>
                <div class="d-flex align-items-center">
                    <label class="small me-2">Ordenar por:</label>
                    <select class="form-select form-select-sm border-0 fw-bold p-0 bg-transparent shadow-none" style="width: auto;">
                        <option>Más recientes</option>
                        <option>Menor precio</option>
                        <option>Mayor precio</option>
                    </select>
                </div>
            </div>
            
            <div id="productsGrid">
                
                <div class="row g-4 px-4">

                    @include('shop.partials.products-grid')

                </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation" class="mt-5 pt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><span class="page-link bg-transparent">...</span></li>
                    <li class="page-item"><a class="page-link" href="#">12</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>


@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        let products = {};
        let selectedColors = {};

        

        document.querySelectorAll(".product-canvas").forEach(canvasElement => {

            const productId = canvasElement.id.replace('canvas-product-', '');

            const canvas = new fabric.Canvas(canvasElement.id, {
                selection: false,
                enableRetinaScaling: true
            });

            const shirtPath = canvasElement.dataset.shirt;
            const designPath = canvasElement.dataset.design;

            fabric.Image.fromURL(shirtPath, function(shirt) {

                 const scale = Math.min(
                    canvas.width / shirt.width,
                    canvas.height / shirt.height
                );

                shirt.scale(scale);

                shirt.set({
                    left: (canvas.width - shirt.getScaledWidth()) / 2,
                    top: (canvas.height - shirt.getScaledHeight()) / 2,
                    selectable:false,
                    evented:false
                });


                // sombra suave
                shirt.shadow = new fabric.Shadow({
                    color: 'rgba(0,0,0,0.15)',
                    blur: 20,
                    offsetY: 8
                });

                canvas.add(shirt);
                canvas.sendToBack(shirt);

                // Color inicial aleatorio
                const colors = document.querySelectorAll(
                    `.color-box[data-product="${productId}"]`
                );

                if (colors.length) {

                    // const randomColor =
                    //     colors[Math.floor(Math.random() * colors.length)]
                    //     .dataset.color;

                    const random = colors[Math.floor(Math.random() * colors.length)];
                    selectedColors[productId] = {
                        id: random.dataset.colorId,
                        hex: random.dataset.color
                    };

                    const randomColor = random.dataset.color;

                    shirt.filters = [
                        new fabric.Image.filters.BlendColor({
                            color: randomColor,
                            mode: 'multiply',
                            alpha: 1
                        })
                    ];

                    shirt.applyFilters();
                }

                fabric.Image.fromURL(designPath, function(design) {

                    // importante para calidad
                    design.set({
                        objectCaching: false,
                        selectable: false,
                        evented: false,
                        originX: 'center',
                        originY: 'center'
                    });

                    // tamaño proporcional
                    design.scaleToWidth(canvas.width * 0.49);

                    design.set({
                        left: canvas.width / 2,
                        top: canvas.height * 0.45
                    });

                    canvas.add(design);
                    canvas.bringToFront(design);

                    canvas.renderAll();

                    products[productId] = {
                        canvas,
                        shirt,
                        design
                    };

                }, {
                    crossOrigin: 'anonymous'
                });

            }, {
                crossOrigin: 'anonymous'
            });

        });

        // Cambio de color
        document.querySelectorAll(".color-box").forEach(colorBtn => {
            
            colorBtn.addEventListener("click", function() {
                const productId = this.dataset.product;
                const color = this.dataset.color;

                // selectedColors[productId] = color;
                selectedColors[productId] = {
                    id: this.dataset.colorId,
                    hex: this.dataset.color
                };

                const item = products[productId];

                if (!item) return;

                item.shirt.filters = [
                    new fabric.Image.filters.BlendColor({
                        color: color,
                        mode: 'multiply',
                        alpha: 1
                    })
                ];

                item.shirt.applyFilters();

                item.canvas.renderAll();

            });

        });

        document.querySelectorAll(".btn-add-cart").forEach(btn => {

            btn.addEventListener("click", function () {

                const productId = this.dataset.product;

                if (!selectedColors[productId]) {

                    Swal.fire({
                        icon: 'warning',
                        title: 'Seleccione un color',
                        text: 'Debe seleccionar un color antes de agregar el producto.'
                    });

                    return;
                }

                fetch("{{ route('cart.add') }}", {

                    method: "POST",

                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },

                    body: JSON.stringify({

                        product_id: productId,
                        color_id: selectedColors[productId].id,
                        quantity: 1

                    })

                })
                .then(response => response.json())
                .then(data => {

                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        icon: "success",
                        title: "Producto agregado al carrito",
                        showConfirmButton: false,
                        timer: 1500
                    });

                    // Si tienes contador del carrito
                    if (data.count) {
                        $("#cart-count").text(data.count);
                    }
                    document.getElementById("cart-content").innerHTML = data.html;

                    document.getElementById("cart-count").textContent = data.count;

                    bootstrap.Offcanvas
                        .getOrCreateInstance(
                            document.getElementById('offcanvasCart')
                        )
                        .show();

                })
                .catch(error => {

                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "No se pudo agregar el producto al carrito."
                    });

                    console.log(error);

                });

            });

        });

        

    });
</script>

<script>
    document.addEventListener("click", function(e){

            const btn = e.target.closest(".remove-cart");

            if(!btn) return;

            const id = btn.dataset.id;

            fetch("{{ route('cart.remove') }}",{

                method:"POST",

                headers:{
                    "Content-Type":"application/json",
                    "X-CSRF-TOKEN":"{{ csrf_token() }}"
                },

                body:JSON.stringify({
                    id:id
                })

            })
            .then(r=>r.json())
            .then(data=>{

                document.getElementById("cart-content").innerHTML = data.html;

                const cartCount = document.getElementById("cart-count");

                if(cartCount){
                    cartCount.textContent = data.count;
                }

            });

        });
</script>




<script>
    $(document).on('change', '#filtersForm input', function() {
        let data = $('#filtersForm').serialize();
        $.get("{{ route('shop.index') }}", data, function(response) {
            let html = $(response).find('#productsGrid').html();
            $('#productsGrid').html(html);
        });
    });




    document.addEventListener("DOMContentLoaded", function() {

        const scroll = document.getElementById("taxonomyScroll");

        document.getElementById("scrollLeft").onclick = () => {
            scroll.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        };

        document.getElementById("scrollRight").onclick = () => {
            scroll.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        };

    });
</script>


<script>
    function reinitFabric() {

        document.querySelectorAll("canvas[id^='canvas-']").forEach(canvasEl => {

            if (canvasEl.__fabric) {
                canvasEl.__fabric.dispose(); // evita duplicados
            }

            const canvas = new fabric.Canvas(canvasEl.id, {
                selection: false
            });

            canvasEl.__fabric = canvas;

            const shirtPath = canvasEl.dataset.image;
            const designPath = canvasEl.dataset.design;

            fabric.Image.fromURL(shirtPath, function (shirt) {

                shirt.set({
                    left: canvas.width / 2,
                    top: canvas.height / 2,
                    originX: 'center',
                    originY: 'center',
                    selectable: false,
                    evented: false
                });

                shirt.scaleToWidth(canvas.width);

                canvas.add(shirt);
                canvas.sendToBack(shirt);
                canvas.renderAll();
            });

            if (designPath) {
                fabric.Image.fromURL(designPath, function (design) {

                    design.scaleToWidth(160);

                    design.set({
                        left: canvas.width / 2,
                        top: canvas.height / 3,
                        originX: 'center',
                        originY: 'center',
                        selectable: false,
                        evented: false
                    });

                    canvas.add(design);
                    canvas.bringToFront(design);
                    canvas.renderAll();
                });
            }
        });
    }

    function loadProducts() {

        const taxonomy = document.querySelector(".category-card1.active")?.dataset.id || "";

        let designs = [];

        document.querySelectorAll(".style-tag.active").forEach(btn => {
            designs.push(btn.dataset.id);
        });

        let url = new URL("{{ route('shop.index') }}");

        url.searchParams.append("taxonomy", taxonomy);

        designs.forEach(id => {
            url.searchParams.append("designs[]", id);
        });

        fetch(url.toString(), {
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
        .then(r => r.text())
        .then(html => {

            const grid = new DOMParser()
                .parseFromString(html, "text/html")
                .querySelector("#productsGrid");

            if (!grid) {
                console.log("No vino productsGrid en la respuesta");
                return;
            }

            document.getElementById("productsGrid").innerHTML = grid.innerHTML;

            // IMPORTANTE: reactivar canvas si usas FabricJS
            reinitFabric?.();
        });
    }

    document.addEventListener("click", function(e){

        const category = e.target.closest(".category-card1");

        if(category){

            document.querySelectorAll(".category-card1")
                .forEach(c=>c.classList.remove("active"));

            category.classList.add("active");

            loadProducts();

        }

    });

    document.addEventListener("click", function(e){

        const style = e.target.closest(".style-tag");

        if(style){

            style.classList.toggle("active");

            loadProducts();

        }

    });
    
</script>
@endpush

<!-- FLOATING FILTER BUTTON -->

<button
    class="floating-filter-btn"
    data-bs-toggle="offcanvas"
    data-bs-target="#filtersOffcanvasTop">

    <span class="filter-icon">
        <i class="fas fa-sliders-h"></i>
    </span>

    <span class="filter-text">
        Filtros
    </span>

</button>
@endsection

@extends('layouts.app')

@section('title', 'Tienda')

@section('content')

<div class="shop-page">
    {{-- BANNER --}}
    <section class="shop-banner">
        <img src="{{ asset('images/banner.jpg') }}">
    </section>

    {{-- TAXONOMIES --}}
    <section class="shop-taxonomies">

        <div class="taxonomy-scroll">

            @foreach($taxonomies as $taxonomy)
            <a href="{{ route('shop.index',['taxonomy'=>$taxonomy->id]) }}"
            class="taxonomy-item {{ request('taxonomy') == $taxonomy->id ? 'active' : '' }}">
                <div class="taxonomy-icon">
                    <img src="{{ asset('storage/'.$taxonomy->image) }}">
                </div>
                <span>{{ $taxonomy->name }}</span>
            </a>
            @endforeach
        </div>
    </section>

    <section class="container container-fluid mt-4">

        <div class="row">
            {{-- FILTROS --}}
            <div class="col-lg-3">
                <form id="filtersForm">
                    <div class="filter-box">
                        <h5>Tipos de Diseño</h5>
                        <div class="filter-scroll">
                            @foreach($designs as $design)
                            <label class="filter-item">
                                <input
                                type="checkbox"
                                name="designs[]"
                                value="{{ $design->id }}"
                                {{ in_array($design->id, request('designs',[])) ? 'checked' : '' }}>

                                <span>{{ $design->name }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <input type="hidden" name="taxonomy" value="{{ request('taxonomy') }}">
                </form>
            </div>

            {{-- PRODUCTOS --}}
            <div class="col-lg-9">
                <div class="row" id="productsGrid">
                    @foreach($products as $product)
                    <div class="col-lg-4 mb-4">
                        <div class="product-card">

                            <div class="product-image">
                                @if($product->taxonomies->contains('name','Poleras'))
                                <canvas 
                                    id="canvas-{{ $product->id }}" 
                                    width="300" 
                                    height="300"
                                    data-image="{{ asset('images/polera_base_frontal.png') }}"
                                    data-design="{{ asset('storage/'.$product->image) }}">
                                </canvas>
                                @else
                                <canvas 
                                    id="canvas-{{ $product->id }}" 
                                    width="250" 
                                    height="300"
                                    data-image="{{ asset('images/polo_base_frontal.png') }}"
                                    data-design="{{ asset('storage/'.$product->image) }}">
                                </canvas>
                                @endif
                            </div>

                            <div class="product-info">

                                <h6>{{ $product->name }}</h6>

                                {{-- COLORES --}}
                                <div class="product-colors">
                                    @foreach($colors as $color)

                                    <span 
                                        class="color-box"
                                        style="background: {{ $color->hex_code }}"
                                        data-color="{{ $color->hex_code }}"
                                        data-product="{{ $product->id }}">
                                    </span>

                                    @endforeach
                                </div>

                                <!-- <a href="#" class="btn-buy">
                                    Comprar
                                </a> -->

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="mt-4">
                {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')

<script>
    $(document).on('change','#filtersForm input',function(){
        let data = $('#filtersForm').serialize();
        $.get("{{ route('shop.index') }}", data, function(response){
            let html = $(response).find('#productsGrid').html();
            $('#productsGrid').html(html);
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function(){

        let canvases = {};

        document.querySelectorAll("canvas[id^='canvas-']").forEach(canvasEl => {

            let productId = canvasEl.id.replace("canvas-","");
            let canvas = new fabric.Canvas(canvasEl.id,{ selection:false });

            let shirtPath = canvasEl.dataset.image;
            let designPath = canvasEl.dataset.design;

            /* POLO BASE */

            fabric.Image.fromURL(shirtPath,function(shirt){

                shirt.set({
                    left:0,
                    top:0,
                    selectable:false,
                    evented:false
                });

                shirt.scaleToWidth(canvas.width);

                canvas.add(shirt);
                canvas.sendToBack(shirt);

                /* ===== COLOR ALEATORIO ===== */

                let colors = document.querySelectorAll(
                    `.color-box[data-product="${productId}"]`
                );

                if(colors.length){

                    let randomIndex = Math.floor(Math.random() * colors.length);
                    let randomColor = colors[randomIndex].dataset.color;

                    shirt.filters = [
                        new fabric.Image.filters.BlendColor({
                            color: randomColor,
                            mode: 'multiply',
                            alpha: 1
                        })
                    ];

                    shirt.applyFilters();
                }

                /* DISEÑO DEL PRODUCTO */

                if(designPath){

                    fabric.Image.fromURL(designPath,function(design){

                        design.scaleToWidth(120);

                        design.set({
                            left: canvas.width / 2,
                            top: canvas.height / 2.6,
                            originX: 'center',
                            originY: 'center',
                            selectable:false,
                            evented:false
                        });

                        canvas.add(design);
                        canvas.bringToFront(design);

                        canvas.renderAll();

                    });

                }

                canvases[productId] = {
                    canvas:canvas,
                    shirt:shirt
                };

                canvas.renderAll();

            });

        });

        /* CAMBIAR COLOR */

        document.querySelectorAll('.color-box').forEach(btn=>{

            btn.addEventListener('click',function(){

                let productId = this.dataset.product;
                let color = this.dataset.color;

                let shirt = canvases[productId].shirt;
                let canvas = canvases[productId].canvas;

                shirt.filters = [
                    new fabric.Image.filters.BlendColor({
                        color: color,
                        mode: 'multiply',
                        alpha: 1
                    })
                ];

                shirt.applyFilters();
                canvas.renderAll();

            });

        });

    });
</script>
@endpush

@endsection


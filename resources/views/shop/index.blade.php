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

    <section class="shop-container container-fluid mt-4">

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
                                <img src="{{ asset('storage/'.$product->image) }}">
                            </div>
                            <div class="product-info">
                                <h6>{{ $product->name }}</h6>
                                <!-- <div class="product-colors">
                                    foreach(product->colors as $color)
                                    <span class="color-dot" style="background: color->hex "></span>
                                    endforeach
                                </div> -->
                                <a href="#" class="btn-buy">
                                    Personalizar
                                </a>
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
@endpush

@endsection


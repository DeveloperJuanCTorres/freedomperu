@extends('layouts.app')

@section('title', 'Tienda')

@section('content')

<!-- FILTERS TOP -->
<section class="shop-filters-section1 mb-3">

    <div class="filters-wrapper1">

        <!-- Categorías -->
        <div class="mb-5">

            <!-- <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h4 class="filters-title1 mb-1">
                        Categorías
                    </h4>
                </div>

            </div> -->

            <!-- Scroll -->
            <div class="categories-scroll1">

                <!-- Categoria -->
                <a href="#"
                   class="category-card1 active">

                    <div class="category-img1">

                        <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=500&q=80">

                    </div>

                    <span>Polos</span>

                </a>

                <!-- Categoria -->
                <a href="#"
                   class="category-card1">

                    <div class="category-img1">

                        <img src="https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=500&q=80">

                    </div>

                    <span>Poleras</span>

                </a>

                <!-- Categoria -->
                <a href="#"
                   class="category-card1">

                    <div class="category-img1">

                        <img src="https://images.unsplash.com/photo-1523398002811-999ca8dec234?auto=format&fit=crop&w=500&q=80">

                    </div>

                    <span>Gorras</span>

                </a>

                <!-- Categoria -->
                <a href="#"
                   class="category-card1">

                    <div class="category-img1">

                        <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=500&q=80">

                    </div>

                    <span>Tomatodos</span>

                </a>

                <!-- Categoria -->
                <a href="#"
                   class="category-card1">

                    <div class="category-img1">

                        <img src="https://images.unsplash.com/photo-1618354691373-d851c5c3a990?auto=format&fit=crop&w=500&q=80">

                    </div>

                    <span>Llaveros</span>

                </a>

                <!-- Categoria -->
                <a href="#"
                   class="category-card1">

                    <div class="category-img1">

                        <img src="https://images.unsplash.com/photo-1523398002811-999ca8dec234?auto=format&fit=crop&w=500&q=80">

                    </div>

                    <span>Pack</span>

                </a>                
            </div>

        </div>

        <!-- ESTILOS -->
        <div>

            <!-- <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h4 class="filters-title1 mb-1">
                        Estilos
                    </h4>
                </div>

            </div> -->

            <div class="styles-scroll">

                <button class="style-tag active">
                    Anime
                </button>

                <button class="style-tag">
                    Videojuegos
                </button>

                <button class="style-tag">
                    Minimalista
                </button>

                <button class="style-tag">
                    Retro
                </button>

                <button class="style-tag">
                    Streetwear
                </button>

                <button class="style-tag">
                    Cyberpunk
                </button>

                <button class="style-tag">
                    Urbano
                </button>

                <button class="style-tag">
                    Cine & TV
                </button>

                

            </div>

        </div>

    </div>

</section>

<!-- Main Content -->
<div class="container-fluid px-lg-5 pb-5">
    <!-- Using align-items-flex-start on the row to allow sidebar sticky to work correctly -->
    <div class="row align-items-start">
        
        <!-- Product Grid Column -->
        <div class="col-lg-12">
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
            <!-- Product Grid: exactly 3 cards per row on md+ -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
                <!-- CUSTOM PRODUCT -->
                <div class="col">

                    <a href="{{ route('design.index') }}"
                    class="text-decoration-none">

                        <div class="custom-shop-card">

                            <div class="custom-shop-image">

                                <img
                                    src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=80"
                                    alt="Diseña tu producto">

                                <div class="custom-shop-overlay">

                                    <span class="custom-shop-badge">
                                        FREEDOM STUDIO
                                    </span>

                                    <h3>
                                        Diseña tu<br>
                                        propio estilo
                                    </h3>

                                    <p>
                                        Personaliza polos, poleras y accesorios
                                        con tu creatividad.
                                    </p>

                                    <div class="custom-shop-btn">

                                        Crear diseño
                                        <i class="fas fa-arrow-right ms-2"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </a>

                </div>
                <!-- Product Card 1 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <span class="badge-new">Nuevo</span>
                            <img alt="Oversized Obsidian Tee" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4rTzf4BAg3RPn6Ky9nt84Q8yEo_An2dd9Lsvs-6yKX7PimrNkEfbL8HY6SWZYlbUGELX4d5T0XFADAd0vfUIBNW_gJluHi0Es-Ij81uBAOqi7OvxdjNE86bph4JMO0ninklqqwI-1DuVbvSw4Grm3HNWahQCnSFTI0o4JRNX-f3MvKN0yfdbGjzK3pArUF7uklrBtNCdbFUsTWgDabDTiDxoxgv4iyhPq4VDt5gKI6WUEGrc0Wc-QbAqchs-eb3PMw3oVeJXKbw" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Atelier Collection</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Oversized Obsidian Tee</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 89.00</span>
                                <div class="d-flex gap-1">
                                    <span style="width:12px; height:12px; background:#1c1b1f; border-radius:50%; border:1px solid #ccc;"></span>
                                    <span style="width:12px; height:12px; background:#e5e1e7; border-radius:50%; border:1px solid #ccc;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 2 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Essential Hoodie" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhmChbnK6-SqIVEdhnHNzkBxTyqxysoD6CeAEPmdYo4Dcn6xTbldBlr1Ksxu36U8riyhBcZvjayS__8TK3gRsgrE7xME7-vbpQt1flg1AKgP2nwxGATyGc4c3I64LS_v9sDP_9kon3RyrL4OvmOVTr4OZ9DG7L8TvfrEn23EjJf11a6nZD31BO0gZSfLvnOiYZ9PB1j5vymHLdVePMBIxYjPZUIDNhhB1UNmuN__Ok4pVWTSs59NIXRIUih50WgVugAL4Pf9cReA" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Minimalist Line</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Essential Hoodie</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 149.00</span>
                                <div class="d-flex gap-1">
                                    <span style="width:12px; height:12px; background:#4a454d; border-radius:50%; border:1px solid #ccc;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 3 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Kintsugi Concept Tee" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDPFWppU9kXr9k3pYD8pmjTFXetDD_eONhObEHZj_oVGdd67Z46rIumzMfV0kSv0hjyf3fvAAZkuIBJ5ufTCP_YX0WIF2IntDjEruGCVeqVHwZs7L1TrU8fHwsozUXaiqtnvCuGXm1_oufnxDXLTbVddJeUlALmss6JaieQLNgQpkuDsrR9IkWk61XxgYkB1Wuw5Jwl_1Md7CQfwMkSEyDW2fF5gWhagyx4I0GR5bcOf4pjbNMGLJTbLjqnAJnT0JNPtzyUVh85Ww" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Art Series</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Kintsugi Concept Tee</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 95.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 4 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <span class="badge-new" style="background:var(--secondary-color)">Limitado</span>
                            <img alt="Atelier Curved Brim" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCkhkC7nEEU1O7nEALQjQhNVnagy8dSceCRhgHOPIRPSaObtNxYyQNsgRX30zyeUQ97KjQA8nPuzX5xjGB6dGUwd1scGmIQsfNxzM80wEQClA22eDcz3yiLs-Lh1zk1yraEDwmRyjhfTuJyQBvreqSKm5Abhu7sXKng0gH0Ga-DUwbcR-DPZ0_nFtv7wfR8m2w2pNLY2bY6NoMn1wl09VYu_nqxVK8fKS3z3uK6yU84xjiRcl42eqm1eGNkg4GUN_pmRRK8C-EJuA" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Accesorios</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Atelier Curved Brim</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 65.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 5 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Bespoke Moto Jacket" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiint3Xxx4AbqZx_ZDdoHL4mYvAROJpmxiqptEcdFF6iNZ6fyrNlsoHgJI0copc5QBpe69iiBXT5vm_5mZUEuZCvUIBajtPm6Kdct3on2kk_RBto7G0k2FKRzJf7p1dcFzfE0T5GYJ9w58spQBkbp5KWCdvLjubRYiWi8YaYecpGacrGOIrGv7HG3yLN3uHccXoWkgQqRViKnfqnsu_17v3_K-ylvYVALCfGU_9_84DPrwOWKg0XvVcBRMOOKAfCXH1hQwBM_gwA" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Premium Outerwear</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Bespoke Moto Jacket</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 320.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 6 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Essential Pack" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5nHLnpGLAjKFJuLKNGlavR2gONN9cvAuvmmhrk9smiFKD7pwSPmC-bWGxs30JouHHkr9hfCblYcecSmwtcLV0DXx5PxoVoS6zpgPEiBChsg3JgD9RpVWm1zAFit22G1nX_LQuZkg8fUeuXgkKI3r4pNPWxgIxCgz9hDik9Ttp2Nzz5dQ3iwum3lCROTjARwpqEOTFo30UQVjDqcQ4zwH_PPA6VAByNp2mkPP5RAeWcMQk4elzOnrqhr32rvT1aStbClgfryBktg" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Basic Collection</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Essential Pack (x3)</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 220.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 7 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Matte Thermal Bottle" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoKRt5gTlNwBTBNUfEIhOYs7J4u09hyCq75MmG5dBFUBZnx0H1srlz8CDmT16bDvd9PhDXCDQEgoziSXBispZeRaJqcXIOGj3HbSfV3vfJAlBUMx68TW7-DBhKScVSfUbtlcEupwk2pW0Qx9kuG_t3B5MYXVgM9Sx9jfGQ2egIHbueki51Dnkj7gAW8MJOa_PqBoGlmku6x7bQ9XNqvRh3G8wOCjOfhqbUQVHPcLqAYFqVLoNArlZ83YEn4XMqM5gJOr2icx9qBw" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Accessories</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Matte Thermal Bottle</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 79.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 8 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Sand Knit Sweater" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA67YgvMHzGFRLkVZXKvysHd_MEQW6ijs34o83l5KFUZXFIdrhEXnQRbLp2Ik7rKXqvY20M88gZiXUUEg6x4WVNF75AvueCl3ri7pHwGbF_e1CmforJLAIYFEg3T3SSEj4hwZQMwSZZaKYb_dJMx3UlDfvkPmFgnrNJEoKqPl1TS315pXy0JNrvEAk4PWsPI9aKMhl3cxHl21ruz0teRPnEibPbQ_VjNJ9AMYhQQp4Cxq_LPGj6yEcUn3VyZDPPI_vgaSgQtob6Tw" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Fall Collection</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Sand Knit Sweater</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 185.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 6 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Essential Pack" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5nHLnpGLAjKFJuLKNGlavR2gONN9cvAuvmmhrk9smiFKD7pwSPmC-bWGxs30JouHHkr9hfCblYcecSmwtcLV0DXx5PxoVoS6zpgPEiBChsg3JgD9RpVWm1zAFit22G1nX_LQuZkg8fUeuXgkKI3r4pNPWxgIxCgz9hDik9Ttp2Nzz5dQ3iwum3lCROTjARwpqEOTFo30UQVjDqcQ4zwH_PPA6VAByNp2mkPP5RAeWcMQk4elzOnrqhr32rvT1aStbClgfryBktg" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Basic Collection</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Essential Pack (x3)</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 220.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 7 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Matte Thermal Bottle" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCoKRt5gTlNwBTBNUfEIhOYs7J4u09hyCq75MmG5dBFUBZnx0H1srlz8CDmT16bDvd9PhDXCDQEgoziSXBispZeRaJqcXIOGj3HbSfV3vfJAlBUMx68TW7-DBhKScVSfUbtlcEupwk2pW0Qx9kuG_t3B5MYXVgM9Sx9jfGQ2egIHbueki51Dnkj7gAW8MJOa_PqBoGlmku6x7bQ9XNqvRh3G8wOCjOfhqbUQVHPcLqAYFqVLoNArlZ83YEn4XMqM5gJOr2icx9qBw" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Accessories</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Matte Thermal Bottle</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 79.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Card 8 -->
                <div class="col">
                    <div class="product-card position-relative">
                        <div class="product-image-wrapper mb-3 position-relative">
                            <img alt="Sand Knit Sweater" class="img-fluid" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA67YgvMHzGFRLkVZXKvysHd_MEQW6ijs34o83l5KFUZXFIdrhEXnQRbLp2Ik7rKXqvY20M88gZiXUUEg6x4WVNF75AvueCl3ri7pHwGbF_e1CmforJLAIYFEg3T3SSEj4hwZQMwSZZaKYb_dJMx3UlDfvkPmFgnrNJEoKqPl1TS315pXy0JNrvEAk4PWsPI9aKMhl3cxHl21ruz0teRPnEibPbQ_VjNJ9AMYhQQp4Cxq_LPGj6yEcUn3VyZDPPI_vgaSgQtob6Tw" />
                            <button class="btn btn-primary position-absolute bottom-0 end-0 m-3 p-0 rounded-circle d-flex align-items-center justify-content-center shadow" style="width: 40px; height: 40px; background-color: var(--primary-color); border: none;">
                                <i class="fas fa-shopping-bag text-white" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <div class="product-info">
                            <p class="product-collection text-uppercase fw-bold mb-1" style="letter-spacing: 1px; font-size: 0.7rem;">Fall Collection</p>
                            <h4 class="product-title fw-bold mb-2" style="font-size: 1rem; color: var(--primary-color);">Sand Knit Sweater</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price fw-bold" style="color: var(--secondary-color); font-size: 1.1rem;">S/ 185.00</span>
                            </div>
                        </div>
                    </div>
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

<!-- <div class="shop-page">
   
    <section class="shop-banner">
        <img src="{{ asset('images/banner.jpg') }}">
    </section>

    
    <section class="shop-taxonomies">

        <div class="taxonomy-wrapper">

           
            <div class="taxonomy-scroll" id="taxonomyScroll">

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

         
        </div>

    </section>

    <section class="container container-fluid mt-4">

        <div class="row">
          
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

        
            <div class="col-lg-9">
                <div class="row" id="productsGrid">
                    @foreach($products as $product)
                    <div class="col-lg-6 mb-4">
                        <div class="product-card">

                            <div class="product-image">
                                @if($product->taxonomies->contains('name','Poleras'))
                                <canvas 
                                    id="canvas-{{ $product->id }}" 
                                    width="400" 
                                    height="500"
                                    data-image="{{ asset('images/polera_base_frontal.png') }}"
                                    data-design="{{ asset('storage/'.$product->image) }}">
                                </canvas>
                                @else
                                <canvas 
                                    id="canvas-{{ $product->id }}" 
                                    width="400" 
                                    height="500"
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
</div> -->

@push('scripts')

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
    document.addEventListener("DOMContentLoaded", function() {

        let canvases = {};

        document.querySelectorAll("canvas[id^='canvas-']").forEach(canvasEl => {

            let productId = canvasEl.id.replace("canvas-", "");
            let canvas = new fabric.Canvas(canvasEl.id, {
                selection: false
            });

            let shirtPath = canvasEl.dataset.image;
            let designPath = canvasEl.dataset.design;

            /* POLO BASE */

            fabric.Image.fromURL(shirtPath, function(shirt) {

                shirt.set({
                    left: 0,
                    top: 0,
                    selectable: false,
                    evented: false
                });

                shirt.scaleToWidth(canvas.width);

                canvas.add(shirt);
                canvas.sendToBack(shirt);

                /* ===== COLOR ALEATORIO ===== */

                let colors = document.querySelectorAll(
                    `.color-box[data-product="${productId}"]`
                );

                if (colors.length) {

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

                if (designPath) {

                    fabric.Image.fromURL(designPath, function(design) {

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

                canvases[productId] = {
                    canvas: canvas,
                    shirt: shirt
                };

                canvas.renderAll();

            });

        });

        /* CAMBIAR COLOR */

        document.querySelectorAll('.color-box').forEach(btn => {

            btn.addEventListener('click', function() {

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

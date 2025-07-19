<x-layout>
    <x-slot name="title">Awal Jaya - Homepage</x-slot>

    <!-- Hero Section -->
    <div class="hero-section position-relative" style="height: 60vh; background: linear-gradient(135deg, rgba(0,0,0,0.6), rgba(0,0,0,0.4)), url('https://via.placeholder.com/1920x800?text=Semprong+Background') center/cover;">
        <div class="container h-100 d-flex align-items-center">
            <div class="row w-100">
                <div class="col-lg-6">
                    <h1 class="display-4 text-white fw-bold mb-3">Awal Jaya</h1>
                    <h2 class="text-warning display-5 fw-bold mb-4">Semprong</h2>
                    <p class="text-white fs-5 mb-4">Cemilan tradisional warisan turun-temurun dengan rasa autentik.</p>
                    <div class="d-flex gap-3 mb-4">
                        <span class="badge bg-success fs-6 px-3 py-2">
                            <i class="fas fa-check-circle me-2"></i>Halal
                        </span>
                        <span class="badge bg-info fs-6 px-3 py-2">
                            <i class="fas fa-leaf me-2"></i>Fresh
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- WhatsApp Float Button -->
        <div class="position-fixed" style="bottom: 20px; right: 20px; z-index: 1000;">
            <a href="https://wa.me/6281234567890" class="btn btn-success rounded-circle p-3 shadow-lg" style="width: 60px; height: 60px;">
                <i class="fab fa-whatsapp fs-4"></i>
            </a>
        </div>
        
        <!-- Contact Info Toast -->
        <div class="position-fixed bg-primary text-white p-3 rounded" style="bottom: 90px; right: 20px; z-index: 999; max-width: 280px;">
            <div class="d-flex align-items-center">
                <i class="fas fa-phone me-2"></i>
                <div>
                    <small class="fw-bold">Hubungi kami jika ada keluhan</small>
                    <br>
                    <small>Admin Online</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Produk Unggulan Section -->
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Produk Unggulan</h2>
            <p class="text-muted">Koleksi cemilan tradisional terbaik kami</p>
        </div>
        
        <div class="row g-4">
            <!-- Semprong Original -->
            <div class="col-lg-4 col-md-6">
                <div class="card product-card h-100 shadow-sm border-0">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/400x250?text=Semprong+Original" class="card-img-top" alt="Semprong Original" style="height: 250px; object-fit: cover;">
                        <span class="badge bg-warning position-absolute top-0 start-0 m-3 px-3 py-2">Bestseller</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Semprong Original</h5>
                        <p class="card-text text-muted">Semprong klasik dengan resep warisan turun-temurun. Renyah, manis alami, dan cocok dinikmati kapan saja sebagai teman teh atau kopi.</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-warning me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-muted">(4.9)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Semprong Kipas -->
            <div class="col-lg-4 col-md-6">
                <div class="card product-card h-100 shadow-sm border-0">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/400x250?text=Semprong+Kipas" class="card-img-top" alt="Semprong Kipas" style="height: 250px; object-fit: cover;">
                        <span class="badge bg-info position-absolute top-0 start-0 m-3 px-3 py-2">Popular</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Semprong Kipas</h5>
                        <p class="card-text text-muted">Camilan unik dengan bentuk kipas dan aroma harum khas. Dibalut rasa gurih-manis yang pas, cocok untuk sajian keluarga maupun hantaran.</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-warning me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-muted">(4.7)</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Semprong Lempit -->
            <div class="col-lg-4 col-md-6">
                <div class="card product-card h-100 shadow-sm border-0">
                    <div class="position-relative">
                        <img src="https://via.placeholder.com/400x250?text=Semprong+Lempit" class="card-img-top" alt="Semprong Lempit" style="height: 250px; object-fit: cover;">
                        <span class="badge bg-success position-absolute top-0 start-0 m-3 px-3 py-2">Baru</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Semprong Lempit</h5>
                        <p class="card-text text-muted">Inovasi terbaru dengan topping keju berkualitas, gurih dan lezat</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="text-warning me-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-muted">(4.8)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ URL::to('/products') }}" class="btn btn-warning btn-lg px-5 py-3 fw-bold">Lihat Semua Produk</a>
        </div>
    </div>

    <!-- Article & Location Section -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Article Section -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm">
                        <img src="https://via.placeholder.com/600x300?text=Toko+Awal+Jaya" class="card-img-top" alt="Toko Awal Jaya" style="height: 300px; object-fit: cover;">
                        <div class="card-body">
                            <span class="badge bg-primary mb-3">Artikel Utama</span>
                            <h3 class="card-title fw-bold">Perjalanan Cita Rasa Tradisional yang Tak Terlupakan</h3>
                            <p class="card-text text-muted">Kisah bagaimana Awal Jaya Semprong menemukan dan melestarikan resep klasik yang telah diwariskan turun-temurun...</p>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <small class="text-muted">2 hari yang lalu • 5 min baca</small>
                                <small class="text-muted">234 views</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Location Section -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-header bg-white border-0">
                            <h5 class="text-danger fw-bold mb-0">Lokasi Kami</h5>
                        </div>
                        <div class="card-body">
                            <h4 class="fw-bold mb-3">Temukan Kami di Tegal</h4>
                            <p class="text-muted mb-4">Kunjungi toko kami langsung untuk mendapatkan produk semprong terfresh dan berkualitas terbaik</p>
                            
                            <div class="mb-4">
                                <h6 class="fw-bold d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                    Alamat:
                                </h6>
                                <address class="mb-0">
                                    346H+F77, Kebrajan, Ujungrusi<br>
                                    Kec. Adiwerna, Kabupaten Tegal<br>
                                    Jawa Tengah 52194
                                </address>
                            </div>

                            <!-- Mini Map Placeholder -->
                            <div class="bg-secondary rounded" style="height: 200px; background-image: url('https://via.placeholder.com/400x200?text=Google+Maps'); background-size: cover; background-position: center;">
                                <div class="d-flex align-items-center justify-content-center h-100">
                                    <div class="bg-white p-2 rounded shadow-sm">
                                        <i class="fas fa-map-marker-alt text-danger fs-4"></i>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-3">
                                <a href="https://maps.google.com/?q=346H+F77+Kebrajan+Ujungrusi" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-external-link-alt me-2"></i>Lihat peta lebih besar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section (if you still want to show categories) -->
    @if(isset($categories) && $categories->count() > 0)
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Kategori Produk</h3>
            <a href="{{ URL::to('/categories') }}" class="btn btn-outline-primary">Lihat Semua Kategori</a>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
            @foreach($categories as $category)
                <div class="col">
                    <a href="{{ URL::to('/category/'.$category->slug) }}" class="text-decoration-none">
                        <div class="card category-card text-center h-100 py-3 border-0 shadow-sm">
                            <div class="mx-auto mb-2" style="width:64px;height:64px;display:flex;align-items:center;justify-content:center;background:#f8f9fa;border-radius:50%;">
                                <img src="{{ $category->image }}" alt="{{ $category->name }}" style="width:36px;height:36px;object-fit:contain;">
                            </div>
                            <div class="card-body p-2">
                                <h6 class="card-title mb-1 text-dark">{{ $category->name }}</h6>
                                <p class="card-text text-muted small text-truncate">{{ $category->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <style>
        .hero-section {
            position: relative;
        }
        
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
        }
        
        .category-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .category-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1) !important;
        }
        
        .btn {
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        @media (max-width: 768px) {
            .hero-section {
                height: 50vh;
            }
            
            .display-4 {
                font-size: 2rem;
            }
            
            .display-5 {
                font-size: 1.5rem;
            }
        }
    </style>
</x-layout>
<x-layout>
    <!-- Tambahkan ke layout (resources/views/components/layout.blade.php) -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

    <div class="position-relative" style="height: 100vh; background: url('https://png.pngtree.com/thumb_back/fh260/background/20230718/pngtree-d-rendered-concept-of-a-mobile-shopping-app-for-online-stores-image_3911957.jpg') center center / cover no-repeat;">
        <!-- Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-75"></div>

        <!-- Content -->
        <div class="position-relative z-1 d-flex flex-column justify-content-center align-items-center text-center text-white h-100 px-4">
            <h1 class="display-3 fw-bold mb-3" style="text-shadow: 0 4px 10px rgba(0,0,0,0.7);">
                Selamat Datang di <span class="text-warning">E-Commerce</span> Kami
            </h1>
            <p class="lead mb-4 fs-5" style="max-width: 700px;">
                Temukan produk terbaik, promo eksklusif, dan pengalaman belanja yang menyenangkan hanya untuk Anda.
            </p>
            <a href="{{ route('products') }}" class="btn btn-warning btn-lg px-5 py-3 shadow-lg rounded-pill">
                ✨ Jelajahi Sekarang
            </a>
        </div>
    </div>
</x-layout>






    <!-- <div class="container mt-4">

        {{-- Categories Section --}}
        <h3 class="mb-3">Categories</h3>
        <div class="row">
            @foreach($categories as $category)
            <div class="col-md-3 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="card-img-top" style="height: 200px; object-fit: cover; object-position: center;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        <div class="mt-auto">
                            <a href="/category/{{ $category->slug }}" class="btn btn-primary w-100">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <hr>

        {{-- Products Section --}}
        <h3 class="mb-3 mt-5">Products</h3>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}" class="card-img-top" style="height: 200px; object-fit: cover; object-position: center;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                        <p class="card-text"><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                        <div class="mt-auto">
                            <a href="/product/{{ $product->slug }}" class="btn btn-success w-100">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div> -->


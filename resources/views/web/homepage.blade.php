<x-layout>
    <div class="container-fluid text-center text-white d-flex align-items-center justify-content-center" 
        style="background: url('{{ asset('https://png.pngtree.com/thumb_back/fh260/background/20230718/pngtree-d-rendered-concept-of-a-mobile-shopping-app-for-online-stores-image_3911957.jpg') }}') center center / cover no-repeat; height: 100vh;">
        <div class="bg-dark bg-opacity-50 p-5 rounded">
            <h1 class="display-4 fw-bold mb-3">Selamat Datang di E-Commerce Kami!</h1>
            <p class="lead mb-4">Temukan produk terbaik dan kategori pilihan untuk memenuhi semua kebutuhan Anda.</p>
            <a href="{{ route('products') }}" class="btn btn-warning btn-lg px-4">Jelajahi Sekarang</a>
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


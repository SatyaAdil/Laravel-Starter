<x-layout>
    <x-slot:title>{{ $title }}</x-slot>

        <div class="row">
            <h3>Categories</h3>
            @foreach($categories as $category)
            <div class="col-2">
                <div class="card">
                    <img src="{{ $category['image'] }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category['name'] }}</h5>
                        <p class="card-text">
                            {{ $category['description'] }}
                        </p>
                        <a href="/category/{{ $category['slug'] }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h3>Ini adalah halaman Homepage</h3>
        <x-card></x-card>
        <!-- Alert Component (diletakkan di bawah card) -->
        <x-alert type="primary" message="A simple primary alert—check it out!" />
        <x-alert type="secondary" message="A simple secondary alert—check it out!" />
        <x-alert type="success" message="A simple success alert—check it out!" />
        <x-alert type="danger" message="A simple danger alert—check it out!" />
        <x-alert type="warning" message="A simple warning alert—check it out!" />
        <x-alert type="info" message="A simple info alert—check it out!" />
        <x-alert type="light" message="A simple light alert—check it out!" />
        <x-alert type="dark" message="A simple dark alert—check it out!" />
</x-layout>
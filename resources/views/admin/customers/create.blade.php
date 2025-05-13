<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Customer</title>

    <!-- Link ke CDN Flux UI -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flux-ui/dist/flux.min.css">
</head>
<body>

    <div class="flux-container">
        <div class="flux-card flux-p-6 flux-max-w-xl flux-mx-auto">
            <h1 class="flux-text-3xl flux-mb-4">Create New Customer</h1>

            {{-- Pesan error validasi --}}
            @if ($errors->any())
                <div class="flux-alert flux-alert-error flux-mb-4">
                    <ul class="flux-list-disc flux-ml-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.customers.store') }}" method="POST">
                @csrf

                <!-- Nama Field -->
                <div class="flux-mb-4">
                    <label for="name" class="flux-font-bold">Name</label>
                    <input type="text" name="name" id="name" class="flux-input flux-mt-1 flux-block flux-w-full" value="{{ old('name') }}" required>
                </div>

                <!-- Email Field -->
                <div class="flux-mb-4">
                    <label for="email" class="flux-font-bold">Email</label>
                    <input type="email" name="email" id="email" class="flux-input flux-mt-1 flux-block flux-w-full" value="{{ old('email') }}" required>
                </div>

                <!-- Phone Field -->
                <div class="flux-mb-4">
                    <label for="phone" class="flux-font-bold">Phone</label>
                    <input type="text" name="phone" id="phone" class="flux-input flux-mt-1 flux-block flux-w-full" value="{{ old('phone') }}" required>
                </div>

                <!-- Address Field -->
                <div class="flux-mb-4">
                    <label for="address" class="flux-font-bold">Address</label>
                    <textarea name="address" id="address" class="flux-input flux-mt-1 flux-block flux-w-full" rows="4">{{ old('address') }}</textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="flux-btn flux-btn-primary">Create Customer</button>
            </form>
        </div>
    </div>

    <!-- Script JS dari Flux UI -->
    <script src="https://cdn.jsdelivr.net/npm/flux-ui/dist/flux.min.js"></script>

</body>
</html>

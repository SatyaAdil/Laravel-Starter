<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- FluxUI inspired style -->
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --secondary: #6b7280;
            --danger: #ef4444;
            --success: #22c55e;
            --background: #1e1e1e;
            --foreground: #e4e4e7;
            --card: #27272a;
            --card-foreground: #e4e4e7;
            --border: #3f3f46;
        }
        
        body {
            background-color: var(--background);
            color: var(--foreground);
            font-family: system-ui, -apple-system, sans-serif;
        }
        
        .flux-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: all 0.2s;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }
        
        .flux-btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .flux-btn-primary:hover {
            background-color: var(--primary-hover);
        }
        
        .flux-btn-secondary {
            background-color: var(--secondary);
            color: white;
        }
        
        .flux-btn-danger {
            background-color: var(--danger);
            color: white;
        }
        
        .flux-input {
            background-color: var(--background);
            border: 1px solid var(--border);
            color: var(--foreground);
            padding: 0.5rem;
            border-radius: 0.375rem;
            width: 100%;
            outline: none;
        }
        
        .flux-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 1px var(--primary);
        }
        
        .flux-card {
            background-color: var(--card);
            border-radius: 0.5rem;
            padding: 1.5rem;
            border: 1px solid var(--border);
        }
        
        .flux-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .flux-table th, .flux-table td {
            padding: 0.75rem 1rem;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }
        
        .flux-table th {
            background-color: var(--card);
            font-weight: 500;
        }
        
        .flux-alert {
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }
        
        .flux-alert-success {
            background-color: rgba(34, 197, 94, 0.1);
            border: 1px solid var(--success);
            color: var(--success);
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 p-4">
            <div class="flex items-center mb-8">
                <span class="text-white font-bold text-xl">Admin Panel</span>
            </div>
            
      <nav>
    <a href="{{ route('admin.products.index') }}" class="flex items-center text-gray-300 py-2 px-4 rounded hover:bg-gray-800 mb-1">
        <span>Products</span>
    </a>
    <a href="{{ route('admin.customers.index') }}" class="flex items-center text-gray-300 py-2 px-4 rounded hover:bg-gray-800 mb-1">
        <span>Customers</span>
    </a>
    <a href="{{ route('admin.orders.index') }}" class="flex items-center text-gray-300 py-2 px-4 rounded hover:bg-gray-800 mb-1">
        <span>Orders</span>
    </a>
</nav>

        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-gray-900 border-b border-gray-800 p-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-white text-xl font-semibold">@yield('title', 'Dashboard')</h1>
                </div>
            </header>
            
            <!-- Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-800 p-6">
                @if(session('success'))
                    <div class="flux-alert flux-alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
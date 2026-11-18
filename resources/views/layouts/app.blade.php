<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventory Management')</title>

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #2563eb;
            --primary-hover: #1d4ed8;
            --sidebar-bg: #1e293b;
            --sidebar-hover: #334155;
            --sidebar-active: #2563eb;
            --body-bg: #f8fafc;
            --card-border: #e2e8f0;
            --text-main: #0f172a;
            --text-muted: #64748b;
        }

        body {
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: var(--body-bg);
            color: var(--text-main);
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .app-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .sidebar-menu {
            padding: 16px 12px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.925rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            font-size: 1.1rem;
        }

        .sidebar-link:hover {
            color: #ffffff;
            background-color: var(--sidebar-hover);
        }

        .sidebar-link.active {
            color: #ffffff;
            background-color: var(--sidebar-active);
        }

        .sidebar-footer {
            padding: 16px;
            border-top: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* Content Area */
        .content-area {
            flex-grow: 1;
            padding: 32px;
            max-width: 100%;
            overflow-x: hidden;
        }

        /* Consistent Color Theme for Buttons */
        .btn-primary {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: #ffffff !important;
            font-weight: 500;
            padding: 8px 18px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--primary-hover) !important;
            border-color: var(--primary-hover) !important;
        }

        .btn-outline-primary {
            color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
            color: #ffffff !important;
        }

        .btn-outline-danger {
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        /* Card Customization */
        .card {
            border: 1px solid var(--card-border);
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            background-color: #ffffff;
        }

        /* Table Customization */
        .table {
            vertical-align: middle;
            margin-bottom: 0;
        }

        .table th {
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: var(--text-muted);
            background-color: #f8fafc;
            border-bottom: 1px solid var(--card-border);
            padding: 14px 16px;
        }

        .table td {
            padding: 14px 16px;
            border-bottom: 1px solid #f1f5f9;
            color: var(--text-main);
            font-size: 0.925rem;
        }

        /* Form Controls */
        .form-control, .form-select {
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            padding: 9px 13px;
            font-size: 0.925rem;
            color: var(--text-main);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }

        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 6px;
            color: var(--text-main);
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .app-wrapper {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
            }

            .content-area {
                padding: 20px 16px;
            }
        }
    </style>
</head>

<body>

    <div class="app-wrapper">

        <!-- Sidebar -->
        <div class="sidebar">

            <a href="{{ route('dashboard') }}" class="sidebar-brand">
                <i class="bi bi-box-seam-fill text-primary"></i>
                <span>Inventory System</span>
            </a>

            <div class="sidebar-menu">

                <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>

                @can('view products')
                    <a href="{{ route('products.index') }}" class="sidebar-link {{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i>
                        <span>Products</span>
                    </a>
                @endcan

                @can('view categories')
                    <a href="{{ route('categories.index') }}" class="sidebar-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <i class="bi bi-tags"></i>
                        <span>Categories</span>
                    </a>
                @endcan

                @role('admin')
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <span>Manage Users</span>
                    </a>
                @endrole

            </div>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-light w-100 btn-sm d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>

        </div>

        <!-- Main Content -->
        <div class="content-area">
            @yield('content')
        </div>

    </div>

    <!-- Bootstrap 5.3 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

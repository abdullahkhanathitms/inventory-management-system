@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <!-- Dashboard Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1">Inventory Dashboard</h1>
            <p class="text-muted mb-0">Welcome, <strong>{{ auth()->user()->name }}</strong></p>
        </div>
        <div>
            <span class="badge bg-white text-secondary border px-3 py-2 rounded-pill shadow-sm">
                Role: <strong class="text-primary">{{ auth()->user()->getRoleNames()->implode(', ') }}</strong>
            </span>
        </div>
    </div>

    <!-- Metric Cards -->
    <div class="row g-4">

        @can('view products')
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-semibold text-uppercase">Total Products</span>
                            <div class="rounded-3 p-2 bg-primary-subtle text-primary">
                                <i class="bi bi-box-seam fs-4"></i>
                            </div>
                        </div>
                        <h2 class="h1 fw-bold text-dark mb-0">{{ $totalProducts }}</h2>
                    </div>
                </div>
            </div>
        @endcan

        @can('view categories')
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-semibold text-uppercase">Total Categories</span>
                            <div class="rounded-3 p-2 bg-primary-subtle text-primary">
                                <i class="bi bi-tags fs-4"></i>
                            </div>
                        </div>
                        <h2 class="h1 fw-bold text-dark mb-0">{{ $totalCategories }}</h2>
                    </div>
                </div>
            </div>
        @endcan

        @role('admin')
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small fw-semibold text-uppercase">Total Users</span>
                            <div class="rounded-3 p-2 bg-primary-subtle text-primary">
                                <i class="bi bi-people fs-4"></i>
                            </div>
                        </div>
                        <h2 class="h1 fw-bold text-dark mb-0">{{ $totalUsers }}</h2>
                    </div>
                </div>
            </div>
        @endrole

    </div>

@endsection

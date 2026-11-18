@extends('layouts.app')

@section('title', 'Manage Categories')

@section('content')

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark mb-0">Manage Categories</h1>
        </div>
        <div>
            @can('create categories')
                <a href="{{ route('categories.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-1 shadow-sm">
                    <i class="bi bi-plus-lg"></i>
                    <span>Add Category</span>
                </a>
            @endcan
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Categories Table Card -->
    <div class="card border-0 shadow-sm rounded-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4" style="width: 80px;">ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-end pe-4" style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="ps-4 text-muted small">#{{ $category->id }}</td>
                            <td class="fw-semibold">{{ $category->name }}</td>
                            <td class="text-muted">{{ $category->description ?? '—' }}</td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    @can('edit categories')
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-outline-primary d-inline-flex align-items-center gap-1">
                                            <i class="bi bi-pencil"></i>
                                            <span>Edit</span>
                                        </a>
                                    @endcan

                                    @can('delete categories')
                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                              method="POST"
                                              style="display:inline;"
                                              onsubmit="return confirm('Are you sure you want to delete this category?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger d-inline-flex align-items-center gap-1">
                                                <i class="bi bi-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                No categories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')

    <!-- Page Header -->
    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark mb-0">Manage Users</h1>
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

    <!-- Users Table Card -->
    <div class="card border-0 shadow-sm rounded-3">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4" style="width: 80px;">ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="width: 260px;">Change Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td class="ps-4 text-muted small">#{{ $user->id }}</td>
                            <td class="fw-semibold text-dark">{{ $user->name }}</td>
                            <td class="text-muted">{{ $user->email }}</td>
                            <td>
                                <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle px-2 py-1 text-capitalize">
                                    {{ $user->roles->pluck('name')->implode(', ') ?: 'No Role' }}
                                </span>
                            </td>
                            <td>
                                @if(!$user->hasRole('admin'))
                                    <form action="{{ route('admin.users.update', $user->id) }}"
                                          method="POST"
                                          class="d-flex align-items-center gap-2">
                                        @csrf
                                        @method('PUT')

                                        <select name="role" class="form-select form-select-sm" style="width: auto;">
                                            <option value="staff" {{ $user->hasRole('staff') ? 'selected' : '' }}>
                                                Staff
                                            </option>
                                            <option value="manager" {{ $user->hasRole('manager') ? 'selected' : '' }}>
                                                Manager
                                            </option>
                                        </select>

                                        <button type="submit" class="btn btn-sm btn-primary text-nowrap">
                                            Update Role
                                        </button>
                                    </form>
                                @else
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1">
                                        <i class="bi bi-shield-lock me-1"></i>Admin Account
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

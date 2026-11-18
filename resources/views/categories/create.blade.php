@extends('layouts.app')

@section('title', 'Add Category')

@section('content')

    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark mb-0">Add Category</h1>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 col-xl-6">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">

                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Enter category name"
                                   required>
                            @error('name')
                                <div class="invalid-feedback d-block mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description"
                                      name="description"
                                      rows="3"
                                      placeholder="Enter category description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-primary">Save Category</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Back</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

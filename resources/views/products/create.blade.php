@extends('layouts.app')

@section('title', 'Add Product')

@section('content')

    <div class="mb-4">
        <h1 class="h3 fw-bold text-dark mb-0">Add Product</h1>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-body p-4">

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="Enter product name"
                                   required>
                            @error('name')
                                <div class="invalid-feedback d-block mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description"
                                      name="description"
                                      rows="3"
                                      placeholder="Enter product description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="number"
                                       step="0.01"
                                       class="form-control @error('price') is-invalid @enderror"
                                       id="price"
                                       name="price"
                                       value="{{ old('price') }}"
                                       placeholder="0.00"
                                       required>
                                @error('price')
                                    <div class="invalid-feedback d-block mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number"
                                       class="form-control @error('quantity') is-invalid @enderror"
                                       id="quantity"
                                       name="quantity"
                                       value="{{ old('quantity') }}"
                                       placeholder="0"
                                       required>
                                @error('quantity')
                                    <div class="invalid-feedback d-block mt-1">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                    id="category_id"
                                    name="category_id"
                                    required>
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback d-block mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center gap-2">
                            <button type="submit" class="btn btn-primary">Save Product</button>
                            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.adminMaster')
@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h4 class="text-black-50 fw-bold mb-0">Edit Product</h4>
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">All Products</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-8">
            <form action="{{ route('product.update', $product->id) }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="text-black-50 mb-1">Edit Product's Name</label>
                    <input type="text" class="form-control"
                           id="name" name="name" value="{{ old('name', $product->name) }}">
                    @error('name')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="text-black-50 mb-2">Choose Product's Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="cat" class="text-black-50 mb-2">Choose Category</label>
                    <select name="category" id="cat" name="category" class="form-select">
                        <option value="" disabled>Select Category</option>
                        @forelse($cats as $cat)
                            <option value="{{ $cat->id }}"
                                    @if( $cat->id == $product->category_id)
                                        selected
                                    @endif
                            >{{ $cat->name }}</option>
                        @empty
                            <option value="">No Category</option>
                        @endforelse
                    </select>
                    @error('category')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="text-black-50 mb-2">Edit Product's Price</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                    @error('price')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="text-black-50 mb-2">Edit Product's Description</label>
                    <textarea name="description" id="description" class="form-control"
                              rows="10">
                        {{ old('description', $product->description) }}
                    </textarea>
                    @error('description')
                    <small class="text-danger fw-bold">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mt-2">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <div class="col-4">
            <label for="p-image" class="text-black-50 mb-1">Product's Image</label>
            <img src="{{ asset($product->image) }}" alt="" id="p-image"
                 style="width: 100%; border: 2px solid #000000; border-radius: 10px;">
        </div>
    </div>
@endsection

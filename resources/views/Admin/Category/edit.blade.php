@extends('layouts.adminMaster')
@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h4 class="text-black-50 fw-bold mb-0">Edit Category</h4>
        <a href="{{ route('category.index') }}" class="btn btn-sm btn-primary">All Categories</a>
    </div>
    <hr>
    <div class="row">
        <div class="col-8">
            <form action="{{ route('category.update', $category->id) }}" method="post">
                @csrf
                @method('put')
                <label for="name" class="text-black-50 mb-1">Enter Category's Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}">
                @error('name')
                <small class="text-danger fw-bold">{{ $message }}</small>
                @enderror
                <div class="mt-2">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

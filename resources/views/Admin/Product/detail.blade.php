@extends('layouts.adminMaster')
@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">All Products</a>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Image</th>
            <th class="text-uppercase">Category</th>
            <th class="text-uppercase">Price</th>
            <th class="text-uppercase">View Count</th>
            <th class="text-uppercase">Option</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-nowrap">{{ $product->name }}</td>
                <td class="">
                    <img src="{{ asset($product->image) }}" alt=""
                         style="width: 40px; height: 40px;
                                border-radius: 50%;
                                border: 2px solid #000000; "
                    >
                </td>
                <td >
                    {{ $product->categoryInfo->name }}
                </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->view_count }}</td>
                <td>
                    <a href="{{ route('product.show', $product->id) }}" class="badge bg-info text-black-50 text-decoration-none">Detail</a>
                    <a href="{{ route('product.edit', $product->id) }}" class="badge bg-warning text-black-50 text-decoration-none">Update</a>
                    <form action="{{ route('product.destroy', $product->id) }}"
                          method="post" class="d-inline" id="delete-form">
                        @csrf
                        @method('delete')
                        <a href="#" onclick="confirm('Delete?') ? document.getElementById('delete-form').submit() : false;" class="badge bg-danger text-decoration-none text-black-50">Delete</a>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <p class="text-black-50">
        {{ $product->description }}
    </p>
@endsection

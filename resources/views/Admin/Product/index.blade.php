@extends('layouts.adminMaster')
@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h4 class="text-black-50 fw-bold mb-0">Prouct Lists</h4>
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Create Product</a>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Image</th>
            <th class="text-uppercase">Category</th>
            <th class="text-uppercase">Option</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $p)
            <tr>
                <td class="text-nowrap">{{ $p->name }}</td>
                <td class="">
                    <img src="{{ asset($p->image) }}" alt=""
                         style="width: 40px; height: 40px;
                                border-radius: 50%;
                                border: 2px solid #000000; "
                    >
                </td>
                <td >
                    {{ $p->categoryInfo->name }}
                </td>
                <td>
                    <a href="{{ route('product.show', $p->id) }}" class="badge bg-info text-black-50 text-decoration-none">Detail</a>
                    <a href="{{ route('product.edit', $p->id) }}" class="badge bg-warning text-black-50 text-decoration-none">Update</a>
                    <form action="{{ route('product.destroy', $p->id) }}"
                          method="post" class="d-inline" id="delete-form">
                        @csrf
                        @method('delete')
                        <a href="#" onclick="confirm('Delete?') ? document.getElementById('delete-form').submit() : false;" class="badge bg-danger text-decoration-none text-black-50">Delete</a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td class="bg-info text-center" colspan="4">There is no Product.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>
@endsection

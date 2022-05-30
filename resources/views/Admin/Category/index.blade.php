@extends('layouts.adminMaster')
@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h4 class="text-black-50 fw-bold mb-0">Category Lists</h4>
        <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary">Create Category</a>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Option</th>
        </tr>
        </thead>
        <tbody>
        @forelse($cats as $cat)
        <tr>
            <td>{{ $cat->name }}</td>
            <td>
                <a href="{{ route('category.edit', $cat->id) }}" class="badge bg-warning text-black-50 text-decoration-none">Update</a>
                <form action="{{ route('category.destroy', $cat->id) }}"
                      method="post" class="d-inline" id="delete-form">
                    @csrf
                    @method('delete')
                    <a href="#" onclick="confirm('Delete?') ? document.getElementById('delete-form').submit() : false;" class="badge bg-danger text-decoration-none text-black-50">Delete</a>
                </form>
            </td>
        </tr>
        @empty
            <tr>
                <td class="bg-info text-center" colspan="2">There is no category.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection

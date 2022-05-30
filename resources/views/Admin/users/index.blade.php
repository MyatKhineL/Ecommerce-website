@extends('layouts.adminMaster')
@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h4 class="text-black-50 fw-bold mb-0">All User Lists</h4>
        <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary">Create Product</a>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-uppercase">Name</th>
            <th class="text-uppercase">Image</th>
            <th class="text-uppercase">Email</th>
            <th class="text-uppercase">Order Count</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>
                    <img src="{{ asset($user->image) }}" alt=""
                         style="width: 50px; height: 50px; border: 2px solid #000000; border-radius: 50%">
                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->order_info_count }}</td>
            </tr>
        @empty
            <tr>
                <td class="bg-info text-center" colspan="4">There is no Users.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $users->links() }}
    </div>
@endsection

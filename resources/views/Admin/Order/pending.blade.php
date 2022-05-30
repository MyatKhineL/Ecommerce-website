@extends('layouts.adminMaster')
@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h4 class="text-black-50 fw-bold mb-0">Pending Order Lists</h4>
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">Product Lists</a>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-uppercase">Product</th>
            <th class="text-uppercase">User</th>
            <th class="text-uppercase">Quantity</th>
            <th class="text-uppercase">Total Price</th>
            <th class="text-uppercase">Status</th>
            <th class="text-uppercase">Option</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $orders as $order )
        <tr>
            <td>{{ $order->productInfo->name }}</td>
            <td>{{ $order->userInfo->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->productInfo->price * $order->quantity }}</td>
            <td>{{ $order->status }}</td>
            <td>
                <a href="{{ route('order.makecomplete', $order->id) }}"
                   class="badge bg-danger text-decoration-none text-white p-2">Make Complete</a>
            </td>
        </tr>
        @empty

        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $orders->links() }}
    </div>
@endsection

@extends('layouts.adminMaster')
@section('content')
    <div class="d-flex justify-content-between align-items-end">
        <h4 class="text-black-50 fw-bold mb-0">Complete Order Lists</h4>
        <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary">Product Lists</a>
    </div>
    <hr>
    <div class="mb-3">
        <form action="{{ route('order.complete') }}" class="row d-flex align-items-end" method="get">
            <div class="col-4">
                <label for="start_date" class="text-black-50 mb-1">Enter Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" required>
            </div>
            <div class="col-4">
                <label for="end_date" class="text-black-50 mb-1">Enter End Date</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <div class="col-4">
                <button class="btn btn-outline-primary">Search</button>
            </div>
        </form>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="text-uppercase">Product</th>
            <th class="text-uppercase">User</th>
            <th class="text-uppercase">Quantity</th>
            <th class="text-uppercase">Total Price</th>
            <th class="text-uppercase">Status</th>
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
            </tr>
        @empty

        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $orders->links() }}
    </div>
@endsection

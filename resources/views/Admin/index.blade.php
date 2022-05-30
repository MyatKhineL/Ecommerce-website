@extends('layouts.adminMaster')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary">
                <div class="card-body text-center">
                    <h3 class="text-white">Total Users</h3>
                    <b class="rounded-circle btn btn-sm btn-dark text-white">{{ $user_count }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning">
                <div class="card-body text-center">
                    <h3 class="text-white">Pending Orders</h3>
                    <b class="rounded-circle btn btn-sm btn-dark text-white">{{ $pending_count }}</b>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success">
                <div class="card-body text-center">
                    <h3 class="text-white">Complete Orders</h3>
                    <b class="rounded-circle btn btn-sm btn-dark text-white">{{ $complete_count }}</b>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="text-black-50 fw-bold">Latest Orders</h4>
                    <hr>
                    <table class="table table-hover mb-0">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $orders as $order)
                        <tr>
                            <td>{{ $order->userInfo->name }}</td>
                            <td>{{ $order->productInfo->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->quantity * $order->productInfo->price}}</td>
                            <td>
                                @if($order->status === "pending")
                                    <b class="badge bg-warning p-2">Pending</b>
                                @else
                                    <b class="badge bg-success p-2">Complete</b>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td class="bg-info text-center " colspan="5">There is no Today Orders.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p class="text-primary mb-0">Total Orders : {{ $orders->total() }}</p>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

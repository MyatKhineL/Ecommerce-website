@extends('layouts.master')
@section('title') Product Detail @endsection
@section('content')

    @if($status == "pending")
        <h4 class="fw-bold text-black-50">Your Pending Order Lists</h4>
    @else
        <h4 class="fw-bold text-black-50">Your Complete Order Lists</h4>
    @endif
    <hr>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Total</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $orders as $cart)
            <tr>
                <td>{{ $cart->productInfo->name }}</td>
                <td>
                    <img src="{{ asset($cart->productInfo->image) }}"
                         style="width:50px;border-radius:50%; border: 2px solid #000000;"
                         alt="">
                </td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ $cart->productInfo->price }}</td>
                <td>
                    <b class="badge @if($status == "pending") bg-warning @else bg-success @endif p-2">{{ $cart->status }}</b>
                </td>
            </tr>
        @empty
            <tr>
                <td class="alert bg-info text-center" colspan="5">There is no orders.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <p class="mb-0 text-primary fw-bold">Total : {{ $orders->total() }}</p>
        {{ $orders->links() }}
    </div>

@endsection

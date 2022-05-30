@extends('layouts.master')
@section('title') Product Detail @endsection
@section('content')

    <h2>Your Cart List</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Total</th>
            <th>Price</th>
            <th>Add or Reduce</th>
        </tr>
        </thead>
        <tbody>
        @forelse( $carts as $cart)
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
                <span
                    class="badge bg-danger p-2">-
                </span>
                <span
                    class="badge bg-success p-2">+
                </span>
            </td>
        </tr>
        @empty
        @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <a href="{{ route('makeOrder') }}" class="btn btn-primary @if($carts->total() == 0) disabled @endif">Make Order</a>
        {{ $carts->links() }}
    </div>

@endsection

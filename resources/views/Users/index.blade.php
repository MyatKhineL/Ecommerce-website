@extends('layouts.master')
@section('content')
    <div class="row">
        <!-- Loop Product -->
        @forelse( $products as $p)
        <div class="col-12 col-md-4 mb-3">
            <a href="{{ route('detail', $p->slug) }}" class="text-decoration-none">
                <div class="card shadow-sm rounded border-0 border-top" >
                    <img class="card-img-top"
                         src="{{ asset($p->image) }}"
                         alt="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h4>{{ $p->name }}</h4>
                            </div>
                            <div class="col-12 d-flex justify-content-between align-items-center">
                                <div class="">
                                    <span class="badge bg-primary p-2 text-decoration-none">{{ $p->price }} ks</span>
                                </div>
                                <div class="">
                                    <span class="badge bg-warning p-2 text-decoration-none">{{ $p->categoryInfo->name }}</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('addToCart', $p->slug) }}" class="btn btn-outline-primary w-100 mt-3">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty

        @endforelse
        <div class="d-flex justify-content-between align-items-center">
            <p class="text-primary fw-bold mb-0">Total Products : {{ $products->total() }}</p>
            {{ $products->links() }}
        </div>
    </div>

@endsection

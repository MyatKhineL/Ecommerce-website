@extends('layouts.master')
@section('title') Product Detail @endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>{{ $product->name }}</h1>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <a href=""
                       class="btn btn-primary rounded">
                        <i
                            class="fas fa-cart-arrow-down"></i>
                    </a>
                </div>
                <div class="col-md-4">
                    <small>
                        <i class="fas fa-eye"></i>
                        {{ $product->view_count }}
                    </small>
                </div>
                <div class="col-md-4">
                    <p class="badge bg-primary text-decoration-none p-2 mb-0">{{ $product->categoryInfo->name }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6">
            <img src="{{ asset($product->image) }}" class="w-100" alt="">
        </div>
        <div class="col-12 col-md-6">
            <p class="pt-2">
                {{ $product->description }}
            </p>
        </div>
    </div>
@endsection

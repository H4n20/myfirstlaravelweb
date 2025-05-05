@extends('layouts.frontend')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Our Products</h1>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ $product->brand }}</p>
                    <p class="card-text">${{ number_format($product->price, 2) }}</p>
                    <a href="#" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection
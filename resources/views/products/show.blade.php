@extends('layouts.app')
@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Product Details
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Product Details -->
                    <div class="col-md-8">
                        <h4>Product Code: {{ $product->code }}</h4>
                        <h4>Name: {{ $product->name }}</h4>
                        <h4>Quantity: {{ $product->quantity }}</h4>
                        <h4>Price: ${{ number_format($product->price, 2) }}</h4>
                        <h4>Description:</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                    <!-- Product Image -->
                    <div class="col-md-4 text-center">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-fluid rounded" style="max-height: 300px;">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layout.app')

@section('title')
    Product
@endsection

@section('content')
    <div class="container text-center mt-1">
        <div class='row'>
            <div class="col-lg-6 m-auto">
                <div class='card-body'>
                    <div class='card'>
                        <div class='img-box'>
                            <h5 class="card-title">
                                {{ Str::limit($product->name, 20) }}
                                @if ($product->publish === 1)
                                    <i class="fas fa-check-circle text-success"></i>
                                @else
                                    <i class="fas fa-times-circle text-danger"></i>
                                @endif
                            </h5>
                            <img style='height: 270px;' src='http://localhost:8000/{{ $product->cover }}'
                                alt='product image' />
                        </div>
                        <div class='card-body'>
                            <p class="m-1"><span class="fw-bold">Category: </span><span
                                    class="bg-warning p-1 rounded">{{ $product->category->name }}</span></p>
                            <p class="m-1"><span class="fw-bold">Price: </span>{{ $product->price }} DH</p>
                            <p class="m-1 mb-2"><span class="fw-bold">Description: </span>{{ $product->description }}</p>
                            <span
                                class="p-2 rounded{{ $product->stock > 1 ? ' bg-success' : ' bg-danger' }} ">{{ $product->stock > 1 ? 'Available' : 'Unavailable' }}</span>
                        </div>
                        @if (!$existingCart)
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-secondary mb-2">
                                    Add to cart
                                </button>
                            </form>
                        @else
                            <form action="{{ route('cart.remove', $existingCart->product_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-secondary mb-2">
                                    Remove from cart
                                </button>
                            </form>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h4 class='m-5'>Products with the same category</h4>
    </div>

    <div class="container text-center">
        <div class='row'>
            @foreach ($productsWithSameCategory as $product)
                <div class="col-md-4 mb-4">
                    <div class='card-body'>
                        <div class='card'>
                            <div class='img-box'>
                                <h5 class="card-title">
                                    {{ Str::limit($product->name, 20) }}
                                    @if ($product->publish === 1)
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class="fas fa-times-circle text-danger"></i>
                                    @endif
                                </h5>
                                <img style='height: 250px;' src='http://localhost:8000/{{ $product->cover }}'
                                    alt='product image' />
                            </div>
                            <div class='card-body'>
                                <p class="m-1"><span class="fw-bold">Category: </span><span
                                        class="bg-warning p-1 rounded">{{ $product->category->name }}</span></p>
                                <p class="m-1"><span class="fw-bold">Price: </span>{{ $product->price }}</p>
                                <p class="m-1 mb-2"><span class="fw-bold">Description:
                                    </span>{{ Str::limit($product->description, 10) }}</p>
                                <span
                                    class="p-2 rounded{{ $product->stock > 1 ? ' bg-success' : ' bg-danger' }} ">{{ $product->stock > 1 ? 'Available' : 'Unavailable' }}</span>
                                <br>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-primary mt-3">View
                                    product</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('product.index') }}" class="btn btn-primary mb-3">View more</a>
    </div>
@endsection

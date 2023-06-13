@extends('layout.app')

@section('title')
    Category
@endsection

@section('content')
    <div class="container text-center mt-5">
        <div class='row'>
            <div class="col-lg-4 m-auto">
                <div class='card-body'>
                    <div class='card'>
                        <div class='img-box'>
                            <img style='height: 300px;' src='http://localhost:8000/{{ $category->cover }}'
                                alt='category image' />
                        </div>
                        <div class='card-body'>
                            <h5 class='card-title'>Name of category: {{ $category->name }} </h5>
                        </div>
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
    <div class="container text-center">
        <div class='row'>
            @foreach ($categoriesApp as $category)
                <div class="col-md-4 mb-4">
                    <div class='card-body'>
                        <div class='card'>
                            <div class='img-box'>
                                <img style='height: 250px;' src='http://localhost:8000/{{ $category->cover }}'
                                    alt='category image' />
                            </div>
                            <div class='card-body'>
                                <h5 class='card-title'>{{ Str::limit($category->name, 50) }} </h5>
                                <a href='{{ route('category.show', $category->id) }}' class='btn btn-secondary'>Show</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('category.index') }}" class="btn btn-primary mb-3">View more</a>
    </div>
@endsection

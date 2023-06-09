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
        <h4 class='m-5'>Products on this category</h4>
    </div>

    <div class="container text-center">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <h5 class="card-title p-2">{{ \Str::limit($product->name, 50) }}</h5>
                        <img style="height:250px;" src="http://localhost:8000/{{ $product->cover }}"
                            class="card-img-top m-auto" alt="product Cover">
                        <div class="card-body m-2">
                            <p class="card-text">Price: {{ $product->price }}</p>
                            <p class="card-text">Publish: {{ $product->publish }}</p>
                            <a href="#" class="btn btn-success">Add to Cart</a>
                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-dark">View details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h4 class='m-5'>Categories you might like</h4>
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

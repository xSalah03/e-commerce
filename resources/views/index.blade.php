@extends('layout.app')

@section('title')
    Home
@endsection

@section('content')
    <div class='text-center mt-5'>
        <h2 style='font-family: "Inter", sans-serif; font-weight: 900;'>Products for everyone</h2>
        <p style='font-family: "Inter", sans-serif;' class='text-center my-2'>Every product in our store <span
                class="fw-bold bg-success p-1 rounded">-40%</span> discount, check it and don't forget to send a mail.</p>
        @auth
            <button onclick="scrollToBottom()" class="btn btn-primary my-5">Start shopping</button>
        @endauth
        @guest
            <a href="{{ route('auth.create') }}" class="my-5">Login Now!</a>
        @endguest
    </div>
    @auth
        <div class="container text-center">
            <div class="row">
                @foreach ($productsHome as $product)
                    <div class="col-md-4 mb-4">
                        <div class='card'>
                            <div class='img-box'>
                                <h5 class="card-title">
                                    {{ Str::limit($product->name, 20) }}
                                </h5>
                                <img style='height: 250px;' src='http://localhost:8000/{{ $product->cover }}'
                                    alt='product image' />
                            </div>
                            <div class='card-body'>
                                <p class="m-1"><span class="fw-bold">Category: </span>{{ $product->category->name }}</p>
                                <p class="m-1"><span class="fw-bold">Price: </span>{{ $product->price }}</p>
                                <p class="m-1 mb-2"><span class="fw-bold">Description:
                                    </span>{{ Str::limit($product->description, 10) }}</p>

                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-secondary mt-3">View
                                    product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('product.index') }}" class="btn btn-primary mb-3">View more</a>
        </div>
    @endauth
@endsection

@section('scripts')
    <script>
        function scrollToBottom() {
            var height = 300; // Set the desired height in pixels
            window.scrollTo({
                top: height,
                behavior: 'smooth'
            });
        }
    </script>
@endsection

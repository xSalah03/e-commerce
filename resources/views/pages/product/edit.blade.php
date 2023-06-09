@extends('layout.app')

@section('title')
    Product edit
@endsection

@section('content')
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-md-6 offset-md-3'>
                <div class='card bg-light'>
                    <div class='card-shadow rounded-8'>
                        <div class='card-header'>
                            <h4>Edit Product</h4>
                        </div>
                        <div class='card-body'>
                            <form action='{{ route('product.update', $product->id) }}' method='POST'
                                enctype='multipart/form-data'>
                                @csrf
                                @method('PUT')
                                <div class='form-group mb-3'>
                                    <label for='name' class='mb-3'>Name</label>
                                    <input type='text' name='name' value='{{ old('name') ?? $product->name }}'
                                        class='form-control' @error('name') is-invalid @enderror>
                                    @error('name')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='price' class='mb-3'>Price</label>
                                    <input type='number' name='price' value='{{ old('price') ?? $product->price }}'
                                        class='form-control' @error('price') is-invalid @enderror>
                                    @error('price')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='description' class='mb-3'>Description</label>
                                    <input type='text' name='description'
                                        value='{{ old('description') ?? $product->description }}' class='form-control'
                                        @error('description') is-invalid @enderror>
                                    @error('description')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='cover' class='mb-3'>Cover</label>
                                    <input type='file' name='cover' value='{{ old('cover') ?? $product->cover }}'
                                        class='form-control' @error('cover') is-invalid @enderror>
                                    @error('cover')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='stock' class='mb-3'>Stock</label>
                                    <input type='number' name='stock' value='{{ old('stock') ?? $product->stock }}'
                                        class='form-control' @error('stock') is-invalid @enderror>
                                    @error('stock')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    @if ($product->publish !== 1)
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="publish" type="checkbox" role="switch"
                                                id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">Pubish</label>
                                        </div>
                                    @else
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="publish" type="checkbox" role="switch"
                                                id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Publish</label>
                                        </div>
                                    @endif
                                </div>
                                <label for='category_id' class='mb-3'>Category id</label>
                                <select name='category_id' class='form-control' @error('category_id') is-invalid @enderror>
                                    <option value=''>Select category id</option>
                                    @foreach ($categories as $category_id)
                                        <option value='{{ $category_id->id }}'
                                            @if ($category_id->id === $product->category_id) selected @endif>
                                            {{ $category_id->name }}
                                        </option>
                                    @endforeach
                                    @error('category_id')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </select>
                                <div class='form-group mt-2'>
                                    <button class='btn btn-dark w-100'>Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

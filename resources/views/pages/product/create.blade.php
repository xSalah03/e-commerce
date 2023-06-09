@extends('layout.app')

@section('title')
    Create product
@endsection

@section('content')
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-md-6 offset-md-3'>
                <div class='card bg-light'>
                    <div class='card-shadow rounded-8'>
                        <div class='card-header'>
                            <h4>Create your own product</h4>
                        </div>
                        <div class='card-body'>
                            <form action='{{ route('product.store') }}' method='POST' enctype='multipart/form-data'>
                                @csrf
                                <div class='form-group mb-3'>
                                    <label for='name' class='my-3'>Name</label>
                                    <input type='text' name='name' value='{{ old('name') }}'
                                        class='form-control @error('name') is-invalid @enderror'>
                                    @error('name')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='price' class='my-3'>Price</label>
                                    <input type='number' name='price' value='{{ old('price') }}'
                                        class='form-control @error('price') is-invalid @enderror'>
                                    @error('price')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='description' class='my-3'>Description</label>
                                    <input type='text' name='description' value='{{ old('description') }}'
                                        class='form-control @error('description') is-invalid @enderror'>
                                    @error('description')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='cover' class='my-3'>Cover</label>
                                    <input type='file' name='cover' value='{{ old('cover') }}'
                                        class='form-control @error('cover') is-invalid @enderror'>
                                    @error('cover')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='stock' class='my-3'>Stock</label>
                                    <input type='number' name='stock' value='{{ old('stock') }}'
                                        class='form-control @error('stock') is-invalid @enderror'>
                                    @error('stock')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <div class="form-check form-switch my-3">
                                        <input class="form-check-input" name='publish' type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Pubish</label>
                                    </div>
                                    <label for='category_id' class='my-3'>Category</label>
                                    <select name='category_id'
                                        class='form-control @error('category_id') is-invalid @enderror'>
                                        <option value=''>Select category</option>
                                        @foreach ($categories as $category)
                                            <option value='{{ $category->id }}'>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class='form-group'>
                                    <button class='btn btn-dark w-100'>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

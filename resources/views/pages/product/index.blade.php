@extends('layout.app')

@section('title')
    Products
@endsection

@section('content')
    <div class='container my-3'>
        <div class='row'>
            <div class='col-md-12 mx-auto'>
                <div class='card rounded-0 shadow'>
                    <div class='card-header d-flex justify-content-between align-items-center'>
                        <h5>List products</h5>
                        <a href='{{ route('product.create') }}' class='btn btn-success'>Create new product</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Cover</th>
                                <th>Description</th>
                                <th>Stock</th>
                                <th>Publish</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td><img style="width: 100px" src="{{ $product->cover }}" alt="product image" /></td>
                                    <td>{{ \Str::limit($product->description, 20) }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->publish }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                            class="btn btn-success">Update</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $product->id }}">
                                                Delete
                                            </button>

                                            <!-- Confirm Delete Modal -->
                                            <div class="modal fade" id="confirmDeleteModal{{ $product->id }}"
                                                tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $product->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="confirmDeleteModalLabel{{ $product->id }}">
                                                                Confirm Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this product?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

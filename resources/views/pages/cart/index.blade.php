@extends('layout.app')

@section('title')
    Carts list
@endsection

@section('content')
    <div class='container my-3'>
        <div class='row'>
            <div class='col-md-12 mx-auto'>
                <div class='card rounded-0 shadow'>
                    <div class='card-header d-flex justify-content-between align-items-center'>
                        <h5>List carts</h5>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Cover</th>
                                <th>Quantity</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($carts as $cart)
                                <tr>
                                    <td>{{ $cart->name }}</td>
                                    <td>{{ $cart->price }}</td>
                                    <td><img style="width: 100px" src="{{ $cart->cover }}" alt="cart image" /></td>
                                    <td> {{ $cart->quantity }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('cart.edit', $cart->id) }}" class="btn btn-success">Update</a>
                                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{ $cart->id }}">
                                                Delete
                                            </button>
                                            <!-- Confirm Delete Modal -->
                                            <div class="modal fade" id="confirmDeleteModal{{ $cart->id }}"
                                                tabindex="-1" aria-labelledby="confirmDeleteModalLabel{{ $cart->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="confirmDeleteModalLabel{{ $cart->id }}">
                                                                Confirm Delete</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this cart?
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
                    <h4 class="p-3">total: {{ $total }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layout.app')

@section('title')
    Categories List
@endsection

@section('content')
    <div class='container my-3'>
        <div class='row'>
            <div class='col-md-12 mx-auto'>
                <div class='card rounded-0 shadow'>
                    <div class='card-header d-flex justify-content-between align-items-center'>
                        <h5>List categories</h5>
                        <a href='{{ route('category.create') }}' class='btn btn-success'>Create new category</a>
                    </div>
                    <div class='d-flex justify-content-between align-items-center flex-wrap'>
                        <div class="container text-center">
                            <div class='row'>
                                @foreach ($categories as $category)
                                    <div class="col-md-4 mb-2">
                                        <div class='card-body'>
                                            <div class='card'>
                                                <div class='img-box'>
                                                    <img style='height: 250px;' src='{{ $category->cover }}'
                                                        alt='category image' />
                                                </div>
                                                <div class='card-body'>
                                                    <h5 class='card-title'>{{ Str::limit($category->name, 10) }} </h5>
                                                    <a href='{{ route('category.show', $category->id) }}'
                                                        class='btn btn-primary'>Show</a>
                                                    <a href='{{ route('category.edit', $category->id) }}'
                                                        class='btn btn-success'>Update</a>
                                                    <form action='{{ route('category.destroy', $category->id) }}'
                                                        method='POST' class='d-inline'>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type='button' class='btn btn-danger' data-bs-toggle='modal'
                                                            data-bs-target='#confirmDeleteModal{{ $category->id }}'>
                                                            Delete
                                                        </button>
                                                        <!-- Confirm Delete Modal -->
                                                        <div class='modal fade' id='confirmDeleteModal{{ $category->id }}'
                                                            tabindex='-1'
                                                            aria-labelledby='confirmDeleteModalLabel{{ $category->id }}'
                                                            aria-hidden='true'>
                                                            <div class='modal-dialog'>
                                                                <div class='modal-content'>
                                                                    <div class='modal-header'>
                                                                        <h5 class='modal-title'
                                                                            id='confirmDeleteModalLabel{{ $category->id }}'>
                                                                            Confirm Delete</h5>
                                                                        <button type='button' class='btn-close'
                                                                            data-bs-dismiss='modal'
                                                                            aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='modal-body'>
                                                                        Are you sure you want to delete this category?
                                                                    </div>
                                                                    <div class='modal-footer'>
                                                                        <button type='button' class='btn btn-secondary'
                                                                            data-bs-dismiss='modal'>Cancel</button>
                                                                        <button type='submit'
                                                                            class='btn btn-danger'>Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

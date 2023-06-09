@extends('layout.app')

@section('title')
    Create category
@endsection

@section('content')
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-md-6 offset-md-3'>
                <div class='card bg-light'>
                    <div class='card-shadow rounded-8'>
                        <div class='card-header'>
                            <h4>Create your own category</h4>
                        </div>
                        <div class='card-body'>
                            <form action='{{ route('category.store') }}' method='POST' enctype='multipart/form-data'>
                                @csrf
                                <div class='form-group mb-3'>
                                    <label for='name' class='mb-3'>Name</label>
                                    <input type='text' name='name' value='{{ old('name') }}'
                                        class='form-control @error('name') is-invalid @enderror'>
                                    @error('name')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                    <label for='cover' class='mb-3'>Cover</label>
                                    <input type='file' name='cover' value='{{ old('cover') }}'
                                        class='form-control @error('cover') is-invalid @enderror'>
                                    @error('cover')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
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

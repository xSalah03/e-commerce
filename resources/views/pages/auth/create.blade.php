@extends('layout.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('auth.login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="mb-3">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="mb-3">Password</label>
                        <input type="password" name="password" value="{{ old('password') }}"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <p>Don't have you an account? <a href="{{ route('register.create') }}">Register now! </a></p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark w-100">Submit</button>
                    </div>
                </form>
                <div class="my-2">
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
@endsection

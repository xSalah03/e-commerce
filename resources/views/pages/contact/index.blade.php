@extends('layout.app')

@section('title')
    Contact
@endsection

@section('content')
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-md-6 offset-md-3'>
                <div class='card bg-light'>
                    <div class='card-body'>
                        <form action='{{ route('contact.send-mail') }}' method='POST'>
                            @csrf
                            <div class='form-group mb-3'>
                                <label for='subject'>Subject:</label>
                                <input type='text' name='subject' id='' class='form-control'>
                                @error('subject')
                                    <span class='text-danger'>{{ $name }}</span>
                                @enderror
                            </div>
                            <div class='form-group mb-3'>
                                <label for='email'>Email:</label>
                                <input type='email' name='email' id='' class='form-control'>
                                @error('email')
                                    <span class='text-danger'>{{ $email }}</span>
                                @enderror
                            </div>
                            <div class='form-group mb-3'>
                                <label for='message'>Message:</label>
                                <textarea type='' name='message' id='' class='form-control'></textarea>
                                @error('message')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class='form-group'>
                                <button class='btn btn-dark w-100'>Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

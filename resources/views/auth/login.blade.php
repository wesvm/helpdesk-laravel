@extends('layouts.auth')
@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="border rounded p-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Algo salio mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
        </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

@endsection
@extends('layouts.auth')
@section('title', 'Register')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="">
        {{-- Imagen aqui --}}
        {{-- <img src="" alt=""> --}}
    </div>
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
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="firstnames" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="firstnames" name="firstnames"
                        value="{{ old('firstnames') }}">
                </div>

                <div class="col-md-6">
                    <label for="lastnames" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="lastnames" name="lastnames"
                        value="{{ old('lastnames') }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</div>

@endsection
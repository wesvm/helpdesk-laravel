@extends('layouts.dashboard')
@section('title', 'Usuarios')

@section('content')
<h1 class="fs-3 fw-bold">USUARIOS</h1>
<div class="border rounded my-2 p-4">

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

    <form action="{{route('users.store')}}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="firstnames" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="firstnames" name="firstnames"
                    value="{{ old('firstnames') }}">
            </div>

            <div class="col-md-6">
                <label for="lastnames" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="lastnames" name="lastnames" value="{{ old('lastnames') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
            </div>

            <div class="col-md-6">
                <label for="role" class="form-label">Rol</label>
                <select class="form-select" id="role" name="role">
                    @foreach($roles as $roleName => $roleLabel)
                    <option value="{{ $roleName }}" @if(old('role')==$roleName) selected @endif>
                        {{ $roleLabel }}
                    </option>
                    @endforeach
                </select>
            </div>
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

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="position" class="form-label">Puesto</label>
                <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">
            </div>

            <div class="col-md-6">
                <label for="in_charge" class="form-label">Encargado</label>
                <input type="text" class="form-control" id="in_charge" name="in_charge" value="{{ old('in_charge') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Registrar usuario</button>
        <a type="button" class="btn btn-danger" href="{{route('users.index')}}">Cancelar</a>

    </form>
</div>
@endsection
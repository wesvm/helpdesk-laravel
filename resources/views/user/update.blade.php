@extends('layouts.dashboard')
@section('title', 'Usuarios')

@section('content')
<h1 class="fs-3 fw-bold">EDITAR USUARIO</h1>
<div class="border rounded my-2 p-4">
    @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Algo salio mal..<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>dasd
    </div>
    @endif

    <form action="{{ route('users.update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="firstnames" class="form-label">Nombres</label>
                <input type="text" class="form-control" id="firstnames" name="firstnames"
                    value="{{ $user->first_names }}">
            </div>

            <div class="col-md-6">
                <label for="lastnames" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="lastnames" name="lastnames" value="{{ $user->last_names }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
            </div>
            <div class="col-md-6">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role" @if($user->id === 1) disabled
                    @endif>
                    @foreach($roles as $roleName => $roleLabel)
                    <option value="{{ $roleName }}" @if(in_array($roleName, $userRole)) selected @endif>
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
                <input type="text" class="form-control" id="position" name="position" value="{{ $user->position }}">
            </div>

            <div class="col-md-6">
                <label for="in_charge" class="form-label">Encargado</label>
                <input type="text" class="form-control" id="in_charge" name="in_charge" value="{{ $user->in_charge }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a type="button" class="btn btn-danger" href="{{route('users.index')}}">Cancelar</a>
    </form>
</div>
@endsection
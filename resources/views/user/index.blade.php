@extends('layouts.dashboard')
@section('title', 'Usuarios')

@section('content')
<h1 class="fs-3 fw-bold">USUARIOS</h1>
<div class="border rounded my-2 p-4">

    @if (Session::get('success'))
    <div class="alert alert-success mt-3">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>{{ Session::get('success') }}</strong>
    </div>
    @endif
    @can('admin:create')
    <a class="btn btn-warning" href="{{route('users.create')}}">Nuevo</a>
    @endcan
    <div class="mt-4 table-responsive">
        <table class="table">
            <thead class="table-light">
                <th>N°</th>
                <th>Nombres</th>
                <th>Puesto</th>
                <th>Encargado</th>
                <th>Fecha</th>
                @hasrole('Administrador')
                <th>Editar</th>
                @endhasrole
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_names }} {{ $user->last_names }}</td>
                    <td>{{ $user->position ?: 'Ninguno' }}</td>
                    <td>{{ $user->in_charge ?: 'Ninguno' }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    @hasrole('Administrador')
                    <td>
                        @if($user->id !== 1)
                        @can('admin:update')
                        <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Editar</a>
                        @endcan
                        @can('admin:delete')
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal{{ $user->id }}">Eliminar</button>
                        @endcan
                        @endif
                    </td>
                    @endhasrole
                </tr>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel{{ $user->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $user->first_names }} {{
                                    $user->last_names }}</h1>
                            </div>
                            <div class="modal-body">
                                <p>Deseas eliminar este usuario?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{route('users.destroy', $user->id)}}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
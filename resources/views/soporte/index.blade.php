@extends('layouts.dashboard')
@section('title', 'Soporte')

@section('content')
<h1 class="fs-3 fw-bold">SOPORTE TECNICO</h1>
@if (Session::get('success'))
<div class="alert alert-success mt-3">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ Session::get('success') }}</strong>
</div>
@endif
<div class="border rounded my-2 p-4">
    <div class="mt-4 table-responsive">
        <table class="table table-bordered text-white">
            <tr class="text-secondary">
                <th>N°</th>
                <th>Usuario</th>
                <th>Area</th>
                <th>Asunto</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Editor</th>
            </tr>

            @foreach ($tickets as $ticket)
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->fullnames }}</td>
                <td>{{ $ticket->sector }}</td>
                <td>{{ $ticket->subject }}</td>
                <td>{{ $ticket->created_at->format('d/m/Y') }}</td>
                <td>
                    <span class="badge task-status fw-bold fs-6">{{ $ticket->status }}</span>
                </td>
                <td>
                    <a class="btn btn-primary" href="{{route('soporte.edit', $ticket->id)}}">Editar</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal{{ $ticket->id }}">Eliminar</button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $ticket->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel{{ $ticket->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $ticket->fullnames }}</h1>
                        </div>
                        <div class="modal-body">
                            <p>Deseas eliminar este el ticket?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{route('soporte.destroy', $ticket->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </table>

        {{ $tickets->links() }}
    </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('js/status.js') }}"></script>
@endpush
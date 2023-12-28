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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $ticket->id }}">Editar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteModal{{ $ticket->id }}">Eliminar</button>
                </td>
            </tr>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal{{ $ticket->id }}" tabindex="-1"
                aria-labelledby="deleteModalLabel{{ $ticket->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel{{ $ticket->id }}">{{ $ticket->fullnames }}
                            </h1>
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

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $ticket->id }}" tabindex="-1"
                aria-labelledby="editModalLabel{{ $ticket->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="editModalLabel{{ $ticket->id }}">{{$ticket->fullnames}} -
                                {{$ticket->dni}}</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>{{$ticket->subject}}</strong></p>
                            <p>{{$ticket->description}}</p>
                            <form action="{{route('soporte.update', ['soporte' => $ticket->id])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="status">Cambiar estado del ticket</label>
                                    <select name="status" id="status">
                                        @foreach($ticketStatus as $status)
                                        <option value="{{ $status }}" {{ $ticket->status == $status ? 'selected' :
                                            '' }}>
                                            {{ $status }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
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
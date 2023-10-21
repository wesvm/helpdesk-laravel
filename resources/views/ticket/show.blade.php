@extends('layouts.app')
@section('title', 'Tickets')

@section('content')
<div class="my-2">
    <h1 class="text-center fs-3 fw-bold">Consulta el estado del ticket</h1>
    <div class="border rounded my-2 p-4">
        <form action="{{route('showList')}}" method="GET">
            <div class="row align-items-end">
                <div class="col-md-2">
                    <label for="dni" class="form-label">DNI</label>
                    <input type="text" class="form-control" id="dni" name="dni"">
                </div>
                <div class=" col-md-6">
                    <label for="names" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="names" name="names"">
                </div>
                <div class=" col-md-4 mt-3">
                    <button type="submit" class="btn btn-primary px-5">Buscar</button>
                </div>
            </div>
        </form>

        <div class="mt-4 table-responsive">
            <table class="table table-bordered text-white">
                <tr class="text-secondary">
                    <th>N°</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Asunto</th>
                    <th>Estado</th>
                </tr>

                @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->fullnames }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>
                        <span class="badge task-status fw-bold fs-6">{{ $ticket->status }}</span>
                    </td>
                </tr>

                @endforeach
            </table>

            {{ $tickets->links() }}
        </div>

    </div>
</div>
@endsection
@push('scripts')
<script src="{{ asset('js/status.js') }}"></script>
@endpush
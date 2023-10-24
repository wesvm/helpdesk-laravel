@extends('layouts.dashboard')
@section('title', 'Soporte')

@section('content')
<h1 class="fs-3 fw-bold">SOPORTE TECNICO</h1>
<div class="border rounded my-2 p-4">
    <h3>{{$ticket->fullnames}} - {{$ticket->dni}}</h3>
    <p><strong>{{$ticket->subject}}</strong></p>
    <p>{{$ticket->description}}</p>
    <form action="{{route('soporte.update', ['soporte' => $ticket->id])}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="status">Cambiar estado del ticket</label>
            <select name="status" id="status">
                @foreach($ticketStatus as $status)
                <option value="{{ $status }}" {{ $ticket->status == $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a type="button" class="btn btn-danger" href="{{route('soporte.index')}}">Cancelar</a>
    </form>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/status.js') }}"></script>
@endpush
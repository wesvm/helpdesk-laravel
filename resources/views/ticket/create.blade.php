@extends('layouts.app')
@section('title', 'Tickets')

@section('content')
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

    <form action="{{route('store')}}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" value="{{ old('dni') }}">
            </div>
            <div class="col-md-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
            </div>
            <div class="col-md-3">
                <label for="category" class="form-label">Categoria</label>
                <select class="form-select" id="category" name="category">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category')==$category->id) selected @endif>{{
                        $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="sector" class="form-label">Sector</label>
                <input type="text" class="form-control" id="sector" name="sector" value="{{ old('sector') }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-8">
                <label for="fullnames" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="fullnames" name="fullnames" value="{{ old('fullnames') }}">
            </div>

            <div class="col-md-4">
                <label for="priority" class="form-label">Proridad</label>
                <select class="form-select" id="priority" name="priority">
                    <option value="low" @if(old('priority')=='Baja' ) selected @endif>Baja</option>
                    <option value="medium" @if(old('priority')=='Media' ) selected @endif>Media</option>
                    <option value="high" @if(old('priority')=='Urgente' ) selected @endif>Urgente</option>
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Asunto</label>
            <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Detalles del problema</label>
            <textarea class="form-control" id="description" name="description"
                rows="3">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Registrar ticket</button>
    </form>
</div>

<div class="text-end">
    <a href="{{route('login')}}">Login</a>
</div>
@endsection
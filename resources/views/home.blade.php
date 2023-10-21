@extends('layouts.app')

@section('title', 'HelpDesk')

@section('content')

@if (Session::get('success'))
<div class="alert alert-success mt-3">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ Session::get('success') }}</strong>
</div>
@endif

<div>
    <h1>Sistema de Gestion de Tickets</h1>
    <a href="{{route('login')}}">Login</a>
    <a href="{{route('register')}}">Register</a>
</div>

@endsection
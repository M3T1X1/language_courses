@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Panel administratora</h2>

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('admin.kursy.index') }}" class="btn btn-outline-primary w-100">Zarządzaj kursami</a>
        </div>
        <div class="col">
            <a href="{{ route('admin.klienci.index') }}" class="btn btn-outline-primary w-100">Zarządzaj klientami</a>
        </div>
        <div class="col">
            <a href="{{ route('admin.transakcje.index') }}" class="btn btn-outline-primary w-100">Zobacz transakcje</a>
        </div>
        <div class="col">
            <a href="{{ route('admin.znizki.index') }}" class="btn btn-outline-primary w-100">Zarządzaj zniżkami</a>
        </div>
        <div class="col">
            <a href="{{ route('admin.instruktorzy.index') }}" class="btn btn-outline-primary w-100">Instruktorzy</a>
        </div>
    </div>
</div>
@endsection

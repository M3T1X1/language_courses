@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="text-center mb-4">Logowanie</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Adres email</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Hasło</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Zaloguj się</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-5">Witamy w platformie kursów językowych</h1>
    
    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->jezyk }} - Poziom {{ $course->poziom }}</h5>
                        <p class="card-text">Cena: {{ $course->cena }} zł</p>
                        <p class="card-text">Prowadzący: {{ $course->instruktor->imie }} {{ $course->instruktor->nazwisko }}</p>
                        <a href="{{ route('courses.show', $course->id_kursu) }}" class="btn btn-primary">Zobacz szczegóły</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

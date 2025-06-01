<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kursy - Panel Administratora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <style>
    body { background: #f1f3f6; }
    .sidebar {
      width: 240px;
      background: #ffffff;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      padding: 20px;
      box-shadow: 2px 0 10px rgba(0,0,0,0.05);
      z-index: 1000;
    }
    .sidebar a {
      padding: 10px;
      margin-bottom: 10px;
      color: #333;
      text-decoration: none;
      border-radius: 5px;
      display: flex;
      align-items: center;
    }
    .sidebar a:hover {
      background: #e7f1ff;
      color: #007bff;
    }
    .sidebar i {
      margin-right: 10px;
    }
    .main-content {
      margin-left: 260px;
      padding: 40px;
    }
    .admin-title {
      font-size: 1.75rem;
      font-weight: 600;
    }
    .btn-action i { pointer-events: none; }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-center mb-4 py-2">Szkoła Językowa</h4>
    <div class="d-flex flex-column">
      <a href="{{ url('dashboard') }}" class="nav-link"><i class="bi bi-speedometer2"></i> Dashboard</a>
      <a href="{{ url('kursy') }}" class="nav-link"><i class="bi bi-book"></i> Kursy</a>
      <a href="{{ url('instruktorzy') }}" class="nav-link"><i class="bi bi-person-workspace"></i> Instruktorzy</a>
      <a href="{{ url('klienci') }}" class="nav-link"><i class="bi bi-people"></i> Klienci</a>
      <a href="{{ url('transakcje') }}" class="nav-link"><i class="bi bi-cash-coin"></i> Transakcje</a>
      <a href="{{ url('znizki') }}" class="nav-link"><i class="bi bi-tag"></i> Zniżki</a>
      <a href="{{ url('/home') }}" class="nav-link mt-auto" target="_blank"><i class="bi bi-house"></i> Strona główna</a>
      <a href="{{ url('logout') }}" class="nav-link"><i class="bi bi-box-arrow-left"></i> Wyloguj</a>
    </div>
  </div>

  <div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="admin-title">Kursy</h2>
      <a href="{{ route('kursy.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Dodaj kurs
      </a>
    </div>

    <!-- Filtry -->
    <form method="GET" action="{{ route('kursy.index') }}">
  <div class="row mb-4">
    <div class="col-md-2">
      <input class="form-control" name="jezyk" placeholder="Język" value="{{ request('jezyk') }}" />
    </div>
    <div class="col-md-2">
      <input class="form-control" name="poziom" placeholder="Poziom" value="{{ request('poziom') }}" />
    </div>
    <div class="col-md-2">
      <input class="form-control" name="cena_max" type="number" placeholder="Cena max" value="{{ request('cena_max') }}" />
    </div>
    <div class="col-md-2">
      <input class="form-control" name="instruktor" placeholder="Instruktor" value="{{ request('instruktor') }}" />
    </div>
    <div class="col-md-2">
      <input class="form-control" name="miejsca" placeholder="Miejsca" value="{{ request('miejsca') }}" />
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary w-100">Filtruj</button>
    </div>
  </div>
</form>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
      <table class="table table-striped align-middle" id="coursesTable">
        <thead>
          <tr>
            <th>Nazwa kursu</th>
            <th>Język</th>
            <th>Poziom</th>
            <th>Instruktor</th>
            <th>Start</th>
            <th>Koniec</th>
            <th>Cena</th>
            <th>Miejsca</th>
            <th>Akcje</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
          <tr>
            <td>
              <a href="{{ route('kursy.show', $course->id_kursu) }}">
                {{ $course->jezyk }} {{ $course->poziom }}
              </a>
            </td>
            <td>{{ $course->jezyk }}</td>
            <td>{{ $course->poziom }}</td>
            <td>
              @if ($course->instructor)
                <a href="{{ route('instruktorzy.show', $course->instructor->id) }}">
                  {{ $course->instructor->imie }} {{ $course->instructor->nazwisko }}
                </a>
              @else
                <span class="text-muted">Brak</span>
              @endif
            </td>
            <td>{{ \Carbon\Carbon::parse($course->data_rozpoczecia)->format('Y-m-d') }}</td>
            <td>{{ \Carbon\Carbon::parse($course->data_zakonczenia)->format('Y-m-d') }}</td>
            <td>{{ $course->cena }}</td>
            <td>{{ $course->liczba_miejsc }}</td>
            <td class="d-flex gap-1">
            <a href="{{ route('kursy.edit', $course->id_kursu) }}" class="btn btn-sm btn-outline-primary" title="Edytuj">
                <i class="bi bi-pencil"></i>
            </a>

              <form action="{{ route('kursy.destroy', $course->id_kursu) }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć ten kurs?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" title="Usuń">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>
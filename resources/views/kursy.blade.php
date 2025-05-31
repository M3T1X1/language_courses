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
      <a href="{{ url('dashboard') }}" class="nav-link">
        <i class="bi bi-speedometer2"></i> Dashboard
      </a>
      <a href="{{ url('kursy') }}" class="nav-link">
        <i class="bi bi-book"></i> Kursy
      </a>
      <a href="{{ url('instruktorzy') }}" class="nav-link">
        <i class="bi bi-person-workspace"></i> Instruktorzy
      </a>
      <a href="{{ url('klienci') }}" class="nav-link">
        <i class="bi bi-people"></i> Klienci
      </a>
      <a href="{{ url('transakcje') }}" class="nav-link">
        <i class="bi bi-cash-coin"></i> Transakcje
      </a>
      <a href="{{ url('znizki') }}" class="nav-link">
        <i class="bi bi-tag"></i> Zniżki
      </a>
      <a href="{{ url('/home') }}" class="nav-link mt-auto" target="_blank">
        <i class="bi bi-house"></i> Strona główna
      </a>
      <a href="{{ url('logout') }}" class="nav-link">
        <i class="bi bi-box-arrow-left"></i> Wyloguj
      </a>
    </div>
  </div>

  <div class="main-content">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="admin-title">Kursy</h2>
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCourseModal">
        <i class="bi bi-plus-lg"></i> Dodaj kurs
      </button>
    </div>

    <!-- Filtry -->
    <div class="row mb-4">
      <div class="col-md-2"><input class="form-control" placeholder="Język" /></div>
      <div class="col-md-2"><input class="form-control" placeholder="Poziom" /></div>
      <div class="col-md-2"><input class="form-control" type="number" placeholder="Cena max" /></div>
      <div class="col-md-2"><input class="form-control" placeholder="Instruktor" /></div>
      <div class="col-md-2"><input class="form-control" placeholder="Miejsca" /></div>
    </div>

    <div class="table-responsive bg-white p-3 rounded shadow-sm">
      <table class="table table-striped align-middle">
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
            <td><a href="{{ url('course-detail?id=' . $course->id) }}">{{ $course->title }}</a></td>
            <td>{{ $course->language }}</td>
            <td>{{ $course->level }}</td>
            <td><a href="{{ url('instructor-detail?id=' . $course->instructor->id) }}">{{ $course->instructor->name }}</a></td>
            <td>{{ $course->start }}</td>
            <td>{{ $course->end }}</td>
            <td>{{ $course->price }}</td>
            <td>{{ $course->places }}</td>
            <td>
              <button class="btn btn-sm btn-outline-primary btn-action" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                <i class="bi bi-pencil"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger btn-action delete-btn">
                <i class="bi bi-trash"></i>
              </button>
              <a href="{{ url('course-detail?id=' . $course->id) }}" class="btn btn-sm btn-outline-info btn-action">
                <i class="bi bi-eye"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal edycji kursu -->
  <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form method="POST" action="{{ route('kursy.update') }}">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="editCourseLabel">Edytuj kurs</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
          </div>
          <div class="modal-body row g-3">
            <div class="col-md-6">
              <label class="form-label">Nazwa</label>
              <input type="text" class="form-control" name="title" required>
            </div>
            <div class="col-md-6">
              <label class="form-label">Język</label>
              <input type="text" class="form-control" name="language">
            </div>
            <div class="col-md-6">
              <label class="form-label">Poziom</label>
              <input type="text" class="form-control" name="level">
            </div>
            <div class="col-md-6">
              <label class="form-label">Instruktor</label>
              <input type="text" class="form-control" name="instructor">
            </div>
            <div class="col-md-6">
              <label class="form-label">Start</label>
              <input type="date" class="form-control" name="start">
            </div>
            <div class="col-md-6">
              <label class="form-label">Koniec</label>
              <input type="date" class="form-control" name="end">
            </div>
            <div class="col-md-6">
              <label class="form-label">Cena</label>
              <input type="number" class="form-control" name="price">
            </div>
            <div class="col-md-6">
              <label class="form-label">Miejsca</label>
              <input type="number" class="form-control" name="places">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Zapisz</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const deleteButtons = document.querySelectorAll('.delete-btn');
      deleteButtons.forEach(btn => {
        btn.addEventListener('click', () => {
          if (confirm("Czy na pewno chcesz usunąć ten kurs?")) {
            alert("Kurs usunięty."); // zamień na realne żądanie AJAX lub przekierowanie
          }
        });
      });
    });
  </script>

</body>
</html>

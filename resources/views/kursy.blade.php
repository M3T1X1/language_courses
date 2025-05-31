<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Kursy - Panel Administratora</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    <div id="kursy" class="tab-pane active">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="admin-title">Kursy</h2>
        <button class="btn btn-primary">
          <i class="bi bi-plus-lg"></i> Dodaj kurs
        </button>
      </div>

      <!-- Filtry -->
      <div class="row mb-3">
        <div class="col-md-2">
          <select class="form-select filter-kursy" data-column="1">
            <option value="">Wszystkie języki</option>
            <option>Angielski</option>
            <option>Hiszpański</option>
            <option>Francuski</option>
          </select>
        </div>
        <div class="col-md-2">
          <select class="form-select filter-kursy" data-column="2">
            <option value="">Wszystkie poziomy</option>
            <option>Podstawowy</option>
            <option>Średniozaawansowany</option>
            <option>Zaawansowany</option>
            <option>Początkujący</option>
          </select>
        </div>
        <div class="col-md-2">
          <input type="number" class="form-control filter-kursy" placeholder="Cena max" data-column="6" />
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control filter-kursy" placeholder="Instruktor" data-column="3" />
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control filter-kursy" placeholder="Liczba miejsc" data-column="3" />
        </div>
      </div>

      <div class="table-responsive bg-white">
        <table class="table table-hover mb-0" id="kursyTable">
          <thead>
            <tr>
              <th>Nazwa kursu</th>
              <th>Język</th>
              <th>Poziom</th>
              <th>Instruktor</th>
              <th>Data rozpoczęcia</th>
              <th>Data zakończenia</th>
              <th>Cena</th>
              <th>Liczba miejsc</th>
              <th>Akcje</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><a href="{{ url('course-detail?id=1') }}" class="course-title">Angielski - podstawowy</a></td>
              <td>Angielski</td>
              <td>Podstawowy</td>
              <td><a href="{{ url('instructor-detail?id=1') }}" class="instructor-name">Jan Kowalski</a></td>
              <td>2025-06-01</td>
              <td>2025-08-31</td>
              <td>1200</td>
              <td>15</td>
              <td>
                <button class="btn btn-sm btn-outline-primary btn-action"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-outline-danger delete-btn"><i class="bi bi-trash"></i></button>
                <a href="{{ url('course-detail?id=1') }}" class="btn btn-sm btn-outline-info btn-action"><i class="bi bi-eye"></i></a>
              </td>
            </tr>
            <tr>
              <td><a href="{{ url('course-detail?id=2') }}" class="course-title">Hiszpański - średniozaawansowany</a></td>
              <td>Hiszpański</td>
              <td>Średniozaawansowany</td>
              <td><a href="{{ url('instructor-detail?id=2') }}" class="instructor-name">Maria Nowak</a></td>
              <td>2025-06-15</td>
              <td>2025-09-15</td>
              <td>1350</td>
              <td>12</td>
              <td>
                <button class="btn btn-sm btn-outline-primary btn-action"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-sm btn-outline-danger delete-btn"><i class="bi bi-trash"></i></button>
                <a href="{{ url('course-detail?id=2') }}" class="btn btn-sm btn-outline-info btn-action"><i class="bi bi-eye"></i></a>
              </td>
            </tr>
            <tr>
              <td><a href="{{ url('course-detail?id=3') }}" class="course-title">Francuski - początkujący</a></td>
              <td>Francuski</td>
              <td>Początkujący</td>
              <td><a href="{{ url('instructor-detail?id=3') }}" class="instructor-name">Piotr Wiśniewski</a></td>
              <td>2025-07-01</td>
              <td>2025-09-30</td>
              <td>1100</td>
              <td>10</td>
              <td>
                <button class="btn btn-sm btn-outline-primary btn-action" data-bs-toggle="modal" data-bs-target="#editCourseModal">
                  <i class="bi bi-pencil"></i>
                </button>
                <button class="btn btn-sm btn-outline-danger delete-btn"><i class="bi bi-trash"></i></button>
                <a href="{{ url('course-detail?id=3') }}" class="btn btn-sm btn-outline-info btn-action"><i class="bi bi-eye"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal edycji kursu -->
  <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="editCourseForm">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="editCourseLabel">Edytuj kurs</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Nazwa kursu</label>
                <input type="text" class="form-control" id="editNazwa" required />
              </div>
              <div class="col-md-6">
                <label class="form-label">Język</label>
                <input type="text" class="form-control" id="editJezyk" />
              </div>
              <div class="col-md-6">
                <label class="form-label">Poziom</label>
                <input type="text" class="form-control" id="editPoziom" />
              </div>
              <div class="col-md-6">
                <label class="form-label">Instruktor</label>
                <input type="text" class="form-control" id="editInstruktor" />
              </div>
              <div class="col-md-6">
                <label class="form-label">Data rozpoczęcia</label>
                <input type="date" class="form-control" id="editStart" />
              </div>
              <div class="col-md-6">
                <label class="form-label">Data zakończenia</label>
                <input type="date" class="form-control" id="editEnd" />
              </div>
              <div class="col-md-6">
                <label class="form-label">Cena</label>
                <input type="number" class="form-control" id="editCena" />
              </div>
              <div class="col-md-6">
                <label class="form-label">Liczba miejsc</label>
                <input type="number" class="form-control" id="editMiejsca" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const editButtons = document.querySelectorAll('.btn-outline-primary');

      editButtons.forEach(button => {
        button.addEventListener('click', function () {
          const row = this.closest('tr');
          const cells = row.querySelectorAll('td');

          document.getElementById('editNazwa').value = cells[0].innerText.trim();
          document.getElementById('editJezyk').value = cells[1].innerText.trim();
          document.getElementById('editPoziom').value = cells[2].innerText.trim();
          document.getElementById('editInstruktor').value = cells[3].innerText.trim();
          document.getElementById('editStart').value = cells[4].innerText.trim();
          document.getElementById('editEnd').value = cells[5].innerText.trim();
          document.getElementById('editCena').value = cells[6].innerText.trim();
          document.getElementById('editMiejsca').value = cells[7].innerText.trim();

          const modal = new bootstrap.Modal(document.getElementById('editCourseModal'));
          modal.show();
        });
      });
    });

    document.addEventListener('DOMContentLoaded', function () {
      const deleteButtons = document.querySelectorAll('.delete-btn');

      deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
          const row = e.target.closest('tr');
          const courseTitle = row.querySelector('.course-title').textContent;

          if (confirm(`Czy na pewno chcesz usunąć kurs "${courseTitle}"?`)) {
            row.remove();
            alert('Kurs został usunięty!');
          }
        });
      });
    });
  </script>
</body>
</html>

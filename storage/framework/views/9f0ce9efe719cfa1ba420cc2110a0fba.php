<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Rezerwacja kursu - Szkoła Językowa</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f8fafc; }
    .booking-box { max-width: 520px; margin: 50px auto; background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.07); padding: 40px; }
    .booking-title { font-weight: bold; }
    .logo { display: block; margin: 0 auto 20px auto; width: 80px; }
  </style>
</head>
<body>
  <div class="booking-box">
    <img src="https://img.icons8.com/color/96/000000/language.png" class="logo" alt="Logo szkoły">
    <h2 class="booking-title mb-4 text-center">Rezerwacja kursu językowego</h2>
    <form>
      <h5 class="mb-3">Dane uczestnika</h5>
      <div class="mb-3">
        <label for="name" class="form-label">Imię i nazwisko:</label>
        <input type="text" class="form-control" id="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Telefon:</label>
        <input type="tel" class="form-control" id="phone" required>
      </div>
      <h5 class="mb-3 mt-4">Szczegóły kursu</h5>
      <div class="mb-3">
        <label for="course" class="form-label">Wybierz kurs:</label>
        <select class="form-select" id="course" required>
          <option value="">-- Wybierz kurs --</option>
          <option <?php echo e($courseName == 'Angielski - podstawowy' ? 'selected' : ''); ?>>Angielski - podstawowy</option>
          <option <?php echo e($courseName == 'Hiszpański - średniozaawansowany' ? 'selected' : ''); ?>>Hiszpański - średniozaawansowany</option>
          <option <?php echo e($courseName == 'Francuski - początkujący' ? 'selected' : ''); ?>>Francuski - początkujący</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="level" class="form-label">Poziom zaawansowania:</label>
        <select class="form-select" id="level" required>
          <option value="">-- Wybierz poziom --</option>
          <option>Podstawowy</option>
          <option>Średniozaawansowany</option>
          <option>Zaawansowany</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="start-date" class="form-label">Data rozpoczęcia kursu:</label>
        <input type="date" class="form-control" id="start-date" required>
      </div>
      <button type="submit" class="btn btn-success w-100 mt-4">Zarezerwuj miejsce</button>
    </form>
  </div>
</body>
</html>
<?php /**PATH D:\zadania\aplikacje\language_courses\resources\views/rezerwacja.blade.php ENDPATH**/ ?>
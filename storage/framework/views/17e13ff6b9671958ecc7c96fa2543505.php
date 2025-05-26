<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nasza oferta kursów</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: #f8fafc;
    }
    .card {
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      border-radius: 10px;
      transition: transform 0.3s;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .card-title {
      font-weight: 600;
      color: #2c3e50;
    }
    .btn-primary {
      background: #4f8cff;
      border: none;
    }
    .btn-primary:hover {
      background: #3b6ecc;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h2 class="mb-4 text-center">Nasza oferta kursów</h2>
    <div class="row g-4">
      <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
          <div class="card h-100">
            
            
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?php echo e($course->jezyk); ?> - <?php echo e($course->poziom); ?></h5>
              <p class="card-text mb-4">
                Cena: <strong><?php echo e($course->cena); ?> PLN</strong><br>
                Start: <strong><?php echo e(\Carbon\Carbon::parse($course->data_rozpoczecia)->format('Y-m-d')); ?></strong>
              </p>
              <a href="<?php echo e(route('rezerwacja', ['course' => $course->jezyk . ' - ' . $course->poziom])); ?>" class="btn btn-primary mt-auto">Zapisz się</a>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH D:\zadania\aplikacje\language_courses\resources\views/oferta.blade.php ENDPATH**/ ?>
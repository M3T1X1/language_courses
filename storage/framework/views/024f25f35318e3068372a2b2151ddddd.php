<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Logowanie</title>
    <style>
        .login-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 24px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fafbfc;
            font-family: Arial, sans-serif;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 16px;
        }
        label {
            display: block;
            margin-bottom: 6px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        .links {
            margin-top: 20px;
            text-align: center;
        }
        .links a {
            color: #007bff;
            text-decoration: none;
        }
        .alert {
            background: #f8d7da;
            color: #721c24;
            padding: 8px 12px;
            border-radius: 4px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Logowanie</h2>

    
    <?php if($errors->any()): ?>
        <div class="alert">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="#">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="email">Email:</label>
            <input
                type="email"
                id="email"
                name="email"
                value="<?php echo e(old('email')); ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Hasło:</label>
            <input
                type="password"
                id="password"
                name="password"
                required
            >
        </div>

        <button type="submit">Zaloguj się</button>
    </form>

    <div class="links">
        <p>
            Nie masz konta?
            <a href="<?php echo e(url('/register')); ?>">Zarejestruj się</a>
        </p>
    </div>
</div>
</body>
</html>
<?php /**PATH D:\zadania\aplikacje\language_courses\resources\views/auth/login.blade.php ENDPATH**/ ?>
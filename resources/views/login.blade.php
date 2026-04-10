<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body>
<form method="POST" action={{ route('login') }}>
    @csrf
    
    <img src="{{ asset('imagen.jpeg') }}" alt="Imagen" class="img-fluid">
    
    <div class="main-container">
    <div class="login-box">
    <div class="d-flex justify-content-left">
    <div class="row justify-content-center">
    <div class="mb-3">
    <div class="box">    
    <h2>Login</h2>
        <label class="form-label">Correo electrónico</label>
        <input type="email" name="email" class="form-control" placeholder="correo" required>
</div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
</div>
</div>
    <div class="d-grid">
    <button type="submit" class="btn btn-outline-success">Iniciar sesión</button>
</button>
        </div>
        </div>
</div>
</div>
<div class="register-box">
        ¿No tienes cuenta?    
<div class="d-flex justify-content-end mt-3">
    <small>
            <a href="{{ route('register') }}" class="fw-semibold text-success text-decoration-none">
                Regístrate
            </a>
        </small>
    </div>
</div>
</div>
</form>    
</html>


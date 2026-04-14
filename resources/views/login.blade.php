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
        <div class="box"> 
    <div class="mb-3">
   
    <h2>Ingresar</h2>
        <label class="form-label">Correo electrónico</label>
        <input type="email" name="email" class="form-control" placeholder="Correo" required>
</div>
    <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
</div>

    <div class="d-grid">
    <button type="submit" class="btn btn-outline-success">Iniciar sesión</button>
        </div>
</div>
</div>
<div class="register-box">
    <h2>¿No tienes cuenta?</h2>
        <p>Ingresa tus datos personales y crea una cuenta nueva</p>
            <div class="mb-3">    
        <button type="button" onclick="window.location.href='{{ route('register') }}'" class="btn btn-outline-success">
                Regístrate
</button>
</div>
    </div>
</div>
</form>    
</html>


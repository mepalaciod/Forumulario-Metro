><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarme</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">     
</head>
<body class="d-flex justify-content-center align-items-center">

<div class="card-register">
    <h4 class="text-center mb-4">Registrarme</h4>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="mb-3">
            <label class="form-label">Nombre completo</label>
            <input type="text" name="name" class="form-control" placeholder="Ingresa tu nombre completo" required>
        </div> 
        
        <div class="mb-3">
            <label class="form-label">Documento</label>
            <input type="text" name="documento" class="form-control" placeholder="Ingresa tu número de documento" required> 
        </div>
        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
        </div>
        <div class="mb-3">
    <label class="form-label">Confirmar contraseña</label>
    <input type="password" name="password_confirmation" class="form-control" placeholder="Repite tu contraseña" required>
</div>
  <div class="mb-3">
            <label class="form-label">Rol</label>
            <select name="rol" class="form-control" required>
                <option value="usuario">Usuario</option>
                <option value="administrador">Administrador</option>
            </select>
        
        <button type="submit" class="btn btn-outline-success">Registrarme</button>
    </div>
    <div class="login">
    <div class="text-center mt-3">
            <a href="{{ route('login') }}">Ya tengo cuenta</a>
            </div>
</div>
</div>
</form>
</body>
</html>
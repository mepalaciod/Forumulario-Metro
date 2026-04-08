<form method="POST" action={{ route('login') }}>
    @csrf
    <h2>Login</h2>
    <input type="email" name="email" placeholder="correo" required>
    <input type="password" name="password" placeholder="contraseña" required>
    <button type="submit">Iniciar sesión</button>
</form>


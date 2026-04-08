<form method="POST" action="{{ route('register') }}">
    @csrf
    <h2>Registro</h2>
    <input type="email" name="email" placeholder="Correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
    <button type="submit">Registrarse</button>
</form>
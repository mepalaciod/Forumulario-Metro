<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
public function showRegisterForm()
    {
        return view('auth.register'); // asegúrate de tener resources/views/auth/register.blade.php
    }
public function register(Request $request)
{
    
    $request->validate([
        'name' => 'required',
        'documento' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
                'rol' => 'required'
        ]);

    $user = User::create([
        'name' => $request->name,
        'documento' => $request->documento,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'rol' => $request->rol,
    ]);
        Auth::login($user);
return redirect()->route('login')->with('success', 'Usuario registrado correctamente');}
}


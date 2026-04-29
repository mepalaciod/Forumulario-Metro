<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
public function showLoginForm()
{
    return view('login');          
}
public function login(Request $request)
{
$credentials = $request->only('email', 'password');
if (Auth::attempt($credentials,  $request->boolean('remember'))) {
 $request->session()->regenerate();    
return redirect('dashboard');
}

return back()->withErrors([
    'email' => 'Invalid credentials.', 
    'password' => 'Invalid credentials.'

]);
}
public function logout()
{
Auth::logout();
return redirect('/login');
}

public function showRegisterForm()
{
    return view('register');          
}
public function register(Request $request)
{ $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

return redirect()->route('dashboard');   }
}
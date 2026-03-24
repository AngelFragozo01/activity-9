<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;
use App\Mail\LoginAlertMail;

class AuthController extends Controller
{
    // 1. Muestra la vista de Registro
    public function showRegister()
    {
        return view('register');
    }

    // 2. Procesa el Registro
    public function register(Request $request)
    {
        // Validamos los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', 
        ]);

        // Guardamos el resultado en la variable $user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Enviar correo de bienvenida
        Mail::to($user->email)->send(new WelcomeUserMail($user));

        // Redirigimos
        return redirect('/login')->with('success', '¡Registro exitoso! Ya puedes iniciar sesión.');
    }

    // 3. Muestra la vista de Login
    public function showLogin()
    {
        return view('login');
    }

    // 4. Procesa el Login
    public function login(Request $request)
    {
        // Validamos credenciales
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intento de inicio de sesión exitoso
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Obtenemos los datos del usuario que acaba de entrar
            $user = Auth::user();

            // Correo de alerta
            Mail::to($user->email)->send(new LoginAlertMail($user));

            return redirect('/dashboard');
        }

        // Si falla, volvemos atrás con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    // 5. Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
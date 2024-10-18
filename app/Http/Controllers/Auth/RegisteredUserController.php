<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    // Muestra la página de registro si el usuario no está autenticado
    public function create()
    {
        // Verifica si el usuario está autenticado
        if (Auth::check()) {
            // Si está autenticado, redirige al dashboard con un mensaje de estado
            return redirect()->route('dashboard')->with('status', 'Ya estás autenticado.');
        }

        // Si no está autenticado, muestra la vista de registro
        return view('auth.register');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role; // Importar Spatie Role para manejar los roles

class UserController extends Controller
{
    // Método para mostrar el formulario de creación de usuarios
    public function create()
    {
        return view('create-user');  // Asegúrate de que esta vista exista
    }

    // Método para procesar y almacenar un nuevo usuario
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name', // Validar que el rol exista en la tabla de roles
        ]);

        // Crear el usuario sin asignar el rol aún
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar el rol al usuario utilizando Spatie
        $user->assignRole($request->role);

        // Registrar el evento en los logs
        Log::info('Usuario creado: ' . $user->name . ' con email: ' . $user->email . ' y rol: ' . $request->role);

        // Redirigir a la página con un mensaje de éxito
        return redirect()->route('dashboard')->with('status', 'Usuario creado exitosamente con el rol: ' . $request->role);
    }
}

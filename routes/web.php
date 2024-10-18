<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; // Controlador para la creación de usuarios personalizados
use App\Http\Controllers\Auth\RegisteredUserController; // Controlador para el registro de usuarios estándar

// Ruta raíz: redirige a la página de login (Fortify gestiona esto automáticamente)
Route::get('/', function () {
    return redirect('/login');
});

// Ruta para mostrar la página de registro con Fortify (solo la defines si la personalizas)
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');

// Grupo de rutas protegidas por autenticación y verificación de sesión
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Ruta para el dashboard, accesible solo para usuarios autenticados
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para la creación de usuarios personalizados (si implementas un formulario distinto al registro estándar)
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Muestra el formulario de creación de usuarios
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Procesa la creación de usuarios

    // Ruta adicional para manejar la creación de usuarios con el mismo controlador
    Route::post('/create-user', [UserController::class, 'store'])->name('register.user'); // Alternativa para registrar usuarios (si usas un formulario separado)
});

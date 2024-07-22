<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Route pour afficher la page principale
Route::get('/', function () {
    return view('main');
})->name('main');

// Route pour afficher les formulaires de connexion et d'inscription
Route::get('auth', function () {
    return view('auth.auth'); // Assurez-vous que 'auth.auth' correspond au bon fichier de vue
})->name('auth');

// Routes pour traiter l'inscription et la connexion
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::post('login', [LoginController::class, 'login'])->name('login');

// Route pour la déconnexion
Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Route pour la page de profil de l'utilisateur
Route::get('/profile', [StudentController::class, 'show'])->name('profile')->middleware('auth');
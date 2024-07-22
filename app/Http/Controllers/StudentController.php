<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showLoginForm()
    {
        return view('student'); 
    }

    public function show()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Passer l'utilisateur à la vue
        return view('student', ['user' => $user]);
    }
}

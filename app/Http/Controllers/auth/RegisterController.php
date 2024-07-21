<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Valider les données du formulaire
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            // Rediriger l'utilisateur avec les erreurs de validation
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

    // Créer un nouvel utilisateur et se connecter
    try {
        $user = $this->create($request->all());
        auth()->login($user);

        // Ajouter un message de succès à la session
        session()->flash('success', 'Votre inscription a été réalisée avec succès !');
        return view('auth.auth');
    } catch (\Exception $e) {
        // Gérer l'erreur en cas de problème avec la base de données
        return redirect()->back()->with('error', 'Erreur lors de l\'inscription. Veuillez réessayer.');
    }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', function($attribute, $value, $fail) {
                // Définir les domaines valides
                $validDomains = ['.com', '.net', '.org'];
                // Créer un motif de regex pour les domaines
                $pattern = '/@(?:.*?)(\.com|\.net|\.org|\.edu|\.gov|\.mil|\.int|\.co|\.info|\.biz|\.us|\.uk|\.ca|\.au|\.de|\.fr|\.jp|\.cn|\.in|\.br|\.ru|\.za)$/i';
                // Vérifier si l'adresse e-mail correspond au motif
                if (!preg_match($pattern, $value)) {
                    $fail('L’adresse e-mail doit se terminer par ' . implode(', ', $validDomains) . '.');
                }
            }],
            'email_verified_at' => ['required', 'email', 'same:email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Le nom est obligatoire.',
            'name.string' => 'Le nom doit être une chaîne de caractères.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'email.required' => 'L’adresse e-mail est obligatoire.',
            'email.email' => 'L’adresse e-mail doit être valide.',
            'email_confirmation.required' => 'La confirmation de l’adresse e-mail est obligatoire.',
            'email_confirmation.email' => 'La confirmation de l’adresse e-mail doit être valide.',
            'email_confirmation.same' => 'Les adresses e-mail ne correspondent pas.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}


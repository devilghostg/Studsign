<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Valider les données de la requête
        $this->validator($request->all())->validate();

        // Tentative de connexion
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirection en cas de succès
            return redirect()->route('main');
        }

        // Retourner avec des erreurs si la connexion échoue
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos dossiers.',
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }
}

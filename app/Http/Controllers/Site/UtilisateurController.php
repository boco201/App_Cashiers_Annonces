<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class UtilisateurController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function signUp()
    {
        return view('site.utilisateurs.signup');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postSignup(Request $request)
    {
       //dd(request()->all());
       request()->validate([
         'first_name' => 'required|min:5',
         'last_name'      => 'required|min:5',
         'email'    => 'required|email',
         'password' => 'required|min:6'
       ]);
       User::create([
         'first_name' => request('first_name'),
         'last_name' => request('last_name'),
         'email' => request('email'),
         'password' => bcrypt(request('password'))
       ]);

       return redirect()->route('login')->withSuccess('Votre compte est crée avec succès ! Connectez-vous pour acceder à votre espace mêmbre!');
    }
}

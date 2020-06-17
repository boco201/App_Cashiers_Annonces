<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{ User, Professionnel, Category, Post };
use Auth;

class SubscribeController extends Controller
{

    public function getSubscribe()
    {
        return view('site.subscribes.subscribe');
    }

    public function postSubscribe(Request $request)
    {
        // grab the user
        $user = $request->user();

        // if there is no user, we have to create one
        if ( ! $user) {
            $this->validate($request, [
                'first_name'     => 'required',
                'last_name'     => 'required',
                'city'     => 'required',
                'address'     => 'required',
                'country'     => 'required',
                'email'    => 'required|email',
                'password' => 'required|min:6'
                
            ]);


            // create and login
            try {
                $user = User::create([
                    'first_name'     => $request->input('first_name'),
                    'last_name'     => $request->input('last_name'),
                    'city'    => $request->input('city'),
                    'address'    => $request->input('address'),
                    'country'    => $request->input('country'),
                    'email'    => $request->input('email'),
                    'password' => bcrypt($request->input('password')),
                ]);
                Auth::login($user);
            } catch (\Exception $e) {
                return back()->withErrors(['message' => 'Error creating user.']);
            }
    }

    
        // create the users subscription
        // grab the credit card token
        $stripeToken = $request->input('stripe_token');
        $plan = $request->input('plan');

        // create the subscription
        try {
            $user->newSubscription('main', $plan)->create($stripeToken, [
                'email' => $user->email
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => 'Error creating user.']);
        }
        
        return redirect()->route('site.professionnels.index')->withAccess('votre abonnement est crée avec succès!');
    }
}

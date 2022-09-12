<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        if($user->role = "Admin"){
            return view('Admin/profile', compact('user'));
        }
        else if($user->role = "Gestionnaire"){
            return view('Gestionnaire/profile', compact('user'));
        }
        else{
            return view('profile', compact('user'));
        }

    }

    public function update(User $user)
    { 
        $this->validate(request(), [
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'adresse' => 'required'
        ]);

        $user->nom = request('nom');
        $user->prenom = request('prenom');
        $user->email = request('email');
        $user->telephone = request('telephone');
        $user->adresse = request('adresse');

        $user->save();
        return back()->with('message', 'Votre profile est modifié !');
    }
}

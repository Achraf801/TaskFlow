<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    // Afficher les informations du profil
    public function index()
    {
        return view('profile.index', ['user' => Auth::user()]);
    }

    // Formulaire d'édition du profil
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    // Mettre à jour les informations du profil
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('profile.index');
     }

    // Supprimer le compte
    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index( \App\Models\User $user)
    {
        // \App\Models\User ili $user = User::findOrFail($user);


        return view('profiles.index', [
            'user' => $user
        ]);

    }

    public function dashboard()
    {
        // Preuzmi trenutno prijavljenog korisnika
        $user = Auth::user();

        return view('profiles.index', [
            'user' => $user
        ]);
    }
    public function edit(\App\Models\User $user){
        //$user = User::findOrFail($user); OR IN PARAM NAMESPACE


        return view('profiles.edit', [
            'user' => $user // OR USE compact($user)
        ]);

    }
    public function update(\App\Models\User $user){
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        auth()->$user->profile()->update($data);

        return redirect("/profile/{$user->id}"); // php {} blade {{}}




    }

}

